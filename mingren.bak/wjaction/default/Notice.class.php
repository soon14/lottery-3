<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */

class Notice extends WebLoginBase{
	public $pageSize=15;
	
	/**
	 * 列表页
	 */
	public final function info(){
		$sql="select * from {$this->prename}content where enable=1 and nodeId=1";
		$sql.=' order by addtime desc';
		$info=$this->getPage($sql, $this->page, $this->pageSize);
		$this->action='notice';
		$this->display('notice/list.php',0,$info);
		
	}

	/**
	 * 详情页
	 */
	public final function view($infoid){
		$infoid=intval($infoid);
		$info=$this->getRow("select * from {$this->prename}content where id=?", $infoid);
		$this->action='notice';
		$this->display('notice/view.php',0,$info);
	}
	


	
}