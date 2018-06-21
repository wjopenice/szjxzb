var errorMsg = "";
$(function() {

    //点击登录
    $("#btnLogin").on("click",function(){
        login();
    });
    
});

//点击登录
function login(){

    var verifyVal = verifyAccount($("#account input").val());
    verifyVal = verifyPwd($("#pwd input").val()) && verifyVal;

    if(!verifyVal){
        $.toast(errorMsg);
        return false;
    }

    var account = $.trim($("#account input").val());
    var pwd = $.trim($("#pwd input").val());

}



