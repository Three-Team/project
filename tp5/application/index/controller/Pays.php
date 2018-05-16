<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Cookie;
use pay\Weipay;
use pay\Notify;
use think\Session;
class Pays extends Code
{
	public function pay()
	{
		return view();
	}
	function randomFloat($min = 0, $max = 1) {
    return $min + mt_rand() / mt_getrandmax() * ($max - $min);
	}

	
	
	public function alipay()
	{
		$s_id = '1';
        //获取当前订单号
        $order_sn = date('Ymd').uniqid();
        $parameter = array(
            "service" => "create_direct_pay_by_user",
            "partner" => '2088121321528708', // 合作身份者id
            "seller_email" => 'itbing@sina.cn', // 收款支付宝账号
            "payment_type" => '1', // 支付类型
            "notify_url" => "http://http://39.106.144.186/hdh.php", // 服务器异步通知页面路径
            "return_url" => "http://127.0.0.1/tp5/public/index.php/index/pays/alipay_do", // 页面跳转同步通知页面路径
            "out_trade_no" => $order_sn, // 商户网站订单系统中唯一订单号
            "subject" => $s_id, // 订单名称
            "total_fee" => "0.01", // 付款金额
            "body" => "结账", // 订单描述 可选
            "show_url" => "", // 商品展示地址 可选
            "anti_phishing_key" => "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
            "exter_invoke_ip" => "", // 客户端的IP地址
            "_input_charset" => 'utf-8', // 字符编码格式
        );
       // 去除值为空的参数
        foreach ($parameter as $k => $v) {
            if (empty($v)) {
                unset($parameter[$k]);
            }
        }
        // 参数排序
        ksort($parameter);
        reset($parameter);
       // 拼接获得sign
        $str = "";
        foreach ($parameter as $k => $v) {
            if (empty($str)) {
                $str .= $k . "=" . $v;
            } else {
                $str .= "&" . $k . "=" . $v;
            }
        }
        $parameter['sign'] = md5($str . '1cvr0ix35iyy7qbkgs3gwymeiqlgromm');    // 签名
        $parameter['sign_type'] = strtoupper('MD5');

// ******************************************************模拟请求 start*************************************************************************************************************************
        $sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8

' method='get'>";
        foreach ($parameter as $k => $v) {
            $sHtml .= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
        }
        Session::set('order',$parameter);
        
		$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";
		//var_dump($sHtml);
        echo $sHtml;
	}
	
	public function alipay_do()
	{
		$favourable  = sprintf("%.2f",$this->randomFloat());
		$order = Session::get('order');
		$orders['pay_type'] = $order['payment_type'];
		$orders['favourable'] = $favourable;
		$orders['pay_time'] = date("Y-m-d H:i:s");
		$orders['s_id'] = $order['subject'];
		$orders['order_num'] = $order['out_trade_no'];
		$orders['shop_num'] = $order['out_trade_no'].$order['subject'];
		$orders['pay_time_year'] = date('Y');
		$orders['pay_time_month'] =  date('m');
		$orders['pay_time_day'] = date('d');
		$orders['pay_price'] = $order['total_fee'];
		
		$ins = Db::table('order')->insert($orders);
		if($ins)
		{
			$this->redirect('shop/index',302);
		}
	}
	
	public function weipay()
	{
		$wxPay = new Weipay();
		$order_num = date('Ymd').uniqid();     //你自己的商品订单号
		$payAmount = 0.01;          //付款金额，单位:元
		$orderName = '支付测试';    //订单标题
		$notifyUrl = 'http://www.hudonghu.com/tp5/public/index.php/index/pays/notify';     //付款成功后的回调地址(不要有问号)
		$pay_time = time();      //付款时间
		$arr = $wxPay->createJsBizPackage($payAmount,$order_num,$orderName,$notifyUrl,$pay_time);
		//生成二维码
		$url = 'http://pan.baidu.com/share/qrcode?w=300&h=300&url='.$arr['code_url'];
		echo "<center><img src='{$url}' style='width:300px;'></center>";
		echo '二维码内容：'.$arr['code_url'];
	}
	
	public function notify()
	{
		$notify = new Notify();
		$result = $notify->notify();
		if($result){
    		//完成你的逻辑
    		//例如连接数据库，获取付款金额$result['cash_fee']，获取订单号$result['out_trade_no']，修改数据库中的订单状态等;
    		echo 111;
		}else{
    		echo 'pay error';
		}	
	}
	
	
	
}
