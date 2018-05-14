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
    	
        $data = db("for_shop")->where("s_status",1)->select();
        foreach ($data as $k => &$v) {
             $id = $v['u_id'];
             $v['u_id'] = db('admin')->where('admin_id',$id)->value('admin_name');
        }
    	return view("show",['data'=>$data]);
    }
    /*
    **详情页
    */
    public function shop_d()
    {    
          $id = input("get.id");
         $data = db("for_shop")->where("s_id",$id)->find();
       
         return view("list",['data'=>$data]);
    }
    /*
	**审核列表
	*/
    public function status()
    {
    	 $data = db("for_shop")->where("s_status",0)->select();
         foreach ($data as $k => &$v) {
             $id = $v['u_id'];
             $v['u_id'] = db('admin')->where('admin_id',$id)->value('admin_name');
        }
        return view("status",['data'=>$data]);
    }

    /*
    **店铺排行
    */
    public function rankings()
    {
        $view = new View();
        return $view->fetch();
    }
    /*
    **店铺详情页
    */
    public function detail()
    {   
         $id = input("get.id");
         $data = db("for_shop")->where("s_id",$id)->find();
         return view("detail",['data'=>$data]);
    }

    /*
    **审核
    */
    public function exam()
    {
        $id = input("get.id");
        $res = db('for_shop')->where('s_id',$id)->setField('s_status', 1);
        if($res){
            // $this->redirect("Store/detail");
            echo "<script>alert('操作成功')</script>";
            $this->redirect("store/show");
        }else{
            echo "<script>alert('操作失败')</script>";
            $this->redirect("store/detail");
        }

    }
} 
