<?php
class Pay extends WebBase{
	//商户ID
	private $shunfoo_merchant_id = '1658';
	//商户秘钥
	private $shunfoo_merchant_key  = '2295371b45e14cad9f98533e3b613012';
	//顺付支付回调
	public final function hrefback(){
		$datas = $_REQUEST;
		$opstate = $datas['opstate'];
		$orderid = $datas['orderid'];
		$ovalue = $datas['ovalue'];
		$return_sign = $datas['sign'];
		
		if($opstate == 0)
		{
			//签名
			$sign1 = md5('orderid=' . $orderid . '&opstate=' . $opstate . '&ovalue=' . $ovalue . $this->shunfoo_merchant_key);

			//如果跳转回来的签名相同，则去下一步请求验证
			if($return_sign == $sign1)
			{
				$sign2 = md5('orderid=' . $orderid . '&parter=' . $this->shunfoo_merchant_id . $this->shunfoo_merchant_key);
			}
			else
			{
				exit('<h1 style="margin:0 auto;width:500px;">数据出错</h1>');
			}
			$get_data = '?orderid=' . $orderid . '&parter=' . $this->shunfoo_merchant_id . '&sign=' . $sign2;

			//验证结果
			$result = $this->curl_get('http://interface.shunfoo.com/Search.aspx' . $get_data);
			$res1 = explode("&", $result);
			$res_arr = array();
			foreach($res1 as $k => $v)
			{
				$tmp_arr = explode("=", $v);
				$res_arr[$tmp_arr[0]] = $tmp_arr[1];
			}

			if($res_arr['opstate'] == 0)
			{
				//支付成功，自己网站用户充值处理
				
				//查询是否已经充值过
				$sel_sql1 = "SELECT * FROM {$this->prename}member_recharge WHERE rechargeId=?";
				$sel_res1 = $this->getRow($sel_sql1, $orderid);
				$sel_sql2 = "SELECT * FROM {$this->prename}members WHERE uid=?";
				$sel_res2 = $this->getRow($sel_sql2, $sel_res1['uid']);
				//var_dump($sel_res2);
				if(!$sel_res1['state'])
				{
					//更新账单表

					//返点计算
					$chaxun6 = "select value from {$this->prename}params where name='czzs'";
					$czzs = $this->getValue($chaxun6,0);
					$money = $res_arr['ovalue'] + $res_arr['ovalue'] * $czzs / 100;

					$rechargeTime = strtotime($datas['completiontime']);

					$sql = "UPDATE {$this->prename}member_recharge SET rechargeAmount=$money, rechargeTime=$rechargeTime, state=1 WHERE rechargeId=?";
					$update_res1 = $this->update($sql, $orderid);

					//最新余额
					$afmoney = $sel_res2["coin"] + $money;

					//写入充值日志
					$sql_2="insert into {$this->prename}coin_log (uid,type,playedID,coin,userCoin,fcoin,liqType,actionUID,actionTime,ActionIP,info,extfield0,extfield1,extfield2)values('".$sel_res1['uid']."','0','0','".$money."','".$afmoney."','0','1','0','".$rechargeTime."','0','充值','".$orderid."','".$orderid."','')";
					
					$insert_res1 = $this->insert($sql_2);
					
					$sql_u="update {$this->prename}members set coin=".$afmoney." where uid=?";
					$update_res2 = $this->update($sql_u, $sel_res1['uid']);
					//更新用户资金

					if($update_res2)
					{
						exit('<h1 style="margin:0 auto;width:500px;">充值成功</h1>');
					}
					else
					{
						exit('<h1 style="margin:0 auto;width:500px;">充值错误，请联系网站管理员处理</h1>');
					}
					//
				}
				else
				{
					exit('<h1 style="margin:0 auto;width:500px;">已充值过了！</h1>');
				}
	
			}
			else
			{
				exit('<h1 style="margin:0 auto;width:500px;">充值错误，请联系网站管理员处理</h1>');
			}
		}
		else
		{
			exit('<h1 style="margin:0 auto;width:500px;">充值错误，请联系网站管理员处理</h1>');
		}
	}


