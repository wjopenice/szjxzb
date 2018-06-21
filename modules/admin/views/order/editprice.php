<?php
use yii\helpers\Html;
use yii\helpers\Url;
$session = Yii::$app->session;
$url = Url::to("@web/web/admin/Static");
?>

<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>修改费用</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
</head>
<body>
<div class="page">
    <!--  标题栏   -->
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>订单价格修改</h3>
                <h5>调整订单价格或运费</h5>
            </div>
        </div>
    </div>
    <!--  操作提示  -->
    <div id="explanation" class="explanation">
        <div id="checkZoom" class="title">
            <i class="fa pressIcon"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span title="收起提示" id="explanationZoom"></span>
        </div>
        <ul>
            <li>请务必正确填写信息.</li>
        </ul>
    </div>
    <form action="?r=admin/mzsm/addpic" method="post" enctype="multipart/form-data" id="addEditGoodsForm">
        <div class="ncap-form-default tab_div_1">
            <input type="hidden" name="id" value="" />
            <dl class="row">
                <dt class="tit">
                    <label>商品总价</label>
                </dt>
                <dd class="opt"> 8938.72</dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>物流运费</label>
                </dt>
                <dd class="opt">
                    <input name="shipping_price" id="shipping_price" placeholder="请填写运费价格" type="text" value="0.00" class="input-txt" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                    <p class="notic">物流运费</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>订单价格微调</label>
                </dt>
                <dd class="opt">
                    <input name="shipping_price" id="shipping_price" placeholder="请填写运费价格" type="text" value="0.00" class="input-txt" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                    <p class="notic">请直接输入要调整的金额, 如果是正数价格下调, 负数价格上调</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>订单总金额</label>
                </dt>
                <dd class="opt"> 8938.72</dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>使用余额</label>
                </dt>
                <dd class="opt"> 0.00</dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>使用积分</label>
                </dt>
                <dd class="opt"> 0.00</dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>应付金额</label>
                </dt>
                <dd class="opt"> 8938.72</dd>
            </dl>

            <div class="bot">
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green">保存</a>
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-mini">取消</a>
            </div>
    </form>
</div>
</body>


