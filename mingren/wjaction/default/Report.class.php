<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
class Report extends WebLoginBase{
	public $type;
	public $pageSize=20;
	
	// 帐变列表
	public final function coin($type=0){
		$this->type=intval($type);
		$this->action='coinlog';
		$this->display('report/coin.php');
	}
	
	public final function coinlog($type=0){
		$this->type=intval($type);
		$this->display('report/coin-log.php');
	}

	// 总结算查询
	public final function count(){
		$this->action='countSearch';
		$this->display('report/count.php');
	}
	
	public final function countSearch(){
		$this->display('report/count-list.php');
	}
}
