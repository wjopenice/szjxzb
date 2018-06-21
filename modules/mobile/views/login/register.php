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
    <title>注册</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm-extend.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/login/register.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!--  Back  -->
    <div class="backBox">
        <a href="?m=m/login/index" class="back backIcon"></a>
    </div>

    <!--  logo  -->
    <div class="logo">
        <img class="logoImg dib" src="<?=$url?>/Image/common/logo/logo.png" alt="">
    </div>

    <!--  tab选项  -->
    <div class="tabBox cf">
        <a href="javascript:void(0)" class="eachTab fl active">账号注册</a>
        <a href="javascript:void(0)" class="eachTab fl">手机注册</a>
    </div>

    <!--  表单   -->
    <form action="?m=m/login/register" method="post" class="formBox">
        <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
        <input type='hidden' id="registerType" name='registerType' value="accountRegBox" />
        <!--  账号注册  -->
        <span id="verifymsg" style="display: block;text-align: center;">*</span>
        <div class="accountRegBox WrapBox">
            <div class="formBoxWrap account pr"><i></i><input class="input accountInput" type="text" id="user" name="user" placeholder="请输入账号,最少6位" maxlength="20"  ></div>
            <div class="formBoxWrap pwd pr"><i></i><input class="input accountPwdInput" type="password" id="pass" name="pass" placeholder="请输入密码,最少6位" maxlength="20" ></div>
            <div class="formBoxWrap phone pr"><i></i><input class="input accountRealName" type="tel" id="tell" name="tell" placeholder="请输入11位手机号" maxlength="11" ></div>
        </div>

        <!--  手机注册  -->
        <div class="phoneRegBox WrapBox hide">
            <div class="formBoxWrap phone pr"><i></i><input class="input phoneInput" type="tel" id="ptell" name="ptell" placeholder="请输入11位手机号" maxlength="11"></div>
            <div class="formBoxWrap pwd pr"><i></i><input class="input phonePwdInput" type="password" id="pspass" placeholder="请输入密码" maxlength="20"></div>
            <div class="formBoxWrap account pr"><i></i><input class="input phoneRealNameInput" type="password" id="ppass" name="ppass" placeholder="请再次输入密码" maxlength="6"></div>
            <div class="formBoxWrap cardId pr cf"><i></i><input class="formInput input codeInput" id="msg" type="text" placeholder="短信验证码" maxlength="6"><input class="btnCode fr" readonly value="获取验证码"></div>
        </div>

        <!--  注册和同意协议   -->
        <input type="submit" name="btn" class="btnReg" value="注册" disabled>
        <div class="agreementBox active">
            <i class="ChoseClick dib"></i>
            <p class="agreement dib">我已阅读并同意《用户注册协议》</p>
        </div>
    </form>

