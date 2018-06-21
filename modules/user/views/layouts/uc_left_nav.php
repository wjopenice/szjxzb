<?php
use yii\helpers\Html;
?>
<?php
$arr = [
    "账号管理"=>[
        "?r=user/uc/index&type=index"=>"个人中心",
        "?r=user/uc/message&type=message"=>"消息通知<span class='notice dib'></span>",
        "?r=user/uc/accountinfo&type=accountinfo"=>"账号信息",
        "?r=user/uc/addressmanagement&type=addressmanagement"=>"地址管理",
        "?r=user/uc/accountsecurity&type=accountsecurity"=>"账号安全",
        "?r=user/uc/mypoints&type=mypoints"=>"我的积分",
        "?r=user/uc/mycollection&type=mycollection"=>"我的收藏",
//        "?r=user/uc/mytracks&type=mytracks"=>"我的足迹",
    ],
    "交易管理"=>[
        "?r=user/tm/order&type=order"=>"订单管理",
        "?r=user/tm/redpacket&type=redpacket"=>"我的红包",
        "?r=user/tm/coupon&type=coupon"=>"优惠券<span>(0)</span>",
    ],
    "服务中心"=>[
        "?r=user/sc/record&type=record"=>"售后记录",
        "?r=user/hc/index"=>"帮助中心",
    ],
];
$strHtml = "";
$strHtml .= Html::beginTag("div",['class'=>'leftNavigation fl']);
foreach ($arr as $key=>$value){
    $strHtml .= Html::tag("div",$key,['class'=>'typeTitle']);
    foreach ($value as $k=>$v){
        $x = strchr(substr(strrchr($k,"/"),1),"&",true);
        $y = !isset($_GET['type']) ? "index" : $_GET['type']; //非默认路由
        //导航是否默认特效颜色选择
        if($x == $y){
            $strHtml .= Html::a($v,$k,['class'=>"active"]);
        }else{
            $strHtml .= Html::a($v,$k,['class'=>'']);
        }
    }
}
$strHtml .= Html::endTag("div");
?>
<?=$strHtml?>