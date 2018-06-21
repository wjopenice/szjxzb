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
    <title>充值记录</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/layer/laydate/laydate.js")?>
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
                <h3>会员充值记录</h3>
                <h5>网站系统会员充值记录</h5>
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
            <li>会员充值记录历史</li>
        </ul>
    </div>
    <!--  表格     -->
    <div class="flexigrid">
        <div class="mDiv">
            <div class="ftitle">
                <h3>会员充值记录列表</h3><h5>（共<span>106</span>条记录）</h5>
            </div>
            <a href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
            <form class="navbar-form form-inline fr" method="get">
                <input type="hidden" name="ctime" value="{$ctime}">
                <div class="sDiv">
                    <div class="sDiv2" style="margin-right: 10px;">
                        <input type="text" size="30" id="start_time" value="2018-10-12" placeholder="起始时间" class="qsbox">
                        <input type="button" class="btn" value="起始时间">
                    </div>
                    <div class="sDiv2" style="margin-right: 10px;">
                        <input type="text" size="30" id="end_time" value="2018-10-18" placeholder="截止时间" class="qsbox">
                        <input type="button" class="btn" value="截止时间">
                    </div>
                    <div class="sDiv2">
                        <select class="select">
                            <option value="">会员昵称</option>
                        </select>
                        <input size="30" placeholder="模糊查询" value="" name="goods_name" class="qsbox" type="text">
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
                        <th align="left" axis="col3" class="">
                            <div style="width: 56px;" class="ta_c">会员ID</div>
                        </th>
                        <th align="left" axis="col4" class="">
                            <div style="width: 150px;" class="ta_c">会员昵称</div>
                        </th>
                        <th align="center" axis="col5" class="">
                            <div style="width: 202px;" class="ta_c">充值单号</div>
                        </th>
                        <th align="center" axis="col6" class="">
                            <div style="width: 52px;" class="ta_c">VIP充值</div>
                        </th>
                        <th align="center" axis="col6" class="">
                            <div style="width: 102px;" class="ta_c">充值资金</div>
                        </th>
                        <th align="center" axis="col6" class="">
                            <div style="width: 152px;" class="ta_c">提交时间</div>
                        </th>
                        <th align="center" axis="col6" class="">
                            <div style="width: 102px;" class="ta_c">支付方式</div>
                        </th>
                        <th align="center" axis="col6" class="">
                            <div style="width: 100px;" class="ta_c">支付状态</div>
                        </th>
                        <th style="width:100%" axis="col7"><div></div></th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bDiv" style="height: auto;">
            <div cellpadding="0" cellspacing="0" border="0">
                <table>
                    <tbody>
                    <tr>
                        <td class="sign">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </td>
                        <td align="left" class="">
                            <div style="text-align: left; width: 50px;">2657</div>
                        </td>
                        <td align="left" class="">
                            <div style="text-align: left; width: 150px;">王kinga</div>
                        </td>
                        <td align="center" class="">
                            <div style="text-align: center; width: 200px;">rechargeQtnFt8nMe6</div>
                        </td>
                        <td align="center" class="">
                            <div style="text-align: center; width: 50px;">否</div>
                        </td>
                        <td align="center" class="">
                            <div style="text-align: center; width: 100px;">1.00</div>
                        </td>
                        <td align="center" class="">
                            <div style="text-align: center; width: 150px;">2017-10-13 11:00</div>
                        </td>
                        <td align="center" class="">
                            <div style="text-align: center; width: 100px;">微信支付</div>
                        </td>
                        <td align="center" class="">
                            <div style="text-align: center; width: 100px;">待支付</div>
                        </td>
                        <td align="" class="" style="width: 100%;">
                            <div>&nbsp;</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="iDiv" style="display: none;"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        // 点击刷新数据
        $('.fa-refresh').click(function(){
            location.href = location.href;
        });

        $('#start_time').layDate();
        $('#end_time').layDate();
    });
</script>
</body>