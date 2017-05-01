<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<div class="pp pp11" action="ssch3ts" length="1">
    &nbsp
	<div class="title">选择</div>
	<input type="button" value="豹子" class="code reset2" />
	<input type="button" value="顺子" class="code reset2" />
	<input type="button" value="对子" class="code reset2" />
</div>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $maxPl=$this->getPl($this->type, $this->played); ?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>);
})
</script>