<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "支付";
$this->keywords = "支付";
$this->description = "支付";
?>
<?= Html::cssFile("{$url}/Css/payment/pay.css"); ?>
    <div class="container">
        <div class="payMode">
            <p class="payModeTitle">选择付款方式</p>
            <p class="payModeFlow">
                <span>交易号：</span>
                <span id="good_sn"><?=$order['order_sn']?></span>
                <div hidden>
                    <span id="good_name"><?=$good['name']?></span>
                    <span id="good_price"><?=$good['unitPrice']?></span>
                    <span id="good_num"><?=$good['goodsNum']?></span>
                    <span id="good_total"><?=$good['subGoodsTotal']?></span>
                </div>
            </p>
        </div>
        <div class="mode">支付方式</div>
        <ul class="modeUl cf">
            <li class="aliPay fl active"><a href="javascript:;"><i></i><span>支付宝</span></a></li>
            <li class="weChatPay fl"><a href="javascript:;"><i></i><span>微信支付</span></a></li>
            <li class="unionPay fl"><a href="javascript:;"><i></i><span>中国银联</span></a></li>
        </ul>
        <div class="payBtn"><a class="immediatePay" href="javascript:;">立即支付</a></div>
    </div>
<?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
<?= Html::jsFile("{$url}/Js/payment/pay.js"); ?>
<script>

$(function () {
    $(".payBtn").click(function () {
        var spanValue = $(".active").find("span").text();
        resqn = $("#good_sn").text();
        var pay_amount =  $("#good_price").text();
        pay_way = 0;
        switch (spanValue){
            case "支付宝": pay_way = 1;break;
            case "微信支付": pay_way = 2;break;
            default:pay_way = 3;break;
        }
        var body = $("#good_name").text();
//        $.post("?r=home/shop_cart/sign",{resqn:resqn,pay_amount:pay_amount,pay_way:pay_way,body:body,_csrf:"<?//= Yii::$app->request->csrfToken ?>//"},function (msg) {
//            window.location.href = "?r=home/shop_cart/rqcode";
//        });
        var url = "&resqn="+resqn+"&pay_amount="+pay_amount+"&pay_way="+pay_way+"&body="+body;

        var leftVal = (screen.width - 626) / 2;
        var topVal = (screen.height - 626) / 2;
        newWindow = window.open("?r=home/shop_cart/sign"+url,'_blank','width=626,height=626,toolbars=no,resizable=no,scrollbars=no,left='+leftVal+',top='+topVal);
        notifyInterval = window.setInterval("Notify()",3000);
    });
});

function Notify() {
    $.post("http://www.szjxzb.cn/api.php?a=api/scan_pay/paydata",{resqn:resqn,pay_way:pay_way,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
        if(msg.code == 1){
            //清楚定时器
            //关闭打开的新窗口
            window.clearInterval(notifyInterval);
            newWindow.close();
            $.hbySystemTip("success","支付成功！");
            return false;
        }
    });
}

</script>
