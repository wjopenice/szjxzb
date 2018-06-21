<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "金轩商城-手机号注册";
$this->keywords = "金轩商城-手机号注册";
$this->description = "金轩商城-手机号注册";
?>

    <?= Html::cssFile("{$url}/Css/login/register.css"); ?>
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
                        <form action="?r=home/login/register" method="post">
                            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                            <div class="popup fr">
                                <div class="loginTit cf"><span>欢迎注册</span><span class="fr">已注册可直接<a href="?r=home/login/login">登录</a></span></div>
                                <div class="eachInput">
                                    <input type="number" id="phone" name="tell" class="inputBox" oninput="if(value.length>11)value=value.slice(0,11)" placeholder="请输入手机号码">
                                </div>
                                <div class="eachInput cf">
                                    <input type="number" id="codeInput" class="codeInput inputBox fl" oninput="if(value.length>6)value=value.slice(0,6)" placeholder="请输入手机验证码">
                                    <input class="btnCode inputBox fr" id="btnCodePhone" readonly value="获取验证码" disabled  onclick="sendCode()">
                                </div>
                                <div class="eachInput pr">
                                    <input class="inputBox" id="password" type="password" name="password" maxlength="20" placeholder="密码由6-20位字母，数字和符号组合">
                                    <i class="keyBoardIcon"></i>
                                </div>
                                <div class="eachInput pr">
                                    <input class="inputBox" id="pwd" type="password" maxlength="20" placeholder="请再次输入上面的密码">
                                    <i class="keyBoardIcon"></i>
                                </div>
                                <div class="operateLogin cf">
                                    <i class="isChose fl active"></i>
                                    <a href="javascript:void(0)" class="rememberPwd fl">我已同意《服务条款》</a>
                                </div>
                                <input type="submit" name="btn" class="btnLogin" disabled value="登录" style="border: 0;">
                                <div class="third">
                                    <a href="?r=home/login/accountregister" class="thirdTitle">通过账号注册&gt;</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="version">金轩商城 &COPY;2018-2019 深圳金轩珠宝有限公司 粤ICP备18062441号-1</div>
        </div>

    </div>

    <?= Html::jsFile("{$url}/Js/login/register.js"); ?>
    <?= Html::jsFile("{$url}/Js/layer/layer.js"); ?>
    <?= Html::jsFile("{$url}/Js/common/js_cookie.js"); ?>
    <script>
        $(function(){
            $("#phone").blur(function () {
                var data = $(this).val();
                var exp = /^(13|15|18|17)\d{9}$/igm;
                var bool = exp.test(data);
                if(bool){
                    $.post("?r=home/login/ajaxsms2",{d:data,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                        if(msg.status == 1){
                            layer.msg('手机号可以使用', {icon: 6});
                            $("#btnCodePhone").removeAttr("disabled");
                            $("#btnCodePhone").css({"background":"#009606","color":"#ffffff"});
                        }else{
                            layer.msg(msg.error, {icon: 5});
                            $("#btnCodePhone").attr("disabled","disabled");
                            $("#btnCodePhone").css({"background":"#f4f4f4","color":"#999"});
                        }
                    },"json");
                }else{
                    layer.msg("手机号格式错误", {icon: 5});
                }
            });

            $("#codeInput").blur(function () {
                var data = $(this).val();
                var phoneVal = $("#phone").val();
                $.post("?r=home/login/ajaxsmscode2",{code:data,phone:phoneVal,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                    if(msg.status == 1){
                        layer.msg("验证通过", {icon: 6});
                        $(":submit").removeAttr("disabled");
                    }else{
                        layer.msg("验证失败，请重新验证", {icon: 5});
                        $(":submit").attr("disabled","disabled");
                    }
                },"json");
            });
            
            $("#pwd").blur(function () {
                var pass = $("#password").val();
                var pwd = $(this).val();
                if(pass === pwd){
                    setCookie("u",1,10,"i");
                    layer.msg("密码通过", {icon: 6});
                }else{
                    setCookie("u",0,10,"i");
                    layer.msg("两次密码不一致", {icon: 5});
                }
            });
        });


    var sendCode = function (tag) {
        var phoneVal = $("#phone").val();
        $("#btnCodePhone").val("正在发送..");

        $.post("?r=home/login/telsvcode",{phone:phoneVal,_csrf:'<?= Yii::$app->request->csrfToken ?>'},function (msg) {
             if(msg.status == 1){
                 layer.msg('发送成功', {icon: 6});
             }else{
                 layer.msg("发送失败", {icon: 5});
             }
        },"json");

        $("#btnCodePhone").val("60秒后在获取");
        setInterval("editBtn()",1000);
    }

    function editBtn () {
        var btnCodePhoneVal =  parseInt($("#btnCodePhone").val());
        if(btnCodePhoneVal > 0){
            btnCodePhoneVal-=1;
        }
        $("#btnCodePhone").val(btnCodePhoneVal+"秒后在获取");
    }
    </script>

