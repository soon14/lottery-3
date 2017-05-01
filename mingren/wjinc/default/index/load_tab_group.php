<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$sql="select groupName from {$this->prename}played_group where id=?";
	$groupName=$this->getValue($sql, $this->groupId);
	
	$sql="select id, name, playedTpl, enable from {$this->prename}played where groupId=? order by sort";
	$playeds=$this->getRows($sql, $this->groupId);
	if(!$this->played) $this->played=$playeds[0]['id'];

	if($playeds) foreach($playeds as $played){
		//if($this->played==$played['id']) $tpl=$played['playedTpl'];
		if($played['enable']){
?>
<div class="ul-li<?=($played['id']==$this->played)?' current':''?>"><a data_id="<?=$played['id']?>"  href="/index.php/index/played/<?=$this->type?>/<?=$played['id']?>"><?=$played['name']?></a></div>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }} ?>
<div class="clear"></div>