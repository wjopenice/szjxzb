<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "优惠券";
$this->keywords = "优惠券";
$this->description = "优惠券";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/about.css"); ?>

<div class="container">
    <!-- 面包屑 -->
    <div class="crumbs">
        <span>首页</span> &gt; <span class="secondLevel">优惠券</span>
    </div>
    <!-- content -->
    <div class="content cf">
        <!-- 左侧边导航 -->
        <?=$this->render('../layouts/uc_left_nav.php')?>

        <!-- 右侧内容 -->
        <div class="rightContent fl">
            <p class="questionBox cf"><span class="fl">关于优惠券</span><i></i></p>
            <div class="useTabBox cf">
                <a class="subUseTab active" href="javascript:void(0)">可使用</a>
                <a class="subUseTab" href="javascript:void(0)">已使用</a>
                <a class="subUseTab" href="javascript:void(0)">已失效</a>
            </div>
            <div class="useConBox">
                <div class="subUseCon cf">
                    <div class="redCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                    <div class="redCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                    <div class="redCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                    <div class="redCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                </div>
                <div class="subUseCon hide">
                    <div class="redCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                    <div class="redCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                    <div class="redCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                    <div class="redCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                </div>
                <div class="subUseCon hide">
                    <div class="greyCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                    <div class="greyCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                    <div class="greyCoupon fl">
                        <p class="couponPriceBox">￥<span class="couponPrice">50</span></p>
                        <p class="realPay">单笔实付<span>399</span>元使用</p>
                        <p class="couponLimit">有效期至：<span>2018年5月30日 24:00</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= Html::jsFile("{$url}/Js/personalCenter/about.js"); ?>