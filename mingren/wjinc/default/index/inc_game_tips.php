<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ 
$sql="select simpleInfo, info, example  from {$this->prename}played where id=?";
$playeds=$this->getRows($sql, $args[0]);
?>
<!-- 这个是游戏的玩法介绍 -->
<div class="showhelp">
	<h5 id="lt_desc"><?=$playeds[0]["simpleInfo"]?></h5><!-- 这个就是显示的部分 -->
    <span action="lt_example" class="methodexample showeg"></span>
    <span action="lt_help" class="methodhelp showeg"></span>
    <div class="clear"></div>
</div>
<div class="game_eg hide" id="lt_examples_div">
	<div class="cont"><?=$playeds[0]["example"]?></div>
 </div>
 <div class="game_eg hide" id="lt_helps_div">
	<div class="cont"><strong>说明：</strong><br /><?=$playeds[0]["info"]?></div>
 </div>