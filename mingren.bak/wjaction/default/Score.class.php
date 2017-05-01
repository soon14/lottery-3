<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */

class Score extends WebLoginBase{
	private $vcodeSessionName='ssc_vcode_session_name';
	public $scoretype='current';
	public $limittype='all';
	public $pageSize=6;
	public $payout=0.85;		// 取消兑换积分返还率
	/**
	 * 列表页
	 */
	public final function goods($scoretype=null,$limittype=null){
		if($scoretype) $this->scoretype=$scoretype;
		if($limittype) $this->limittype=$limittype;
		$sql="select * from {$this->prename}score_goods where enable=1 and isdelete=0 and startTime<={$this->time} and ";
		switch($this->scoretype){
			case 'current':
				// 正在进行的活动
				switch($this->limittype){
					case 'all':
						$sql.="(stopTime>{$this->time} or stopTime=0)";
					break;
					case 'time':
						$sql.="stopTime>{$this->time} and sum=0";
					break;
					case 'number':
						$sql.='sum>0 and surplus>0 and stopTime=0';
					break;
					case 'both':
						$sql.="stopTime>{$this->time} and sum>0";
					break;
					case 'none':
						$sql.='stopTime=0 and sum=0';
					break;
					default:
						throw new Exception('参数出错');
				}
			break;
			case 'old':
				switch($this->limittype){
					case 'all':
						$sql.="((stopTime<{$this->time} and stopTime<>0) or (sum>0 and surplus=0))";
					break;
					case 'time':
						$sql.="stopTime<{$this->time} and sum=0";
					break;
					case 'number':
						$sql.='sum>0 and surplus=0';
					break;
					case 'both':
						$sql.="stopTime>0 and (stopTime<{$this->time} or (sum>0 and surplus=0))";
					break;
					default:
						throw new Exception('参数出错');
				}
			break;
			case 'me':
				$sql="select s.id swapId, s.state, g.* from {$this->prename}score_swap s, {$this->prename}score_goods g where s.goodId=g.id and s.uid={$this->user['uid']} and ";
				switch($this->limittype){
					case 'current':
						$sql.='state between 1 and 2';
					break;
					case 'history':
						$sql.='state=0';
					break;
					default:
						throw new Exception('参数出错');
				}
			break;
			default:
				throw new Exception('参数出错');
			break;
		}
		$sql.=' order by id';
		$goods=$this->getPage($sql, $this->page, $this->pageSize);
		$this->display('score/list.php',0,$goods);
	}

	/**
	 * 兑换页
	 */
	public final function swap($goodId){
		$goodId=intval($goodId);
		$good=$this->getRow("select * from {$this->prename}score_goods where id=?", $goodId);
		$this->display('score/swap.php',0,$good);
	}

