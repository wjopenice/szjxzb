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
    <title>商品列表</title>
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
                <h5>商城所有商品索引及管理</h5>
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
            <li>商品管理注意发布商品后清理缓存.</li>
            <li>商品缩列图也有缓存.</li>
        </ul>
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
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="sign" axis="col6" onclick="checkAllSign(this)">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </th>
                            <th align="left" abbr="article_title" axis="col6" class="">
                                <div style=" width:65px;" class="">操作</div>
                            </th>
                            <th align="left" abbr="article_title" axis="col6" class="">
                                <div style="width:50px;" class="" onClick="sort('goods_id');">id</div>
                            </th>
                            <th align="left" abbr="ac_id" axis="col4" class="">
                                <div style=" width: 300px;" class="" onClick="sort('goods_name');">商品名称</div>
                            </th>
                            <th align="center" abbr="article_show" axis="col6" class="">
                                <div style="width: 100px;" class="ta_c" onClick="sort('goods_sn');">货号</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 100px;" class="ta_c" onClick="sort('cat_id');">分类</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 53px;" class="ta_c" onClick="sort('shop_price');">价格</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 32px;" class="ta_c" onClick="sort('is_recommend');">推荐</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 32px;" class="ta_c" onClick="sort('is_new');">新品</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style=" width: 32px;" class="ta_c" onClick="sort('is_hot');">热卖</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 52px;" class="ta_c" onClick="sort('is_on_sale');">上/下架</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 52px;" class="ta_c" onClick="sort('store_count');">库存</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 52px;" class="ta_c" onClick="sort('sort');">排序</div>
                            </th>
                            <th style="" axis="col7">
                                <div></div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="tDiv">
            <div class="tDiv2">
                <div class="fbutton">
                    <a id="add" href="javascript:window.parent.window.f_addTab('add','添加商品','?r=admin/goods/add')">
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
                        <div class="add" title="批量删除" id="batchDel">
                            <span>批量删除</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="bDiv">
            <div id="flexigrid">
                <table>
                   <?php foreach ($arrData as $list): ?>   
                    <tr data-id="<?=$list['goods_id']?>">
                        <td class="sign" axis="col6">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </td>
                        <td class="handle">
                            <div style="width:60px;">
                                <span class="btn"><em><i class="fa fa-cog"></i>设置<i class="arrow"></i></em>
                                    <ul>
                                        <li><a target="_blank" href="javascript:void(0)">预览商品</a></li>
                                        <li><a href="javascript:void(0)">编辑商品</a></li>
                                        <li><a href="javascript:void(0);" onclick="publicHandle('143','del')">删除商品</a></li>
                                        <li><a href="javascript:void(0);" onclick="ClearGoodsThumb('143')">清除缩略图缓存</a></li>
                                    </ul>
                                </span>
                            </div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 50px;"><?=$list['goods_id']?></div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 300px;overflow:hidden;"><?=$list['goods_name']?></div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 100px;" class="ta_c"><?=$list['goods_sn']?></div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 95px;" class="ta_c"><?=$list['name']?></div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 50px;" class="ta_c"><?=$list['shop_price']?></div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 30px;" class="ta_c">
                                <?php if($list['is_recommend']){?>
                                <span class="yes" onclick='changeTableVal("goods","goods_id","<?=$list['goods_id']?>","is_recommend",this)'>
                                        <i class="fa fa-check-circle"></i>是
                                </span>
                                <?php }else{?>
                                <span class="no" onclick='changeTableVal("goods","goods_id","<?=$list['goods_id']?>","is_recommend",this)'>
                                        <i class="fa fa-ban"></i>否
                                </span>
                                <?php }?>
                            </div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 30px;" class="ta_c">
                                <?php if($list['is_new']){?>
                                <span class="yes" onclick='changeTableVal("goods","goods_id","<?=$list['goods_id']?>","is_new",this)'>
                                    <i class="fa fa-check-circle"></i>是
                                </span>
                                <?php }else{?>
                                <span class="no" onclick='changeTableVal("goods","goods_id","<?=$list['goods_id']?>","is_new",this)'>
                                    <i class="fa fa-ban"></i>否
                                </span>
                                <?php }?>
                            </div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 30px;" class="ta_c">
                                <?php if($list['is_hot']){?>
                                <span class="yes" onclick='changeTableVal("goods","goods_id","<?=$list['goods_id']?>","is_hot",this)'>
                                    <i class="fa fa-check-circle"></i>是
                                </span>
                                <?php }else{?>
                                <span class="no" onclick='changeTableVal("goods","goods_id","<?=$list['goods_id']?>","is_hot",this)'>
                                    <i class="fa fa-ban"></i>否 
                                </span>
                                <?php }?>
                            </div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 50px;" class="ta_c">
                                <?php if($list['is_on_sale']){?>
                                <span class="yes" onclick='changeTableVal("goods","goods_id","<?=$list['goods_id']?>","is_on_sale",this)'>
                                    <i class="fa fa-check-circle"></i>是
                                </span>
                                <?php }else{?>
                                <span class="no" onclick='changeTableVal("goods","goods_id","<?=$list['goods_id']?>","is_on_sale",this)'>
                                    <i class="fa fa-ban"></i>否 
                                </span>
                                <?php }?>
                            </div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 50px;" class="ta_c"><?=$list['store_count']?></div>
                        </td>
                        <td align="center" axis="col0">
                            <div style="width: 50px;" class="ta_c">
                                <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onblur="changeTableVal('goods','goods_id','143','sort',this)" size="4" value="<?=$list['sort']?>">
                            </div>
                        </td>
                        <td class="" style="width: 100%;">
                            <div>&nbsp;</div>
                        </td>
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