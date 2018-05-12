<?php
namespace app\admin\controller;
use think\Controller;
use think\view;
use think\Db;

class Store extends Controller
{

    /*
	**店铺列表
	*/
    public function show()
    {
    	$view = new View();
    	return $view->fetch();
    }

    /*
	**审核列表
	*/
    public function status()
    {
    	$view = new View();
    	return $view->fetch();
    }

    /*
    **店铺排行
    */
    public function rankings()
    {
        $view = new View();
        return $view->fetch();
    }
}
