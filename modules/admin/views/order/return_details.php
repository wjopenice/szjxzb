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
    <title>退款单详情</title>
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
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>退换货详情</h3>
                <h5>用户提交退换货详情</h5>
            </div>
        </div>
    </div>
    <div class="ncap-order-style">
        <div class="ncap-order-details">
            <form id="order-action">
                <div class="tabs-panels">
                    <div class="misc-info">
                        <h3>订单信息</h3>
                        <dl style="padding: 10px;">
                            <dt>订单编号：</dt>
                            <dd>201709271337419178</dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>用户：</dt>
                            <dd>中宝小帅</dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>申请日期：</dt>
                            <dd>2017-09-27 13:57</dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>商品：</dt>
                            <dd>名称：爸爸2陆毅代言索扬20000毫安充电宝轻薄正品手机通用移动电源MAh 规格：颜色：土豪金</dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>服务类型：</dt>
                            <dd>退货退款</dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>处理方式：</dt>
                            <dd>
                                <a href="javascript:void(0);" style="color: #fff;background: #F8981D;padding: 2px 9px;border: solid 1px #DCDCDC;border-radius: 3px;height: 20px;display: inline-block;">支付原路退回</a>
                                <a href="javascript:void(0);" style="color: #fff;background: #F8981D;padding: 2px 9px;border: solid 1px #DCDCDC;border-radius: 3px;height: 20px;display: inline-block;">退款到用户余额</a>
                            </dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>退货原因：</dt>
                            <dd>不想买了</dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>退货描述：</dt>
                            <dd> ddssss</dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>用户上传照片：</dt>
                            <dd></dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>审核意见：</dt>
                            <dd><label><input type="radio" name="status" checked="" value="1">审核通过</label><label><input type="radio" name="status" value="-1">拒绝通过</label></dd>
                        </dl>
                        <dl style="padding: 10px;">
                            <dt>状态：</dt>
                            <dd>已发货</dd>
                        </dl>
                    </div>
                    <div class="contact-info">
                        <h3>处理备注</h3>
                        <dl class="row" style="padding: 10px;">
                            <dt class="tit">
                                <label for="note">处理备注  </label>
                            </dt>
                            <dd class="opt" style="margin-left:10px">
                                <textarea id="note" name="note" style="width:600px" rows="6" placeholder="退货描述" class="tarea"></textarea>
                            </dd>
                        </dl>
                        <dl class="row" style="padding: 10px;">
                            <dt class="tit"></dt>
                            <dd class="opt" style="margin-left:10px">
                                <a class="ncap-btn-big ncap-btn-green">确认发货</a>
                            </dd>
                        </dl>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>