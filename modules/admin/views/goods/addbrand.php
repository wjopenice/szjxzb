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
    <title>添加品牌</title>
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
    <style>
        .t{    line-height: 53px;}
        .file{float: left; margin-top: 15px; }
    </style>
</head>
<body>
<div class="page">
    <!--  标题栏   -->
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>添加品牌</h3>
                <h5>添加品牌</h5>
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
    <form action="?r=admin/goods/addbrand" method="post" enctype="multipart/form-data" id="addEditGoodsForm">
        <!--通用信息-->
        <div class="ncap-form-default tab_div_1">
            <dl class="row">
                <dt class="tit"><label>品牌名称</label></dt>
                <dd class="opt"><input type="text" required value="" name="name" class="input-txt">*</dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;"><label>品牌logo</label></dt>
                <dd class="opt"><input type="file" name="file" value="" class="file"  />*</dd>
            </dl>
            <dl class="row">
                <dt class="tit"><label>品牌描述</label></dt>
                <dd class="opt"><input type="text"  value="" name="desc" class="input-txt"></dd>
            </dl>
            <dl class="row">
                <dt class="tit"><label>品牌地址</label></dt>
                <dd class="opt"><input type="text"  value="" name="url" class="input-txt"></dd>
            </dl>
            <div class="ncap-form-default">
                <div class="bot">
                    <input type="submit" name="btn" class="addSubmitBtn" value="确认提交">
                </div>
            </div>
    </form>
</div>
</body>


