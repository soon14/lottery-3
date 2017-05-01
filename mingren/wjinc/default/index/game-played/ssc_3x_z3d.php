<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $z3Pl=$this->getPl($this->type, 19);$z6Pl=$this->getPl($this->type, 20); ?>
<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<div class="pp" action="tzSscHhzxInput" played="后" length="3" z3min="<?=$z3Pl['bonusPropBase']?>" z6min="<?=$z6Pl['bonusPropBase']?>" z3max="<?=$z3Pl['bonusProp']?>" z6max="<?=$z6Pl['bonusProp']?>">
	<textarea id="textarea-code"></textarea>
</div>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($z3Pl)?>, true);
})
</script>
