<!DOCTYPE html>
<html>
<head lang="en">
<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_base.php',0,'个人首页') ?>
	<link href="/skin/new/css/mem.css" type="text/css" rel="stylesheet" />
	<script>
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
});
</script>
</head>
<body>
<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_header.php') ?>
  <div class="pageBady custom clearfix">
    <div class="w1200 memberMod clearfix">
        <div class="aside" style="height:900px;">
          <ul class="menu-record">
             <li><a href="/safe/info"><i class="ico ico-acc"></i>账户首页<i class="arrow-r"></i></a></li>
             <li><a href="/record/search"><i class="ico ico-buy"></i>购彩记录<i class="arrow-r"></i></a></li>
             <li id="member"><a href="javascript:;"onclick="return false;"><i class="ico ico-chase"></i>会员中心<i class="arrow-gray"></i></a></li>
			  <div id="membernav" style="display:none">
			       <li><a href="/report/count">盈亏报表</a></li>
			       <li><a href="/report/coin">帐变记录</a></li>
			       <li><a href="/cash/rechargeLog">充值记录</a></li>
			       <li><a href="/cash/toCashLog">提现记录</a></li>
			  </div>
			  <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($this->user['type']){ ?>
             <li id="daili"><a href="javascript:;"onclick="return false;"><i class="ico ico-mx"></i>代理中心<i class="arrow-gray"></i></a></li>
			  <div id="dailinav" style="display:none">
			    <li><a href="/team/memberList" >会员管理</a></li>
				<li><a href="/team/onlineMember">在线会员</a></li>
				<li><a href="/team/gameRecord" >团队记录</a></li>
				<li><a href="/team/report" >团队盈亏</a></li>
				<li><a href="/team/coinall" >团队统计</a></li>
				<li><a href="/team/coin" >团队帐变</a></li>
				<li><a href="/team/cashRecord" >团队提现</a></li>
				<li><a href="/team/linkList" >推广链接</a></li>
				<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($this->user['fanDian'] == '13.0' || $this->user['fanDian'] == '12.9'){?>
				<li><a href="/team/shareBonus" >代理分红</a></li>
				<?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
			  </div>
			  <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ } ?>
             <li><a href="/safe/passwd"><i class="ico ico-safe"></i>安全中心<i class="arrow-r"></i></a></li>
             <li><a href="#"><i class="ico ico-info"></i>我的消息<i class="arrow-r"></i></a></li>
             <li><a href="/score/goods/current"><i class="ico ico-mes"></i>活动中心<i class="arrow-r"></i></a></li>
          </ul>
           <div class="link">
            <a href="/cash/toCash">提现</a>&nbsp;<a href="/cash/recharge" class="pay">充值</a>
           </div>
        </div>      
		 <!--.aside end  -->
    <div class="article" >
            <div class="user-hd clearfix">
                <div class="acc-info fl"  style="font-family: '微软雅黑';">
                    <div class="acc-l fl" style="margin-top:20px;">
                        <i class="acc-ico"></i>
                    </div>
                    <div class="acc-b fl" >
                        <p style="margin-left:55px;">ID：<strong class="fs16"><?=$this->user['username']?></strong></p> 
						<p style="margin-left:43px; margin-top:3px;">昵称：<strong class="fee fs16"><?=$this->user['nickname']?></strong></p>
                        <p style="margin-left:15px; margin-top:3px;">账户余额：<strong class="fee fs18"><?=$this->user['coin']?></strong></p>
                        <p style="margin-top:3px;">可兑换积分：<strong class="green fs18"><?=$this->user['score']?></strong></p>
                        <p style="margin-left:43px; margin-top:3px;">返点：<strong class="green fs16"><?=$this->user['fanDian']?>%</strong></p>
                    </div>
                    <div class="clear"></div>
                    <div class="safe clearfix">
                        <p class="pl"></p>
                    </div>
                </div>
                <div class="grow-info fl">
                    <img src="/images/new/VIP.jpg">
                </div>
            </div><!--.user-hd end  -->
            <div class="member-content-box clearfix" style="height:370px;font-family: '微软雅黑';">
                <h2 class="content-tit">近期购彩<a href="/member/betorders/" class="blue">更多记录>></a></h2>
                <table width="100%" cellpadding="0" cellspacing="0" border="0" class="content-table">
                    <thead>
                        <tr>
                            <th width="120">投注时间</th>
                            <th width="100">彩种</th>
                            <th width="160">投注信息</th>
                            <th width="110">付款金额</th>
                            <th width="110">出票状态</th>
                            <th width="145">中奖状况</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody id="betOrders">
                    <td colspan="7">数据加载中...</td>
                    </tbody>
                </table>
            </div>
    </div><!--.article end  -->
 </div></div>
    
  <?php
/* 此程序来自家园网络QQ1655707002 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?> 
</body>
</html>
