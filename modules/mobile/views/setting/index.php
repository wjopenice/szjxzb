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
    <title>设置</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm-extend.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/setUp/index.css">
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
        <ul class="setUl">
            <li class="numSet"><a class="cf" href="?m=m/setting/accountset"><span class="fl">账号设置</span><span class="icon icon-right fr"></span></a></li>
            <li class="addressManagement"><a class="cf" href="?m=m/address/address"><span class="fl">地址管理</span><span class="icon icon-right fr"></span></a></li>
            <li class="commonProblem"><a class="cf" href="?m=m/setting/commonproblem"><span class="fl">常见问题</span><span class="icon icon-right fr"></span></a></li>
        </ul>
        <a class="signOut" href="?m=m/setting/signout">退出登录</a>

    </div>

<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
</body>
</html>