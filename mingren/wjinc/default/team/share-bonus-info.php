<table width="80%" class="table_b">
	<tbody class="table_b_tr">
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ 
			$sql = 'select * from ssc_bonus_log where uid='.$this->user['uid'].' and bonusStatus = 0 order by id DESC Limit 1';
			$lastBonus = $this->getRow($sql);
			if($lastBonus){
		?>
		<tr>
			<td width="30%" align="right">未结算盈亏：</td>
			<td><?=sprintf('%.2f',$lastBonus['lossAmount']).元?></td>
		</tr>
		<tr>
			<td>当前分红金额：</td>
			<td><?=sprintf('%.2f',$lastBonus['bonusAmount']).元?></td>
		</tr>
		<tr>
			<td>当前分红开始时间：</td>
			<td><?=date('Y-m-d H:i:s',$lastBonus['startTime'])?></td>
		</tr>
		<tr>
			<td>当前分红截止时间：</td>
			<td><?=date('Y-m-d H:i:s',$lastBonus['endTime'])?></td>
		</tr>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
			}else{
				$dayDate = date('d',time());
				if(1 <= $dayDate && $dayDate < 11){
					$startTime = date('Y-m-1',time()).' 00:00:00';
					$endTime = date('Y-m-11',time()).' 00:00:00';
				}elseif(11 <= $dayDate && $dayDate < 21){
					$startTime = date('Y-m',time()).'-11 00:00:00';
					$endTime = date('Y-m',time()).'-21 00:00:00';
				}elseif(21 <= $dayDate){
					$startTime = date('Y-m',time()).'-21 00:00:00';
					$endTime = date('Y-m-1',strtotime('+1 month')).' 00:00:00';
				}
		?>
		<tr>
			<td width="30%" align="right">未结算盈亏：</td>
			<td><?=sprintf('%.2f',0).'元'?></td>
		</tr>
		<tr>
			<td>当前分红金额：</td>
			<td><?=sprintf('%.2f',0).'元'?></td>
		</tr>
		<tr>
			<td>当前分红开始时间：</td>
			<td><?=$startTime?></td>
		</tr>
		<tr>
			<td>当前分红截止时间：</td>
			<td><?=$endTime?></td>
		</tr>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }

		?>

		<tr>
			<td>已结算盈亏：</td>
			<td>
			<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ 
				$lossAmoutCount	= $this->getValue("select sum(lossAmount) as lossAmount from ssc_bonus_log where uid=? and bonusStatus = 1", $this->user['uid']);
				echo $this->ifs($lossAmoutCount, sprintf('%.2f',0)).'元';
			?>
			</td>
		</tr>
		<tr>
			<td>已分红总计：</td>
			<td>
			<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ 
				$bonusAmoutCount = $this->getValue("select sum(bonusAmount) as bonusAmount from ssc_bonus_log where uid=? and bonusStatus = 1", $this->user['uid']);
				echo $this->ifs($bonusAmoutCount, sprintf('%.2f',0)).'元';
			?>
			</td>
		</tr>
		<tr>
			<td>已结算次数：</td>
			<td>
			<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ 
					$bonusCount = $this->getValue("select count(*) from ssc_bonus_log where uid=? and bonusStatus = 1", $this->user['uid']);
					echo $bonusCount.'次';
			?>
			</td>
		</tr>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ 
			if($lastBonus && floatval($lastBonus['bonusAmount']) > 0){
		?>
		<tr>
		<td colspan="2">
			<a id="bonusButton" target="ajax" href="/index.php/team/getShareBonus/<?=$lastBonus['id']?>" call="getShareBonus" dataType="html">领取分红</a>
		</td>
		</tr>
		<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
			}
		?>
	</tbody>
	</table>
