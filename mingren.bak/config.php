<?php
/* ´Ë³ÌÐòÀ´×Ô¼ÒÔ°ÍøÂçQQ1655707002 ²É¼¯ÐÞ¸´ ³ÌÐòÐÞ¸Ä ½ö¹©ÑÐ¾¿Ñ§Ï°Ö®ÓÃ ½ûÖ¹ÓÃÓÚÉÌÒµ·Ç·¨ÓÃÍ¾ */
require_once('sqlin.php');
$conf['debug']['level']=5;

/*		Êý¾Ý¿âÅäÖÃ		*/
$conf['db']['dsn']='mysql:host=localhost;dbname=mingren;charset=utf8';
$dbname='mingren';
$dbhost='localhost';
$conf['db']['user']='root';
$conf['db']['password']='';
$conf['db']['charset']='utf8';
$conf['db']['prename']='ssc_';

$conf['cache']['expire']=0;
$conf['cache']['dir']='_qq1655707002/';

$conf['url_modal']=2;

$conf['action']['template']='wjinc/default/';
$conf['action']['modals']='wjaction/default/';

$conf['member']['sessionTime']=15*60;	// ÓÃ»§ÓÐÐ§Ê±³¤

error_reporting(E_ERROR & ~E_NOTICE);

ini_set('date.timezone', 'asia/shanghai');

ini_set('display_errors', 'Off');

if(strtotime(date('Y-m-d',time()))>strtotime(date('Y-m-d',time()))){
	$GLOBALS['fromTime']=strtotime(date('Y-m-d',strtotime("-1 day")));
	$GLOBALS['toTime']=strtotime(date('Y-m-d',time()));
}else{
	
	$GLOBALS['fromTime']=strtotime(date('Y-m-d'));
	$GLOBALS['toTime']=strtotime(date('Y-m-d',strtotime("+1 day")));
}