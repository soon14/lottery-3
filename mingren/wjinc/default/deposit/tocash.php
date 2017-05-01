<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_top_yj.php') ?>

<script type="text/javascript">
function checkDeposit(){
	if(!this.amount.value) throw('请填写转出金额');
	if(!this.amount.value.match(/^[0-9]*[1-9][0-9]*$/)) throw('转出金额错误');
	if(!this.vcode.value) throw('请输入验证码');
	if(this.vcode.value<4) throw('验证码至少4位');
	showPaymentFee();
}
function toDeposit(err, data){
 if(err){
		alert(err);
	}else{
		alert(data);
		//reloadMemberInfo();
		window.location='/report/coin';
	}
}
function showPaymentFee() {
   $("#ContentPlaceHolder1_txtMoney").val($("#ContentPlaceHolder1_txtMoney").val().replace(/\D+/g, ''));
   jQuery("#chineseMoney").html(changeMoneyToChinese($("#ContentPlaceHolder1_txtMoney").val()));
        }
</script>
<link type="text/css" href="/skin/new/css/score.css" rel="stylesheet" />
<div class="pagemain">
   <div class="display biao-cont">     
	 <form action="/index.php/deposit/outdeposit" method="post" target="ajax" onajax="checkDeposit" call="toDeposit">
      <input name="uid" type="hidden" id="uid" value="<?=$this->user['uid']?>" />
	<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>余额宝（取款）</td> 
    </tr>

	<tr height=25 class='table_b_tr_b' >
      <td align="center" class="copys" height="80"><b style="display:inline; color:#FF0000">余额宝说明：<b></td>
      <td align="left" >
	  <P>余额宝是平台打造的余额增值服务。把钱转入余额宝，每天有获收益。</P>
	  <p>结合最新互联网理财产品收益，奖励广大会员，2015年起，奖励按实时余额宝余额：<b style="display:inline;color:#FF0000;"><?= $this->settings['depositll'] ?>%</b>，</p>
	  <p>收益效果为支付宝26倍，活期存款200倍以上，以存入余额宝余额为主</p>
	  <P>可随时将转存余额账户里的资金转出，转出前请先自助领取收益。</P>
	  <p></p>
	  <p>填写转出的金额，点击[确认转出]后，转入购彩账户</p>
      </td> 
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="center" class="copys">当前余额宝资金：</td>
      <td align="left" ><b style="margin-left:12px;color:#FF0000;"><?= $this->user['deposit'] ?></b></td>
    </tr>
    <tr height=25 class='table_b_tr_b'>
      <td align="center" class="copys">转出金额：</td>
      <td align="left" ><input name="amount" id="ContentPlaceHolder1_txtMoney" value="" onkeyup="showPaymentFee();"/></td>
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="center" class="copys">转出金额（大写）：</td>
      <td align="left" ><strong style="color:#FF0000;margin-left:10px" id="chineseMoney"></strong></td>
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="center" class="copys">验证码：</td>
      <td align="left" ><input name="vcode" type="text" style="ime-mode: disabled; width: 90px;" /><b class="yzmNum"><img width="80" height="30" border="0" style="cursor:pointer;margin-bottom:0px;" id="vcode" alt="看不清？点击更换" align="absmiddle" src="/index.php/user/vcode/<?=$this->time?>" title="看不清楚，换一张图片" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()"/></b></td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="center" style="font-weight:bold;"></td>
      <td align="left"><input type="button" id='put_button_pass' class="btn darwingbtn" value="确认转出" style="width:100px;"  onclick="$(this).closest('form').submit()"> </td> 
    </tr> 
</table> 
</form>
</div>
<!--以下为模板代码-->
</div></div></div><?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ $this->display('inc_footer.php') ?></body></html>
  
  
   
 