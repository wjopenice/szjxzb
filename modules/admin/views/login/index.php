<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/admin/Static");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>登录页</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?= Html::cssFile("{$url}/Css/login/index.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.SuperSlide.2.1.2.js")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.validation.min.js")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.cookie.js")?>
    <script type="text/javascript">
    //若cookie值不存在，则跳出iframe框架
    if(!$.cookie('tpshopActionParam') && $.cookie('admin_type') != 1){
        $.cookie('admin_type','1' , {expires: 1 ,path:'/'});
    }
    </script>
</head>
<body>
    <!--   轮播图    -->
    <div class="bannerBox">
        <ul class="slideBanner">
            <li><?= Html::img("{$url}/Image/login/banner_1.png",["class"=>"subSlideImg"]); ?></li>
            <li><?= Html::img("{$url}/Image/login/banner_2.png",["class"=>"subSlideImg"]); ?></li>
            <li><?= Html::img("{$url}/Image/login/banner_3.png",["class"=>"subSlideImg"]); ?></li>
        </ul>
    </div>
    <!--   登录     -->
    <div class="login-layout">
        <div class="logo">
            <?= Html::img("{$url}/Image/common/logo.png"); ?>
        </div>
        <form action="?r=admin/login/index" name='theForm' id="theForm" method="post">
            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
            <div class="login-form pr">
                <div class="formContent">
                    <div class="title">管理中心</div>
                    <div class="formInfo">
                        <div class="errorMsg"></div>
                        <div class="formText cf">
                            <i class="icon icon-user"></i>
                            <input type="text" name="username" autocomplete="off" required class="input-text userName" value="" placeholder="用户名">
                        </div>
                        <div class="formText cf">
                            <i class="icon icon-pwd"></i>
                            <input type="password" name="userpass" autocomplete="off" required class="input-text pwd" value="" placeholder="密  码">
                        </div>
                        <div class="formText cf">
                            <i class="icon icon-chick"></i>
                            <input type="text" name="verify" id="verify" required autocomplete="off" class="input-text chick_ue verifyCode" value="" placeholder="验证码">
                            <img src="?r=admin/login/verify" class="imgCode" id="imgVerify" alt="" onclick="this.src='?r=admin/login/verify&data='+Math.random();">
                        </div>
                        <div class="formText cf submitDiv">
                            <input type="submit" name="btn" class="sub btnLogin" value="登录">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?= Html::jsFile("{$url}/Js/login/index.js")?>
</body>
</html>