	public final function callback(){
		$datas = $_REQUEST;
		$opstate = $datas['opstate'];
		$orderid = $datas['orderid'];
		$ovalue = $datas['ovalue'];
		$return_sign = $datas['sign'];
		
		if($opstate == 0)
		{
			//签名
			$sign1 = md5('orderid=' . $orderid . '&opstate=' . $opstate . '&ovalue=' . $ovalue . $this->shunfoo_merchant_key);

			//如果跳转回来的签名相同，则去下一步请求验证
			if($return_sign == $sign1)
			{
				$sign2 = md5('orderid=' . $orderid . '&parter=' . $this->shunfoo_merchant_id . $this->shunfoo_merchant_key);
			}
			else
			{
				exit('<h1 style="margin:0 auto;width:500px;">数据出错</h1>');
			}
			$get_data = '?orderid=' . $orderid . '&parter=' . $this->shunfoo_merchant_id . '&sign=' . $sign2;

			//验证结果
			$result = $this->curl_get('http://interface.shunfoo.com/Search.aspx' . $get_data);
			$res1 = explode("&", $result);
			$res_arr = array();
			foreach($res1 as $k => $v)
			{
				$tmp_arr = explode("=", $v);
				$res_arr[$tmp_arr[0]] = $tmp_arr[1];
			}

			if($res_arr['opstate'] == 0)
			{
				//支付成功，自己网站用户充值处理
				
				//查询是否已经充值过
				$sel_sql1 = "SELECT * FROM {$this->prename}member_recharge WHERE rechargeId=?";
				$sel_res1 = $this->getRow($sel_sql1, $orderid);
				$sel_sql2 = "SELECT * FROM {$this->prename}members WHERE uid=?";
				$sel_res2 = $this->getRow($sel_sql2, $sel_res1['uid']);
				//var_dump($sel_res2);
				if(!$sel_res1['state'])
				{
					//更新账单表

					//返点计算
					$chaxun6 = "select value from {$this->prename}params where name='czzs'";
					$czzs = $this->getValue($chaxun6,0);
					$money = $res_arr['ovalue'] + $res_arr['ovalue'] * $czzs / 100;

					$rechargeTime = strtotime($datas['completiontime']);

					$sql = "UPDATE {$this->prename}member_recharge SET rechargeAmount=$money, rechargeTime=$rechargeTime, state=1 WHERE rechargeId=?";
					$update_res1 = $this->update($sql, $orderid);

					//最新余额
					$afmoney = $sel_res2["coin"] + $money;

					//写入充值日志
					$sql_2="insert into {$this->prename}coin_log (uid,type,playedID,coin,userCoin,fcoin,liqType,actionUID,actionTime,ActionIP,info,extfield0,extfield1,extfield2)values('".$sel_res1['uid']."','0','0','".$money."','".$afmoney."','0','1','0','".$rechargeTime."','0','充值','".$orderid."','".$orderid."','')";
					
					$insert_res1 = $this->insert($sql_2);
					
					$sql_u="update {$this->prename}members set coin=".$afmoney." where uid=?";
					$update_res2 = $this->update($sql_u, $sel_res1['uid']);
					//更新用户资金

					if($update_res2)
					{
						echo 'opstate=0';
					}
					else
					{
						echo 'opstate=-1';
					}
					//
				}
				else
				{
					echo 'opstate=0';
				}
	
			}
			else
			{
				echo 'opstate=-1';
			}
		}
		else
		{
			echo 'opstate=-1';
		}
	}


	public function curl_get($url,$post='',$cookie='', $returnCookie=0)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0;Windows NT 6.1; Trident/6.0)');
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
		curl_setopt($curl, CURLOPT_REFERER, "http://XXX");
		if($post) {
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
		}
		if($cookie) {
		curl_setopt($curl, CURLOPT_COOKIE, $cookie);
		}
		curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($curl);
		if (curl_errno($curl)) {
		return curl_error($curl);
		}
		curl_close($curl);
		if($returnCookie){
		list($header, $body) = explode("\r\n\r\n", $data, 2);
		preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
		$info['cookie']  = substr($matches[1][0], 1);
		$info['content'] = $body;
		return $info;
		}else{
		return $data;
		} 
	}

}
