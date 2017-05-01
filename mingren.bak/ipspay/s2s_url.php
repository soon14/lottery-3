     <?php
 //公司名称：迅付信息科技有限公司
 //系统:新系统接口S2S返回
 //功能:新系统返回报文处理
 //创建者:IPS
 //日期：2015-01-29

include 'Config.php';
include '../config.php';

$paymentResult = $_POST["paymentResult"];//获取信息
file_put_contents(PATH_LOG_FILE,date('y-m-d h:i:s')."S2S接收到的报文信息:".$paymentResult."\r\n",FILE_APPEND);
$xml=simplexml_load_string($paymentResult,'SimpleXMLElement', LIBXML_NOCDATA); 

  //读取相关xml中信息
   $ReferenceIDs = $xml->xpath("GateWayRsp/head/ReferenceID");//关联号
   //var_dump($ReferenceIDs); 
   $ReferenceID = $ReferenceIDs[0];//关联号
   $RspCodes = $xml->xpath("GateWayRsp/head/RspCode");//响应编码
   $RspCode=$RspCodes[0];
   $RspMsgs = $xml->xpath("GateWayRsp/head/RspMsg"); //响应说明
   $RspMsg=$RspMsgs[0];
   $ReqDates = $xml->xpath("GateWayRsp/head/ReqDate"); // 接受时间
    $ReqDate=$ReqDates[0];
   $RspDates = $xml->xpath("GateWayRsp/head/RspDate");// 响应时间
    $RspDate=$RspDates[0];
   $Signatures = $xml->xpath("GateWayRsp/head/Signature"); //数字签名
    $Signature=$Signatures[0];
   $MerBillNos = $xml->xpath("GateWayRsp/body/MerBillNo"); // 商户订单号
    $MerBillNo=$MerBillNos[0];
   $CurrencyTypes = $xml->xpath("GateWayRsp/body/CurrencyType");//币种
    $CurrencyType=$CurrencyTypes[0];
   $Amounts = $xml->xpath("GateWayRsp/body/Amount"); //订单金额
    $Amount=$Amounts[0];
   $Dates = $xml->xpath("GateWayRsp/body/Date");    //订单日期
    $Date=$Dates[0];
   $Statuss = $xml->xpath("GateWayRsp/body/Status");  //交易状态
    $Status=$Statuss[0];
   $Msgs = $xml->xpath("GateWayRsp/body/Msg");    //发卡行返回信息
    $Msg=$Msgs[0];
   $Attachs = $xml->xpath("GateWayRsp/body/Attach");    //数据包
    $Attach=$Attachs[0];
   $IpsBillNos = $xml->xpath("GateWayRsp/body/IpsBillNo"); //IPS订单号
    $IpsBillNo=$IpsBillNos[0];
   $IpsTradeNos = $xml->xpath("GateWayRsp/body/IpsTradeNo"); //IPS交易流水号
    $IpsTradeNo=$IpsTradeNos[0];
   $RetEncodeTypes = $xml->xpath("GateWayRsp/body/RetEncodeType");    //交易返回方式
    $RetEncodeType=$RetEncodeTypes[0];
   $BankBillNos = $xml->xpath("GateWayRsp/body/BankBillNo"); //银行订单号
    $BankBillNo=$BankBillNos[0];
   $ResultTypes = $xml->xpath("GateWayRsp/body/ResultType"); //支付返回方式
    $ResultType=$ResultTypes[0];
   $IpsBillTimes = $xml->xpath("GateWayRsp/body/IpsBillTime"); //IPS处理时间
    $IpsBillTime=$IpsBillTimes[0];
	
$resParam="关联号:"
          .$ReferenceID
          ."响应编码:"
          .$RspCode
          ."响应说明:"
          .$RspMsg
          ."接受时间:"
          .$ReqDate
          ."响应时间:"
          .$RspDate
          ."数字签名:"
          .$Signature
          ."商户订单号:"
          .$MerBillNo
          ."币种:"
          .$CurrencyType
          ."订单金额:"
          .$Amount
          ."订单日期:"
          .$Date
          ."交易状态:"
          .$Status
          ."发卡行返回信息:"
          .$Msg
          ."数据包:"
          .$Attach
		   ."IPS订单号:"
		     .$IpsBillNo
		   ."交易返回方式:"
          .$RetEncodeType
		   ."银行订单号:"
		     .$BankBillNo
			  ."支付返回方式:"
		     .$ResultType
			   ."IPS处理时间:"
		     .$IpsBillTime;
