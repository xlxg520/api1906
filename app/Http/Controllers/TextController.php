<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class TextController extends Controller
{
    public function  getAccessToken()
    {
        $appid ='wx1c2d3bdcfe3a747c';
        $appsecret ='65bca24ff0d89b7901e915967af766e6';
        $url ="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        echo $url;echo "<hr>";
        $response = file_get_contents($url);
        var_dump($response);echo '<hr>';
        $arr = json_decode($response ,true);
      //  echo "<pre>";print_r($arr);echo"</pre>";
    }

    public function  curl()
    {
        $appid ='wx1c2d3bdcfe3a747c';
        $appsecret ='65bca24ff0d89b7901e915967af766e6';
        $url ="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
//        echo $url;
        //初始化
        $ch = curl_init($url);

        //设置参数选项
        curl_setopt($ch,CURLOPT_HEADER,0);

        //执行会话
        curl_exec($ch);

        //关闭会话
        curl_close($ch);

    }


    public function guzzle()
    {
        $appid ='wx1c2d3bdcfe3a747c';
        $appsecret ='65bca24ff0d89b7901e915967af766e6';
        $url ="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

        $client = new Client();
        $response = $client->request('GET',$url);
       dd($response);


       //
    }




}
