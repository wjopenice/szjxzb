<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "账号安全-修改登录密码";
$this->keywords = "账号安全-修改登录密码";
$this->description = "账号安全-修改登录密码";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/loginPassword.css"); ?>
    <div class="container">
        <!-- 面包屑 -->
        <div class="crumbs">
            <span>首页</span> &gt; <span class="secondLevel">个人中心</span>
        </div>

        <!-- content -->
        <div class="content cf">
            <!-- 左侧边导航 -->
            <?=$this->render('../layouts/uc_left_nav.php')?>

            <!-- 右侧内容 -->
            <div class="rightContent fl">
                <span class="pwdTitle">修改登录密码</span>

                <!-- 验证手机账号信息 -->
                <div class="setPhone" id="div1">
                    <ul class="speedBar cf">
                        <li class="bindNum fl pr">
                            <i></i>
                            <span>验证账号信息</span>
                            <b></b>
                        </li>
                        <li class="setPayment fl pr">
                            <i></i>
                            <span>修改登录密码</span>
                            <b></b>
                        </li>
                        <li class="complete fl pr">
                            <i></i>
                            <span>完成</span>
                            <b></b>
                        </li>
                    </ul>
                    <div class="inputBox">
                        <div class="phoneNumber">
                            <input type="number" id="tell" oninput="if(value.length>11)value=value.slice(0,11)" placeholder="请输入手机号码">
                        </div>
                        <div class="verificationCode cf">
                            <input class="verificationInput fl" id="codeInput" type="number" oninput="if(value.length>6)value=value.slice(0,6)" placeholder="请输入验证码">
                            <input class="codeButton fl" id="codephone" type="button" disabled value="获取验证码" style="background: #5f5f5f5f;" onclick="sendCode()">
                        </div>
                    </div>
                    <a class="subBtn" id="btn1">提交</a>
                </div>

                <!-- 验证账号信息 -->
                <div class="setAccount hide" id="div2">
                    <ul class="speedBar cf">
                        <li class="bindNum fl pr">
                            <i></i>
                            <span>验证账号信息</span>
                            <b></b>
                        </li>
                        <li class="setPayment fl pr">
                            <i></i>
                            <span>修改登录密码</span>
                            <b></b>
                        </li>
                        <li class="complete fl pr">
                            <i></i>
                            <span>完成</span>
                            <b></b>
                        </li>
                    </ul>
                    <div class="inputBox">
                        <div class="phoneNumber">
                            <input type="text" id="userid" maxlength="20" placeholder="请输入您目前登录账号ID进行验证">
                        </div>
                    </div>
                    <a class="subBtn" id="btn2">提交</a>
                </div>

                <!-- 修改登录密码 -->
                <div class="inputPwd hide" id="div3">
                    <ul class="speedBar cf">
                        <li class="bindNum fl pr">
                            <i></i>
                            <span>验证账号信息</span>
                            <b></b>
                        </li>
                        <li class="setPayment setPaymentActive fl pr">
                            <i></i>
                            <span>修改登录密码</span>
                            <b></b>
                        </li>
                        <li class="complete fl pr">
                            <i></i>
                            <span>完成</span>
                            <b></b>
                        </li>
                    </ul>
                    <div class="inputBox">
                        <div class="phoneNumber">
                            <input type="number" id="password" oninput="if(value.length>12)value=value.slice(0,12)" placeholder="输入新密码">
                        </div>
                        <div class="phoneNumber">
                            <input type="number" id="pwd" oninput="if(value.length>12)value=value.slice(0,12)" placeholder="再次输入新密码">
                        </div>
                    </div>
                    <a class="subBtn" id="btn3">提交</a>
                </div>

                <!-- 完成 -->
                <div class="inputComplete hide" id="div4">
                    <ul class="speedBar cf">
                        <li class="bindNum fl pr">
                            <i></i>
                            <span>验证账号信息</span>
                            <b></b>
                        </li>
                        <li class="setPayment setPaymentActive fl pr">
                            <i></i>
                            <span>修改登录密码</span>
                            <b></b>
                        </li>
                        <li class="complete completeActive fl pr">
                            <i></i>
                            <span>完成</span>
                            <b></b>
                        </li>
                    </ul>
                    <div class="inputBox completeIcon">
                        <i class="inputCompleteIcon"></i>
                        <span class="inputCompleteText" id="success">登陆密码修改完成</span>
                    </div>
                </div>

                <!-- 温馨提醒 -->
                <div class="pwdExplain">
                    <span class="pwdExplainTitle">温馨提醒</span>
                    <p>• 为保障您的账号安全，变更重要信息需要身份验证</p>
                    <p>• 用户ID查看路径：个人中心->账号管理->账号信息->基本资料->用户ID </p>
                    <p>• 若有疑问请联系在线客服或拨打400-0368-163（9:00-20:00）</p>
                </div>
            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/personalCenter/modifyPassword.js"); ?>
