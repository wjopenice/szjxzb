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
    <title>添加商品</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/Ueditor/ueditor.config.js")?>
    <?= Html::jsFile("{$url}/Js/common/Ueditor/ueditor.all.min.js")?>
    <?= Html::jsFile("{$url}/Js/common/ajaxupload.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
    <?= Html::jsFile("{$url}/Js/goods/add.js")?>
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
                <li>请务必正确填写商品信息.</li>
            </ul>
        </div>
        <form action="?r=admin/goods/add" method="post" id="addEditGoodsForm">
            <!-- <input type="hidden" value="" name="is_distribut" class="input-txt"> -->
            <!--通用信息-->
            <div class="ncap-form-default tab_div_1">
                <dl class="row">
                    <dt class="tit">
                        <label>商品名称</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" required value="" name="goods_name" class="input-txt">
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品简介</label>
                    </dt>
                    <dd class="opt">
                        <textarea rows="3" cols="80" required name="goods_remark" class="input-txt"></textarea>
                        <span id="err_goods_remark" class="err"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品货号</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="" name="goods_sn" class="input-txt">
                        <span class="err" id="err_goods_sn"></span>
                        <p class="notic">如果不填会自动生成</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>SPU</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="" name="SPU" class="input-txt">
                        <span class="err" id="err_SPU"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>SKU</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="" name="SKU" class="input-txt">
                        <span class="err" id="err_SKU"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品分类</label>
                    </dt>
                    <dd class="opt">
                        <select id="cat_id"  class="small form-control">
                            <option value="0" selected="selected">请选择商品分类</option>
                            <?php foreach ($cate_arr as $cate): ?>   
                                <option value="<?=$cate['id']?>"><?=$cate['name']?></option>
                            <?php endforeach; ?> 
                        </select>
                        <select id="cat_id_2" class="small form-control">
                            <option value="0">请选择商品分类</option>
                        </select>
                        <select name="cat_id_3" id="cat_id_3" class="small form-control" >
                            <option value="0">请选择商品分类</option>
                        </select>
                        <span class="err" id="err_cat_id"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>供应商</label>
                    </dt>
                    <dd class="opt">
                        <select name="suppliers_id" id="suppliers_id" class="small form-control">
                            <option value="0" selected="selected">不指定供应商属于本店商品</option>
                            <option value=""></option>
                        </select>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>本店售价</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" required value="" name="shop_price" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                        <span class="err" id="err_shop_price"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>市场价</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" required value="" name="market_price" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                        <span class="err" id="err_market_price"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>成本价</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="" name="cost_price" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" >
                        <span class="err" id="err_cost_price"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>佣金</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="" name="commission" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" >
                        <span class="err" id="err_commission"></span>
                        <p class="notic">用于分销的分成金额</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>图片上传</label>
                    </dt>
                    <dd class="opt">
                        <div class="input-file-show">
                            <span class="show">
                                <a id="img_a" target="_blank" class="nyroModal" rel="gal" href="javascript:void(0)">
                                    <i id="img_i" class="fa fa-picture-o"></i>
                                </a>
                            </span>
                            <span class="type-file-box" id="changeBox">
                                <input type="hidden" id="imagetext" name="original_img" value="" class="type-file-text">
                                <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                                <input class="type-file-file" type="file" name="file" size="30" hidefocus="true" nc_type="change_site_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                            </span>
                        </div>
                        <span class="err"></span>
                        <p class="notic">请上传图片格式文件</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品重量</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="0" name="weight" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" >
                        <span class="err" id="err_weight"></span>
                        <p class="notic"> 务必设置商品重量, 用于计算物流费.以克为单位</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品体积</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="0" name="volume" class="t_mane" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" >
                        <span class="err" id="err_volume"></span>
                        <p class="notic"> 务必设置商品体积, 用于计算物流费.以立方米为单位</p>
                    </dd>
                </dl>
                <dl class="row goods_shipping">
                    <dt class="tit">
                        <label>是否包邮</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label id="is_free_shipping_label_1" for="is_free_shipping1" class="cb-enable">是</label>
                            <label id="is_free_shipping_label_0" for="is_free_shipping0" class="cb-disable selected">否</label>
                            <input id="is_free_shipping1" class="is_free_shipping" name="is_free_shipping" value="1" type="radio">
                            <input id="is_free_shipping0" class="is_free_shipping" name="is_free_shipping" value="0" type="radio" checked="checked">
                            <div class="freight_template hide">
                                <span>运费模板</span>
                                <select name="template_id">
                                    <option value="0" selected="selected">请选择运费模板</option>
                                    <option value=""></option>
                                </select>
                                <empty name="freight_template"><span style="color: red;">没有可选的运费模板，请前去<a href="javascript:void(0)" target="_blank">添加</a></span></empty>
                            </div>
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>总库存</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" required value="" class="t_mane" name="store_count" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                        <span class="err" id="err_store_count"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品关键词</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" required value="" name="keywords" class="input-txt">
                        <span class="err" id="err_keywords"></span>
                        <p class="notic">多个关键词，用空格隔开</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>是否为虚拟商品</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label id="is_V1" for="is_virtual1" class="cb-enable">是</label>
                            <label id="is_V0" for="is_virtual0" class="cb-disable selected">否</label>
                            <input class="is_virtual" id="is_virtual1" name="is_virtual" value="1" type="radio">
                            <input class="is_virtual" id="is_virtual0" name="is_virtual" value="0" type="radio" checked="checked">
                        </div>
                        <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row virtual hide">
                    <dt class="tit">
                        <label>虚拟商品有效期至</label>
                    </dt>
                    <dd class="opt virtual">
                        <input id="virtual_indate" name="virtual_indate" value="" class="input-txt" type="text">
                        <span class="err" id="err_virtual_indate"></span>
                        <p class="notic">虚拟商品可兑换的有效期，过期后商品不能购买，电子兑换码不能使用。</p>
                    </dd>
                </dl>
                <dl class="row virtual hide">
                    <dt class="tit">
                        <label>虚拟商品购买上限</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="" class="t_mane" name="virtual_limit" onKeyUp="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" onblur="checkInputNum(this.name,1,10,'',1);" >
                        <span class="err" id="err_virtual_limit"></span>
                        <p class="notic">请填写1~10之间的数字，虚拟商品最高购买数量不能超过10个。</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品详情描述</label>
                    </dt>
                    <dd class="opt">
                        <textarea class="span12 ckeditor" id="goods_content" name="goods_content" title=""></textarea>
                        <span class="err" id="err_goods_content"></span>
                    </dd>
                </dl>
            </div>
            <!-- <div class="ncap-form-default">
                <div class="bot">
                    <a href="JavaScript:void(0);" class="addSubmitBtn" onClick="ajax_submit_form()">确认提交</a>
                </div>
            </div> -->
            <div class="ncap-form-default">
                <div class="bot">
                    <input type="submit" class="addSubmitBtn" value="确认提交">
                </div>
            </div>
         </form>
    </div>
</body>


