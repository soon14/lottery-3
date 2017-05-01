<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
class Index extends WebLoginBase{
	public $pageSize=10;
	
	public final function game($type=null, $groupId=null, $played=null){
		if($type) $this->type=intval($type);
		if($groupId){
			$this->groupId=intval($groupId);
		}else{
			// 默认进入三星玩法
			$this->groupId=6;
		}
		if($played) $this->played=intval($played);
		$this->getSystemSettings();	
		$this->display('main.php');
	}
	
  //平台首页
	public final function main(){		
		$this->display('index.php');
	}
	public final function shouye(){		
		$this->display('shouye.php');
	}
	//member
	public final function member(){
		$this->display('member.php');
	}
	//hotsale
	public final function sale(){
		$this->display('main/hotsale.php');
	}
	//index1
	public final function index1(){
		$this->display('main/index-1.php');
	}
	//index2
	public final function index2(){
		$this->display('main/index-2.php');
	}
	//index3
	public final function index3(){
		$this->display('main/index-3.php');
	}
	
	//走势图页面
	public final function charts(){
		$this->display('index/charts/charts.php');
	}
	//号码页面 重庆时时彩
	public final function codes(){
		$this->display('notice/codes/codes.php');
	}
	//江西时时彩
	public final function codes3(){
		$this->display('notice/codes/codes3.php');
	}
	//新疆时时彩
	public final function codes12(){
		$this->display('notice/codes/codes12.php');
	}
	//广东11选5
	public final function codes6(){
		$this->display('notice/codes/codes6.php');
	}
	//重庆11选5
	public final function codes15(){
		$this->display('notice/codes/codes15.php');
	}
	//江西11选5
	public final function codes16(){
		$this->display('notice/codes/codes16.php');
	}
	//福彩3D
	public final function codes9(){
		$this->display('notice/codes/codes9.php');
	}
	//排列三
	public final function codes10(){
		$this->display('notice/codes/codes10.php');
	}
	//重庆快乐十分
	public final function codes18(){
		$this->display('notice/codes/codes18.php');
	}
	//北京PK10
	public final function codes20(){
		$this->display('notice/codes/codes20.php');
	}
	//香港六合彩
	public final function codes30(){
		$this->display('notice/codes/codes30.php');
	}
	//五分彩
	public final function codes14(){
		$this->display('notice/codes/codes14.php');
	}
	public final function group($type, $groupId){
		$this->type=intval($type);
		$this->groupId=intval($groupId);
		$this->display('index/load_tab_group.php');
	}
	
	//走势图
	public final function chartssc(){		
		$this->display('chart/chart_ssc.php');
	}
	public final function chart115(){		
		$this->display('chart/chart_115.php');
	}
	
	//ssc
	public final function helpkj(){
		$this->display('help/kj.php');
	}
	//115
	public final function help115(){
		$this->display('help/115.php');
	}
	//ssc
	public final function helpssc(){
		$this->display('help/ssc.php');
	}
	public final function played($type,$playedId){
		$playedId=intval($playedId);
		$sql="select type, groupId, playedTpl from {$this->prename}played where id=?";
		$data=$this->getRow($sql, $playedId);
		$this->type=intval($type);
		if($data['playedTpl']){
			$this->groupId=$data['groupId'];
			$this->played=$playedId;
			$this->display("index/game-played/{$data['playedTpl']}.php");
		}else{
			$this->display('index/game-played/un-open.php');
		}
	}
	
	// 加载玩法介绍信息
	public final function playTips($playedId){
		$this->display('index/inc_game_tips.php', 0, intval($playedId));
	}
	
	public final function getQiHao($type){
		$type=intval($type);
		$thisNo=$this->getGameNo($type);
		return array(
			'lastNo'=>$this->getGameLastNo($type),
			'thisNo'=>$this->getGameNo($type),
			'diffTime'=>strtotime($thisNo['actionTime'])-$this->time,
			'validTime'=>$thisNo['actionTime'],
			'kjdTime'=>$this->getTypeFtime($type)
		);
	}
	
	// 弹出追号层HTML
	public final function zhuiHaoModal($type){
		$this->display('index/game-zhuihao-modal.php');
	}
	
	// 追号层加载期号
	public final function zhuiHaoQs($type, $mode, $count,$bs){
		$this->type=intval($type);
		$this->display('index/game-zhuihao-qs.php', 0, $mode, $count,$bs);
	}
	
	// 加载历史开奖数据
	public final function getHistoryData($type){
		$this->type=intval($type);
		$this->display('index/inc_data_history.php');
	}

	// 历史开奖HTML
	public final function historyList($type){
	    $this->type=intval($type);
		$this->display('index/history-list.php',$pageSize,$type);
	}
	
	public final function getLastKjData($type){
		$ykMoney=0;
		$czName='重庆时时彩';
		$this->type=intval($type);
		if(!$lastNo=$this->getGameLastNo($this->type)) throw new Exception('查找最后开奖期号出错');
		if(!$lastNo['data']=$this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'"))
		throw new Exception('获取数据出错');
		
		$thisNo=$this->getGameNo($this->type);
		$lastNo['actionName']=$czName;
		$lastNo['thisNo']=$thisNo['actionNo'];
		$lastNo['diffTime']=strtotime($thisNo['actionTime'])-$this->time;
		$lastNo['kjdTime']=$this->getTypeFtime($type);
		return $lastNo;
	}
	
	// 加载人员信息框
	public final function userInfo(){
		$this->display('index/inc_usertop.php');
	}
	public final function userKaima(){
		$this->display('index/inc_data_current1.php');
	}
}