<?php
namespace app\admin\controller;
use think\Controller;
use think\view;
use think\Db;

class Index extends Controller
{
	

    /*
	**后台展示
	*/
    public function show()
    {
    	$view = new View();
    	return $view->fetch();
    }

    /*
	**后台加载首页
	*/
    public function shop_index()
    {
       $log = db('log')->order('id desc')->limit(5)->select();
    	return view("shop_index",['log'=>$log]);
    }
}
