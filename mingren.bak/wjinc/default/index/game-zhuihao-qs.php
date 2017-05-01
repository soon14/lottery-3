<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	if($list=$this->getGameNos($this->type, $args[1]))
	foreach($list as $var){
?>
<tr>
	<td><input type="checkbox" />
	<td><?=$var['actionNo']?></td>
	<td><input type="text" class="beishu" value="1"/></td>
	<td><span class="amount"><?=$args[0]?></span>元</td>
	<td><?=date('Y-m-d H:i:s', $var['actionTime'])?></td>
</tr>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>