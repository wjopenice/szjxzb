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
    <title>编辑会员等级</title>
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
                <h3>会员等级管理 - 编辑会员等级</h3>
                <h5>网站系统会员等级管理</h5>
            </div>
        </div>
    </div>
    <form action="" method="post">
        <div class="ncap-form-default tab_div_1">
            <input type="hidden" name="id" value="" />
            <dl class="row">
                <dt class="tit">
                    <label for="level_name"><em>*</em>等级名称</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="level_name" value="注册会员" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">设置会员等级名称</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="amount"><em>*</em>消费额度</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="amount" value="0.00" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">设置会员等级所需要的消费额度,单位：元</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="discount"><em>*</em>折扣率</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="discount" value="100" class="input-txt">
                    <span class="err"></span>
                    <p class="notic">折扣率单位为百分比，如输入90，表示该会员等级的用户可以以商品原价的90%购买</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">等级描述</dt>
                <dd class="opt">
                    <textarea name="describe" class="tarea" rows="6" style="height: 75px;width: 400px;">注册会员</textarea>
                    <span class="err"></span>
                    <p class="notic">会员等级描述信息</p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green">确认提交</a></div>
    </form>
</div>
</body>


