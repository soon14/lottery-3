<!DOCTYPE html>
<html>
<head lang="en">
<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_base.php',0,'个人首页') ?>
	<link href="/qinyi/css/top.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript">
$(document).ready(function () {
    $("#member").click(
     function(){
		  $("#membernav").slideToggle();
		 }
    );
	$("#daili").click(
     function(){
		  $("#dailinav").slideToggle();
		 }
    );
	$("#report").click(
     function(){
		  $("#reportnav").slideToggle();
		 }
    );
});

</script>
</head>
<body style="">
  <div class="content-warp">
    <div class="layout bg-f6 clearfix pb100">
	<b class="rtop"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b>
      <div class="list-group  text-center dw"><a  style="display:none;"class="ui-btn ui-btn-important w150" href="javascript:void(0);" id="msgForm:j_id3" name="msgForm:j_id3" onclick="qinyiUrlGo1('/index.php/cash/recharge',this)">在线充值</a><a style=""class="ui-btn ui-btn-default w150" href="javascript:void(0);" id="msgForm:j_id6" name="msgForm:j_id6" onclick="qinyiUrlGo1('/report/coin',this)">账变记录</a><a style=""class="ui-btn ui-btn-default w150" href="javascript:void(0);" id="msgForm:j_id6" name="msgForm:j_id6" onclick="qinyiUrlGo1('/report/count',this)">盈亏记录</a><a style="display:none;" class="ui-btn ui-btn-default w150" href="javascript:void(0);" id="msgForm:j_id5" name="msgForm:j_id5" onclick="qinyiUrlGo1('/index.php/cash/toCashLog',this)">提现记录</a>
					</div>
	  <div class="ui-line w-90 mt10"></div>
	
<!--</div></div><?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>-->
