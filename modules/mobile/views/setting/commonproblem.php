<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/mobile/Static");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>常见问题</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm-extend.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/commonProblem/index.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!-- content -->
    <div class="page-group">

        <ul class="commonProblemUl">
            <li class="commonProblem"><a class="cf" href="javascript:goPage(1);"><span id="title-1" class="fl">平台的物流方式和时间？</span><span class="icon icon-right fr"></span></a></li>
            <li class="commonProblem"><a class="cf" href="javascript:goPage(2);"><span id="title-2" class="fl">30天无理由换货？</span><span class="icon icon-right fr"></span></a></li>
            <li class="commonProblem"><a class="cf" href="javascript:goPage(3);"><span id="title-3" class="fl">平台积分：1积分=1元现金？</span><span class="icon icon-right fr"></span></a></li>
            <li class="commonProblem"><a class="cf" href="javascript:goPage(4);"><span id="title-4" class="fl">无货处理？</span><span class="icon icon-right fr"></span></a></li>
        </ul>
        <ul class="commonProblemUl">
            <li class="commonProblem"><a class="cf" href="javascript:goPage(5);"><span id="title-5" class="fl">其他问题？</span><span class="icon icon-right fr"></span></a></li>
            <li class="commonProblem"><a class="cf" href="javascript:goPage(6);"><span id="title-6" class="fl">纠纷处理？</span><span class="icon icon-right fr"></span></a></li>
        </ul>


    </div>

<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/commonProblem/index.js"></script>
</body>
</html>