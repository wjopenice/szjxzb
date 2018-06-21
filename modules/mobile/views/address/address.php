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
    <link rel="stylesheet" href="<?=$url?>/Css/managementAddress/index.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!--  管理收货地址   -->
    <div class="page-group">
        <div class="subAddress">
            <div class="receiverInfoBox cf">
                <p class="cf fl infoNameBox"><span class="fl">张三</span><span class="fr">13430419266</span></p>
                <p class="fl">广东省深圳市罗湖区水贝二街3号宝琳国金大厦4楼D区</p>
            </div>
            <div class="operateBox cf">
                <div class="fl choseDefault cf active"><i></i><p class="fl">默认地址</p></div>
                <div class="fr cf">
                    <a class="delBtn fr" href="javascript:void(0)"><i class="fl"></i>删除</a>
                    <a class="editBtn fr" href="?m=m/address/index"><i class="fl"></i>编辑</a>
                </div>
            </div>
        </div>
        <div class="subAddress">
            <div class="receiverInfoBox cf">
                <p class="cf fl infoNameBox"><span class="fl">李四</span><span class="fr">13430419266</span></p>
                <p class="fl">广东省深圳市罗湖区水贝二街3号宝琳国金大厦4楼D区</p>
            </div>
            <div class="operateBox cf">
                <div class="fl choseDefault cf active"><i></i><p class="fl">默认地址</p></div>
                <div class="fr cf">
                    <a class="delBtn fr" href="javascript:void(0)"><i class="fl"></i>删除</a>
                    <a class="editBtn fr" href="?m=m/address/index"><i class="fl"></i>编辑</a>
                </div>
            </div>
        </div>

        <!-- 新增地址 -->
        <nav class="bar bar-tab address">
            <a class="addressText" href="?m=m/address/index">+ 新增地址</a>
        </nav>
    </div>

<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/managementAddress/index.js"></script>
</body>
</html>