<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	//print_r($args);exit;
	$pageSize=$args[1];
	$pageurl=$args[2];
	if(isset($args[0])){
		if($args[0]>1){
			$recordCount=$args[0];
		}else{
			$recordCount=1;
		}
	}else{
		$recordCount=1;
	}
	$pageCount=ceil($recordCount/$pageSize);
	
	if($args[3]==1){
		// 只有多页时才显示
		if($pageCount<=1) return;
	}elseif($args[3]==2){
		// 只有有列表时才显示
		if($recordCount<=1) return;
	}
	
	$listPageSize=5;
	$startPage=$this->page-floor($listPageSize/2);
	if($startPage<1) $startPage=1;
	$prePage=$this->page-1;
	if($prePage<1) $prePage=1;
	$nextPage=$this->page+1;
	if($nextPage>$pageCount) $nextPage=$pageCount;
	
	if(!function_exists('set_page_url')){
		function set_page_url($page, $urlString, $flag='{page}'){
			return str_replace($flag, $page, $urlString);
		}
	}
?>
<div class="bottompage">
	
	<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($this->page==1){ ?>
		<a class="disabled">首页</a>&nbsp;
        <a class="disabled">上一页</a>&nbsp;
	<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{ ?>
	<a href="<?=set_page_url(1, $pageurl)?>">首页</a>&nbsp;
    <a href="<?=set_page_url($prePage, $pageurl)?>">上一页</a>&nbsp;
	<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }
		
		for($page=$startPage; $page<=$startPage+$listPageSize; $page++){
			if($page>$pageCount) break;
	?>
	
	&nbsp;<a href="<?=set_page_url($page, $pageurl)?>"<?=($page==$this->page?' class="pagecurrent"':'')?>><?=$page?></a>&nbsp;

	
	<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
		}
		if($page>$pageCount) $page=$pageCount;
	
		if($this->page==$pageCount){
	?>
	<a class="disabled">下一页</a>
	<a class="disabled">尾页</a>
	<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }else{ ?>
	<a href="<?=set_page_url($nextPage, $pageurl)?>">下一页</a>
	<a href="<?=set_page_url($pageCount, $pageurl)?>">尾页</a>
	<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
	<span class="disabled">第<?=$this->page?>页/共<?=$pageCount?>页</span>
</div>
