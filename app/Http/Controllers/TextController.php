<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Redis;

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


//    public function  count()
//    {
//        $max = env('API_ACCESS_COUNT');
//
//        $key = 'count';
//        $number = Redis::get($key);
//        echo "现在访问次数:".$number;echo"<br>";
//
//         if($number > $max){
//             echo "接口访问受限,超过了访问次数".$max;
//             die;
//         }
//         //计算
//        $count = Redis::incr($key);
//         echo $count;echo "<br>";
//         echo "访问正常";
//    }


   public function md5test()
   {
        $key  ="1906";

        $str =  $_GET['str'];
        echo   "签名前的数据:".$str;

        $sign  = md5($str.$key);
        echo "计算签名:".$sign;
   }


   public function  lucky()
   {
       if(empty($_GET['birth'])){
           echo "程序员帮你测试 你今天适合吃啥？";die;
       }
      $birth = $_GET['birth'];
      $res = [' 大米饭','蒸米饭','炖吊子','大肠刺身','清炖蝙蝠','童子尿煮鸡蛋'];
      $rand = mt_rand(0,5);
      echo $res[$rand];
   }


    /**
     *
     */
    public function  encrypt()
   {
       //ord
       $str = 'liuweichen';
       echo "原文:".$str; echo "<br>";
       $length = strlen($str); //   获取字符串长度
       echo "length:".$length; echo "<hr>";
       $new_str = '';
       for($i=0;$i<$length;$i++)
       {
           echo $str[$i].'> '.ord($str[$i]);echo "<br>";
           $code = ord($str[$i])+ 1;
           echo "编码$str[$i]" . ' > '.$code.'>'.chr($code);echo"<br>";
            $new_str .=chr($code);
       }
       echo "<hr>";
       echo "密文:".$new_str;echo"<br>";

   }

   public function decrypt()
   {
       $data = 'mjvxfjdifo';
       echo "密文:".$data;echo "<br>";

       //解密
       $length = strlen($data);

       $str = "";
       for($i=0;$i<$length;$i++){
           echo $data[$i].'>'.ord($data[$i]);echo"<br>";
           $code = ord($data[$i]) - 1;
           echo "<hr>";
           echo "解码:".$data[$i] . '>' .chr($code);echo "<br>";
           $str .= chr($code);
       }
       echo "解密后数据:".$str;
   }


     public function encrypt1()
     {
      /*   $method_arr = openssl_get_cipher_methods();
         echo "<pre>";print_r($method_arr);echo "</pre>";
         die;*/

         $key = '1906';
         $data = "dasdasd";
         $emthod   = "aes-128-cbc";
         $iv = "qwertyuioplkjhgf";
         $enc_str  =  openssl_encrypt($data,$emthod,$key,OPENSSL_RAW_DATA,$iv);
         var_dump($enc_str);


         echo "<hr>";
         //解密
         $dec_data = openssl_decrypt($enc_str,$emthod,$key,OPENSSL_RAW_DATA,$iv);
         var_dump($dec_data);

     }


}
