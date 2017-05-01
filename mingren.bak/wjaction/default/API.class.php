<?php
@session_start();
class API extends WebBase{
	public $title='万金娱乐平台';
	private $apiName='wanjin';
	
	//pk10
	public final function pk10(){
		$this->display('api/pk10_spindex.php');
	}
	
	
	
}
