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
            <li>1.添加产品成功自动添加当前产品的默认图片参数</li>
            <li>2.添加产品成功自动添加当前产品的默认规格参数</li>
            <li>3.添加产品成功自动添加当前产品的默认属性参数</li>
        </ul>
    </div>
    <form action="?r=admin/mzsm/add" method="post" enctype="multipart/form-data" id="addEditGoodsForm">

        <!--通用信息-->
        <div class="ncap-form-default tab_div_1">
            <dl class="row">
                <dt class="tit">
                    <label>分类id</label>
                </dt>
                <dd class="opt">
                    <select name="mzsm_cat_id">
                        <?php foreach ($catData as $k=>$catlist): ?>
                        <option value="<?=$catlist['id']?>"><?=$catlist['name']?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品图片ID</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value=" " name="mzsm_img_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品评论id</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="mzsm_comment_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>品牌id</label>
                </dt>
                <dd class="opt">
                    <select name="mzsm_brand_id">
                        <?php foreach ($brandData as $k=>$brandlist): ?>
                            <option value="<?=$brandlist['id']?>"><?=$brandlist['name']?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
<!--            <dl class="row">-->
<!--                <dt class="tit">-->
<!--                    <label>商品编号</label>-->
<!--                </dt>-->
<!--                <dd class="opt">-->
<!--                    <input type="text" required value="" name="goods_sn" class="input-txt">-->
<!--                    <span class="err" id="err_goods_name"></span>-->
<!--                </dd>-->
<!--            </dl>-->
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
                    <label>点击数</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="300" name="click_count" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>库存数量</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="store_count" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品重量</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="weight" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品体积</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="volume" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>市场价</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0.00" name="market_price" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>本店价</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0.00" name="shop_price" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品成本价</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0.00" name="cost_price" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品关键词</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="" name="keywords" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品简单描述</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="" name="goods_remark" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>手机端商品详情</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="" name="mobile_content" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否为虚拟商品</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_virtual" value="1">是
                    <input type="radio" name="is_virtual" value="0" checked>否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否允许过期退款</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="virtual_refund" value="1" checked>是
                    <input type="radio" name="virtual_refund" value="0" >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否上架</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_on_sale" value="1" checked>是
                    <input type="radio" name="is_on_sale" value="0" >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否包邮</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_free_shipping" value="1" checked>是
                    <input type="radio" name="is_free_shipping" value="0" >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
<!--            <dl class="row">-->
<!--                <dt class="tit">-->
<!--                    <label>商品上架时间</label>-->
<!--                </dt>-->
<!--                <dd class="opt">-->
<!--                    <input type="text" required value="" name="on_time" class="input-txt">-->
<!--                    <span class="err" id="err_goods_name"></span>-->
<!--                </dd>-->
<!--            </dl>-->
            <dl class="row">
                <dt class="tit">
                    <label>商品排序</label>
                </dt>
                <dd class="opt">
                    <input type="number" required value="0" name="sort" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否推荐</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_recommend" value="1" checked>是
                    <input type="radio" name="is_recommend" value="0" >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否新品</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_new" value="1" checked>是
                    <input type="radio" name="is_new" value="0" >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否热卖</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_hot" value="1" checked>是
                    <input type="radio" name="is_hot" value="0" >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
<!--            <dl class="row">-->
<!--                <dt class="tit">-->
<!--                    <label>最后更新时间</label>-->
<!--                </dt>-->
<!--                <dd class="opt">-->
<!--                    <input type="text" required value="" name="last_update" class="input-txt">-->
<!--                    <span class="err" id="err_goods_name"></span>-->
<!--                </dd>-->
<!--            </dl>-->
            <dl class="row">
                <dt class="tit">
                    <label>商品所属类型id</label>
                </dt>
                <dd class="opt">
                    <select name="mzsm_type_id">
                        <?php foreach ($typeData as $k=>$typelist): ?>
                            <option value="<?=$typelist['id']?>"><?=$typelist['name']?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品规格类型</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="mzsm_spec_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
<!--            <dl class="row">-->
<!--                <dt class="tit">-->
<!--                    <label>购买商品赠送积分</label>-->
<!--                </dt>-->
<!--                <dd class="opt">-->
<!--                    <input type="text" required value="" name="give_integral" class="input-txt">-->
<!--                    <span class="err" id="err_goods_name"></span>-->
<!--                </dd>-->
<!--            </dl>-->
            <dl class="row">
                <dt class="tit">
                    <label>积分兑换</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="exchange_integral" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>供货商ID</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="mzsm_suppliers_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品销量</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="sales_sum" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>活动类型</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="prom_type" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>优惠活动id</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="prom_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>运费模板ID</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="0" name="template_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
        </div>
        <div class="ncap-form-default">
            <div class="bot">
                <input type="submit" name="btn" class="addSubmitBtn" value="确认提交">
            </div>
        </div>
    </form>

</div>

</body>


