<?php
/**
 * Created by PhpStorm.
 * User: jinzhuotao
 * Date: 2018/3/30
 * Time: 下午1:27
 */
namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;

class PartnerController extends Controller
{

    public function index($partnerName)
    {
        //图片
        $picture = [
            'yanzhenhao/1.jpg',
            'yanzhenhao/2.jpg',
            'yanzhenhao/3.jpg',
            'yanzhenhao/4.jpg',
        ];

        if(!view()->exists("partners.$partnerName")){
            //默认公共页
            return view("partners.index",compact('partnerName'));
        }

        //个性化页面，需单独开发
        return view("partners.$partnerName",compact('partnerName','picture'));
    }

}