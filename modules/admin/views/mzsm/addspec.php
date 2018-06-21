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
    <title>修改规格</title>
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
                <h3>规格修改</h3>
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
    <form action="?r=admin/mzsm/addspec" method="post" enctype="multipart/form-data" id="addEditGoodsForm">
        <!--通用信息-->
        <div class="ncap-form-default tab_div_1">
            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品信息：</label>
                    </dt>
                    <dd class="opt">
                        <select name="goodis">
                            <?php foreach ($spec as $key=>$value): ?>
                                <option value="<?=$value['goods_id']?>"><?=$value['goods_name']?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格1：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" id="spec1" value="" name="spec1" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <label style="margin-right: 10px;"><input name="spec1x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="红色"> 红色</label>
                        <label style="margin-right: 10px;"><input name="spec1x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="橙色"> 橙色</label>
                        <label style="margin-right: 10px;"><input name="spec1x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="黄色"> 黄色</label>
                        <label style="margin-right: 10px;"><input name="spec1x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="绿色"> 绿色</label>
                        <label style="margin-right: 10px;"><input name="spec1x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="蓝色"> 蓝色</label>
                        <label style="margin-right: 10px;"><input name="spec1x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="靛色"> 靛色</label>
                        <label style="margin-right: 10px;"><input name="spec1x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="紫色"> 紫色</label>
                        <label style="margin-right: 10px;"><input name="spec1x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="彩色"> 彩色</label>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格2：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$arrData['goods_id']?>" name="spec2" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <label style="margin-right: 10px;"><input name="spec2x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="红色"> 红色</label>
                        <label style="margin-right: 10px;"><input name="spec2x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="橙色"> 橙色</label>
                        <label style="margin-right: 10px;"><input name="spec2x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="黄色"> 黄色</label>
                        <label style="margin-right: 10px;"><input name="spec2x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="绿色"> 绿色</label>
                        <label style="margin-right: 10px;"><input name="spec2x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="蓝色"> 蓝色</label>
                        <label style="margin-right: 10px;"><input name="spec2x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="靛色"> 靛色</label>
                        <label style="margin-right: 10px;"><input name="spec2x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="紫色"> 紫色</label>
                        <label style="margin-right: 10px;"><input name="spec2x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="彩色"> 彩色</label>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格3：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$arrData['goods_id']?>" name="spec3" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <label style="margin-right: 10px;"><input name="spec3x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="红色"> 红色</label>
                        <label style="margin-right: 10px;"><input name="spec3x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="橙色"> 橙色</label>
                        <label style="margin-right: 10px;"><input name="spec3x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="黄色"> 黄色</label>
                        <label style="margin-right: 10px;"><input name="spec3x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="绿色"> 绿色</label>
                        <label style="margin-right: 10px;"><input name="spec3x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="蓝色"> 蓝色</label>
                        <label style="margin-right: 10px;"><input name="spec3x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="靛色"> 靛色</label>
                        <label style="margin-right: 10px;"><input name="spec3x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="紫色"> 紫色</label>
                        <label style="margin-right: 10px;"><input name="spec3x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="彩色"> 彩色</label>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格4：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$arrData['goods_id']?>" name="spec4" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <label style="margin-right: 10px;"><input name="spec4x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="红色"> 红色</label>
                        <label style="margin-right: 10px;"><input name="spec4x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="橙色"> 橙色</label>
                        <label style="margin-right: 10px;"><input name="spec4x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="黄色"> 黄色</label>
                        <label style="margin-right: 10px;"><input name="spec4x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="绿色"> 绿色</label>
                        <label style="margin-right: 10px;"><input name="spec4x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="蓝色"> 蓝色</label>
                        <label style="margin-right: 10px;"><input name="spec4x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="靛色"> 靛色</label>
                        <label style="margin-right: 10px;"><input name="spec4x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="紫色"> 紫色</label>
                        <label style="margin-right: 10px;"><input name="spec4x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="彩色"> 彩色</label>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格5：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$arrData['goods_id']?>" name="spec5" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <label style="margin-right: 10px;"><input name="spec5x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="红色"> 红色</label>
                        <label style="margin-right: 10px;"><input name="spec5x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="橙色"> 橙色</label>
                        <label style="margin-right: 10px;"><input name="spec5x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="黄色"> 黄色</label>
                        <label style="margin-right: 10px;"><input name="spec5x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="绿色"> 绿色</label>
                        <label style="margin-right: 10px;"><input name="spec5x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="蓝色"> 蓝色</label>
                        <label style="margin-right: 10px;"><input name="spec5x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="靛色"> 靛色</label>
                        <label style="margin-right: 10px;"><input name="spec5x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="紫色"> 紫色</label>
                        <label style="margin-right: 10px;"><input name="spec5x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="彩色"> 彩色</label>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格6：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$arrData['goods_id']?>" name="spec6" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <label style="margin-right: 10px;"><input name="spec6x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="红色"> 红色</label>
                        <label style="margin-right: 10px;"><input name="spec6x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="橙色"> 橙色</label>
                        <label style="margin-right: 10px;"><input name="spec6x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="黄色"> 黄色</label>
                        <label style="margin-right: 10px;"><input name="spec6x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="绿色"> 绿色</label>
                        <label style="margin-right: 10px;"><input name="spec6x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="蓝色"> 蓝色</label>
                        <label style="margin-right: 10px;"><input name="spec6x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="靛色"> 靛色</label>
                        <label style="margin-right: 10px;"><input name="spec6x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="紫色"> 紫色</label>
                        <label style="margin-right: 10px;"><input name="spec6x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="彩色"> 彩色</label>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格7：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text"  value="<?=$arrData['goods_id']?>" name="spec7" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <label style="margin-right: 10px;"><input name="spec7x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="红色"> 红色</label>
                        <label style="margin-right: 10px;"><input name="spec7x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="橙色"> 橙色</label>
                        <label style="margin-right: 10px;"><input name="spec7x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="黄色"> 黄色</label>
                        <label style="margin-right: 10px;"><input name="spec7x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="绿色"> 绿色</label>
                        <label style="margin-right: 10px;"><input name="spec7x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="蓝色"> 蓝色</label>
                        <label style="margin-right: 10px;"><input name="spec7x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="靛色"> 靛色</label>
                        <label style="margin-right: 10px;"><input name="spec7x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="紫色"> 紫色</label>
                        <label style="margin-right: 10px;"><input name="spec7x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="彩色"> 彩色</label>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格8：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text"  value="" name="spec8" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <label style="margin-right: 10px;"><input name="spec8x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="红色"> 红色</label>
                        <label style="margin-right: 10px;"><input name="spec8x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="橙色"> 橙色</label>
                        <label style="margin-right: 10px;"><input name="spec8x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="黄色"> 黄色</label>
                        <label style="margin-right: 10px;"><input name="spec8x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="绿色"> 绿色</label>
                        <label style="margin-right: 10px;"><input name="spec8x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="蓝色"> 蓝色</label>
                        <label style="margin-right: 10px;"><input name="spec8x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="靛色"> 靛色</label>
                        <label style="margin-right: 10px;"><input name="spec8x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="紫色"> 紫色</label>
                        <label style="margin-right: 10px;"><input name="spec8x[]" disabled="disabled" type="checkbox" style="margin-bottom: 5px;vertical-align: middle;" value="彩色"> 彩色</label>
                    </dd>
                </div>
            </dl>
            <div class="ncap-form-default">
                <div class="bot" style="padding: 12px 0 10px 30%;">
                    <input type="submit" name="btn" class="addSubmitBtn" value="确认提交">
                </div>
            </div>
    </form>
    <script>
        $(function () {
//            $("#spec1").blur(function(){
//                var spec1Val = $("#spec1");
//                if(spec1Val.value == ""){
//                    $('#color1').attr("disabled",true);
//                }
//                else{
//                    $('#color1 input').attr("disabled",false);
//                }
//            });


            $(document).on("blur",'.goods-spec-input',function(){
                var specVal = $(this).val();
                if(specVal){
                    $(this).parents(".row").find("input:checkbox").attr("disabled",false);
                }else{
                    $(this).parents(".row").find("input:checkbox").attr("disabled",true);
                }
            });


        });
    </script>
</div>
</body>


