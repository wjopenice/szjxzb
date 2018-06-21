<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "金轩商城-找回密码";
$this->keywords = "金轩商城-找回密码";
$this->description = "金轩商城-找回密码";
?>


<?= Html::cssFile("{$url}/Css/login/forgetPwd.css"); ?>
    <!-- 面包屑 -->
    <div class="crumbs container"><span>首页</span>&gt;<span>找回密码</span></div>
    <!-- content -->
    <div class="content container">
        <ul class="cf pr">
            <li class="complete fl active" id="li1">
                <i></i>
                <span>填写账号</span>
            </li>
            <b class="line"></b>
            <li class="verification fl" id="li2">
                <i></i>
                <span>验证身份</span>
            </li>
            <b class="line twoLine"></b>
            <li class="resetPwd fl" id="li3">
                <i></i>
                <span>重置密码</span>
            </li>
            <b class="line threeLine"></b>
            <li class="success fl" id="li4">
                <i></i>
                <span>成功</span>
            </li>
        </ul>

        <div class="forgetInputBox">
            <!-- 账号信息 -->
            <div class="inputInfo">
                <div class="loginName">
                    <label class="userText" for="userAccount">登录名：</label>
                    <input class="userInput" type="text" id="userAccount" maxlength="20" required>
                </div>
                <div class="verificationCode">
                    <label class="userText" for="drag">验证码：</label>
                    <div id="drag"></div>
                </div>
                <input type="button" class="next dib" value="下一步">
            </div>

            <!-- 验证身份 -->
            <div class="verificationInfo hide">
                <p class="text">你正在找回登录名为"<span class="tel" id="tel1">17688830262</span>"的登录密码，账号不对？<a class="heavy" href="login.html">返回重填</a></p>
                <p class="text">根据您的账号情况，可选择通过以下验证方式找回密码：</p>
                <div class="bind">
                    <i></i>
                    <div class="bindText dib">
                        <span>通过验证码绑定的手机号找回</span>
                    </div>
                </div>
                <input type="button" class="immediate dib" value="立即验证">
            </div>

            <!-- 正在发送验证码 -->
            <div class="beingSent hide">
                <p class="text">正在发送<span class="tel" id="tel2" data-tellval="">17688830262</span>，请注意查收。并在下方输入短信中的6位验证码：</p>
                <div class="message">
                    <label class="messageCode" for="messageCode">短信验证码：</label>
                    <input class="messageInput" type="text" id="messageCode" maxlength="20">
                    <input type="button" class="recapture dib" value="获取验证码" >
                </div>
                <input type="button" class="sure dib" id="sure1" value="确定">
            </div>

            <!-- 确认密码 -->
            <div class="surePwd hide">
                <div>
                    <div class="new pr">
                        <label class="newPwd" for="newPwd">新的密码：</label>
                        <input class="newPwdInput" type="text" id="newPwd" maxlength="20" placeholder="密码由6-20位数字和符号组合">
                        <i class="keyBoardIcon"></i>
                    </div>
                </div>
                <div>
                    <div class="new pr">
                        <label class="confirmPwd" for="confirmPwd">确认密码：</label>
                        <input class="confirmPwdInput" type="text" id="confirmPwd" maxlength="20" placeholder="请再次输入上面密码">
                        <i class="keyBoardIcon"></i>
                    </div>
                </div>
                <input type="button" class="sure dib" id="sure2"  value="确定">
            </div>

            <!-- 成功 -->
            <div class="successInfo hide">
                <h3>密码修改成功</h3>
                <a href="?r=home/login/login" class="returnLogon">返回登录</a>
            </div>

        </div>
    </div>

    <script>
        $(function(){
            $(document).on("click",".next",function(){
                var userAccount = $("#userAccount").val();
                var text = $(".drag_text").text();
                if(text == '验证通过' && userAccount != ''){
                    $.get("?r=home/login/userverify",{user:userAccount},function (msg) {
                         if(msg.code == 1){
                             $(".verificationInfo").show();
                             $(".inputInfo").hide();
                             $(".tel").html(msg.tell);
                             $("#tel2").data("tellval",msg.tell);
                             $("#li1").attr("class","complete fl");
                             $("#li2").attr("class","verification fl active");
                             expstr();
                         }else{
                             layer.msg('账号填写错误', {icon: 5});
                         }
                    },"json");
                }else{
                    layer.msg('请填写内容与验证', {icon: 6});
                }
            });
            $(document).on("click",".heavy",function () {
                $(".verificationInfo").hide();
                $(".inputInfo").show();
                $("#li2").attr("class","verification fl complete");
                $("#li3").attr("class","resetPwd fl active");
            });
            $(document).on("click",".immediate",function () {
                $(".verificationInfo").hide();
                $(".beingSent").show();
                $("#li2").attr("class","verification fl complete");
                $("#li3").attr("class","resetPwd fl active");
            });
            $(document).on("click",".recapture",function () {
                setTime($(this))
                var tellval = $("#tel2").data("tellval");
                $.post("?r=home/login/telsvcode",{phone:tellval,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                    if(msg.status == 1){
                        layer.msg(msg.error, {icon: 6});
                    }else{
                        layer.msg(msg.error, {icon: 5});
                    }
                },"json");
            });
            $(document).on("click","#sure1",function () {
                var messageCode = $("#messageCode").val();
                var tellval = $("#tel2").data("tellval");
                $.post("?r=home/login/ajaxsmscode",{phone:tellval,code:messageCode,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                    if(msg.status == 0){
                        $(".beingSent").hide();
                        $(".surePwd").show();
                    }else{
                        layer.msg(msg.error, {icon: 5});
                    }
                },"json");
            });
            $(document).on("click","#sure2",function () {
                var verifyVal = verifyPwd($("#newPwd"));
                verifyVal = verifyConfirmPwd($("#newPwd"),$("#confirmPwd")) && verifyVal;
                if(!verifyVal){
                    layer.msg("验证没有通过", {icon: 5});
                    return false;
                }else{
                    var newPwd = $("#newPwd").val();
                    $.post("?r=home/login/ajaxpass",{userid:newPwd,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                        if(msg.code == 1){
                            $(".surePwd").hide();
                            $(".successInfo").show();
                            $("#li4").attr("class","success fl complete");
                        }else{
                            layer.msg('修改失败', {icon: 5});
                        }
                    },"json");
                }
            });
        })
    </script>
<?= Html::jsFile("{$url}/Js/layer/layer.js"); ?>
<?= Html::jsFile("{$url}/Js/login/forgetPwd.js"); ?>
<?= Html::script("$('#drag').drag();") ?>

