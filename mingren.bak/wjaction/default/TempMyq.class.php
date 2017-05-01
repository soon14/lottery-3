<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */

class TempMyq extends WebLoginBase{
	public $scoretype='current';
	public $limittype='all';
	public $pageSize=3;
	
	public $payout=0.85;		// 取消兑换积分返还率
	
	/**
	 * 临时处理彩种分类导航要不要打开的
	 */
	public final function typeTemp($typeId){
		$this->getSystemSettings();
		$this->display('_type-temp.php');
	}
	
}