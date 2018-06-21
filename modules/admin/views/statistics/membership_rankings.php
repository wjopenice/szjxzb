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
    <title>销售概况</title>
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
    <?= Html::jsFile("{$url}/Js/common/echart/echarts.min.js")?>
    <?= Html::jsFile("{$url}/Js/common/echart/macarons.js")?>
    <?= Html::jsFile("{$url}/Js/common/echart/china.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
    <?= Html::jsFile("{$url}/Js/statistics/membership_rankings.js")?>

</head>
<body>

    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>统计报表 - 会员排行</h3>
                    <h5>网站系统会员排行</h5>
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
                <li>会员购买统计排行.</li>
            </ul>
        </div>
        <!--   详情内容   -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>会员排行榜</h3><h5>共<span>0</span>条记录</h5>
                </div>
                <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
                <form class="navbar-form form-inline fr" id="search-form" method="get" action="" onSubmit="return check_form();">
                    <div class="sDiv">
                        <div class="sDiv2" style="margin-right: 10px;">
                            <input type="text" size="30" name="start_time" id="start_time" value="" placeholder="起始时间" class="qsbox">
                            <input type="button" class="btn" value="起始时间">
                        </div>
                        <div class="sDiv2" style="margin-right: 10px;">
                            <input type="text" size="30" name="end_time" id="end_time" value="" placeholder="截止时间" class="qsbox">
                            <input type="button" class="btn" value="截止时间">
                        </div>
                        <div class="sDiv2" style="margin-right: 10px;">
                            <input size="30" name="mobile" value="" placeholder="手机号码" class="qsbox" type="text">
                        </div>
                        <div class="sDiv2">
                            <input size="30" placeholder="email" value="" name="email" class="qsbox" type="text">
                            <input class="btn" value="搜索" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th class="sign" axis="col0">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </th>
                            <th align="center" abbr="article_title" axis="col3" class="">
                                <div style="width: 54px;" class="ta_c">ID</div>
                            </th>
                            <th align="center" abbr="ac_id" axis="col4" class="">
                                <div style="width: 52px;" class="ta_c">排行</div>
                            </th>
                            <th align="center" abbr="article_show" axis="col5" class="">
                                <div style="width: 152px;" class="ta_c">会员名称</div>
                            </th>
                            <th align="center" abbr="article_show" axis="col5" class="">
                                <div style="width: 154px;" class="ta_c">会员手机</div>
                            </th>
                            <th align="center" abbr="article_show" axis="col5" class="">
                                <div style="width: 200px;" class="ta_c">会员邮箱</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 82px;" class="ta_c">订单数</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 102px;" class="ta_c">购物金额</div>
                            </th>
                            <th align="center" axis="col1" class="handle">
                                <div style="width: 150px;" class="ta_c">操作</div>
                            </th>
                            <th style="width:100%" axis="col7"><div></div></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="bDiv" style="height: auto;">
                <div id="flexigrid" >
                    <table>
                        <tr>
                            <td class="sign">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </td>
                            <td align="center" class="">
                                <div style="width: 50px;" class="ta_c"></div>
                            </td>
                            <td align="center" class="">
                                <div style="width: 50px;" class="ta_c"></div>
                            </td>
                            <td align="center" class="">
                                <div style="width: 150px;" class="ta_c"></div>
                            </td>
                            <td align="center" class="">
                                <div style="width: 150px;" class="ta_c"></div>
                            </td>
                            <td align="center" class="">
                                <div style="width: 200px;" class="ta_c"></div>
                            </td>
                            <td align="center" class="">
                                <div style="width: 80px;" class="ta_c"></div>
                            </td>
                            <td align="center" class="">
                                <div style="width: 100px;" class="ta_c"></div>
                            </td>
                            <td align="center" class="handle">
                                <div style="width: 170px; max-width:170px;" class="ta_c">
                                    <a href="javascript:void(0)" onclick="userOrder('{$vo.user_id}')" class="btn blue"><i class="fa fa-search"></i>查看</a>
                                </div>
                            </td>
                            <td class="" style="width: 100%;"><div>&nbsp;</div></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>