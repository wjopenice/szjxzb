<?php
use yii\helpers\Html;
//导航结构数据
$alink = [
    '?m=m/index/index&type=index'=>"首页",
    '?m=m/classify/index&type=classify&nav=1'=>"分类",
    '?m=m/sc/index&type=shoppingCart'=>"购物车",
    '?m=m/uc/index&type=center'=>"我的"
];
//导航颜色选择
$liclass = [
    'active',
    'activeX',
];
//导航结构生成
$strli = "";
foreach ($alink as $key=>$value){
    $x = explode("=",explode("&",$key)[1])[1];
    if(!empty($_GET['type'])){
        $y = $_GET['type'];
    }else{
        $y = "index";
    }
    //导航是否默认特效颜色选择
    if($x == $y){
        $strli .= Html::beginTag("a",['href'=>$key,'class'=>"tab-item external footTap-{$x} $liclass[0]"]);
            $strli .= Html::tag("span","",['class'=>"icon"]);
            $strli .= Html::tag("span",$value,['class'=>"tab-label"]);
        $strli .= Html::endTag("a");
    }else{
        $strli .= Html::beginTag("a",['href'=>$key,'class'=>"tab-item external footTap-{$x} $liclass[1]"]);
        $strli .= Html::tag("span","",['class'=>"icon"]);
        $strli .= Html::tag("span",$value,['class'=>"tab-label"]);
        $strli .= Html::endTag("a");
    }
}
?>
<?=Html::beginTag("div",['class'=>"bar bar-tab"])?>
    <?=$strli?>
<?=Html::endTag("div")?>
