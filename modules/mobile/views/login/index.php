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
    <title>登录</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm-extend.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/login/login.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!--  返回   -->
    <div class="returnBox">
        <a class="return fl cf" href="javascript:void(0)"><span class="icon icon-left" onclick="window.location.href='?m=m/index/index'"></span></a>
        <a class="reg fr" href="?m=m/login/register">注册</a>
    </div>
    <!--  logo  -->
    <div class="logo">
        <img class="logoImg dib" src="<?=$url?>/Image/common/logo/logo.png" alt="">
    </div>

    <!--  表单   -->
    <form action="?m=m/login/index" method="post" class="formBox" >
        <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
        <div class="formBoxWrap account pr" id="account"><i></i><input type="text" name="user" placeholder="请输入账号" maxlength="20" required></div>
        <div class="formBoxWrap pwd pr" id="pwd"><i></i><input type="password" name="pass" placeholder="请输入密码" maxlength="20" required></div>
        <input type="submit" name="btn" class="btnLogin" id="btnLogin" value="登录" />
        <div class="operation">
            <a href="?m=m/login/forgetpwd" class="forgetPwd">忘记密码</a>
        </div>
    </form>


<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/login/login.js"></script>
</body>
</html>