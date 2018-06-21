<?php
use yii\helpers\Html;
?>
<?php
$arr = [
        "?r=user/hc/index&type=index"=>"帮助中心",
        "?r=user/hc/distribution&type=distribution"=>"配送与验收",
        "?r=user/hc/customerservice&type=customerservice"=>"售后服务",
        "?r=user/hc/coupon&type=coupon"=>"优惠券",
        "?r=user/hc/agreement&type=agreement"=>"服务协议",
        "?r=user/hc/policy&type=policy"=>"隐私政策",
        "?r=user/hc/cooperation&type=cooperation"=>"商务合作",
        "?r=user/hc/rule&type=rule"=>"积分规则"
];
$strHtml = "";
$strHtml .= Html::beginTag("div",['class'=>'leftNavigation fl']);
foreach ($arr as $k=>$v){
    $x = strchr(substr(strrchr($k,"/"),1),"&",true);
    $y = !isset($_GET['type']) ? "index" : $_GET['type']; //非默认路由
    //导航是否默认特效颜色选择
    if($x == $y){
        $strHtml .= Html::a($v,$k,['class'=>"active"]);
    }else{
        $strHtml .= Html::a($v,$k,['class'=>'']);
    }
}
$strHtml .= Html::endTag("div");
?>
<?=$strHtml?>


