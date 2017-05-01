<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	//$sql="select time, number, data from {$this->prename}data where type={$this->type} order by number desc,time desc limit {$args[0]}";
  $sql="select time, number, data from {$this->prename}data where type={$this->type} order by number desc,time desc limit 0,7";
	if($data=$this->getRows($sql)) foreach($data as $var){
	 $udata=explode(",",$var['data']);
	 //$115 = array("6","7","15","16");
	 if($this->type==18){ //快乐十分)
?>
<style type="text/css"> 
/*重庆幸运农场*/
.periodlist{color:#333;font-size: 13px;}
.periodlist span{ color:#ea5635; width:22px; height:22px; padding:10px 2px 8px 2px;}
</style>
<tr align=center><td><div class='periodlist'><?= substr($var['number'],-3)?></div></td><td title='<?=$var['data']?>'><div class='periodlist'><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ foreach($udata as $num){ echo "<span>".$num."</span>";} ?></div></td></tr> 
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else if($this->type==6 ||$this->type==7 ||$this->type==15 ||$this->type==16){ //十一选五 ?>
<style type="text/css"> /* 159px  182px 十一选五 */
.periodlist{color:#333;font-size: 13px;}
.periodlist span{ color:#ea5635; width:22px; height:22px; padding:10px 2px 8px 2px;}</style>
<tr align=center>
  <td><div class='periodlist'><?=$var['number']?></div></td>
  <td title='<?=$udata?>'><div class='periodlist'><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ foreach($udata as $num){ echo "<span>".$num."</span>";} ?></div></td>
</tr> 
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else if($this->type==20){ //北京PK10 ?>
<style type="text/css"> /* 159px  182px*/
.periodlist{color:#333;font-size: 13px;}
.periodlist span{ color:#ea5635; width:22px; height:22px; padding:10px 2px 8px 2px;}
</style>
<tr align=center>
  <td><div class='periodlist'><?=$var['number']?></div></td>
  <td title='<?=$udata?>'><div class='periodlist'><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ foreach($udata as $num){ echo "<span>".$num."</span>|";} ?></div></td>
</tr> 
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{ ?>
<style type="text/css"> /* 159px  182px 时时彩*/
.periodlist{color:#333;font-size: 13px;}
.periodlist span{ color:#ea5635; width:22px; height:22px; padding:10px 2px 8px 2px;}</style>
<tr align=center>
  <td><div class='periodlist'><?=$var['number']?></div></td>
  <td title='<?=$udata?>'><div class='periodlist'><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ foreach($udata as $num){ echo "<span>".$num."</span>";} ?></div></td>
</tr> 
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } } ?>
