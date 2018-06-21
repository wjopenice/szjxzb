<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/mobile/Static");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>订单</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm-extend.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/city-picker.css">
    <link rel="stylesheet" href="<?=$url?>/Css/address/index.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!--  收货地址   -->
    <div class="page-group">
        <div class="subInputBox cf"><p class="fl inputName">收货人</p><input class="fl writeInfo" type="text" placeholder="请填写收货人姓名"></div>
        <div class="subInputBox cf"><p class="fl inputName">手机号</p><input class="fl writeInfo" type="text" placeholder="请填写手机号" onkeyup="this.value=this.value.replace(/\D/g,'')"></div>
        <div class="subInputBox cf areaBox"><p class="fl inputName">所在区域</p><p class="fr"><span class="areaInfo">请选择区域</span><span class="icon icon-right"></span></p></div>
        <div class="subInputBox cf detailBox"><p class="fl inputName">详细地址</p><textarea class="fl" placeholder="请填写详细地址"></textarea></div>
        <div class="setDefault cf"><i class="choseBox active fl"></i><p class="fl">设为默认地址</p></div>
        <a class="confirmBtn" href="javascript:void(0)">确定</a>
    </div>

    <!-- 省市区 -->
    <div class="area-warp">
        <div class="area-box">
            <div class="area-control">
                <a class="pull-right area-sure">确定</a>
            </div>
            <div class="w-top"></div>
            <div class="swiper-container js-province">
                <div class="swiper-wrapper">
                </div>
            </div>
            <div class="swiper-container js-city">
                <div class="swiper-wrapper">
                </div>
            </div>
            <div class="swiper-container js-county">
                <div class="swiper-wrapper">
                </div>
            </div>
            <div class="w-bottom"></div>
        </div>
    </div>

<script src="<?=$url?>/Js/common/jquery-1.10.2.js"></script>
<script>jQuery.noConflict();</script>
<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/common/city-picker.js"></script>
<script src="<?=$url?>/Js/address/index.js"></script>
</body>
</html>