<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/login/register.js"></script>
<script src="<?=$url?>/Js/common/js_cookie.js"></script>
<script>
    verifyBtn();
    function load_res() {
        var expvalue = $("#registerType").val();
        if(expvalue == "accountRegBox"){
            $("#user").bind("change propertychange",function(){
                var user = $("#user").val();
                if(user.length >=6){
                    $.post("?m=m/login/ajaxuser",{user:user,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                        if(msg.code == 1){
                            verifyColor("账号已经存在,请重新更换","#ff0000","key1",0)
                        }else{
                            verifyColor("账号可以使用","#00ff00","key1",1)
                            $("#pass").focus();
                            return false;
                        }
                    },"json");
                }else{
                    verifyColor("账号长度最少6位","#ff0000","key1",0)
                }
            });
            $("#pass").bind("change propertychange",function(){
                var pass = $("#pass").val();
                if(pass.length >=6){
                    verifyColor("密码通过","#00ff00","key2",1)
                    $("#tell").focus();
                    return false;
                }else{
                    verifyColor("密码长度最少6位","#ff0000","key2",0)
                }
            });
            $("#tell").bind("change propertychange",function(){
                var tell = $("#tell").val();
                if(tell.length == 11){
                    $.post("?m=m/login/ajaxtell",{tell:tell,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                        if(msg.code == 1){
                            verifyColor("手机号已经存在,请重新更换","#ff0000","key3",0)
                        }else{
                            verifyColor("手机号可以使用","#00ff00","key3",1)
                        }
                    },"json");
                }else{
                    verifyColor("手机号长度最少11位","#ff0000","key3",0)
                }
            });
        }else{
            $("#ptell").bind("change propertychange",function(){
                var ptell = $("#ptell").val();
                if(ptell.length >=11){
                    $.post("?m=m/login/ajaxtell",{tell:ptell,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                        if(msg.code == 1){
                            verifyColor("手机号已经存在,请重新更换","#ff0000","key1",0)
                        }else{
                            verifyColor("手机号可以使用","#00ff00","key1",1)
                            $("#pspass").focus();
                            return false;
                        }
                    },"json");
                }else{
                    verifyColor("手机号长度最少11位","#ff0000","key1",0)
                }
            });
            $("#pspass").bind("change propertychange",function(){
                var pspass = $("#pspass").val();
                if(pspass.length >= 6){
                    verifyColor("格式正确","#00ff00","key2",0)
                    $("#ppass").focus();
                    return false;
                }else{
                    verifyColor("密码长度最少6位","#ff0000","key2",0)
                }
            });
            $("#ppass").bind("change propertychange",function(){
                var pspass = $("#pspass").val();
                var ppass = $("#ppass").val();
                if(pspass == ppass){
                    verifyColor("密码通过","#00ff00","key2",1)
                    return false;
                }else{
                    verifyColor("两次密码不一致","#ff0000","key2",0)
                }
            });
            $(".btnCode").bind("click",function () {
                $(".btnCode").val("正在发送..");
                var ptell = $("#ptell").val();
                $.post("?m=m/login/telsvcode",{phone:ptell,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                    if(msg.status == 1){
                        verifyColor("发送成功","#00ff00","key3",0)
                        $("#msg").focus();
                        return false;
                    }else{
                        verifyColor("发送失败","#ff0000","key3",0)
                    }
                });
                $(".btnCode").val("60秒后在获取");
                setInterval("editBtn()",1000);
            });
            $("#tell").bind("change propertychange",function(){
                var data = $(this).val();
                var phoneVal = $("#ptell").val();
                if(tell.length == 0){
                    $.post("?m=m/login/ajaxsmscode",{code:data,phone:phoneVal,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                        if(msg.status == 0){
                            verifyColor(msg.error,"#ff0000","key3",0)
                        }else{
                            verifyColor(msg.error,"#00ff00","key3",1)
                        }
                    },"json");
                }else{
                    verifyColor("验证码不能为空","#ff0000","key3",0)
                }
            });
        }
    }

    function editBtn () {
        var btnCodePhoneVal =  parseInt($(".btnCode").val());
        if(btnCodePhoneVal > 0){
            btnCodePhoneVal-=1;
        }
        $(".btnCode").val(btnCodePhoneVal+"秒后在获取");
    }

$(function () {
    load_res();

    //tab切换
    $(".tabBox").on("click",'.eachTab',function(){
        var index = $(this).index();
        $(this).addClass('active').siblings(".eachTab").removeClass('active');
        $(".formBox .WrapBox").eq(index).show();
        $(".formBox .WrapBox").eq(index).siblings(".WrapBox").hide();

        var WrapBox = $(".formBox .WrapBox").eq(index).attr('class');
        var expvalue =  WrapBox.match(/[\w]+/).toString();

        $("#registerType").val(expvalue);
        var expvalue = $("#registerType").val();

        load_res();
    });
//    $(document).on("keypress",'.WrapBox input',function(event){
//            if(event.keyCode == 13){
//                event.preventDefault();
//                if($(this).parents(".formBoxWrap").next().hasClass("formBoxWrap")){
//                    $(this).parents(".formBoxWrap").next(".formBoxWrap").find(".input").focus();
//                }else{
//                    $(".btnReg").prop("disabled",false);
//                }
//            }
//    });

});




</script>
</body>
</html>