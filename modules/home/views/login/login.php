<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "金轩商城-登录";
$this->keywords = "金轩商城-登录";
$this->description = "金轩商城-登录";
?>


    <?= Html::cssFile("{$url}/Css/login/login.css"); ?>
    <div class="login">
        <!-- header -->
        <div class="header container cf">
            <a class="headerLogo fl" href="?r=home/index/index"><i></i></a>
            <ul class="explainUl fr">
                <li class="dib cf qualityGoods"><i class="fl"></i><span class="fl">正品保证</span></li>
                <li class="dib cf sevenDay"><i class="fl"></i><span class="fl">7天包退</span></li>
                <li class="dib cf express"><i class="fl"></i><span class="fl">闪电发货</span></li>
            </ul>
        </div>

        <!-- content -->
        <div class="content">
            <div class="loginContent pr">
                <?= Html::img("{$url}/Image/login/login/contentBg1.png",['alt'=>""]); ?>
                <!-- loginPopup -->
                <div class="loginPopup" id="loginPopup">
                    <div class="module container cf">
                        <form action="?r=home/login/login" method="post">
                            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                            <div class="popup fr">
                                <div class="loginTit cf"><span>如果账号，请登录</span><a class="fr" href="?r=home/login/register">免费注册</a></div>
                                <div class="eachInput">
                                    <input class="inputBox" type="text" maxlength="20" name="username" placeholder="手机号/用户名/邮箱" required value="">
                                </div>
                                <div class="eachInput pr">
                                    <input class="inputBox" type="password" maxlength="12" name="userpass" placeholder="密码" required value="" />
                                    <i class="keyBoardIcon"></i>
                                </div>
                                <div class="operateLogin cf">
                                    <i class="isChose fl active"></i>
                                    <a class="rememberPwd fl">记住密码</a>
                                    <a href="?r=home/login/forgetpwd" class="forgetPwd fr">忘记密码&gt;</a>
                                </div>
                                <input type="submit" name="btn" class="btnLogin" value="登录" style="border: 0;">
                                <div class="third cf">
                                    <a class="thirdTitle fl">第三方登录</a>
                                    <i class="qq thirdIcon fl"></i>
                                    <i class="weChat thirdIcon fl"></i>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <div class="version">金轩商城 &COPY;2018-2019 深圳金轩珠宝有限公司 粤ICP备18062441号-1</div>
        </div>

    </div>
    <?= Html::jsFile("{$url}/Js/login/login.js"); ?>
