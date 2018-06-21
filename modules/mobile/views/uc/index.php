<?php
use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to("@web/web/mobile/Static");
$this->title = "个人中心";
$this->keywords = "个人中心";
$this->description = "个人中心";

if(!empty($_COOKIE['username'])) {
    $len = cartlen($_COOKIE['username']);
}else{
    $len = 0;
}
?>
<?=Html::cssFile("{$url}/Css/common/sm-extend.min.css")?>
<?=Html::cssFile("{$url}/Css/personalCenter/index.css")?>
        <!-- 个人中心头部 -->
        <div class="headBox pr">
            <div class="headContent">
                <a href="?m=m/uc/ud">
                    <img class="dib" src="<?=$url?>/Image/personalCenter/headPortrait.png" alt="">
                    <span class="headText"><?=$_COOKIE['username']?></span>
                </a>
            </div>
            <a class="shopCar dib" href="?m=m/sc/index"><i></i><span><?=$len?></span></a>
            <ul class="headUl cf">
                <li class="dib fl collection"><a href="?m=m/uc/collection"><span class="dib date">0</span><span>收藏</span></a></li>
                <li class="dib fl discount"><a href="?m=m/uc/coupon"><span class="dib date">0</span><span>优惠券</span></a></li>
                <li class="dib fl"><a href="javascript:;"><span class="dib date">0</span><span>积分</span></a></li>
            </ul>
        </div>

        <!-- 列表 -->
        <div class="list-block">
            <ul>
                <li class="item-content item-myOrder cf">
                    <a href="?m=m/order/index&tab=1"><i></i><span class="item-title">我的订单</span><span class="icon icon-right fr"></span></a>
                </li>
                <li class="cf itemOrderLi">
                    <a class="fl dib pendPay" href="?m=m/order/index&tab=2"><i></i><span class="pendText">待付款</span></a>
                    <a class="fl dib pendDelivery" href="?m=m/order/index&tab=3"><i></i><span class="pendText">待发货</span></a>
                    <a class="fl dib pendGoods" href="?m=m/order/index&tab=4"><i></i><span class="pendText">待收货</span></a>
                    <a class="fl dib pendEvaluate" href="?m=m/order/index&tab=5"><i></i><span class="pendText">待评价</span></a>
                </li>
            </ul>
        </div>
        <div class="list-block">
            <ul>
                <li class="item-content item-about cf">
                    <a href="?m=m/webhtml/about"><i></i><span class="item-title">关于我们</span><span class="icon icon-right fr"></span></a>
                </li>
                <li class="item-content item-contact cf">
                    <a href="?m=m/webhtml/contact"><i></i><span class="item-title">联系我们</span><span class="icon icon-right fr"></span></a>
                </li>
            </ul>
        </div>
        <div class="list-block">
            <ul>
                <li class="item-content item-notice cf">
                    <a href="?m=m/notice/index"><i></i><span class="item-title">通知</span><span class="icon icon-right fr"></span></a>
                </li>
                <li class="item-content item-set cf">
                    <a href="?m=m/setting/index"><i></i><span class="item-title">设置</span><span class="icon icon-right fr"></span></a>
                </li>
            </ul>
        </div>

<?=Html::jsFile("{$url}/Js/common/zepto.min.js")?>
<?=Html::jsFile("{$url}/Js/common/sm-extend.min.js")?>
<?=Html::jsFile("{$url}/Js/personalCenter/index.js")?>
