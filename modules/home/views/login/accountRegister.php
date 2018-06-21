<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "金轩商城-账号注册";
$this->keywords = "金轩商城-账号注册";
$this->description = "金轩商城-账号注册";
?>

<?= Html::cssFile("{$url}/Css/login/accountRegister.css"); ?>
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
                        <form action="?r=home/login/accountregister" method="post">
                            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                            <div class="popup fr">
                                <div class="loginTit cf"><span>欢迎注册</span><span class="fr">已注册可直接<a href="?r=home/login/login">登录</a></span></div>
                                <div class="eachInput">
                                    <input type="text" class="inputBox" maxlength="20" name="username" id="username" placeholder="请输入手店桶账号" required />
                                </div>
                                <div class="eachInput pr">
                                    <input class="inputBox" type="password" maxlength="20" id="userpass" name="userpass" placeholder="密码由6-20位字母，数字和符号组合" required>
                                </div>
                                <div class="eachInput pr">
                                    <input class="inputBox" type="password" maxlength="20" id="repwd" name="repwd" placeholder="请再次输入上面的密码"  required />
                                </div>
                                <div class="eachInput">
                                    <input type="tel" class="inputBox" id="tell" name="tell"  placeholder="请输入手机号码" required pattern="^1[0-9]{10}$" oninvalid="setCustomValidity('手机格式必须为1开始切11位')" oninput="setCustomValidity('')" />
                                </div>
<!--                                <div class="eachInput cf">-->
<!--                                    <input type="number" class="codeInput inputBox fl" oninput="if(value.length>6)value=value.slice(0,6)" placeholder="请输入手机号码">-->
<!--                                    <input class="btnCode inputBox fr" readonly value="获取验证码" required>-->
<!--                                </div>-->
                                <div class="operateLogin cf">
                                    <i class="isChose fl active"></i>
                                    <a href="javascript:void(0)" class="rememberPwd fl">我已同意《服务条款》</a>
                                </div>
                                <input type="submit" id="btn" name="btn" value="登录" disabled class="btnLogin" style="border: 0;" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="version">金轩商城 &COPY;2018-2019 深圳金轩珠宝有限公司 粤ICP备18062441号-1</div>
        </div>

    </div>
    <?= Html::jsFile("{$url}/Js/layer/layer.js"); ?>
    <?= Html::jsFile("{$url}/Js/login/accountRegister.js"); ?>
    <?= Html::jsFile("{$url}/Js/common/js_cookie.js"); ?>

