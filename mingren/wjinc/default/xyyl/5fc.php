<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
$lastNo=$this->getGameLastNo(14);

header('Content-type: application/xml');
echo'<?xml version="1.0" encoding="utf-8"?>';
echo '<xml><row expect="'.$lastNo['actionNo'].'" opencode="'.randKeys().'" opentime="'.$lastNo['actionTime'].'"/></xml>';


/* 生成随机数 */
function randKeys($len=5){
	$rand='';
	for($x=0;$x<$len;$x++){
		srand((double)microtime()*1000000);
		$rand.=($rand!=''?',':'').mt_rand(0,9);
	}
	return $rand;
}
?>