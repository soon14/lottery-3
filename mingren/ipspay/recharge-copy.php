<!--//复制程序 flash+js------end-->

<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */
$mBankId=$args[0]['mBankId'];
$sql="select mb.*, b.name bankName, b.logo bankLogo, b.home bankHome from {$this->prename}sysadmin_bank mb, {$this->prename}bank_list b where mb.id=$mBankId and b.isDelete=0 and mb.bankId=b.id";
$memberBank=$this->getRow($sql);
if($memberBank['bankId']==12){
?>
<!--左边栏body-->
<style type="text/css">
<!--
.banklogo input{
height:15px; width:15px
}
.banklogo{}
-->
</style>

<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>充值信息</td> 
    </tr>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" height="80" class="copyss">充值银行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" /></td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copyss">充值金额：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" />
     </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copyss"> 充值编号 ：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" />
        </td> 
    </tr>
	<tr height=25 class='table_b_tr_h'>
    <td colspan="2" align="center" class="copyss">
	 <SCRIPT language=Javascript type=text/javascript>
	    function SelectBank(n) {
           document.getElementById("bank" + n).checked = true;
	    }
	  </SCRIPT>
	  <style>
	  .banklogo a{
		  background:#ffffff;
	  }
	  </style>
	  <form action="/ipspay/req.php" method="POST" name="a32" target="_blank">
	    <table width="100%" border="0" align="center"  cellpadding="2" cellspacing="0" id="banklist" >
	      <tr>
	        <td width="72" height="40" valign="middle">
	          <div class="banklogo">
	            <input name="rbPayMType" type="radio" id="bank1" value="1100" checked>
            <a href="javascript:SelectBank(1);"><img src="/ipspay/images/gongshang.gif" title="工商银行" alt="工商银行"  border="0"  /></a>
			</div>
			</td>
			  <td width="72" height="40" valign="middle">
			    <div class="banklogo">
			      <input name="rbPayMType" type="radio" id="bank2" value="1101">
		        <a href="javascript:SelectBank(2);"><img src="/ipspay/images/nongye.gif" title="中国农业银行"  alt="中国农业银行"  border="0" style="border:1px solid #CCCCCC;" />
				</a>
				</div>
				</td>
              <td width="72" height="40" valign="middle">
                 <div class="banklogo">
                   <input name="rbPayMType" type="radio" id="bank3" value="1106">
            <a href="javascript:SelectBank(3);"><img src="/ipspay/images/jianshe.gif" title="建设银行" alt="建设银行"  border="0" style="border:1px solid #CCCCCC;" />	</a>									</div>									</td>
                      <td width="191" valign="middle"><div class="banklogo">
                        <input name="rbPayMType" type="radio"  id="bank4" value="1113">
                        <a href="javascript:SelectBank(4);"><img src="/ipspay/images/beijing.gif" title="北京银行" alt="北京银行"  border="0" style="border:1px solid #CCCCCC;" /> </a></div></td>
	      </tr>
	      <tr>								     
	        <td height="40">
	          <div class="banklogo">
	            <input name="rbPayMType" type="radio" id="bank5" value="1107">
	            <a href="javascript:SelectBank(5);"><img src="/ipspay/images/zhongguo.gif" title="中国银行" alt="中国银行"  border="0" style="border:1px solid #CCCCCC;" /></a>										 </div>									</td>
            <td>
                <div class="banklogo">
                  <input name="rbPayMType" type="radio" id="bank6" value="1108">
                <a href="javascript:SelectBank(6);"><img src="/ipspay/images/jiaotong.gif" title="交通银行" alt="交通银行"  border="0" style="border:1px solid #CCCCCC;" />	</a>									 </div>									</td>
            <td>
                <div class="banklogo">
                  <input name="rbPayMType" type="radio" id="bank7" value="1112">
                <a href="javascript:SelectBank(7);"><img src="/ipspay/images/guangda.gif" title="光大银行" alt="光大银行"  border="0" style="border:1px solid #CCCCCC;" />	</a>									 </div>									</td>
                                   <td><div class="banklogo">
                                     <input name="rbPayMType" id="bank8" type="radio" value="1119">
                                     <a href="javascript:SelectBank(8);"><img src="/ipspay/images/youzheng.gif" title="中国邮政" alt="中国邮政"  border="0" style="border:1px solid #CCCCCC;" /> </a></div></td>
	      </tr>
	      <tr>
	        <td height="40">  <div class="banklogo">
	          <input name="rbPayMType" type="radio" id="bank9" value="1102"  />
	          <a href="javascript:SelectBank(9);"><img src="/ipspay/images/zhaohang.gif" title="招商银行" alt="招商银行"  border="0" style="border:1px solid #CCCCCC;" /></a> </div></td>
	        <td><div class="banklogo">
	            <input name="rbPayMType" type="radio" id="bank10" value="1110" />
              <a href="javascript:SelectBank(10);"><img src="/ipspay/images/minsheng.gif" title="中国民生银行" alt="中国民生银行"  border="0" style="border:1px solid #CCCCCC;" /></a></div></td>
	        <td><div class="banklogo">
	            <input name="rbPayMType" type="radio" id="bank11" value="1114" />
              <a href="javascript:SelectBank(11);"><img src="/ipspay/images/guangfa.gif" title="广发银行" alt="广发银行"  border="0" style="border:1px solid #CCCCCC;" /> </a></div></td>
			          <td><div class="banklogo">
                        <input name="rbPayMType" type="radio" id="bank12" value="1124">
                        <a href="javascript:SelectBank(12);"><img src="/ipspay/images/nongcunshangye.gif" title="北京农村商业银行" alt="北京农村商业银行"  border="0" style="border:1px solid #CCCCCC;" /></a> </div></td>
	      </tr>
	      <tr>
	        <td height="40"><div class="banklogo">
	          <input name="rbPayMType" type="radio" id="bank13" value="1115" />
	          <a href="javascript:SelectBank(13);"><img src="/ipspay/images/nanjing.gif" title="南京银行" alt="南京银行"  border="0" style="border:1px solid #CCCCCC;" /></a></div></td>
	        <td><div class="banklogo">
	            <input name="rbPayMType" type="radio" id="bank14" value="1118" />
              <a href="javascript:SelectBank(14);"><img src="/ipspay/images/ningbo.gif" title="宁波银行" alt="宁波银行"  border="0" style="border:1px solid #CCCCCC;" /></a></div></td>
	        <td><div class="banklogo">
	            <input name="rbPayMType" type="radio" id="bank15" value="1121" />
              <a href="javascript:SelectBank(15);"><img src="/ipspay/images/pingan.gif" title="平安银行" alt="平安银行"  border="0" style="border:1px solid #CCCCCC;" /></a></div></td>
			          <td><div class="banklogo">
                        <input name="rbPayMType" type="radio" id="bank16" value="1122">
                        <a href="javascript:SelectBank(16);"><img src="/ipspay/images/dongya.gif" title="东亚银行" alt="东亚银行"  border="0" style="border:1px solid #CCCCCC;" /> </a></div></td>
	      </tr>
	      <tr>
	        <td height="40">
	          <div class="banklogo">
	            <input name="rbPayMType" type="radio" id="bank17" value="1109">
               <a href="javascript:SelectBank(17);"><img src="/ipspay/images/shangpufa.gif"  title="上海浦东发展银行" alt="上海浦东发展银行"  border="0" style="border:1px solid #CCCCCC;" />	</a>									</div>									 </td>
            <td>
                <div class="banklogo">
                  <input name="rbPayMType" type="radio" id="bank18" value="1103">
                <a href="javascript:SelectBank(18);"><img src="/ipspay/images/xingye.gif" title="兴业银行" alt="兴业银行"  border="0" style="border:1px solid #CCCCCC;" /></a>									     </div>									 </td>
		    <td><div class="banklogo">
                                     <input name="rbPayMType" type="radio" id="bank19" value="1120" />
                                     <a href="javascript:SelectBank(19);"><img src="/ipspay/images/zheshang.gif" alt="浙商银行" width="154" height="33"  border="0" style="border:1px solid #CCCCCC;" title="浙商银行" /> </a></div></td>
							       <td><div class="banklogo">
                                     <input name="rbPayMType" type="radio" id="bank20" value="1116">
                                     <a href="javascript:SelectBank(20);"><img src="/ipspay/images/shanghaibank.gif"  title="上海银行" alt="上海银行"  border="0" style="border:1px solid #CCCCCC;" /> </a></div></td>
	      </tr>
	      <tr>
	        <td height="40">
	          <div class="banklogo">
	            <input name="rbPayMType" type="radio" id="bank21" value="1104">
               <a href="javascript:SelectBank(21);"><img src="/ipspay/images/zhongxin.gif" title="中信银行" alt="中信银行"  border="0" style="border:1px solid #CCCCCC;" />	</a>									</div>									 </td>
            <td>
                <div class="banklogo">
                  <input name="rbPayMType" type="radio" id="bank22" value="1111">
                <a href="javascript:SelectBank(22);"><img src="/ipspay/images/huaxia.gif" title="华夏银行" alt="华夏银行"  border="0" style="border:1px solid #CCCCCC;" /></a>									     </div>									 </td>
		    <td>
		        <div class="banklogo">
		          <input name="rbPayMType" type="radio" id="bank23" value="1123">
	            <a href="javascript:SelectBank(23);"><img src="/ipspay/images/buohai.gif" title="渤海银行" alt="渤海银行"  border="0" style="border:1px solid #CCCCCC;" />	</a>								     </div>									 </td>
							     
	      </tr>
	      <tr>
	        <td height="40">&nbsp;</td>
            <td>&nbsp;</td>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
	      <tr>
	          <td height="40" colspan="4" align="center"><input name="submit" type="submit"   style="height:40px; line-height:20px; font-weight:bold" value="确认充值" /></td>
          </tr>
        </table>
	    <input name="Billno" type="hidden" value="<?=$args[0]['rechargeId']?>" />
	    <input name="Amount" type="hidden" value="<?=$args[0]['amount']?>" />
	    <input name="Attach" type="hidden" value="<?=$this->user['username']?>" />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<div style="display:inline">*注意：在线充值付款成功后，请等待30s后再关闭充值的窗口，以防资金不到账。若付款后未到账，请联系客服。
      </form>
</td>
</tr>
</table>

    <!--左边栏body结束-->
<? }else if($memberBank['bankId']==2){  //支付宝 ?>

<table width="100%" border="0" cellspacing="1" cellpadding="3" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>充值信息</td> 
    </tr>
    
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys">充值银行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" />
      </td> 
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">收款户名：</td>
      <td align="left" ><input id="bank-username" readonly value="<?=$memberBank["username"]?>" style="width:200px"/>
	  <div class="btn-a copy" for="bank-username">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-bankuser" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" width="62" height="23" name="copy-bankuser" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object> 
	  </div></td> 
    </tr>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys" >收款账号：</td>
      <td align="left" ><input id="bank-account" readonly value="<?=$memberBank["account"]?>"  style="width:200px"/>
	  <div class="btn-a copy" for="bank-account">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-account" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" width="62" height="23" name="copy-account" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object>
		</div>
	  </td> 
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值金额：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" />
      <div class="btn-a copy" for="recharg-amount"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-recharg" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" width="62" height="23" name="copy-recharg" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	 </div>&nbsp;&nbsp;&nbsp;<div class="spn12" style="display:inline;">*网银充值金额必须与网站填写金额一致方能到账！</div>
      </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值编号：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" />
         <div class="btn-a copy" for="username">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-username" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-username&inputID=username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-username&inputID=username" width="62" height="23" name="copy-username" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
        </div>&nbsp;&nbsp;&nbsp;<div class="spn12"  style="display:inline;">*网银充值请务必将此编号填写到汇款“附言”里，每个充值编号仅用于一笔充值！</div>
	   </td> 
    </tr>
	<tr>
	<td height="40" colspan="4" align="center">
	<form name="alipaypay" method="post" accept-charset="gbk" target="_blank" onsubmit="document.charset='gbk'" action="https://shenghuo.alipay.com/send/payment/fill.htm">
	<input type="hidden" name="optEmail" value="<?=$memberBank['account']?>">
    <input type="hidden" name="payAmount" value="<?=$args[0]['amount']?>">
    <input type="hidden" name="title" value="<?=$this->user['username']?>">
    <input type="hidden" name="memo" value="<?=$args[0]['rechargeId']?>">
    <input type="hidden" name="isSend" value="">
    <input type="hidden" name="smsNo" value=""> 
	<input name="submit" type="submit" style="width:250px;" value="前往支付宝充值(免填信息直充)" class="btn chazhao"/>
	 </form></td>
	 </tr>
   <div class="tips">
	<dl>
        <dt>充值说明：</dt>
        <dd>1.本平台已与支付宝合作，开通直接转账功能，会员将无需再次输入帐号、备注信息;</dd>
        <dd>2.跳往支付宝充值页面时，请会员再次核实金额、账户名是否符合;</dd>
        <dd>3.转账后如5分钟未到账，请联系客服，告知您的充值编号和您的充值金额及你的支付宝姓名。</dd>
    </dl>
</div>
</table>
<? }else{  //其它收款方式 ?>
<!--左边栏body-->
<table width="100%" border="0" cellspacing="1" cellpadding="4" class='table_b'>
    <tr class='table_b_th'>
      <td align="left" style="font-weight:bold;padding-left:10px;" colspan=2>充值信息</td> 
    </tr>
    
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys">充值银行：</td>
      <td align="left" ><img id="bank-type-icon" class="bankimg" src="/<?=$memberBank['bankLogo']?>" title="<?=$memberBank['bankName']?>" />
            <a id="bank-link" target="_blank" href="<?=$memberBank['bankHome']?>" class="spn11" style="margin-left:50px;">进入银行网站>></a>
      </td> 
    </tr>
	<tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">收款户名：</td>
      <td align="left" ><input id="bank-username" readonly value="<?=$memberBank["username"]?>" style="width:200px"/>
	  <div class="btn-a copy" for="bank-username">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-bankuser" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-bankuser&inputID=bank-username" width="62" height="23" name="copy-bankuser" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object> 
	  </div></td> 
    </tr>
    <tr height=25 class='table_b_tr_b' >
      <td align="right" class="copys" >收款账号：</td>
      <td align="left" ><input id="bank-account" readonly value="<?=$memberBank["account"]?>"  style="width:200px"/>
	  <div class="btn-a copy" for="bank-account">
	  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-account" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-account&inputID=bank-account" width="62" height="23" name="copy-account" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
        </object>
		</div>
	  </td> 
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值金额：</td>
      <td align="left" ><input id="recharg-amount" readonly value="<?=$args[0]['amount']?>" />
      <div class="btn-a copy" for="recharg-amount"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-recharg" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-recharg&inputID=recharg-amount" width="62" height="23" name="copy-recharg" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object>
	 </div>&nbsp;&nbsp;&nbsp;<div class="spn12" style="display:inline;">*网银充值金额必须与网站填写金额一致方能到账！</div>
      </td>
    </tr>
     <tr height=25 class='table_b_tr_b'>
      <td align="right" class="copys">充值编号：</td>
      <td align="left"><input id="username" readonly value="<?=$args[0]['rechargeId']?>" />
         <div class="btn-a copy" for="username">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="23" id="copy-username" align="top">
                <param name="allowScriptAccess" value="always" />
                <param name="movie" value="/skin/js/copy.swf?movieID=copy-username&inputID=username" />
                <param name="quality" value="high" />
				<param name="wmode" value="transparent">
                <param name="bgcolor" value="#ffffff" />
                <param name="scale" value="noscale" /><!-- FLASH原始像素显示-->
                <embed src="/skin/js/copy.swf?movieID=copy-username&inputID=username" width="62" height="23" name="copy-username" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" />
            </object> 
        </div>&nbsp;&nbsp;&nbsp;<div class="spn12"  style="display:inline;">*网银充值请务必将此编号填写到汇款“附言”里，每个充值编号仅用于一笔充值！</div>
	   </td> 
    </tr>
<!--左边栏body结束-->
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ if($memberBank["rechargeDemo"]){?>
   <tr height=25 class='table_b_tr_b'>
      <td align="right" style="font-weight:bold;"></td>
      <td align="left" > <div class="example">充值图示：<div class="example2" rel="<?=$memberBank["rechargeDemo"]?>">查看</div></div></td> 
  </tr>
<? }?>
<tr>
<div class="tips">
	<dl>
        <dt>充值说明：</dt>
        <dd>1.每次"充值编号"均不相同,务必将"充值编号"正确复制填写到引号汇款页面的"附言"栏目中;</dd>
        <dd>2.帐号不固定，转帐前请仔细核对该帐号;</dd>
        <dd>3.充值金额与网友转账金额不符，充值将无法到账;</dd>
        <dd>4.转账后如10分钟未到账，请联系客服，告知您的充值编号和您的充值金额及你的银行用户姓名。</dd>
    </dl>
</div>
</tr>
</table> 
<?php
/* 此程序来自家园网络QQ836651666 采集修复 程序修改 仅供研究学习之用 禁止用于商业非法用途 */ }?>