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
            <li>请务必正确填写信息.</li>
        </ul>
    </div>
    <form action="?r=admin/mzsm/edit" method="post" enctype="multipart/form-data" id="addEditGoodsForm">

        <!--通用信息-->
        <div class="ncap-form-default tab_div_1">
            <input type="hidden" name="goods_id" value="<?=$arrData['goods_id']?>" />
            <dl class="row">
                <dt class="tit">
                    <label>分类id</label>
                </dt>
                <dd class="opt">
                    <select name="mzsm_cat_id">
                        <?php foreach ($catData as $k=>$catlist): ?>
                            <?php if($catlist['id'] == $arrData['mzsm_cat_id']): ?>
                                <option value="<?=$catlist['id']?>" selected><?=$catlist['name']?></option>
                            <?php else: ?>
                                <option value="<?=$catlist['id']?>"><?=$catlist['name']?></option>
                            <?php endif; ?>
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
                    <input type="text" required value="<?=$arrData['mzsm_img_id']?>" name="mzsm_img_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品评论id</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['mzsm_comment_id']?>" name="mzsm_comment_id" class="input-txt">
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
                            <?php if($brandlist['id'] == $arrData['mzsm_brand_id']): ?>
                                <option value="<?=$brandlist['id']?>" selected><?=$brandlist['name']?></option>
                            <?php else: ?>
                                <option value="<?=$brandlist['id']?>"><?=$brandlist['name']?></option>
                            <?php endif; ?>
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
                    <input type="text" required value="<?=$arrData['goods_name']?>" name="goods_name" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>点击数</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['click_count']?>" name="click_count" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>库存数量</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['store_count']?>" name="store_count" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品重量</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['weight']?>" name="weight" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品体积</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['volume']?>" name="volume" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>市场价</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['market_price']?>" name="market_price" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>本店价</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['shop_price']?>" name="shop_price" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品成本价</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['cost_price']?>" name="cost_price" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品关键词</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['keywords']?>" name="keywords" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品简单描述</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['goods_remark']?>" name="goods_remark" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>手机端商品详情</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['mobile_content']?>" name="mobile_content" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否为虚拟商品</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_virtual" value="1" <?php if($arrData['is_virtual'] == 1){ echo "checked"; } ?> >是
                    <input type="radio" name="is_virtual" value="0" <?php if($arrData['is_virtual'] == 0){ echo "checked"; } ?> >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否允许过期退款</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="virtual_refund" value="1" <?php if($arrData['virtual_refund'] == 1){ echo "checked"; } ?> >是
                    <input type="radio" name="virtual_refund" value="0" <?php if($arrData['virtual_refund'] == 0){ echo "checked"; } ?> >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否上架</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_on_sale" value="1" <?php if($arrData['is_on_sale'] == 1){ echo "checked"; } ?> >是
                    <input type="radio" name="is_on_sale" value="0" <?php if($arrData['is_on_sale'] == 0){ echo "checked"; } ?> >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否包邮</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_free_shipping" value="1" <?php if($arrData['is_free_shipping'] == 1){ echo "checked"; } ?> >是
                    <input type="radio" name="is_free_shipping" value="0" <?php if($arrData['is_free_shipping'] == 0){ echo "checked"; } ?> >否
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
                    <input type="number" required value="<?=$arrData['sort']?>" name="sort" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否推荐</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_recommend" value="1" <?php if($arrData['is_recommend'] == 1){ echo "checked"; } ?> >是
                    <input type="radio" name="is_recommend" value="0" <?php if($arrData['is_recommend'] == 0){ echo "checked"; } ?> >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否新品</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_new" value="1" <?php if($arrData['is_new'] == 1){ echo "checked"; } ?> >是
                    <input type="radio" name="is_new" value="0" <?php if($arrData['is_new'] == 0){ echo "checked"; } ?> >否
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>是否热卖</label>
                </dt>
                <dd class="opt">
                    <input type="radio" name="is_hot" value="1" <?php if($arrData['is_hot'] == 1){ echo "checked"; } ?> >是
                    <input type="radio" name="is_hot" value="0" <?php if($arrData['is_hot'] == 0){ echo "checked"; } ?> >否
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
                            <?php if($typelist['name'] == $arrData['mzsm_type_id']): ?>
                                <option value="<?=$typelist['id']?>" selected><?=$typelist['name']?></option>
                            <?php else: ?>
                                <option value="<?=$typelist['id']?>"><?=$typelist['name']?></option>
                            <?php endif; ?>
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
                    <input type="text" required value="<?=$arrData['mzsm_spec_id']?>" name="mzsm_spec_id" class="input-txt">
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
                    <input type="text" required value="<?=$arrData['exchange_integral']?>" name="exchange_integral" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>供货商ID</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['mzsm_suppliers_id']?>" name="mzsm_suppliers_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>商品销量</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['sales_sum']?>" name="sales_sum" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>活动类型</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['prom_type']?>" name="prom_type" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>优惠活动id</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['prom_id']?>" name="prom_id" class="input-txt">
                    <span class="err" id="err_goods_name"></span>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>运费模板ID</label>
                </dt>
                <dd class="opt">
                    <input type="text" required value="<?=$arrData['template_id']?>" name="template_id" class="input-txt">
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


