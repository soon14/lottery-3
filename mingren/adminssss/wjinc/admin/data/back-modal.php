<?php
/* 此程序来自家园网络QQ836651666 程序源码修复 功能添加修改 仅供研究学习之用 禁止用于商业非法用途 */ $para=$args[0]; 
if($para['type']==1){
	$actionNo=date('Ymd-', strtotime($para['actionTime'])).substr($para['actionNo']+1000,1);
	if($para['actionNo']==120) $actionNo=date('Ymd-', strtotime($para['actionTime'])).substr($para['actionNo']+1000,1);
}else if($para['type']==6||$para['type']==7||$para['type']==14){
	$actionNo=date('Ymd-', strtotime($para['actionTime'])).substr($para['actionNo']+1000,1);
}else if($para['type']==3){
	$actionNo=date('Ymd-', strtotime($para['actionTime'])).substr($para['actionNo']+100,1);
}else if($para['type']==11){
	$actionNo=date('Ymd-', strtotime($para['actionTime'])).substr($para['actionNo']+100,1);
}else if($para['type']==12){
	$actionNo=date('Ymd-', strtotime($para['actionTime'])).substr($para['actionNo']+100,1);
}else if($para['type']==5){
	$actionNo=date('Ymd-', strtotime($para['actionTime'])).substr($para['actionNo']+10000,1);
}else if($para['type']==9||$para['type']==10){
	$actionNo=date('Yz', strtotime($para['actionTime']));
	$actionNo=substr($actionNo,0,4).substr(substr($actionNo,4)+1000-6,1);
}else if($para['type']==25){
	$actionNo=date('md', strtotime($para['actionTime'])).substr($para['actionNo']+100,1);
}else if($para['type']==14 || $para['type']==26 || $para['type']==18 || $para['type']==17 || $para['type']==16 || $para['type']==15){
	$actionNo=date('Ymd-', strtotime($para['actionTime'])).substr($para['actionNo']+1000,1);
}else if($para['type']==30){
	$actionNo=date('Yz', $this->time);
	$actionNo=substr($actionNo,0,4).substr(substr($actionNo,4)+1000,1);
}else if($para['type']==20){
	$actionNo = 179*(strtotime(date('Y-m-d', strtotime($para['actionTime'])))-strtotime('2007-11-11'))/3600/24+$para['actionNo']-2520;
}
?>
<div>
<input type="hidden" value="<?=$this->user['username']?>" />
<form action="/qq836651666.php/data/backed" target="ajax" method="post" call="dataSubmitCode" onajax="dataBeforeSubmitCode" dataType="html">
	<input type="hidden" name="type" value="<?=$para['type']?>"/>
	<table class="popupModal">
		<tr>
			<td class="title" width="180">期号：</td>
			<td><input type="text" name="number" value="<?=$actionNo?>"/></td>
		</tr>
		<tr>
			<td class="title">开奖时间：</td>
			<td><input type="text" name="time" value="<?=$para['actionTime']?>"/></td>
		</tr>
		<tr>
			<td align="right"><span class="spn4">提示：</span></td>
			<td><span class="spn4">对未开奖用户进行退款处理，<br/>退款金额为投注金额的100%</span></td>
		</tr>
	</table>
</form>
</div>