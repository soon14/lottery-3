<?php
require_once('sqlin.php');
$conf['debug']['level']=5;

/*		连接数据库		*/
$conf['db']['dsn']='mysql:host=localhost;dbname=mingren';
$conf['host']='localhost';
$conf['port']='3306';
$conf['db']['user']='root';
$conf['db']['password']='';
$conf['db']['charset']='utf8';
$conf['db']['prename']='ssc_';

$conf['safepass']='8576';     //安全码

$conf['cache']['expire']=0;
$conf['cache']['dir']='_cache/';
$conf['url_modal']=2;
$conf['action']['template']='wjinc/admin/';
$conf['action']['modals']='wjaction/admin/';
$conf['member']['sessionTime']=30*60;	// ÓÃ»§ÓÐÐ§Ê±³¤
$conf['node']['access']='http://localhost:65531';	// node·ÃÎÊ»ù±¾Â·¾¶


error_reporting(E_ERROR & ~E_NOTICE);
ini_set('date.timezone', 'asia/shanghai');
//ini_set('display_errors', 'On');
