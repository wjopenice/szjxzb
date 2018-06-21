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
    <link rel="stylesheet" href="<?=$url?>/Css/order/index.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!--  订单首页   -->
    <div class="page-group">

        <!--  收货地址   -->
        <div class="addressChoseBox cf">
            <div class="noAddressBox"><a class="linkInner cf" href="?m=m/address/index"><span class="fl">添加收货地址</span><span class="icon icon-right fr"></span></a></div>
            <div class="hasAddress hide">
                <p class="fl"><span class="receiverName">中宝</span><span class="receiverCall">15912341234</span></p>
                <p class="fl receiverAddressDetail">广东省深圳市罗湖区水田二街3号宝琳国金大厦4楼D区</p>
                <i class="writeAddressBtn"><a class="linkInner" href="javascript:void(0)"></a></i>
            </div>
        </div>

        <!--  订单商品   -->
        <div class="orderGoodsBox">
            <div class="subOrderGoods cf copy" data-num="4">
                <div class="orderImg fl"><img src="<?=$url?>/Image/common/goods/goods1.png" alt=""></div>
                <div class="orderInfo fl cf">
                    <p class="fl orderName">范思哲（VERSACE）</p>
                    <p class="fl orderInstr">小黑瓶精华肌底液化妆品套装护肤组合女4件</p>
                    <p class="fl">规格：统一库存</p>
                </div>
                <div class="cf fr orderPriceBox">
                    <p class="orderPrice">￥3999</p>
                    <div>× <span>1</span></div>
                </div>
            </div>
            <div class="totalBox cf">
                <p class="fl">共<span>4</span>件商品</p>
                <p class="fl">运费：￥0.00</p>
                <p class="fr totalMoneyBox">合计：￥<span class="money">2280.9</span></p>
            </div>
        </div>

        <!--  优惠券  -->
        <div class="coupon cf">
            <p class="fl">使用优惠券</p>
            <a class="fr couponValBox open-popup" href="javascript:void(0)"><span class="couponVal">买满1000减200</span><span class="icon icon-right"></span></a>
        </div>

        <!--  提交导航栏   -->
        <div class="submitNavBar cf">
            <div class="payInfoBox fl">
                <p class="realPay">实付： ￥<span class="money">2080.9</span></p>
                <p class="post">邮费：包邮</p>
            </div>
            <a class="submitBtn fr" href="javascript:void(0)">提交</a>
        </div>

    </div>

    <!--  选择商品属性  -->
    <div class="popup popup-services">
        <div class="choseCouponBox">
            <div class="operationBox cf">
                <a class="fl confirm" href="javascript:void(0)">确定</a>
                <i class="fr close close-popup"></i>
            </div>
            <div class="couponBoxWrap">
                <div class="subCouponBox cf copy" data-num="4" data-coupon="买满100减20">
                    <i class="fl unChose"></i>
                    <img src="<?=$url?>/Image/order/couponImg.png" alt="" class="couponImg fl">
                </div>
            </div>
        </div>
    </div>

<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/order/index.js"></script>
</body>
</html>