	public final function scoreinfo(){
		$this->display('score/reloadscore.php');
	}
	/**
	 * 兑换
	 */
	public final function swapGood(){
		if(!$_POST) throw new Exception('请求出错');

		//过滤未知字段
		$para['goodId']=intval($_POST['goodId']);
		$para['number']=$_POST['number'];
		$para['coinpwd']=$_POST['coinpwd'];

		if(!$para['goodId']) throw new Exception('请求出错');
		if(!ctype_digit($para['number'])) throw new Exception('兑换数量必须为整数');
		if($para['number']<=0) throw new Exception('兑换数量需大于等于1');
		
		$this->beginTransaction();
		try{
			$sql="select * from {$this->prename}score_goods where id=?";
			if(!$good=$this->getRow($sql, $para['goodId'])) throw new Exception('兑换商品不存在');
			if($good['stopTime']>0 && $good['stopTime']<$this->time) throw new Exception('这活动已经过期了');
			if($good['sum']>0 && $good['surplus']==$good['sum']) throw new Exception('这礼品已经兑换完了');
            $good['score']=$good['score']*$para['number'];
			
			$this->freshSession();
			if($good['score']>$this->user['score']) throw new Exception('你拥有积分不足，不能兑换这礼品');
			if(md5($para['coinpwd'])!=$this->user['coinPassword']) throw new Exception('资金密码不正确');
			unset($para['coinpwd']);
			
			$para['swapTime']=$this->time;
			$para['swapIp']=$this->ip(true);
			$para['uid']=$this->user['uid'];
			$para['score']=$good['score'];
			
			if($good['price']>0){//积分直接兑奖
				$para['state']=0;
				}
			if(!$this->insertRow($this->prename .'score_swap', $para)) throw new Exception('兑换礼品出错');
			
			$sql="update {$this->prename}members set score=score-{$good['score']} where uid=?";
			if(!$this->update($sql, $this->user['uid'])) throw new Exception('兑换礼品出错');
			
			if($good['sum']>0){
				// 限量兑换的礼品
				$sql="update {$this->prename}score_goods set surplus=surplus+1,persons=persons+1 where id=?";
				if(!$this->update($sql, $good['id'])) throw new Exception('兑换礼品出错');
			}
			if($good['price']>0){//积分直接兑奖
				$rechargeAmount=$good['price']*$para['number']; //元
					
					$this->addCoin(array(
						'uid'=>$this->user['uid'],
						'coin'=>$rechargeAmount,
						'liqType'=>111,
						//'extfield0'=>$id,
						'extfield0'=>0,
						'extfield1'=>0,
						'info'=>'积分兑换'
					));	
			}//兑换积分结束
			$this->commit();
			return '兑换礼品成功';
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
	}
	
	/**
	 * 兑换礼品状态改变
	 */
	public final function setSwapState($swapId){
		if(!$swapId=intval($swapId)) throw new Exception('请求出错');
		if(!$swap=$this->getRow("select * from {$this->prename}score_swap where id=$swapId")) throw new Exception('请求出错');
		
		if($swap['uid']!=$this->user['uid']) throw new Exception('你不能代别人取消兑换或确认收货');
		if($swap['state']==0) throw new Exception('这兑换已经确认收货了');
		if($swap['state']==3) throw new Exception('这兑换已经取消。');
		
		if($swap['state']==1){
			$score=round($swap['score']*$this->payout);
			$sql="update {$this->prename}members u, {$this->prename}score_swap s set u.score=u.score+$score, s.state=3 where u.uid=s.uid and s.id=$swapId";
		}elseif($swap['state']==2){
			$sql="update {$this->prename}score_swap set state=0 where id=$swapId";
		}else{
			throw new Exception('请求出错');
		}
		
		if($this->update($sql)){
			return '操作成功';
		}else{
			throw new Exception('请求出错');
		}
	}
	
	public function formatGoodTime($startTime, $endTime){
		if($this->time < $startTime) return '等待中';
		if($endTime && $endTime < $this->time) return '已结束';
		if(!$endTime) return '';
		
		$time=$endTime-$this->time;
		if($time>24*3600){
			$return=floor($time/(24*3600)).'天';
			$time%=24*3600;
		}
		
		if($time>3600){
			$return.=floor($time/3600).'时';
			$time%=3600;
		}
		
		$return.=floor($time/60).'分';
		return $this->CsubStr($return,0,6,'');
	}
	


/**
	 * 幸运大转盘  秦逸独创
	 */
	public final function rotate(){
		$this->display('score/rotate.php');
	}
	
	public final function rotateEvent(){
		$this->getdzpSettings;
		$score=$this->dzpsettings['score'];        //单次转动所需要的积分
		$money=array();     //定义现金数组
		$multiple=array();  //定义实物数组  默认永远不可能中奖，有需要请调节 getRand
		if($this->user['score']<$score){$result['angle']=0;$result['prize']='你拥有积分不足，不能能参加转盘抽奖活动！';return $result;}
		if(!$this->dzpsettings['switchWeb']){$result['angle']=0;$result['prize']='幸运大转盘活动未开启，敬请关注！';return $result;}
        $prize_arr = array(
           '0' => array('id'=>1,'min'=>289,'max'=>323,'prize'=>$this->dzpsettings['goods289323'],'v'=>$this->dzpsettings['chance289323'],'j'=>$this->dzpsettings['coin289323'],'w'=>$this->dzpsettings['shiwu289323']),
           '1' => array('id'=>2,'min'=>181,'max'=>215,'prize'=>$this->dzpsettings['goods181215'],'v'=>$this->dzpsettings['chance181215'],'j'=>$this->dzpsettings['coin181215'],'w'=>$this->dzpsettings['shiwu181215']),
           '2' => array('id'=>3,'min'=>37,'max'=>71,'prize'=>$this->dzpsettings['goods3771'],'v'=>$this->dzpsettings['chance3771'],'j'=>$this->dzpsettings['coin3771'],'w'=>$this->dzpsettings['shiwu3771']),
           '3' => array('id'=>4,'min'=>73,'max'=>107,'prize'=>$this->dzpsettings['goods73107'],'v'=>$this->dzpsettings['chance73107'],'j'=>$this->dzpsettings['coin73107'],'w'=>$this->dzpsettings['shiwu73107']),
           '4' => array('id'=>5,'min'=>253,'max'=>287,'prize'=>$this->dzpsettings['goods253287'],'v'=>$this->dzpsettings['chance253287'],'j'=>$this->dzpsettings['coin253287'],'w'=>$this->dzpsettings['shiwu253287']),
           '5' => array('id'=>6,'min'=>0,'max'=>35,'prize'=>$this->dzpsettings['goods035'],'v'=>$this->dzpsettings['chance035'],'j'=>$this->dzpsettings['coin035'],'w'=>$this->dzpsettings['shiwu035']),
		   '6' => array('id'=>7,'min'=>145,'max'=>179,'prize'=>$this->dzpsettings['goods145179'],'v'=>$this->dzpsettings['chance145179'],'j'=>$this->dzpsettings['coin145179'],'w'=>$this->dzpsettings['shiwu145179']),
           '7' => array('id'=>8,'min'=>109,'max'=>143,'prize'=>$this->dzpsettings['goods109143'],'v'=>$this->dzpsettings['chance109143'],'j'=>$this->dzpsettings['coin109143'],'w'=>$this->dzpsettings['shiwu109143']),
           '8' => array('id'=>9,'min'=>217,'max'=>251,'prize'=>$this->dzpsettings['goods217251'],'v'=>$this->dzpsettings['chance217251'],'j'=>$this->dzpsettings['coin217251'],'w'=>$this->dzpsettings['shiwu217251']),
		   '9' => array('id'=>10,'min'=>325,'max'=>359,'prize'=>$this->dzpsettings['goods325359'],'v'=>$this->dzpsettings['chance325359'],'j'=>$this->dzpsettings['coin325359'],'w'=>$this->dzpsettings['shiwu325359'])
        );
        foreach ($prize_arr as $key => $val) {    //二维数组遍历
            $arr[$val['id']] = $val['v'];
			if($val['j']>0){                      //筛选现金id
				array_push($money,$val['id']);    //压入数据
			}
			if($val['w']>0){                      //筛选实物id
				array_push($multiple,$val['id']);    //压入数据
			}
        }
        $rid = $this->getRand($arr); //根据概率获取奖项id
        $res = $prize_arr[$rid-1]; //中奖项
        $min = $res['min'];
        $max = $res['max'];
        $result['angle'] = mt_rand($min,$max); //随机生成一个角度
        $result['prize'] = $res['prize'];
		$this->beginTransaction();          //开始事务处理
		try{
		$sql="update {$this->prename}members set score=score-{$score} where uid=?";
		if(!$this->update($sql, $this->user['uid'])){$result['angle']=0;$result['prize']='内部出错，请重新操作!';return $result;}   //扣出本次积分
		if(in_array($rid,$money)){
			$this->addCoin(array(
						'uid'=>$this->user['uid'],
						'coin'=>$res['j'],
						'liqType'=>120,
						'extfield0'=>0,
						'extfield1'=>0,
						'info'=>'大转盘奖金'
			));
			$para=array(                              //定义记录值
			     'uid'=>$this->user['uid'],
			     'info'=>$res['prize'],
			     'state'=>0,
			     'swapTime'=>$this->time,
			     'swapIp'=>$this->ip(true),
			     'coin'=>$res['j'],
			     'score'=>$this->user['score']-$score,
				 'xscore'=>$score,
			     'enable'=>1
			);
		    if(!$this->insertRow($this->prename .'dzp_swap', $para)){$result['angle']=0;$result['prize']='内部出错，请重新操作!';return $result;}   //产生后台记录
		}else if($rid==8){        //如果中了 "再来一次"
			$sql="update {$this->prename}members set score=score+{$score} where uid=?";
		    if(!$this->update($sql, $this->user['uid'])){$result['angle']=0;$result['prize']='内部出错，请重新操作!';return $result;}   //中了再来一次后排给积分
		}else if(in_array($rid,$multiple)){    //getRand默认不中奖实物，如果中了实物就他妈的提交到后台去
			$para=array(                              //定义记录值
			     'uid'=>$this->user['uid'],
			     'info'=>$res['prize'],
			     'state'=>1,
			     'swapTime'=>$this->time,
			     'swapIp'=>$this->ip(true),
			     'coin'=>$res['j'],
			     'score'=>$this->user['score']-$score,
				 'xscore'=>$score,
			     'enable'=>1
			);
		    if(!$this->insertRow($this->prename .'dzp_swap', $para)){$result['angle']=0;$result['prize']='内部出错，请重新操作!';return $result;}   //产生后台记录
		}
		    $this->commit();
			return $result; 
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}  
	}
}
?>
	