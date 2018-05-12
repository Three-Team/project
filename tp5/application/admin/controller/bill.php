<?php
namespace app\admin\controller;
use think\Controller;
use think\view;
use think\Db;

class Index extends Controller
{
    
    /*
	**账单展示
	*/
    public function show()
    {
    	$view = new View();
    	return $view->fetch();
    }
}
