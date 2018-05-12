<?php
namespace app\admin\controller;
use think\Controller;
use think\view;
use think\Db;

class Notice extends Controller
{

    /*
	**公告展示
	*/
    public function show()
    {
    	$view = new View();
    	return $view->fetch();
    }

    /*
	**添加公告
	*/
    public function notice_add()
    {
    	$view = new View();
    	return $view->fetch();
    }
}
