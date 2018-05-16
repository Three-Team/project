<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Cookie;
use think\Duanxin;
use think\SmsSendConn;

header("Content-type:text/html;charset=utf-8");
class Login extends Controller
{
    public function index()
    {
        return view("index");
    }
    public function register()
    {
        return view("register");
    }

    
    public function index_do(){
       $name = $_POST['name'];
        $pwd = $_POST['pwd'];
        
       
        $res = db("user_register")->where("name='$name'")->find();
        $u_id = $res['u_id'];
         if($res){     
            Cookie::set('u_id',$u_id);
            $this->redirect("index/index");
        }else{
            $this->success('登录失败',"login/index");
        }

    }
    
    public function login()
    {
    	return view('login');
    }
    public function login_do()
    {
        $request = Request::instance();
        $data = $request->post();
        $vote = new Register;
        $res = $vote->insert($data);
        if($res){
            $this->success('注册成功',"login/index");
        }else{
            $this->success('注册失败',"login/login");
        }
    }

     public function phone_do()
    {
        //print_r($_POST);die;
        $tell = new Duanxin();
        $tel = $_POST['tel'];
        $duanxin = $tell->send($tel);

        echo $duanxin;
    }
    public function code_do()
    {
        $code = $_COOKIE['code'];
        $code1 = $_POST['code1'];
        if($code == $code1)
        {
            echo 1;
        }else{
            echo 2;
        }
    }

    public function forget(){
        $u_id = Cookie::get('u_id');
        
        $sid = input("get.id");
        if(!empty($_POST)){
           
            $pwd = $_POST['pwd'];
            Db::table('user_register')->where('U_id', $u_id)->update(['pwd' => $pwd]);
            $this->redirect("shop/index",array("sid"=>$sid));
        }else{
           
            $res = db("user_register")->where("u_id='$u_id'")->find();
            return view("forget",['pwd'=>$res['pwd'],'sid'=>$sid]);
        }
        
    }


}
