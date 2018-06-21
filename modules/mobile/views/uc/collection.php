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
    <title>我的收藏</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/collection/index.css">
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
        <!-- 头部分类和管理 -->
        <div class="collectionHead cf">
            <div class="all fl">全部<i class="dib icon"></i></div>
            <div class="manage fr cf"><a class="cancelBtn fr hide" href="javascript:void(0)">取消</a><span class="fr manageBtn">管理</span></div>
        </div>
        <div class="classify hide">
            <p class="classifyTitle">宝贝分类</p>
            <ul class="classifyUl cf">
                <li class="dib fl copy" data-num="8"><a href="javascript:;">女装</a></li>
            </ul>
        </div>

        <!--  收藏列表   -->
        <div class="hotList">
            <div class="subModel">
                <ul class="bestBoxWrap cf">
                    <li class="subBest fl copy" data-num="4">
                        <i class="isChecked fl hide checkBox"></i>
                        <img class="bestImg" src="<?=$url?>/Image/common/goods/goods3.png" alt="">
                        <p class="bestName">Lancome兰蔻套装asdfasdfasdfasdfsd</p>
                        <p class="bestDetail">小黑瓶精华肌底液化妆品套装护肤组合女4件</p>
                        <p class="bestSale">已售 <span>1899</span></p>
                        <p class="bestPrice">￥1999</p>
                        <i class="lineBottom"></i>
                        <i class="lineRight"></i>
                    </li>
                </ul>
            </div>

            <!--   查看更多   -->
            <a href="javascript:void(0)" class="seeMore">查看更多 》</a>
        </div>

        <!-- 没有收藏 -->
        <div class="noGoods cf hide">
            <p class="info fl">空空如也~ </p>
            <a class="goLink fl" href="javascript:void(0)">去逛逛</a>
        </div>


        <!--   底部全选删除栏   -->
        <div class="balanceBox cf hide">
            <div class="allCheckBox cf fl"><i class="isChecked fl active"></i><span class="checkName">全选</span></div>
            <a class="balanceBtn fr" href="javascript:void(0)">删除</a>
        </div>

    </div>

<script src="<?=$url?>/Js/common/jquery-1.10.2.js"></script>
<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/collection/index.js"></script>
</body>
</html>