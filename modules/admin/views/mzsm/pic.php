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
    <title>添加banner</title>
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
    <form action="?r=admin/mzsm/addpic" method="post" enctype="multipart/form-data" id="addEditGoodsForm">
        <!--通用信息-->
        <div class="ncap-form-default tab_div_1">
            <input type="hidden" name="id" value="<?=$arrData['img_id']?>" />
            <dl class="row">
                <dt class="tit">
                    <label>商品id</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['goods_id']?>" name="goods_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>图片大图地址1</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file" />
                    <img src="<?=$arrData['image_url1']?>" width="50" height="50"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>图片大图地址2</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file"  />
                    <img src="<?=$arrData['image_url2']?>" width="50" height="50"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>图片大图地址3</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file"  />
                    <img src="<?=$arrData['image_url3']?>" width="50" height="50"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>图片大图地址4</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file"  />
                    <img src="<?=$arrData['image_url4']?>" width="50" height="50"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>详情图1</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file"  />
                    <img src="<?=$arrData['image_url5']?>" width="50" height="50"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>详情图2</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file"  />
                    <img src="<?=$arrData['image_url6']?>" width="50" height="50"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>详情图3</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file"  />
                    <img src="<?=$arrData['image_url7']?>" width="50" height="50"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>详情图4</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file"  />
                    <img src="<?=$arrData['image_url8']?>" width="50" height="50"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>详情图5</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file"  />
                    <img src="<?=$arrData['image_url9']?>" width="50" height="50"/>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit" style="line-height: 53px;">
                    <label>详情图6</label>
                </dt>
                <dd class="opt">
                    <input type="file" name="file[]" value="" class="file"  />
                    <img src="<?=$arrData['image_url10']?>" width="50" height="50"/>
                </dd>
            </dl>
        <div class="ncap-form-default">
            <div class="bot">
                <input type="submit" name="btn" class="addSubmitBtn" value="确认提交">
            </div>
        </div>
    </form>
</div>
</body>


