<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$sql="select type, time, number, data from ssc_data where type={$args[0]}";
	$sql=$sql." order by number desc";
	$data=$this->getPage($sql, $this->page, $this->pageSize);
    $typename=$this->getValue("select title from ssc_type where id=?",$args[0]);
?>
<div class="bet-info popupModal">
<table width="100%">
	<tbody class="ht-cont">
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($data['data']) foreach($data['data'] as $var){ ?>
		<tr>
			<td><?=$typename?></td>
			<td><?=$var['number']?></td>
			<td><?=$var['data']?></td>
			<td><?=date('H:i', $var['time'])?></td>
		</tr>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
	</tbody>
</table>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ 
	$this->display('inc_page.php',0,$data['total'],$this->pageSize, '/index.php/index/historyList-{page}/'.$args[0]);
?>
</div>