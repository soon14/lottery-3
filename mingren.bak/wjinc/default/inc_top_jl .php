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
      <div class="list-group  text-center dw"><a  style="display:none;"class="ui-btn ui-btn-important w150" href="javascript:void(0);" id="msgForm:j_id3" name="msgForm:j_id3" onclick="qinyiUrlGo1('/cash/rechargeLog',this)">我的消息</a>
	  <a class="ui-btn ui-btn-default w150" href="javascript:void(0);" id="msgForm:j_id4" name="msgForm:j_id4" onclick="qinyiUrlGo1('/record/search',this)">游戏记录</a><a  style="display:none;" class="ui-btn ui-btn-default w150" href="javascript:void(0);" id="msgForm:j_id5" name="msgForm:j_id5" onclick="qinyiUrlGo1('/index.php/safe/passwd',this)">密码修改</a>
					</div>
	  <div class="ui-line w-90 mt10"></div>
	
<!--</div></div><?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>-->
