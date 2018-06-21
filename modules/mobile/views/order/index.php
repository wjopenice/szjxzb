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
    <title>我的订单</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/myOrder/index.css">
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
        <div class="buttons-tab">
            <a href="#tab1" class="tab-link button button1">全部</a>
            <a href="#tab2" class="tab-link button button2">待付款</a>
            <a href="#tab3" class="tab-link button button3">待发货</a>
            <a href="#tab4" class="tab-link button button4">待收货</a>
            <a href="#tab5" class="tab-link button button5">待评价</a>
        </div>
        <div class="content-block">
            <div class="tabs">
                <div id="tab1" class="tab">
                    <ul class="all">
                        <li>
                            <div class="listTitle">等待买家付款</div>
                            <div class="listContent">
                                <div class="shopInfo cf">
                                    <div class="shopInfoLeft fl">
                                        <img class="listImg dib" src="<?=$url?>/Image/myOrder/shop.png" alt="">
                                    </div>
                                    <div class="shopInfoRight fl">
                                        <p class="shopName">莱斯璧 RECIPE</p>
                                        <p class="shopText">水晶防晒喷雾180ml SPF50(防晒隔离 补水保湿 )</p>
                                        <p class="shopPrice cf"><span class="price fl">￥1999</span><span class="num fr">x1</span></p>
                                    </div>
                                </div>
                                <div class="shopNum cf"><span class="total fl">共1件</span><span class="money fr">合计：<i>￥<span class="unPayMoney">1999</span></i></span></div>
                            </div>
                            <div class="listFoot"><span class="cancel dib cancelOrder">取消订单</span><span class="payment dib paymentOrder">付款</span></div>
                        </li>
                        <li>
                            <div class="listTitle">等待买家收货</div>
                            <div class="listContent">
                                <div class="shopInfo cf">
                                    <div class="shopInfoLeft fl">
                                        <img class="listImg dib" src="<?=$url?>/Image/myOrder/shop.png" alt="">
                                    </div>
                                    <div class="shopInfoRight fl">
                                        <p class="shopName">莱斯璧 RECIPE</p>
                                        <p class="shopText">水晶防晒喷雾180ml SPF50(防晒隔离 补水保湿 )</p>
                                        <p class="shopPrice cf"><span class="price fl">￥1999</span><span class="num fr">x1</span></p>
                                    </div>
                                </div>
                                <div class="shopNum cf"><span class="total fl">共1件</span><span class="money fr">合计：<i>￥1999</i></span></div>
                            </div>
                            <div class="listFoot"><!--<span class="cancel dib">查看物流</span>--><span class="payment dib confirmation">确认收货</span></div>
                        </li>
                        <li>
                            <div class="listTitle">等待卖家发货</div>
                            <div class="listContent">
                                <div class="shopInfo cf">
                                    <div class="shopInfoLeft fl">
                                        <img class="listImg dib" src="<?=$url?>/Image/myOrder/shop.png" alt="">
                                    </div>
                                    <div class="shopInfoRight fl">
                                        <p class="shopName">莱斯璧 RECIPE</p>
                                        <p class="shopText">水晶防晒喷雾180ml SPF50(防晒隔离 补水保湿 )</p>
                                        <p class="shopPrice cf"><span class="price fl">￥1999</span><span class="num fr">x1</span></p>
                                    </div>
                                </div>
                                <div class="shopNum cf"><span class="total fl">共1件</span><span class="money fr">合计：<i>￥1999</i></span></div>
                            </div>
                            <div class="listFoot"><!--<span class="cancel dib">查看物流</span>--><span class="payment dib remind">提醒发货</span></div>
                        </li>
                        <li>
                            <div class="listTitle">等待买家评论</div>
                            <div class="listContent">
                                <div class="shopInfo cf">
                                    <div class="shopInfoLeft fl">
                                        <img class="listImg dib" src="<?=$url?>/Image/myOrder/shop.png" alt="">
                                    </div>
                                    <div class="shopInfoRight fl">
                                        <p class="shopName">莱斯璧 RECIPE</p>
                                        <p class="shopText">水晶防晒喷雾180ml SPF50(防晒隔离 补水保湿 )</p>
                                        <p class="shopPrice cf"><span class="price fl">￥1999</span><span class="num fr">x1</span></p>
                                    </div>
                                </div>
                                <div class="shopNum cf"><span class="total fl">共1件</span><span class="money fr">合计：<i>￥1999</i></span></div>
                            </div>
                            <div class="listFoot"><span class="cancel dib deleteOrder">删除订单</span><span class="payment dib"><a href="../../View/comment/index.html">评论</a></span></div>
                        </li>
                    </ul>
                    <!-- 没有订单 -->
                    <div class="noGoods cf hide">
                        <p class="info fl">空空如也~ </p>
                        <a class="goLink fl" href="javascript:void(0)">去逛逛</a>
                    </div>
                </div>
                <div id="tab2" class="tab">
                    <ul class="all">
                        <li>
                            <div class="listTitle">等待买家付款</div>
                            <div class="listContent">
                                <div class="shopInfo cf">
                                    <div class="shopInfoLeft fl">
                                        <img class="listImg dib" src="<?=$url?>/Image/myOrder/shop.png" alt="">
                                    </div>
                                    <div class="shopInfoRight fl">
                                        <p class="shopName">莱斯璧 RECIPE</p>
                                        <p class="shopText">水晶防晒喷雾180ml SPF50(防晒隔离 补水保湿 )</p>
                                        <p class="shopPrice cf"><span class="price fl">￥1999</span><span class="num fr">x1</span></p>
                                    </div>
                                </div>
                                <div class="shopNum cf"><span class="total fl">共1件</span><span class="money fr">合计：<i>￥<span class="unPayMoney">1999</span></i></span></div>
                            </div>
                            <div class="listFoot"><span class="cancel dib cancelOrder">取消订单</span><span class="payment dib paymentOrder">付款</span></div>
                        </li>
                    </ul>
                    <!-- 没有订单 -->
                    <div class="noGoods cf hide">
                        <p class="info fl">空空如也~ </p>
                        <a class="goLink fl" href="javascript:void(0)">去逛逛</a>
                    </div>
                </div>
                <div id="tab3" class="tab">
                    <ul class="all">
                        <li>
                            <div class="listTitle">等待卖家发货</div>
                            <div class="listContent">
                                <div class="shopInfo cf">
                                    <div class="shopInfoLeft fl">
                                        <img class="listImg dib" src="<?=$url?>/Image/myOrder/shop.png" alt="">
                                    </div>
                                    <div class="shopInfoRight fl">
                                        <p class="shopName">莱斯璧 RECIPE</p>
                                        <p class="shopText">水晶防晒喷雾180ml SPF50(防晒隔离 补水保湿 )</p>
                                        <p class="shopPrice cf"><span class="price fl">￥1999</span><span class="num fr">x1</span></p>
                                    </div>
                                </div>
                                <div class="shopNum cf"><span class="total fl">共1件</span><span class="money fr">合计：<i>￥1999</i></span></div>
                            </div>
                            <div class="listFoot"><!--<span class="cancel dib">查看物流</span>--><span class="payment dib remind">提醒发货</span></div>
                        </li>
                    </ul>
                    <!-- 没有订单 -->
                    <div class="noGoods cf hide">
                        <p class="info fl">空空如也~ </p>
                        <a class="goLink fl" href="javascript:void(0)">去逛逛</a>
                    </div>
                </div>
                <div id="tab4" class="tab">
                    <ul class="all">
                        <li>
                            <div class="listTitle">等待买家收货</div>
                            <div class="listContent">
                                <div class="shopInfo cf">
                                    <div class="shopInfoLeft fl">
                                        <img class="listImg dib" src="<?=$url?>/Image/myOrder/shop.png" alt="">
                                    </div>
                                    <div class="shopInfoRight fl">
                                        <p class="shopName">莱斯璧 RECIPE</p>
                                        <p class="shopText">水晶防晒喷雾180ml SPF50(防晒隔离 补水保湿 )</p>
                                        <p class="shopPrice cf"><span class="price fl">￥1999</span><span class="num fr">x1</span></p>
                                    </div>
                                </div>
                                <div class="shopNum cf"><span class="total fl">共1件</span><span class="money fr">合计：<i>￥1999</i></span></div>
                            </div>
                            <div class="listFoot"><!--<span class="cancel dib">查看物流</span>--><span class="payment dib confirmation">确认收货</span></div>
                        </li>
                    </ul>
                    <!-- 没有订单 -->
                    <div class="noGoods cf hide">
                        <p class="info fl">空空如也~ </p>
                        <a class="goLink fl" href="javascript:void(0)">去逛逛</a>
                    </div>
                </div>
                <div id="tab5" class="tab">
                    <ul class="all comment">
                        <li>
                            <div class="listTitle">等待买家评论</div>
                            <div class="listContent">
                                <div class="shopInfo cf">
                                    <div class="shopInfoLeft fl">
                                        <img class="listImg dib" src="<?=$url?>/Image/myOrder/shop.png" alt="">
                                    </div>
                                    <div class="shopInfoRight fl">
                                        <p class="shopName">莱斯璧 RECIPE</p>
                                        <p class="shopText">水晶防晒喷雾180ml SPF50(防晒隔离 补水保湿 )</p>
                                        <p class="shopPrice cf"><span class="price fl">￥1999</span><span class="num fr">x1</span></p>
                                    </div>
                                </div>
                                <div class="shopNum cf"><span class="total fl">共1件</span><span class="money fr">合计：<i>￥1999</i></span></div>
                            </div>
                            <div class="listFoot"><span class="cancel dib deleteOrder">删除订单</span><span class="payment dib"><a href="../../View/comment/index.html">评论</a></span></div>
                        </li>
                    </ul>
                    <!-- 没有订单 -->
                    <div class="noGoods cf hide">
                        <p class="info fl">空空如也~ </p>
                        <a class="goLink fl" href="javascript:void(0)">去逛逛</a>
                    </div>
                </div>

            </div>
        </div>


    </div>

<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/myOrder/index.js"></script>
</body>
</html>