<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$nodeId=1;
	$sql="select * from {$this->prename}content where nodeId=$nodeId order by id desc";
	$data=$this->getPage($sql, $this->page, $this->pageSize);
	//print_r($sql);
?>

<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header>
		<h3 class="tabs_involved">系统公告
			<div class="submit_link wz">
			<input type="submit" value="添加公告" onclick="sysAddNotice()" class="alt_btn">
			</div>
		</h3>
	</header>
	<table class="tablesorter" cellspacing="0">
	<thead>
		<tr>
			<td>标题</td>
			<td>是否显示</td>
            <td>日期</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody id="nav01">
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($data['data']) foreach($data['data'] as $var){ ?>
		<tr>
			<td width="60%" align="left"><?=$var['title']?></td>
			<td  align="center"><?=$this->iff($var['enable'], '显示', '隐藏')?></td>
            <td><?=date('Y-m-d', $var['addTime'])?></td>
			<td><a href="system/updateNotice/<?=$var['id']?>" >修改保存</a> | <a href="/qq836651666.php/system/deleteNotice/<?=$var['id']?>" target="ajax" call="sysReloadNotice">删除</a></td>
		</tr>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{ ?>
		<tr>
			<td colspan="4">暂时没有系统公告，要添加公告请点击右上角按钮。</td>
		</tr>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
	</tbody>
	</table>
	<footer>
	<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
		$rel=get_class($this).'/notice-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $data['total'], $rel, 'betLogSearchPageAction');
	?>
	</footer>
</article>
<script type="text/javascript">  
ghhs("nav01","tr");  
</script>
