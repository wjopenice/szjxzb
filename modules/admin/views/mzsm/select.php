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
    <title>商品管理</title>
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
    <?= Html::jsFile("{$url}/Js/goods/list.js")?>

</head>
<body>

<div class="page">
    <!--  标题栏   -->
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>商品管理</h3>
                <h5>商品管理</h5>
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
    </div>
    <!--  表格     -->
    <div class="flexigrid">
        <div class="mDiv">
            <div class="ftitle">
                <h3>商品列表</h3><h5></h5>
            </div>
            <a href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
            <form action="" id="search-form2" class="form-inline fr" method="post" onSubmit="return false">
                <div class="sDiv">
                    <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                    <div class="sDiv2">
                        <select name="cat_id" id="cat_id" class="select">
                            <option value="">所有分类</option>
                            <?php foreach ($typeList as $type): ?>
                                <option value="<?=$type['id']?>"><?=$type['name']?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="brand_id" id="brand_id" class="select">
                            <option value="">所有品牌</option>
                            <option value=""></option>
                        </select>
                        <select name="is_on_sale" id="is_on_sale" class="select">
                            <option value="0">全部</option>
                            <option value="2">上架</option>
                            <option value="1">下架</option>
                        </select>
                        <select name="intro" class="select" id="intro">
                            <option value="0">全部</option>
                            <option value="is_new">新品</option>
                            <option value="is_recommend">推荐</option>
                        </select>

                        <!--排序规则-->
                        <input type="hidden" name="orderby1" value="goods_id">
                        <input type="hidden" name="orderby2" value="desc" >
                        <input type="text" size="30" name="key_word" class="qsbox" placeholder="搜索词...">
                        <input type="button" onClick="ajax_get_table('search-form2',1)" class="btn" value="搜索">
                    </div>
                </div>
            </form>
        </div>
        <?php if($session->get('username') != "test"):?>
        <div class="tDiv">
            <div class="tDiv2">
                <div class="fbutton">
                    <a href="?r=admin/mzsm/insert">
                        <div class="add" title="添加商品">
                            <span>添加商品</span>
                        </div>
                    </a>
                </div>
                <div class="fbutton">
                    <a href="javascript:void(0)">
                        <div class="add" title="初始化商品搜索关键词">
                            <span>初始化商品搜索关键词</span>
                        </div>
                    </a>
                </div>
                <div class="fbutton">
                    <a href="javascript:void(0)">
                        <div class="add" title="批量删除">
                            <span>批量删除</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0" style="width: 100%;">
                    <thead>
                    <tr>
                        <th align="left"  style="width: 60px;" class="">
                            <div class="ta_c">商品id</div>
                        </th>
                        <th align="left"  style="width: 60px;" class="">
                            <div class="ta_c">分类id</div>
                        </th>
                        <th align="left"  style="width: 60px;" class="">
                            <div class="ta_c">品牌id</div>
                        </th>
                        <th align="left"  style="width: 120px;" class="">
                            <div class="ta_c">商品编号</div>
                        </th>
                        <th align="left"  style="width: 120px;" class="">
                            <div class="ta_c">商品名称</div>
                        </th>
                        <th align="left"  style="width: 100px;" class="">
                            <div class="ta_c">本店价</div>
                        </th>
                        <th align="left"  style="width: 100px;" class="">
                            <div class="ta_c">商品上架时间</div>
                        </th>
                        <th align="left"  style="width: 60px;" class="">
                            <div class="ta_c">库存数量</div>
                        </th>
                        <th align="left"  style="width: 60px;" class="">
                            <div class="ta_c">点击数</div>
                        </th>
                        <th align="left" style="width: 60px;" class="">
                            <div class="ta_c">是否热卖</div>
                        </th>
                        <th align="left" style="width: 60px;" class="">
                            <div class="ta_c">是否推荐</div>
                        </th>
                        <th align="left" style="width: 60px;" class="">
                            <div class="ta_c">商品排序</div>
                        </th>
                        <th align="left" style="width: 200px;" class="">
                            <div class="ta_c">操作</div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="bDiv">
            <div id="flexigrid">
                <table>
                        <?php foreach ($arrData as $key=>$value): ?>
                        <tr>
                            <td align="center" style="width: 87px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['goods_id']?></td>
                            <td align="center" style="width: 86px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['mzsm_cat_id']?></td>
                            <td align="center" style="width: 86px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['mzsm_brand_id']?></td>
                            <td align="center" style="width: 173px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['goods_sn']?></td>
                            <td align="center" style="width: 174px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=mb_substr($value['goods_name'],0,15)?></td>
                            <td align="center" style="width: 145px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['shop_price']?></td>
                            <td align="center" style="width: 145px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['on_time']?></td>
                            <td align="center" style="width: 92px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['store_count']?></td>
                            <td align="center" style="width: 92px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['click_count']?></td>
                            <td align="center" style="width: 92px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['is_hot']?></td>
                            <td align="center" style="width: 92px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['is_recommend']?></td>
                            <td align="center" style="width: 92px;text-align: center;height: 36px;line-height: 36px;" valign="middle"><?=$value['sort']?></td>
                            <?php if($session->get('username') != "test"):?>
                                <td align="center" style="width: 292px;text-align: center;height: 36px;line-height: 36px;" valign="middle">
                                    <a href="?r=admin/mzsm/update&id=<?=$value['goods_id']?>">修改</a> |
                                    <a href="?r=admin/mzsm/pic&id=<?=$value['goods_id']?>&name=<?=mb_substr($value['goods_name'],0,15)?>">编辑图片</a> |
                                    <a href="?r=admin/mzsm/spec&id=<?=$value['goods_id']?>&name=<?=mb_substr($value['goods_name'],0,15)?>">修改规格</a> |
                                    <a href="?r=admin/mzsm/property&id=<?=$value['goods_id']?>&name=<?=mb_substr($value['goods_name'],0,15)?>">修改属性</a> |
                                    <a href="?r=home/index/goodsdetail&id=<?=$value['goods_id']?>" target="_blank">预览</a>
                                </td>
                            <?php else: ?>
                                <td align="center" style="width: 292px;text-align: center;height: 36px;line-height: 36px;" valign="middle">
                                    <a href="?r=home/index/goodsdetail&id=<?=$value['goods_id']?>" target="_blank">预览</a>
                                </td>
                            <?php endif; ?>

                        </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="pDiv">
            <?php echo $pageShow;?>
        </div>
    </div>
</div>

</body>
</html>