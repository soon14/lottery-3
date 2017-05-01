<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$sql="select groupName from {$this->prename}played_group where id=?";
	$groupName=$this->getValue($sql, $this->groupId);

	$sql="select id, name, playedTpl, enable  from {$this->prename}played where enable=1 and groupId=? order by sort";
	$playeds=$this->getRows($sql, $this->groupId);
	if(!$playeds) {echo '<div style="height:150px;margin-top:50px;text-align:center;color:#f00">暂无玩法</div>';return;} 
	if(!$this->played) $this->played=$playeds[0]['id'];
	
?>
<div style="width:1000px;float:left;padding:15px 0 0 20px;">
	<div class="game-btn2"><!-- 这里是玩法的子类 -->
		<?php
	/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
			if($playeds) foreach($playeds as $played){
				if($this->played==$played['id']){
					$tpl=$played['playedTpl'];
				}
				if($played['enable']){
		?>
		<div class="ul-li<?=($played['id']==$this->played)?' current':''?>"><a data_id="<?=$played['id']?>" href="/index.php/index/played/<?=$this->type?>/<?=$played['id']?>"><?=$played['name']?></a></div>
		<? }} ?>
	    <div class="clear"></div>
	</div>
	<div id="game-helptips"><?php
	/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display("index/inc_game_tips.php", 0 ,$this->played); ?></div>
	<!-- 数字选取区 -->
	<div class="num-table" style="width:1050px;"id="num-select">
	<?php  if(!$played['enable']) {echo '<div style="height:100px;text-align:center;color:#f00">暂无玩法</div>';return;} 
		$this->display("index/game-played/$tpl.php"); ?>
	</div>
