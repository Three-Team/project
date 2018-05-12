<?php
namespace app\admin\controller;
use think\Controller;
use think\view;
use think\Db;

class Order extends Controller
{

    /*
	**账单列表
	*/
    public function show()
    {
    	$view = new View();
    	return $view->fetch();
    }
}
