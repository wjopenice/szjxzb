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
    <title>更改个人信息</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm-extend.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/city-picker.css">
    <link rel="stylesheet" href="<?=$url?>/Css/personalData/index.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!-- content -->
    <div class="page-group">
        <!--   个人资料    -->
        <div class="personalDataBoxWrap">
            <div class="subPersonalBox cf headBox">
                <p class="personalName fl">头像</p>
                <a href="javascript:void(0)" class="fr cf changeBox" id="changeBox">
                    <img src="<?=$url?>/Image/personalData/headPortrait.png" alt="" class="centerHeadImg fr" id="centerHeadImg">
                    <input type="file" hidefocus="true" id="fileUpLoad" accept="image/*" name="fileUpLoad" class="fileUpLoad">
                    <span class="fr clickChange">点击更换</span>
                </a>
            </div>
            <div class="subPersonalBox cf baseInfoBox">
                <p class="personalName fl">昵称</p>
                <input type="text" class="fr nickNameInput" placeholder="请输入您的昵称"/>
            </div>
            <div class="subPersonalBox cf baseInfoBox areaBox">
                <p class="personalName fl">我的地址</p>
                <p class="fr sexChoose"><span class="areaInfo">请选择区域</span><i class="moreIcon"></i></p>
            </div>
        </div>
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
<script src="<?=$url?>/Js/personalData/jquery.ui.widget.js"></script>
<script src="<?=$url?>/Js/personalData/jquery.fileupload.js"></script>
<script src="<?=$url?>/Js/personalData/index.js"></script>
</body>
</html>