<?php
namespace app\index\controller;
use think\Cookie;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        $id = Cookie::get('u_id');
       
        $data = db("for_shop")->where("u_id",$id)->select();
   
        return view("index",['data'=>$data,'uid'=>$id]);
    }
   public function indexDo()
   {
      $id = input("get.id");
      $res = db("for_shop")->where("u_id",$id)->select();
      $data = count($res);
     
      if($data>="3"){
         echo json_encode(array("s"=>0,"message"=>"数量上限"));
      }else{
         echo json_encode(array("s"=>1));
      }
   }

  public function state()
  {
     $id = input("get.id");
     $res = db("for_shop")->where("s_id",$id)->find();
     if($res['s_status'] == 0)
     {
         $this->redirect("index/jump");
     }else{
         $this->redirect("shop/index",array("sid"=>$id));
     }
  }

  public function jump() 
  {
    	return view("jump");
  }
}
