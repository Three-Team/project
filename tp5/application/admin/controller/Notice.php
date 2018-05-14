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

    	$data = db("affiche")->select();
      
    	return view("show",['data'=>$data]);
    }

    /*
	**添加公告
	*/
    public function notice_add()
    {
    	$view = new View();
    	return $view->fetch();
    }


    public function addDo()
    {
        $data = input("post.");
        $res = db("affiche")->insert($data);
        if($res){
             $this->redirect("notice/show");
        }else{
            $this->error("添加失败","notice_add");
        }

    }
}
