<?php
require_once("shunfoo/class.shunfoo.php");
$order_id = intval($_POST['Billno']);
$order_amount = intval($_POST['Amount']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>在线充值</title>
<link rel="stylesheet" type="text/css" href="style/shunfoo.css">
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="js/pay.js"></script>
</head>
<body>
<center>

<?php
$html	 = '<form method="post" action="pay_go.php"  name="pay" id="pay">';
$html	.= '<div class="pay_base_info">';
$html	.= '<table class="form">';
$html	.= '<tbody>';
$html	.= '<tr class="title">';
$html	.= '	<td colspan="2"><img src="images/jk_logo.gif" /><br/>phpshunfoo demo 2.0 <br/>顺付接口版本:v2.6<br/>网银支付版本:v1.2</td>';
$html	.= '</tr>';
$html	.= '<tr>';
$html	.= '	<td class="content" colspan="2">';
$html	.= '		<input type="hidden" name="account" id="account" value="' . $order_id . '"/>';
$html	.= '		<input type="hidden" name="amount" id="amount"  value="' . $order_amount . '"/>';
$html	.= '	</td>';
$html	.= '</tr>';
$html	.= '<tr>';
$html	.= '	<td class="label" style="font-size:16px;">支付方式:</td>';
$html	.= '	<td class="content">';
$html	.= '		<input type="radio" name="payType" id="payType_bank" class="payType" value="bank" checked="checked"><label for="payType_bank" style="font-size:16px;">网银支付</label>&nbsp;&nbsp;';
$html	.= '		<input type="radio" name="payType" id="payType_card" class="payType" value="bank" ><label for="payType_card" style="font-size:16px;">微信/支付宝</label>';
$html	.= '	</td>';
$html	.= '</tr>';

//卡类型(单卡)
$html	.= '<tr class="payTypeCard">';
$html	.= '	<td colspan="2">';
foreach($shunfoo_cardtype as $card){
	$cardTypeRadioId	= 'cardType_' . $card['code'];
	$html	.= '<span class="cardType">';
	$html	.= '<input type="radio"  class="bankType" name="bankType" id="'.$cardTypeRadioId.'" value="'.$card['code'].'">';
	$html	.= '<label for="'. $cardTypeRadioId .'"><img src="images/bank/'.$card['img_name'].'.png"/></label>';
	$html	.= '</span>';
}
$html	.= '	</td>';
$html	.= '</tr>';

//网银类型
$html	.= '<tr class="payTypeBank">';
$html	.= '	<td colspan="2">';
$html	.= '	<div class="bankTypeDiv">';
foreach($shunfoo_banktype as $bank){
	$bankTypeRadioId	= 'bankType_' . $bank['code'];
	$html	.= '<span class="bankType">';
	$html	.= '<input type="radio"  class="bankType" name="bankType" id="'.$bankTypeRadioId.'" value="'.$bank['code'].'">';
	$html	.= '<label for="'. $bankTypeRadioId .'"><img src="images/bank/'.$bank['img_name'].'.png"/></label>';
	$html	.= '</span>';
}
$html	.= '	<div>';
$html	.= '	</td>';

$html	.= '</tr>';

$html	.= '<tr class="foot">';
$html	.= '	<td colspan="2" style="text-align:center;"><input type="submit" value="确认支付" id="submit" name="submit" /></td>';
$html	.= '</tr>';
$html	.= '</tbody>';
$html	.= '</table>';
$html	.= '</form>';
echo($html);
?>
</center>	
</body>
</html>
