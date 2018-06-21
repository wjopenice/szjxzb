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
    <title>我的优惠券</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/coupon/index.css">
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
        <div class="content">
            <div class="buttons-tab">
                <a href="#tab1" class="tab-link active button">未使用</a>
                <a href="#tab2" class="tab-link button">已使用</a>
                <a href="#tab3" class="tab-link button">已过期</a>
            </div>
            <div class="content-block">
                <div class="tabs">
                    <div id="tab1" class="tab active">
                        <ul class="welfareUl">
                            <li class="cf copy" data-num="3">
                                <span class="dateLeft fl">2018/4/12 - 2018/6/12</span>
                                <div class="explainRight fr">
                                    <span class="explainRightTitle">暖心优惠券</span>
                                    <span class="explainRightMoney"><i>￥</i><i class="money">20</i></span>
                                    <span class="explainRightTitle">满￥100使用</span>
                                </div>
                            </li>
                        </ul>
                        <!-- 没有优惠券 -->
                        <div class="noGoods hide">
                            <p class="info">您暂时没有优惠券</p>
                        </div>
                    </div>
                    <div id="tab2" class="tab">
                        <ul class="welfareUl usedUl">
                            <li class="cf copy" data-num="3">
                                <span class="dateLeft fl">2018/4/12 - 2018/6/12</span>
                                <div class="explainRight fr">
                                    <span class="explainRightTitle">暖心优惠券</span>
                                    <span class="explainRightMoney"><i>￥</i><i class="money">20</i></span>
                                    <span class="explainRightTitle">满￥100使用</span>
                                </div>
                            </li>
                        </ul>
                        <!-- 没有优惠券 -->
                        <div class="noGoods hide">
                            <p class="info">您暂时没有优惠券</p>
                        </div>
                    </div>
                    <div id="tab3" class="tab">
                        <ul class="welfareUl usedUl hide">
                            <li class="cf copy" data-num="3">
                                <span class="dateLeft fl">2018/4/12 - 2018/6/12</span>
                                <div class="explainRight fr">
                                    <span class="explainRightTitle">暖心优惠券</span>
                                    <span class="explainRightMoney"><i>￥</i><i class="money">20</i></span>
                                    <span class="explainRightTitle">满￥100使用</span>
                                </div>
                            </li>
                        </ul>
                        <!-- 没有优惠券 -->
                        <div class="noGoods">
                            <p class="info">您暂时没有优惠券</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/coupon/index.js"></script>
</body>
</html>