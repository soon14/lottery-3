<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$this->getPlayeds();
	$played=$this->getRow("select simpleInfo, info, example from {$this->prename}played where id=?", $args[0]);
	
	if(!$played) throw new Exception('单号不存在');
?>
<div>
<input type="hidden" value="<?=$this->user['username']?>" />
<form action="/qq836651666.php/system/playedInfoUpdateed" target="ajax" method="post" call="playedInfoDataSubmitCode" onajax="playedInfoDataBeforeSubmitCode" dataType="html">
	<input type="hidden" name="playedid" value="<?=$args[0]?>"/>
   
<div class="bet-info popupModal">
	<table cellpadding="0" cellspacing="0" width="480">
		<tr>
			<td align="right">玩法介绍：</td>
			<td><textarea cols="45" name="simpleInfo" rows="3"><?=$played['simpleInfo']?></textarea></td>
		</tr>
		<tr>
			<td align="right">详细介绍：</td>
			<td><textarea cols="45" name="info" rows="3"><?=$played['info']?></textarea></td>
		</tr>
        <tr>
			<td align="right">中奖范例：</td>
			<td><textarea cols="45" name="example" rows="3"><?=$played['example']?></textarea></td>
		</tr>
		
	</table>
</div>
   </form>
</div>