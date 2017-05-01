<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $wfName=$this->getValue("select name from {$this->prename}played where id={$this->played}"); ?>
<div class="pp" action="tzAllSelect" length="1" random="sscRandom">
    <div class="title"><?=$wfName?>大小</div>
	<input type="button" value="大" class="code" />
	<input type="button" value="小" class="code" />
    <div class="clear"></div><div class="title"><?=$wfName?>单双</div>
	<input type="button" value="单" class="code" />
	<input type="button" value="双" class="code" />

</div>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$maxPl=$this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>,false,<?=$this->user['fanDianBdw']?>);
})
</script>
