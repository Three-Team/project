<?php
namespace app\index\controller;
use think\Controller;


class Shop extends Controller
{
	public function index()
	{   
		$id = input("param.sid");
		$data = db("for_shop")->field('s_id,s_shop,s_photo,s_rand')->where("s_id",$id)->find();
		$rest = db("affiche")->select();
		$now = time();
		foreach ($rest as $k => $v) { 
		
			if(strtotime($v['start'])>=$now or strtotime($v['stop'])<=$now){
                unset($rest[$k]);
			}
     	
	   }
	   return view("index",['data'=>$data,'rest'=>$rest]);
   }

	public function infor()
	{
        $id = input("param.id");
        $data = db("for_shop")->field('s_id,s_shop,s_photo,s_tel,s_position')->where("s_id",$id)->find();
		return view("infor",['data'=>$data]);
	}

	public function update()
	{
		$id = input("get.id");
		$data= input("post.");
		// 获取表单上传文件 例如上传了001.jpg
		$file = request()->file('img');
		if(!empty($file)){
           $data['s_photo']=$this->upload($file);
		}
  
		$res = db('for_shop')->where('s_id',$id)->update($data);
		if($res){

			$this->redirect("shop/index",array("sid"=>$id));
		}else{
			$this->redirect("shop/infor");
		}

	}

	public function upload($file){
		    
           
		    // 移动到框架应用根目录/public/uploads/ 目录下
		    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		    if($info){
		        $a=$info->getSaveName();  
	            $imgp= str_replace("\\","/",$a);  
	           
	            $imgpath='uploads/'.$imgp;  
               
               return $imgpath;
		   }else{
		        // 上传失败获取错误信息
		        echo $file->getError();
		    }
	}

	public function shopper()
	{
		$sid = input("get.sid");
		if(!empty($_POST)){
			$data = $_POST;
			Db::table('clerk')->where('s_id',$data['sid'])->delete();
			//添加负责人
			Db::table('clerk')->insert(['c_name' => $data['clerk'],'c_tel'=>$data['c_tel'],'s_id'=>$data['sid'],'c_kind'=>'1']);
			//添加店员
			$arr = array();
			foreach ($data['c_name'] as $k => $v) {
				$arr[$k]['c_name'] = $v;
				$arr[$k]['s_id'] = $data['sid'];
			}
			db('clerk')->insertAll($arr);
		}else{
			$clerk = db("clerk")->where(['s_id'=>$sid,'c_kind'=>'1'])->find();
			$res = db("clerk")->where(['s_id'=>$sid,'c_kind'=>'0'])->select();
			return view("shopper",['data'=>$res,'clerk'=>$clerk,'sid'=>$sid]);
		}
	}


}
