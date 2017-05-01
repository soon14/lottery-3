<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	if(!$args[0]) $args[0]=1;		// 默认查看时时彩玩法
	$chiTypes=array(
		1=>'时时彩',
		2=>'11选5',
		3=>'3D/P3/时时乐',
		6=>'PK10',
		5=>'系统彩',
		10=>'六合彩'
	);
	$groups=$this->getRows("select * from {$this->prename}played_group where type=?  order by sort", $args[0]);
	$sql="select * from {$this->prename}played where groupId=? order by sort";
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header>
		<h3 class="tabs_involved">玩法设置
			<ul class="tabs" style="margin-right:25px;">
			<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ foreach($chiTypes as $key=>$var){ ?>
				<li <?=$this->iff($args[0]==$key, 'class="active"')?>><a href="system/played/<?=$key?>"><?=$var?></a></li>
			<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
			</ul>
		</h3>
	</header>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($groups) foreach($groups as $group){ ?>
	<table class="tablesorter" cellspacing="0">
		<thead>
			<tr>
				<th colspan="7" style="text-align:left;">
                	
					<span style="float:right; margin-right:20px"><a href="/qq836651666.php/system/switchPlayedGroupStatus/<?=$group['id']?>" target="ajax" call="reloadPlayed"><?=$this->iff($group['enable'],'关闭','开启')?></a></span>
					<?=$group['groupName']?>&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="spn1">[状态：<span class="state1"><?=$this->iff($group['enable'],'开启','关闭')?></span>]</span>
                    
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($playeds=$this->getRows($sql, $group['id'])) foreach($playeds as $played){ ?>
			<tr>
				<td width="10%"><?=$played['name']?></td>
				<td width="16%">最高奖金：<input type="text" class="textWid1" name="bonusProp" value="<?=$played['bonusProp']?>"></td>
				<td width="16%">最低奖金：<input type="text" class="textWid1" name="bonusPropBase" value="<?=$played['bonusPropBase']?>"></td>
                <td width="16%">最高注数：<input type="text" class="textWid1" name="maxCount" value="<?=$played['maxCount']?>"></td>
                <td width="16%">排序：<input type="text" class="textWid1" name="sort" value="<?=$played['sort']?>"></td>
				<td width="10%"><span class="state2"><?=$this->iff($played['enable'], '开启', '关闭')?></span></td>
				<td><a href="/qq836651666.php/system/switchPlayedStatus/<?=$played['id']?>" target="ajax" call="reloadPlayed"><?=$this->iff($played['enable'], '关闭', '开启')?></a> | <a href="/qq836651666.php/system/updatePlayed/<?=$played['id']?>" target="ajax" method="post" onajax="sysBeforeUpdatePlayed" call="reloadPlayed">保存修改</a> | <a href="/qq836651666.php/system/betPlayedInfoUpdate/<?=$played['id']?>" button="修改:dataAddCode|取消:defaultCloseModal" title="修改信息" width="510" target="modal" modal="true">修改信息</a></td>
			</tr>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{ ?>
			<tr>
				<td colspan="7">暂时没有玩法</td>
			</tr>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
		</tbody>
	</table>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{ ?>
		暂时没有玩法
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
</article>