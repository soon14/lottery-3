<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_left.php') ?>
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
	$txcount=$this->getValue("select count(id) from {$this->prename}member_cash  where state=1")
?>
<div class="pagetop"></div>
<div class="pagemain">
	
    <div class="display biao-cont">

		<div class="tips">
        	<p>提现正在处理中，排队<strong class="red"><?=intval($txcount)+intval($this->settings['cashPersons'])?></strong></p>
        </div>

    </div>
	
</div>
<!--以下为模板代码-->
</div></div></div><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>
   