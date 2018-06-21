<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "下单成功";
$this->keywords = "下单成功";
$this->description = "下单成功";
?>
<?= Html::cssFile("{$url}/Css/payment/checkoutSuccess.css"); ?>
    <div class="container checkoutSuccess">
        <div class="checkoutSuccessTitle">
            <i></i>
            <span>下单成功 感谢您的支持</span>
        </div>
        <div class="checkoutInfo cf">
            <div class="checkoutInfoLeft fl">
                <div class="shopTotal"><span>商品合计：</span><span>￥1600.00</span></div>
                <div class="freight"><span>运费：</span><span>￥10.00</span></div>
                <div class="realPay"><span>实付：</span><span>￥1610.00</span></div>
            </div>
            <div class="checkoutInfoRight fl">
                <div class="shopTime"><span>下单时间：</span><span>2018-04-11 17：00</span></div>
                <div class="consignee"><span>收货人：</span><span>张三</span></div>
                <div class="contactNumber"><span>联系电话：</span><span class="tel">17688830262</span></div>
                <div class="address"><span>收货地址：</span><span>广东省深圳市罗湖区水贝二街3号宝琳国金大厦4楼D区</span></div>
            </div>
        </div>

        <div class="orderBtn">
            <a class="lookOrder" href="javascript:;">查看订单</a>
            <a class="continue" href="javascript:;">继续逛逛</a>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/payment/checkoutSuccess.js"); ?>