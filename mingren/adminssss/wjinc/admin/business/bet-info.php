<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$this->getPlayeds();
	$bet=$this->getRow("select * from {$this->prename}bets where id=?", $args[0]);
	
	if(!$bet) throw new Exception('单号不存在');
	
	$modeName=array('2.00'=>'元', '0.20'=>'角', '0.02'=>'分');
	$weiShu=$bet['weiShu'];
	if($weiShu){
		$w=array(16=>'万', 8=>'千', 4=>'百', 2=>'十',1=>'个');
		foreach($w as $p=>$v){
			if($weiShu & $p) $wei.=$v;
		}
		$wei.=':';
	}
	
	$betCont=$bet['mode'] * $bet['beiShu'] * $bet['actionNum'] * ($bet['fpEnable']+1);
?>
<div class="bet-info popupModal">
<input type="hidden" value="<?=$this->user['username']?>" />
	<table cellpadding="0" cellspacing="0" width="480">
		<tr>
			<td align="right">号码：</td>
			<td colspan="3"><textarea cols="45" rows="5"><?=$wei.$bet['actionData']?></textarea></td>
		</tr>
		<tr>
			<td width="80" align="right">单号：</td>
			<td width="160"><?=$bet['wjorderId']?></td>
			<td width="80" align="right">投注数量：</td>
			<td width="160"><?=$bet['actionNum']?></td>
		</tr>
		<tr>
			<td align="right">发起人：</td>
			<td><?=$bet['username']?></td>
			<td align="right">模式：</td>
			<td><?=$modeName[$bet['mode']]?></td>
		</tr>
		<tr>
			<td align="right">倍数：</td>
			<td><?=$bet['beiShu']?></td>
			<td align="right">中奖注数：</td>
			<td><?=$this->iff($bet['lotteryNo'], $bet['zjCount'], '－')?></td>
		</tr>
		<tr>
			<td align="right">彩种：</td>
			<td><?=$this->types[$bet['type']]['title']?></td>
			<td align="right">奖金－返点：</td>
			<td><?=number_format($bet['bonusProp'], 2)?>－<?=number_format($bet['fanDian'],1)?>%</td>
		</tr>
		<tr>
			<td align="right">期号：</td>
			<td><?=$bet['actionNo']?></td>
			<td align="right">玩法：</td>
			<td><?=$this->playeds[$bet['playedId']]['name'].$this->iff($bet['fpEnable'], ' 飞盘', '')?></td>
		</tr>
		<tr>
			<td align="right">开奖号：</td>
			<td><?=$this->ifs($bet['lotteryNo'], '－')?></td>
			<td align="right">投注时间：</td>
			<td><?=date('m-d H:i:s',$bet['actionTime'])?></td>
		</tr>
		<tr>
			<td align="right">订单状态：</td>
			<td>
			<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
				if($bet['isDelete']==1){
					echo '<font color="#999999">已撤单</font>';
				}elseif(!$bet['lotteryNo']){
					echo '<font color="#009900">未开奖</font>';
				}elseif($bet['zjCount']){
					echo '<font color="red">已派奖</font>';
				}else{
					echo '未中奖';
				}
			?>
			</td>
		</tr>
		<!-- 投注开始 -->
		<tr>
			<td align="right">投注：</td>
			<td><?=number_format($betCont, 2)?>元</td>
			<td align="right">中奖：</td>
			<td><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'], 2) .'元', '－')?></td>
		</tr>
		<tr>
			<td align="right">上级返点：</td>
			<td><?=$this->iff($bet['lotteryNo'], number_format($bet['fanDianAmount'], 2). '元', '－')?></td>
			<td align="right">个人盈亏：</td>
			<td><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'] - $betCont, 2) . '元', '－')?></td>
		</tr>
		<!-- 投注结束 -->
	</table>
</div>
