var errorMsg = "";//错误信息

$(function(){

    //点击重置密码
    $(document).on("click",'.btnReset',function(){
        resetPwd();
    });

    //tab切换
    $(".tabBox").on("click",'.eachTab',function(){
        var index = $(this).index();
        $(this).addClass('active').siblings(".eachTab").removeClass('active');
        $(".formBox .WrapBox").eq(index).show();
        $(".formBox .WrapBox").eq(index).siblings(".WrapBox").hide();
    });
    
});

function resetPwd(){

    var verifyVal  = verifyAccount($(".accountInput").val());
    verifyVal = verifyPhone($(".phoneInput").val()) && verifyVal;
    verifyVal = verifyCode($(".codeInput").val()) && verifyVal;
    verifyVal = verifyPwd($(".pwdInput").val()) && verifyVal;

    if(!verifyVal){
        $.toast(errorMsg);
        return false;
    }

    var account = $.trim($(".accountInput").val());
    var phone = $.trim($(".phoneInput").val());
    var code = $.trim($(".codeInput").val());
    var pwd = $.trim($(".pwdInput").val());


}