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
    <title>关于我们</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm-extend.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/aboutUs/index.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!-- content -->
    <div class="page-group pr">
        <ul class="aboutUl">
            <li class="cf"><span class="version fl">版本号</span><span class="number fr">3.2.4</span></li>
            <li><a class="recommend cf" href="javascript:;"><span class="friend fl">推荐给好友</span><span class="fr icon icon-right"></span></a></li>
        </ul>

        <!-- 分享蒙版 -->
        <div class="share pr hide">
            <div class="mask"></div>
            <ul class="shareUl">
                <li class="socialLi cf">
                    <a class="qq fl" href="javascript:;"><i></i></a>
                    <a class="weChat fl" href="javascript:;"><i></i></a>
                    <a class="weiBo fl" href="javascript:;"><i></i></a>
                </li>
                <li class="circleLi cf">
                    <a class="friendCircle fl" href="javascript:;"><i></i></a>
                    <a class="qqSpace fl" href="javascript:;"><i></i></a>
                </li>
                <li class="closeLi">
                    <a class="close" href="javascript:;"><i></i></a>
                </li>
            </ul>
        </div>
    </div>


<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/aboutUs/index.js"></script>
</body>
</html>