<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
class Record extends WebLoginBase{
	public $pageSize=20;
	public final function search(){
		
		$this->getTypes();
		$this->getPlayeds();
		$this->action='searchGameRecord';
		$this->display('record/search.php');
	}

	public final function searchGameRecord(){
		$this->getTypes();
		$this->getPlayeds();
		$this->display('record/search-list.php');
	}
	
	public final function betInfo($id){
		$this->getTypes();
		$this->getPlayeds();
		$this->display('record/bet-info.php', 0 , intval($id));
	}
	public final function bet(){
		$this->display('record/bet.php');
	}
}
