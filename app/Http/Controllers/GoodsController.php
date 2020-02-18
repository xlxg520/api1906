<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Model\GoodsControllerModel;
class GoodsController extends Controller
{
     public  function  goods(Request $request)
     {
        $goods_id = $request->get('id');
        echo "goods_id:" .$goods_id;echo "<br>";

        $ua = $_SERVER['HTTP_USER_AGENT'];

        $data = [
            'goods_id' => $goods_id,
            'ua'       =>$ua,
             'ip'     =>$_SERVER['REMOTE_ADDR'],
        ];

     }



}
