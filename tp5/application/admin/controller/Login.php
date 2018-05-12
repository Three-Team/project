<?php
namespace app\admin\controller;
use think\Controller;
class Login extends Controller
{
    public function index()
    {
        return view("index");
    }

   public function loginDo()
   {
   	  $data = input("post.");
   	  $name = $data['user'];
   	  $res = db("admin")->where("admin_name",$name)->find();
   	  if(empty($res)){
   	  	 echo json_encode(array('statu'=>0,"message"=>"用户名不存在"));die;
   	  };
      if($res['admin_pwd']!=$data['pwd']){
      	echo json_encode(array('statu'=>1,"message"=>"密码错误"));die;
      }

      db("log")->insert(array('time'=>time()));
      echo json_encode(array('statu'=>2,"message"=>"登录成功"));

   }
}
