<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
class AlipayController extends Controller
{
    public function alipay()
    {

        $client  = new  Client();

        $url = 'https://openapi.alipay.com/gateway.do';

        //请求参数
        $common_param = [

            'out_trade_no'  =>   'test_1906'.time().'_'.mt_rand(11111,99999),
            'praduct_code'  =>   'FAST_INSTANT_TRADE_PAY',
            'total_amount'  =>   '1000',
            'subject'       =>   '测试'. mt_rand(11111,99999),
        ];

        $pub_param = [      //公共请求参数
            'app_id'        =>       env('ALIpay_ID'),
            'method'        =>       'alipay.trade.page.pay',
            'charset'       =>       'utf-8',
            'sign_type'     =>       'RSA2',
            'sign'          =>       '',
            'timestamp'     =>       date("Y-m-d H:i:s"),
            'varsion'       =>       '1.0',
            'biz_content'   =>       '',
        ];

        $params = array_merge($common_param,$pub_param);
        echo "<pre>";print_r($params);echo "</pre>";
        $str = "";
        foreach ($params as $k=>$v)
        {
             $str .=$k . '='  .  $v .'&';
        }
        $str = rtrim($str,'&');
        $request_url = $url .'?' .$str;
        echo "request_url:" .$request_url;
        header("Location".$request_url);





    }
}
