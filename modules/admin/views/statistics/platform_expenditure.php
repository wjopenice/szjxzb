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
    <title>平台支出记录</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>

    <?= Html::jsFile("{$url}/Js/common/layer/laydate/laydate.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
    <?= Html::jsFile("{$url}/Js/statistics/platform_expenditure.js")?>

</head>
<body>

    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>支出日志</h3>
                    <h5>平台支出结算日志记录</h5>
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
                <li>平台支出记录包括会员体现，商家体现，订单退款的处理日志以及平台跟商家或会员之间其他协商的退款操作日志</li>
            </ul>
        </div>
        <!--  内容部分  -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>订单列表</h3>
                    <h5>(共<span>0</span>条记录)</h5>
                </div>
                <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
                <form class="navbar-form form-inline fr"  method="post" action=""  name="search-form2" id="search-form2">
                    <div class="sDiv">
                        <div class="sDiv2">
                            <input type="text" size="30" id="add_time_begin" name="add_time_begin" value="" class="qsbox"  placeholder="开始时间">
                        </div>
                        <div class="sDiv2">
                            <input type="text" size="30" id="add_time_end" name="add_time_end" value="" class="qsbox"  placeholder="结束时间">
                        </div>
                        <div class="sDiv2">
                            <input type="text" size="30" name="admin_id" class="qsbox" placeholder="管理员id">
                        </div>
                        <div class="sDiv2">
                            <input type="submit"  class="btn" value="搜索">
                        </div>
                    </div>
                </form>
            </div>
            <div class="hDiv">
                <div class="hDivBox" id="ajax_return">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th class="sign" axis="col0">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </th>
                            <th align="center" abbr="order_sn" axis="col3" class="">
                                <div style="width: 50px;" class="ta_l">记录id</div>
                            </th>
                            <th align="center" abbr="consignee" axis="col4" class="">
                                <div style="width: 100px;" class="ta_l">支出金额</div>
                            </th>
                            <th align="center" abbr="article_show" axis="col5" class="">
                                <div style="width: 100px;" class="ta_c">支出类型</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 60px;" class="ta_c">业务关联id</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 100px;" class="ta_c">涉及人</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 100px;" class="ta_c">操作人</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 150px;" class="ta_c">日志时间</div>
                            </th>
                            <th style="width:100%" axis="col7"><div></div></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="bDiv" style="height: auto;">
                <div id="flexigrid">
                    <table>
                        <tbody>
                            <tr data-id="0" class="hide">
                                <td class="no-data" align="center" axis="col0" colspan="50">
                                    <i class="fa fa-exclamation-circle"></i>没有符合条件的记录
                                </td>
                            </tr>
                            <tr>
                                <td class="sign" axis="col0">
                                    <div style="width: 24px;"><i class="ico-check"></i></div>
                                </td>
                                <td align="center" abbr="order_sn" axis="col3" class="">
                                    <div style="width: 50px;" class="ta_l"></div>
                                </td>
                                <td align="center" abbr="consignee" axis="col4" class="">
                                    <div style="width: 100px;" class="ta_l"></div>
                                </td>
                                <td align="center" abbr="article_time" axis="col6" class="">
                                    <div style="width: 80px;" class="ta_c"></div>
                                </td>
                                <td align="center" abbr="article_time" axis="col6" class="">
                                    <div style="width: 60px;" class="ta_c"></div>
                                </td>
                                <td align="center" abbr="article_time" axis="col6" class="">
                                    <div style="width: 100px;" class="ta_c"></div>
                                </td>
                                <td align="center" abbr="article_time" axis="col6" class="">
                                    <div style="width: 100px;" class="ta_c"></div>
                                </td>
                                <td align="center" abbr="article_time" axis="col6" class="">
                                    <div style="width: 150px;" class="ta_c"></div>
                                </td>
                                <td align="" class="" style="width: 100%;"><div>&nbsp;</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>