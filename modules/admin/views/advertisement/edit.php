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
    <title>修改banner</title>
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
                    <h3>商品设置</h3>
                    <h5>商城基本信息设置</h5>
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
        <form action="?r=admin/advertisement/edit" method="post" enctype="multipart/form-data" id="addEditGoodsForm">
            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
            <input type='hidden' name='id' value="<?=$arrData['id']?>" />
            <!--通用信息-->
            <div class="ncap-form-default tab_div_1">
                <dl class="row">
                    <dt class="tit">
                        <label>banner名称</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" required value="<?=$arrData['name']?>" name="name" class="input-txt">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>banner图片</label>
                    </dt>
                    <dd class="opt">
                        <input type="file"   name="file" class="input-txt" value="">
                        <span class="err" id="err_goods_name"></span>
                        <img src="<?=$arrData['url']?>" width="100" height="50">
                    </dd>
                </dl>
<!--                <dl class="row">-->
<!--                    <dt class="tit">-->
<!--                        <label>图片上传</label>-->
<!--                    </dt>-->
<!--                    <dd class="opt">-->
<!--                        <div class="input-file-show">-->
<!--                            <span class="show">-->
<!--                                <a id="img_a" target="_blank" class="nyroModal" rel="gal" href="javascript:void(0)">-->
<!--                                    <i id="img_i" class="fa fa-picture-o" onMouseOver="" onMouseOut="layer.closeAll();"></i>-->
<!--                                </a>-->
<!--                            </span>-->
<!--                            <span class="type-file-box">-->
<!--                                <input type="text" id="imagetext" name="original_img" value="" class="type-file-text">-->
<!--                                <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">-->
<!--                                <input class="type-file-file" onClick="GetUploadify(1,'','goods','img_call_back')" size="30" hidefocus="true" nc_type="change_site_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">-->
<!--                            </span>-->
<!--                        </div>-->
<!--                        <span class="err"></span>-->
<!--                        <p class="notic">请上传图片格式文件</p>-->
<!--                    </dd>-->
<!--                </dl>-->
            </div>
            <div class="ncap-form-default">
                <div class="bot">
                    <input type="submit" name="btn" class="addSubmitBtn" value="确认提交">
                </div>
            </div>
         </form>
    </div>
</body>


