<?php
use yii\helpers\Html;
$arrNavX = $arrNav;
$arrNavY = [];
foreach ($arrNavX as $k=>$v){
    $arrNavY['?m=m/classify/index&type=classify&nav='.$v['id']] = $v['mobile_name'];
}
//导航颜色选择
$liclass = [
    'active',
    'activeX',
];
foreach ($arrNavY as $key=>$value){
    $x = explode("=",explode("&",$key)[2])[1];
    if(!empty($_GET['nav'])){
        $y = $_GET['nav'];
    }else{
        $y = 1;
    }
    //导航是否默认特效颜色选择
    if($x == $y){
        $strli .= Html::tag("li",Html::a($value,$key,['class'=>'']),['class'=>"subTypeName $liclass[0]"]);
    }else{
        $strli .= Html::tag("li",Html::a($value,$key,['class'=>'']),['class'=>"subTypeName $liclass[1]"]);
    }
}
?>
<div class="typeBoxLeft fl"><ul><?=$strli?></ul></div>