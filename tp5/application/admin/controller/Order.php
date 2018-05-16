<?php
namespace app\admin\controller;
use think\Controller;
use think\view;
use think\Db;
use think\Request;

class Order extends Controller
{

    /*
	**账单列表
	*/
    public function show()
    {
    	if(Request::instance()->isAjax()){
            $s_shop = $_POST['s_shop'];
    		$data = Db::table('order')->join('for_shop','order.s_id = for_shop.s_id')->where('s_shop','like','%'.$s_shop.'%')->select();
	    	$view = new View();
            $arr = $view->fetch('ajax',['data'=>$data]);
            echo json_encode(array('data'=>$arr));
    	}else{
    		$data = Db::table('order')->join('for_shop','order.s_id = for_shop.s_id')->select();
	    	$view = new View();
	    	return $view->fetch('',['data'=>$data]);
    	}
    	
    }
}
