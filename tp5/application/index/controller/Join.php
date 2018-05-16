<?php
namespace app\index\controller;
use think\Request;//引入request
use think\Db;
use think\Controller;
use think\File;
use think\Cookie;
header("Content-type:text/html;charset=utf8");
				class Join extends Controller
				{
				  
				    public function open()
				    {
				    	$u_id = Cookie::get('u_id');
				    	$data = Db::table('s_type')->select();
				    	$this->assign("u_id",$u_id);
						$this->assign("data",$data);
				    	return view("open");
				    }
				
				  //   public function jump()
				  //   {
				    	
						// $u_id = Cookie::get('u_id');						
						// $sql = "select  * from for_shop inner join user_register on for_shop.u_id = user_register.u_id";
						// $data = Db::table('for_shop')->query($sql);
						
						

						// if(empty($data)){
						//     return view("jump");die;
						// } 
      //                   $s_status = $data[0]['s_status'];
      //                   if($s_status == "0"){
      //                       $this->redirect("join/statu");
      //                   }else{
      //                   	$this->redirect('index/index');
      //                   }
						
							
						
				    	
				  //   }

				  //   public function statu(){
      //                   return view("statu");
				  //   }
				    
				    public function Auditing(){
				    	$data   = $_POST;
				    	$file[0]   = request()->file('s_photo'); 
				    	$file[1]  = request()->file('s_number_photo'); 
				    	$file[2] = request()->file('s_licence'); 
				    	if(isset($file[0])){  
						// 获取表单上传文件 例如上传了001.jpg  
						// 移动到框架应用根目录/public/uploads/ 目录下  
						$info = $file[0]->move(ROOT_PATH . 'public/uploads');
						if($info){  
						// 成功上传后 获取上传信息  
						$a=$info->getSaveName();  
						$imgp= str_replace("\\","/",$a);  
						$imgpath='uploads/'.$imgp;  
						$data['s_photo']= $imgpath;  
						}else{  
						// 上传失败获取错误信息  
							echo $file->getError();  
						}  
					}  
						
						if(isset($file[1])){  
						// 获取表单上传文件 例如上传了001.jpg  
						// 移动到框架应用根目录/public/uploads/ 目录下  
						$infos = $file[1]->move(ROOT_PATH . 'public/uploads');
						if($infos){  
						// 成功上传后 获取上传信息  
						$aa=$infos->getSaveName();  
						$imgp= str_replace("\\","/",$aa);  
						$imgpath='uploads/'.$imgp;  
						$data['s_number_photo']= $imgpath;  
						}else{  
						// 上传失败获取错误信息  
							echo $file->getError();  
						}  
					}
					
						if(isset($file[2])){  
						// 获取表单上传文件 例如上传了001.jpg  
						// 移动到框架应用根目录/public/uploads/ 目录下  
						$infoss = $file[2]->move(ROOT_PATH . 'public/uploads');
						if($infoss){  
						// 成功上传后 获取上传信息  
						$aaa=$infoss->getSaveName();  
						$imgp= str_replace("\\","/",$aaa);  
						$imgpath="uploads/".$imgp;  
						$data['s_licence']= $imgpath;  
						}else{  
						// 上传失败获取错误信息  
							echo $file->getError();  
						}  
					}    
				    	$sql = Db::table('for_shop')->insert($data);
			    		if($sql){	
			    		$this->success('已提交申请',"index/index");
			    		}else{  
			    		$this->error('提交申请失败');die;
			    		
			    	 }  
				    
				    	 
				
				}


				public function staff(){
					$sql = "select  * from for_shop inner join user_register on for_shop.u_id = user_register.u_id";
					$data = Db::table('for_shop')->query($sql); 				
					$this->assign("data",$data);
					return view('staff');
				}

				
				public function add_staff(){
					$data = $_POST;
					$data = Db::table('staff')->insert($data);
					if($data){
						$this->redirect('index/index');
					}
				}
				
				
				}
