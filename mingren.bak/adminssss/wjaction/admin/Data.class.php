<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */

/**
 * 与开奖数据有关 DAVID UPDATE 2015
 */
class Data extends AdminBase{
	public $pageSize=15;
	private $encrypt_key='QQ:446284379-CMKGLt#20BO(,u=PHsGr@NI*N/On?u8v(^Pa~Gl#n=0w:%o5G$8QCOsdFf2(yz1Fz:ZB#uAR;pt`4Wg;*$+G<EWhZ~I+@l,k$y5r75Q/)';	// 256位随便密码
	private $dataPort=65531;
	
	public final function index($type){
		$this->type=$type;
		$this->display('data/index.php');
	}
	
	public final function add($type, $actionNo, $actionTime){
		$para=array(
			'type'=>$type,
			'actionNo'=>$actionNo,
			'actionTime'=>$actionTime
		);
		$this->display('data/add-modal.php', 0, $para);
	}
	
	public final function kj(){
		$para=$_GET;
		$para['key']=$this->encrypt_key;
		$url=$GLOBALS['conf']['node']['access'] . '/data/kj';
		echo $this->http_post($url, $para);
	}

	public final function added(){
		$para=$_POST;
		$para['type']=intval($para['type']);
		$para['key']=$this->encrypt_key;
		
		$url=$GLOBALS['conf']['node']['access'] . '/data/add';
		if(!$this->getValue("select data from {$this->prename}data where type={$para['type']} and number='{$para['number']}'")) $this->addLog(17,$this->adminLogType[17].'['.$para['data'].']', 0, $this->getValue("select shortName from {$this->prename}type where id=?",$para['type']).'[期号:'.$para['number'].']');
		echo $this->http_post($url, $para);
	}
	public final function back($type, $actionNo, $actionTime){
		$para=array(
			'type'=>$type,
			'actionNo'=>$actionNo,
			'actionTime'=>$actionTime
		);
		$this->display('data/back-modal.php', 0, $para);
	}
	
	public final function backed(){		
	    $para=$_POST;		
		$type = intval($para['type']);
		$number = $para['number'];
		$sql="select * from {$this->prename}bets where type={$type} and actionNo='{$number}'";		
		if($data=$this->getRows($sql)){
			foreach($data as $var){
				$c=intval($var['actionNum'])*$var['mode']*intval($var['beiShu']);
				$this->update("update {$this->prename}members set coin=coin+{$c} where username='{$var['username']}'");
				$this->delete("delete from {$this->prename}bets where id={$var['id']}");
				
				$mm=$this->getRow("select * from {$this->prename}members where username='{$var['username']}'");				
				$inserts = "insert into xy_coin_log (uid,type,playedId,coin,userCoin,fcoin,liqType,actionUID,actionTime,actionIP,info,extfield0,extfield1) values ('".$var['uid']."',".$var['type'].",".$var['playedId'].",'".$c."','".$mm['coin']."',0,255,0,UNIX_TIMESTAMP(),'0','".$number."期未开奖退款"."','".$var['wjorderId']."','".$var['uid']."')";
				$this->query($inserts);
				
				
			}
			//echo '退款成功';
		}
	}			
	public function http_post($url, $data) {
		$data_url = http_build_query ($data);
		$data_len = strlen ($data_url);
	
		return file_get_contents ($url, false, stream_context_create (array ('http'=>array ('method'=>'POST'
				, 'header'=>"Connection: close\r\nContent-Length: $data_len\r\n"
				, 'content'=>$data_url
				))));
	}
}
