<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Cookie;

class Code extends Controller
{
	public function __construct()
	{
		$u_id = Cookie::get('u_id');
		//print_r($u_id);
		if(!$u_id){
			$this->redirect('http://127.0.0.1/tp5/public/index.php/index/',302);
		}	
	}
}
