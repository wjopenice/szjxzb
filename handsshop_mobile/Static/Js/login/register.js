/**
 * Created by ZB on 2018/4/9.
 */
$(function(){
    var errorMsg = "";//错误信息

    //tab切换
    $(".tabBox").on("click",'.eachTab',function(){
        var index = $(this).index();
        $(this).addClass('active').siblings(".eachTab").removeClass('active');
        $(".formBox .WrapBox").eq(index).show();
        $(".formBox .WrapBox").eq(index).siblings(".WrapBox").hide();
    });

    //勾选同意协议
    $(".ChoseClick").on("click",function(){

        var verify = $(this).parents(".agreementBox").hasClass('active');
        if(!verify){
            $(this).parents(".agreementBox").addClass('active');
        }else{
            $(this).parents(".agreementBox").removeClass('active');
        }

    });

    //点击注册
    $(document).on("click",'.btnReg',function(){
        register();
    });

});

function register(){
    var index = $(".eachTab.index").index();

    var verifyVal = false;
    if(index == 0){

        verifyVal = verifyAccount($(".accountInput").val());
        verifyVal = verifyPwd($(".accountPwdInput").val()) && verifyVal;
        verifyVal = verifyRealName($(".accountRealName").val()) && verifyVal;
        verifyVal = verifyCardId($(".accountCardId").val()) && verifyVal;

        var account = $.trim($(".accountInput").val());
        var pwd = $.trim($(".accountPwdInput").val());
        var realName = $.trim($(".accountRealName").val());
        var cardId = $.trim($(".accountCardId").val());

    }else if(index == 1){

        verifyVal = verifyPhone($(".phoneInput").val());
        verifyVal = verifyPwd($(".phonePwdInput").val()) && verifyVal;
        verifyVal = verifyRealName($(".phoneRealNameInput").val()) && verifyVal;
        verifyVal = verifyCode($(".codeInput").val()) && verifyVal;

        var phone = $.trim($(".phoneInput").val());
        var pwd = $.trim($(".phonePwdInput").val());
        var realName = $.trim($(".phoneRealNameInput").val());
        var code = $.trim($(".codeInput").val());
    }

    if(!verifyVal){
        $.toast(errorMsg);
        return false;
    }
}