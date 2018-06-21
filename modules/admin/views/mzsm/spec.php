<?php
use yii\helpers\Html;
use yii\helpers\Url;
$session = Yii::$app->session;
$url = Url::to("@web/web/admin/Static");
$arr = ['红色','橙色','黄色','绿色','蓝色','靛色','紫色','彩色'];
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
    <form action="?r=admin/mzsm/spec" method="post" enctype="multipart/form-data" id="addEditGoodsForm">
        <!--通用信息-->
        <div class="ncap-form-default tab_div_1">
            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品信息：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" required value="<?=$id?>"  style="width: 20px; float: left;" name="goods_id" class="input-txt" readonly>
                        <input type="text" required value="<?=$name?>" style="width: 250px;" name="goods_name" class="input-txt" readonly>
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
                        <input type="text" id="spec1" value="<?=$data['x1']['spec1']?>" name="spec1" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div class="specRightBox" style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <?php
                        $str = '';
                        for ($i=0;$i<count($arr);$i++){
                            if(!is_null($data['x1']['spec1x']) && in_array($arr[$i],$data['x1']['spec1x'])){
                                $str .= "<label style='margin-right: 10px;'><input name='spec1x[]' disabled='disabled' type='checkbox' checked style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }else{
                                $str .= "<label style='margin-right: 10px;'><input name='spec1x[]' disabled='disabled' type='checkbox'  style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }
                        }
                        echo $str;
                        ?>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格2：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$data['x2']['spec2']?>" name="spec2" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div class="specRightBox" style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <?php
                        $str = '';
                        for ($i=0;$i<count($arr);$i++){
                            if(!is_null($data['x2']['spec2x']) && in_array($arr[$i],$data['x2']['spec2x'])){
                                $str .= "<label style='margin-right: 10px;'><input name='spec2x[]' disabled='disabled' type='checkbox' checked style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }else{
                                $str .= "<label style='margin-right: 10px;'><input name='spec2x[]' disabled='disabled' type='checkbox'  style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }
                        }
                        echo $str;
                        ?>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格3：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$data['x3']['spec3']?>" name="spec3" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div class="specRightBox" style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <?php
                        $str = '';
                        for ($i=0;$i<count($arr);$i++){
                            if(!is_null($data['x3']['spec3x']) && in_array($arr[$i],$data['x3']['spec3x']) ){
                                $str .= "<label style='margin-right: 10px;'><input name='spec3x[]' disabled='disabled' type='checkbox' checked style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }else{
                                $str .= "<label style='margin-right: 10px;'><input name='spec3x[]' disabled='disabled' type='checkbox'  style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }
                        }
                        echo $str;
                        ?>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格4：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$data['x4']['spec4']?>" name="spec4" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div class="specRightBox" style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <?php
                        $str = '';
                        for ($i=0;$i<count($arr);$i++){
                            if(!is_null($data['x4']['spec4x']) && in_array($arr[$i],$data['x4']['spec4x'])){
                                $str .= "<label style='margin-right: 10px;'><input name='spec4x[]' disabled='disabled' type='checkbox' checked style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }else{
                                $str .= "<label style='margin-right: 10px;'><input name='spec4x[]' disabled='disabled' type='checkbox'  style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }
                        }
                        echo $str;
                        ?>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格5：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$data['x5']['spec5']?>" name="spec5" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div class="specRightBox" style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <?php
                        $str = '';
                        for ($i=0;$i<count($arr);$i++){
                            if(!is_null($data['x5']['spec5x']) && in_array($arr[$i],$data['x5']['spec5x'])){
                                $str .= "<label style='margin-right: 10px;'><input name='spec5x[]' disabled='disabled' type='checkbox' checked style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }else{
                                $str .= "<label style='margin-right: 10px;'><input name='spec5x[]' disabled='disabled' type='checkbox'  style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }
                        }
                        echo $str;
                        ?>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格6：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="<?=$data['x6']['spec6']?>" name="spec6" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div class="specRightBox" style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <?php
                        $str = '';
                        for ($i=0;$i<count($arr);$i++){
                            if(!is_null($data['x6']['spec6x']) && in_array($arr[$i],$data['x6']['spec6x'])){
                                $str .= "<label style='margin-right: 10px;'><input name='spec6x[]' disabled='disabled' type='checkbox' checked style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }else{
                                $str .= "<label style='margin-right: 10px;'><input name='spec6x[]' disabled='disabled' type='checkbox'  style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }
                        }
                        echo $str;
                        ?>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格7：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text"  value="<?=$data['x7']['spec7']?>" name="spec7" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div class="specRightBox" style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <?php
                        $str = '';
                        for ($i=0;$i<count($arr);$i++){
                            if(!is_null($data['x7']['spec7x']) && in_array($arr[$i],$data['x7']['spec7x'])){
                                $str .= "<label style='margin-right: 10px;'><input name='spec7x[]' disabled='disabled' type='checkbox' checked style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }else{
                                $str .= "<label style='margin-right: 10px;'><input name='spec7x[]' disabled='disabled' type='checkbox'  style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }
                        }
                        echo $str;
                        ?>
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <div style="width: 30%;display: inline-block;">
                    <dt class="tit">
                        <label>商品规格8：</label>
                    </dt>
                    <dd class="opt">
                        <input type="text"  value="<?=$data['x8']['spec8']?>" name="spec8" class="input-txt goods-spec-input">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </div>
                <div class="specRightBox" style="width: 40%;display: inline-block;">
                    <dt class="tit">
                        <label>商品颜色：</label>
                    </dt>
                    <dd class="opt">
                        <?php
                        $str = '';
                        for ($i=0;$i<count($arr);$i++){
                            if(!is_null($data['x8']['spec8x']) && in_array($arr[$i],$data['x8']['spec8x'])){
                                $str .= "<label style='margin-right: 10px;'><input name='spec8x[]' disabled='disabled' type='checkbox' checked style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }else{
                                $str .= "<label style='margin-right: 10px;'><input name='spec8x[]' disabled='disabled' type='checkbox'  style='margin-bottom: 5px;vertical-align: middle;' value='".$arr[$i]."'> ".$arr[$i]."</label> ";
                            }
                        }
                        echo $str;
                        ?>
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
            verifyAddDisabled();
            $(document).on("blur",'.goods-spec-input',function(){
                verifyAddDisabled();
            });
            /*$(document).on("blur",'.goods-spec-input',function(){
                var specVal = $(this).val();
                if(specVal){
                    $(this).parents(".row").find("input:checkbox").attr("disabled",false);
                }else{
                    $(this).parents(".row").find("input:checkbox").attr("disabled",true);
                }
            });*/

        });
        function verifyAddDisabled(){

            $.each($(".row"),function(i,obj){
//                console.log(obj);
                var specInputVal = $(obj).find(".goods-spec-input").val();
                var specBox = $(obj).find(".specRightBox");
                if(specInputVal== ''){
                    specBox.find("input:checkbox").attr("disabled",true);
                }else{
                    specBox.find("input:checkbox").attr("disabled",false);
                }
            });

        }

    </script>
</div>
</body>


