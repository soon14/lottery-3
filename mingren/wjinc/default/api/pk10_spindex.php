<?php
//万金娱乐 自主研发PK10flash视频 QQ:421991377
header("Content-Type:text/html;charset=utf-8");
$this->type=20;
$lastNo=$this->getGameLastNo($this->type);
$kjHao=$this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'");
//if($kjHao) $kjHao=explode(',', $kjHao);

$actionNo=$this->getGameNo($this->type);
$types=$this->getTypes();
$kjdTime=$types[$this->type]['data_ftime'];
$diffTime=strtotime($actionNo['actionTime'])-$this->time-$kjdTime;

$arr = array(
			 "time"=>$this->time,
			 "current" => array("awardTime"=>$lastNo['actionTime'],"periodNumber" =>$lastNo['actionNo'],"awardNumbers" =>$kjHao,) ,
			 "next" => array( "delayTimeInterval"=>$kjdTime,"awardTimeInterval" =>$diffTime*1000,"awardTime" =>$actionNo['actionTime'],"periodNumber" =>$actionNo['actionNo']) ,
			); 
$json_string = json_encode($arr); 
echo $json_string; 
?>
