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
    <title>账号设置</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm-extend.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/setUp/accountSet.css">
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
        <ul class="accountSetUl">
            <li class="modifyAccount"><a class="cf" href="modifyPhone.html"><span class="fl">修改手机号</span><span class="icon icon-right fr"></span></a></li>
            <li class="modifyPwd"><a class="cf" href="modifyPwd.html"><span class="fl">修改登录密码</span><span class="icon icon-right fr"></span></a></li>
        </ul>

        <ul class="bindSetUl">
            <li class="bindNum"><a class="cf" href="bindPhone.html"><span class="fl">手机号</span><div class="bindRight fr"><span class="bind unBind">未绑定</span><span class="icon icon-right"></span></div></a></li>
            <li class="bindNum weChat"><a class="cf" href="javascript:;"><span class="fl">微信账号</span><div class="bindRight fr"><span class="bind">已绑定</span><span class="icon icon-right"></span></div></a></li>
            <li class="bindNum QQBind"><a class="cf" href="javascript:;"><span class="fl">QQ账号</span><div class="bindRight fr"><span class="bind unBind">未绑定</span><span class="icon icon-right"></span></div></a></li>
            <li class="bindNum weiBo"><a class="cf" href="javascript:;"><span class="fl">新浪微博</span><div class="bindRight fr"><span class="bind unBind">未绑定</span><span class="icon icon-right"></span></div></a></li>
        </ul>
    </div>

<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/setUp/accountSet.js"></script>
</body>
</html>