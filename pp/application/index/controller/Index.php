<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use think\cache\driver\Redis;
class Index extends Controller
{
    public function index()
    {
    	return  view('index');
    }
    //pp公社
    public function my_home9()
    {
    	return  view('my_home9');
    }
    public  function  message()
    {
    	return  view('message');
    }
     public  function  message2()
    {
    	return  view('message2');
    }
    public function community_sign()
    {
    	return  view('community_sign');
    }
    public function Interest_search()
    {
    	return  view('Interest_search');
    }
    public function Interest()
    {
    	return  view('Interest');
    }
    public function Interest_add()
    {
    	return  view('Interest_add');
    }
    public  function Interest_xq()
    {
    	return  view('Interest_xq');
    }
    public function Interest_user()
    {
    	return  view('Interest_user');
    }
    public function invitation_friend()
    {
    	return  view('invitation_friend');
    }
    public function  post_xq()
    {
    	return  view('post_xq');
    }
    public function Service_Centre()
    {
    	return  view('Service_Centre');
    }
    public function Property()
    {
    	return  view('Property');
    }
    public function Property02()
    {
    	return  view('Property02');
    }
    public function Property03()
    {
    	return  view('Property03');
    }
    public function Property04()
    {
    	return  view('Property04');
    }
    public function Property05()
    {
    	return  view('Property05');
    }
    public function Repair()
    {
    	return  view('Repair');
    }
    public function Repair03()
    {
    	return  view('Repair03');
    }
     public function Repair02()
    {
    	return  view('Repair02');
    }
    public function cheshi()
    {
    	return  view('cheshi');
    }
    public function carpay()
    {
    	return  view('carpay');
    }
    public function Parking_default()
    {
    	return  view('Parking_default');
    }
    public function carpay02()
    {
    	return  view('carpay02');
    }
    public function carpay03()
    {
    	return  view('carpay03');
    }
    public function carpay04()
    {
    	return  view('carpay04');
    }
    public function user()
    {
    	return  view('user');
    }
    public function Information_index()
    {
    	return  view('Information_index');
    }
    public function Information_search()
    {
    	return  view('Information_search');
    }
    public function Information_xq2()
     {
      return  view('Information_xq2');
     }
     public function Information_bq()
     {
     	 return  view('Information_bq');
     }
     public function Information_xq()
     {
     	return  view('Information_xq');
     }
     public function login()
     {
     	return  view('login');
     }
     public function register()
     {
     	return  view('register');
     }
     public function register2()
     {
     	return  view('register2');
     }
     public function community()
     {
     	return  view('community');
     }
      public  function community_activity()
      {
      	return  view('community_activity');
      }
      public function community_xq()
      {
      	return  view('community_xq');
      }
      public function  community_list()
      {
      	return  view('community_list');
      }
      public function community_participate()
      {
        return  view('community_participate');
      }
      public function community_sqh()
      {
      	return  view('community_sqh');
      }
      public function community_edit()
      {
      	return  view('community_edit');
      }
      public function user_admin()
      {
      	return  view('user_admin');
      }
      public function Modify_password()
      {
      	return  view('Modify_password');
      }
      public function my_home()
      {
      	return  view('my_home');
      }
      public function my_home8()
      {
      	return  view('my_home8');
      }
        public function my_home4()
      {
      	return  view('my_home4');
      }
        public function my_home5()
      {
      	return  view('my_home5');
      }
        public function my_home6()
      {
      	return  view('my_home6');
      }
      public function my_publish()
      {
      	return  view('my_publish');
      }
      public function group()
      {
      	return  view('group');
      }
      public function group_sign()
      {
      	return  view('group_sign');
      }
      public function group_xq()
      {
      	return  view('group_xq');
      }
      public function report()
      {
      	return  view('report');
      }
      public function group_participate()
      {
      	return  view('group_participate');
      }
      public function second()
      {
      	return  view('second');
      }
      public function second_sign()
      {
      	return  view('second_sign');
      }
       public function second_xq()
       {
       	return  view('second_xq');
       }
       public function carpooling()
       {
       		return  view('carpooling');
       }
        public function carpooling_edit()
        {
        	return  view('carpooling_edit');
        }
       public function carpooling_xq()
       {
       	 return  view('carpooling_xq');
       }
       public function automation_add()
       {
       	 return  view('automation_add');
       }
       public function automation_add2()
       {
       	 return  view('automation_add2');
       }
       public function Housekeeper_index()
       {
       	return  view('Housekeeper_index');
       }
       public function Convenience_services()
       {
       	 return  view('Convenience_services');
       }
       public function services_list()
       {
       	 return  view('services_list');
       }
       public function services_no()
       {
       	  return  view('services_no');
       }
       public function My_scene2()
       {
       	 return  view('My_scene2');
       }
        public function My_scene3()
       {
       	 return  view('My_scene3');
       }
        public function My_scene()
       {
       	 return  view('My_scene');
       }
       public function gateway()
       {
       	  return  view('gateway');
       }
       public function gateway02()
       {
       	  return  view('gateway02');
       }
       public function My_smart()
       {
       	 return  view('My_smart');
       }
       public function Invitation_add()
       {
       	 return  view('Invitation_add');
       }
       public function Invitation_er()
       {
       	 return  view('Invitation_er');
       }
       public function Invitation_yqm()
       {
       	 return  view('Invitation_yqm');
       }
       public function Invitation_index()
       {
       	 return  view('Invitation_index');
     }
       public function Mass_message()
       {
       	 return  view('Mass_message');
       }
       public function My_equipment()
       {
       	 return  view('My_equipment');
       }
       public function My_equipment_add()
       {
       	  return  view('My_equipment_add');
       }
       public function my_home2()
       {
       	  return  view('my_home2');
       }
        public function my_home3()
       {
       	  return  view('my_home3');
       }
         public function my_home7()
       {
       	  return  view('my_home7');
       }
       public function My_no()
       {
       	 return  view('My_no');
       }
       public function My_smart2()
       {
       	   return  view('My_smart2');
       }
       public function Parking()
       {
       	 return  view('Parking');
       }
       public function Parking_my()
       {
       	 return  view('Parking_my');
       }
       public function Parking_add()
       {
       	 return  view('Parking_add');
       }
       public function password()
       {
       	  return  view('password');
       }
       public function password2()
       {
       	  return  view('password2');
       }
        public function password3()
       {
       	  return  view('password3');
       }
       public function search()
       {
       	 return  view('search');
       }
       public function smart_index()
       {
       	  return  view('smart_index');
       }
       public function smart_index_no()
       {
       	  return  view('smart_index_no');
       }
}