file_put_contents(PATH_LOG_FILE,date('y-m-d h:i:s').'S2S新系统获取参数信息:'.$resParam."\r\n",FILE_APPEND);

//验签明文
//billno+【订单编号】+currencytype+【币种】+amount+【订单金额】+date+【订单日期】+succ+【成功标志】+ipsbillno+【IPS订单编号】+retencodetype +【交易返回签名方式】+【商户内部证书】

 $sbReq = "<body>"
                          . "<MerBillNo>" . $MerBillNo . "</MerBillNo>"
                          . "<CurrencyType>" . $CurrencyType . "</CurrencyType>"
                          . "<Amount>" . $Amount . "</Amount>"
                          . "<Date>" . $Date . "</Date>"
                          . "<Status>" . $Status . "</Status>"
                          . "<Msg><![CDATA[" . $Msg . "]]></Msg>"
                          . "<Attach><![CDATA[" . $Attach . "]]></Attach>"
                          . "<IpsBillNo>" . $IpsBillNo . "</IpsBillNo>"
                          . "<IpsTradeNo>" . $IpsTradeNo . "</IpsTradeNo>"
                          . "<RetEncodeType>" . $RetEncodeType . "</RetEncodeType>"
                          . "<BankBillNo>" . $BankBillNo . "</BankBillNo>"
                          . "<ResultType>" . $ResultType . "</ResultType>"
                          . "<IpsBillTime>" . $IpsBillTime . "</IpsBillTime>"
                       . "</body>";
$sign=$sbReq.$pMerCode.$pMerCert;
file_put_contents(PATH_LOG_FILE,date('y-m-d h:i:s').'S2S验签明文:'.$sign."\r\n",FILE_APPEND);
$md5sign=  md5($sign);
file_put_contents(PATH_LOG_FILE,date('y-m-d h:i:s').'S2S验签密文:'.$md5sign."\r\n",FILE_APPEND);

//判断签名
if($Signature==$md5sign)
{
    file_put_contents(PATH_LOG_FILE,date('y-m-d h:i:s')."S2S验签成功.\r\n",FILE_APPEND);
      if($RspCode=='000000')
    {
	$db_user=$conf['db']['user'];
$db_pwd=$conf['db']['password'];

$db_name=$dbname;
$db_host=$dbhost;
$orderid = $MerBillNo;
$ovalue = $Amount;

$conn=mysql_connect($db_host,$db_user,$db_pwd);
if(!$conn){
	die("Can not connect:".mysql_error());
}
$dbconn=mysql_select_db($db_name);
if(!$dbconn){
	die("Can not select this database:".mysql_error($conn));
}
@session_start();
mysql_query("SET NAMES 'utf8'");
$ssql="select * from ssc_member_recharge where state=0 and rechargeId=".$orderid;
$sresult=mysql_query($ssql);
if($num=mysql_num_rows($sresult)){
	$rss=mysql_fetch_array($sresult);
	$uid=$rss['uid'];
	$sql_u="select * from ssc_members where uid=".$uid;
	$uresult=mysql_query($sql_u);
	
	$chaxun6 = mysql_query("select value from ssc_params where name='czzs'");
	$czzs = mysql_result($chaxun6,0);
	$ovalue = $ovalue+$ovalue*$zzs/100;
	 if($unum=mysql_num_rows($uresult)){
		$rsu=mysql_fetch_array($uresult);
		$rechargeTime=time();
		$afmoney=$rsu["coin"]+$ovalue;
		$rsc=$rsu["coin"];
		$sql_o="update ssc_member_recharge set state=1,rechargeAmount=".$ovalue.",coin=".$rsc.",rechargeTime=".$rechargeTime." where rechargeId=".$orderid;
		mysql_query($sql_o);
		$sql_2="insert into ssc_coin_log (uid,type,playedID,coin,userCoin,fcoin,liqType,actionUID,actionTime,ActionIP,info,extfield0,extfield1,extfield2)values('".$uid."','0','0','".$ovalue."','".$afmoney."','0','1','0','".$rechargeTime."','0','充值','".$orderid."','".$orderid."','')";

		mysql_query($sql_2);

		$sql_u="update ssc_members set coin=".$afmoney." where uid=".$rss['uid'];
		mysql_query($sql_u);
	 }
}

	file_put_contents(PATH_LOG_FILE,date('y-m-d h:i:s')."S2S订单支付成功.\r\n",FILE_APPEND);	
    }
    
 }
else
{
 file_put_contents(PATH_LOG_FILE,date('y-m-d h:i:s')."S2S验签失败.\r\n",FILE_APPEND);
    echo "订单签名错误";
}
?>