<input type="hidden" name="playedGroup" value="<?=$this->groupId?>" />
<input type="hidden" name="playedId" value="<?=$this->played?>" />
<input type="hidden" name="type" value="<?=$this->type?>" />
<div class="dantuo">
    <label><input type="radio" name="dantuo" value="" checked="checked"/>普通</label>
    <label><input type="radio" name="dantuo" value="1"/>胆拖</label>
</div>
<div>
<div class="pp pp11" action="tz11x5Select" length="2" >
	<div class="title">号码</div>
	<input type="button" value="1" class="code" />
	<input type="button" value="2" class="code" />
    <input type="button" value="3" class="code" />
    <input type="button" value="4" class="code" />
    <input type="button" value="5" class="code" />
    <input type="button" value="6" class="code" />
</div>
</div>
<div class="dmtm unique" style="display:none;">
    <div class="pp pp11">
        <div class="title">胆码</div>
        <input type="button" value="1" class="code" />
        <input type="button" value="2" class="code" />
        <input type="button" value="3" class="code" />
        <input type="button" value="4" class="code" />
        <input type="button" value="5" class="code" />
        <input type="button" value="6" class="code" />
    </div>
    <div class="pp pp11">
        <div class="title">拖码</div>
        <input type="button" value="1" class="code" />
        <input type="button" value="2" class="code" />
        <input type="button" value="3" class="code" />
        <input type="button" value="4" class="code" />
        <input type="button" value="5" class="code" />
        <input type="button" value="6" class="code" />
    </div>
</div>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	
	$maxPl=$this->getPl($this->type, $this->played);
?>
<script type="text/javascript">
$(function(){
	gameSetPl(<?=json_encode($maxPl)?>);
})
</script>