<?= Html::jsFile("{$url}/Js/layer/layer.js"); ?>
<script>
$(function () {
    $("#tell").blur(function () {
         var tell = $(this).val();
         $.post("?r=home/login/ajaxtell",{tell:tell,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
            if(msg.code == 1){
                $("#codephone").attr({"style":"background: #f8981d;","disabled":false})
            }else{
                layer.msg("该用户没有此手机号", {icon: 5});
                $("#codephone").attr({"style":"background: #5f5f5f;","disabled":true})
            }
        },"json");
    });
    $("#btn1").click(function () {
        var data = $("#codeInput").val();
        var phoneVal = $("#tell").val();
        $.post("?r=home/login/ajaxsmscode",{code:data,phone:phoneVal,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
            if(msg.status == 0){
                $("#div1").attr("class","setPhone hide");
                $("#div2").attr("class","setAccount");
                $("#div3").attr("class","inputPwd hide");
                $("#div4").attr("class","inputComplete hide");
            }else{
                layer.msg(msg.error, {icon: 5});
            }
        },"json");

    });
    $("#btn2").click(function () {

        var data = $("#userid").val();
        $.post("?r=home/login/ajaxuserid",{userid:data,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
            if(msg.code == 1){
                $("#div1").attr("class","setPhone hide");
                $("#div2").attr("class","setAccount hide");
                $("#div3").attr("class","inputPwd");
                $("#div4").attr("class","inputComplete hide");
            }else{
                layer.msg("验证失败", {icon: 5});
            }
        },"json");

    });
    $("#btn3").click(function () {
        var pass = $.trim($("#password").val()) ;
        var pwd = $.trim($("#pwd").val());
        if(pass === pwd){
            $.post("?r=home/login/ajaxpass",{userid:pwd,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                if(msg.code == 1){
                    $("#div1").attr("class","setPhone hide");
                    $("#div2").attr("class","setAccount hide");
                    $("#div3").attr("class","inputPwd hide");
                    $("#div4").attr("class","inputComplete");
                    $("#success").html("登陆密码修改完成");
                }else{
                    $("#success").html("登陆密码修改失败");
                }
            },"json");
        }else{
            layer.msg("两次密码不一致", {icon: 5});
        }
    });
});

var sendCode = function () {
    var phoneVal = $("#tell").val();
    $("#codephone").val("正在发送..");

    $.post("?r=home/login/telsvcode",{phone:phoneVal,_csrf:'<?= Yii::$app->request->csrfToken ?>'},function (msg) {
        if(msg.status == 1){
            layer.msg(msg.error, {icon: 6});
        }else{
            layer.msg(msg.error, {icon: 5});
        }
    },"json");

    $("#codephone").val("60秒后在获取");
    setInterval("editBtn()",1000);
}
function editBtn () {
    var btnCodePhoneVal =  parseInt($("#codephone").val());
    if(btnCodePhoneVal > 0){
        btnCodePhoneVal-=1;
        $("#codephone").val(btnCodePhoneVal+"秒后在获取");
    }else{
        $("#codephone").val("获取验证码");
    }

}
</script>
