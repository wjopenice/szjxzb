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
    <title>退款单详情</title>
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
        <div class="item-title cf">
            <div class="subject fl">
                <h3>已付款并取消单列表</h3>
            </div>
        </div>
    </div>
    <!--  操作提示  -->
    <div id="explanation" class="explanation">
        <div id="checkZoom" class="title">
            <i class="fa pressIcon"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span title="收起提示"></span>
        </div>
        <ul>
            <li>未发货时用户操作取消的订单</li>
            <li>已付款并取消订单列表</li>
        </ul>
    </div>
    <!--  表格     -->
    <div class="flexigrid">
        <div class="mDiv cf">
            <div class="ftitle fl">
                <h3>取消退款单列表</h3><h5>(共45条记录)</h5>
            </div>
            <a class="fl" href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
            <form class="navbar-form form-inline fr" method="get">
                <input type="hidden" name="ctime" value="{$ctime}">
                <div class="sDiv">
                    <div class="sDiv2">
                        <input size="30" placeholder="收货人" value="" name="goods_name" class="qsbox" type="text">
                    </div>
                    <div class="sDiv2">
                        <input size="30" placeholder="订单编号" value="" name="goods_name" class="qsbox" type="text">
                    </div>
                    <div class="sDiv2">
                        <input size="30" placeholder="联系电话" value="" name="goods_name" class="qsbox" type="text">
                    </div>
                    <div class="sDiv2">
                        <input class="btn" value="搜索" type="submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0" style="width: 100%;">
                    <tr class="cf">
                        <th class="sign fl" axis="col6" onclick="checkAllSign(this)">
                            <div style="width: 26px;"><i class="ico-check"></i></div>
                        </th>
                        <th align="center" abbr="article_title" axis="col6" class="fl">
                            <div style=" width:150px;" class="ta_c">订单编号</div>
                        </th>
                        <th align="center" abbr="ac_id" axis="col4" class="fl">
                            <div style=" width: 130px;" class="ta_c">下单时间</div>
                        </th>
                        <th align="center" abbr="ac_img" axis="col10" class="fl">
                            <div style=" width: 130px;" class="ta_c">收货人</div>
                        </th>
                        <th align="center" abbr="article_show" axis="col6" class="fl">
                            <div style="width: 120px;" class="ta_c">联系电话</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="fl">
                            <div style="width: 100px;" class="ta_c">所选物流</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="fl">
                            <div style="width: 100px;" class="ta_c">物流费用</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col10" class="fl">
                            <div style="width: 140px;" class="ta_c">支付时间</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col10" class="fl">
                            <div style="width: 100px;" class="ta_c">订单总价</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col10" class="fl">
                            <div style="width: 100px;" class="ta_c">处理状态</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col10" class="fl">
                            <div style="width: 180px;" class="ta_c">操作</div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bDiv">
            <div class="allOrder">
                <table>
                    <tr>
                        <td class="sign" axis="col6">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 148px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">201702071145017310</div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 128px;">2017-02-07 11:45</div>
                        </td>
                        <td align="center" axis="col10">
                            <div class="ta_c" style="width: 128px;">张谷泉</div>
                        </td>
                        <td align="center" axis="col6" >
                            <div class="ta_c" style="width: 118px;">13512345678</div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 98px;">申通物流</div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 98px;">0.00</div>
                        </td>
                        <td align="center" axis="col10">
                            <div class="ta_c" style="width: 138px;">2017-02-07 11:45</div>
                        </td>
                        <td align="center" axis="col10">
                            <div class="ta_c" style="width: 98px;">0.00</div>
                        </td>
                        <td align="center" axis="col10">
                            <div class="ta_c" style="width: 98px;">已拒绝</div>
                        </td>
                        <td align="center" axis="col10">
                            <div class="ta_c" style="width: 178px;">
                                <a class="btn green btn-info" href="javascript:window.parent.window.f_addTab('details_refunds','退款单详情','?r=admin/order/details_refunds')" data-toggle="tooltip" title="" data-original-title="查看详情"><i class="fa fa-list-alt"></i>查看</a>
                            </div>
                        </td>
                        <td style="width: 100%;"><div>&nbsp;</div></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".tab-base li").click(function(){
            var index = $(this).index();
            $(".tab-base li").eq(index).addClass('current').siblings().removeClass('current');
            $(".allOrder").eq(index).addClass('cur').siblings().removeClass('cur');
        });
    });
</script>
</body>
</html>