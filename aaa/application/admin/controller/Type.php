<?php
namespace app\admin\controller;
use think\Controller;
use think\view;
use think\Db;

class Type extends Controller
{

    /*
	**公告展示
	*/
    public function show()
    {

    	$data = db("s_type")->select();
      
    	return view("show",['data'=>$data]);
    }

    /*
	**添加公告
	*/
    public function typeAdd()
    {
    	
    	return view("type_Add");
   }

    public function addDo()
    {
        $data = input("post.");
        $res = db("s_type")->insert($data);
        if($res){
             $this->redirect("type/show");
        }else{
            $this->error("添加失败","typeadd");
        }

    }

    public function del()
    {
        $id = input("get.id");
        $res = db('s_type')->delete($id);
        if($res){
            echo json_encode(array("status"=>0,"message"=>"删除成功"));
        }else{
            echo json_encode(array("status"=>1,"message"=>"删除失败"));
        }
    }
}
