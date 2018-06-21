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
    <?= Html::jsFile("{$url}/Js/statistics/membership_statistics.js")?>

</head>
<body>

    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>统计报表 - 会员统计</h3>
                    <h5>网站系统会员统计</h5>
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
                <li></li>
            </ul>
        </div>
        <!--   内容部分   -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>会员统计</h3>
                    <h5>今日新增会员：<span>0</span>|本月新增会员：<span>1</span>|会员总数：<span>12</span>|会员余额总额：<span>12</span>|有单会员数：<span>15</span></h5>
                </div>
                <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
                <form class="navbar-form form-inline fr" id="search-form" method="get" action="" onSubmit="return check_form();">
                    <div class="sDiv">
                        <div class="sDiv2" style="margin-right: 10px;">
                            <input type="text" size="30" name="start_time" id="start_time" value="" placeholder="起始时间" class="qsbox">
                            <input type="button" class="btn" value="起始时间">
                        </div>
                        <div class="sDiv2" style="margin-right: 10px;">
                            <input type="text" size="30" name="end_time"  id="end_time" value="" placeholder="截止时间" class="qsbox">
                            <input type="button" class="btn" value="截止时间">
                        </div>
                        <div class="sDiv2">
                            <input class="btn" value="搜索" type="submit">
                        </div>
                    </div>
                </form>
            </div>
            <div id="statistics" style="height: 400px;"></div>
        </div>
    </div>

</body>


