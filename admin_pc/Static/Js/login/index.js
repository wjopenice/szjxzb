var errorMsg = "";
$(function(){

    if(self !== top){
        top.location.href = self.location.href;
    }
    //轮播图
    $(".bannerBox").slide({
        mainCell:".slideBanner",
        effect:"fold",
        interTime:3500,
        delayTime:500,
        autoPlay:true,
        autoPage:true,
        endFun:function(i,c,s){
            $(window).resize(function(){
                var width = $(window).width();
                var height = $(window).height();
                s.find(".slideBanner,.slideBanner li").css({"width":width,"height":height});
            });
        }
    });

    //输入框得焦
    $(document).on("focus",'.formText .input-text',function(){
        $(this).parent().addClass("focus");
    });
    //输入框失焦
    $(document).on("blur",'.formText .input-text',function(){
        $(this).parent().removeClass("focus");
    });
    //登录
    $(document).on("click",'.btnLogin',function(){
        loginSubmit();
    });
    //回车提交
    $(document).keyup(function(event){
        if(event.keyCode ==13){
            var isFocus=$("#verify").is(":focus");
            if(true==isFocus){
                loginSubmit();
            }
        }
    });

});
//登录
function loginSubmit(){
   var verifyVal = verifyUserName();
        verifyVal = verifyPwd() && verifyVal;
        verifyVal = verifyImgCode() && verifyVal;

   if(!verifyVal){
      showError(errorMsg);
       return false;
   }

    var userName = $.trim($(".userName").val());
    var pwd = $.trim($(".pwd").val());
    var verifyCode = $.trim($(".verifyCode").val());

    $.post('',{},function(){});
}
//显示错误信息
function showError(msg){
    $(".errorMsg").show().html("").text(msg);
}
//刷新图形验证码
function fleshVerify(){
    $('#imgVerify').attr('src','/index.php?m=Admin&c=Admin&a=verify&r='+Math.floor(Math.random()*100));//重载验证码
}
//表单信息验证
function verifyUserName(){
    var userName = $.trim($(".userName").val());
    if(!userName){
        errorMsg = "请填写用户名";
        return false;
    }else{
        errorMsg = "";
        return true;
    }
}
function verifyPwd(){
    var pwd = $.trim($(".pwd").val());
    if(!pwd){
        errorMsg = "请填写密码";
        return false;
    }else{
        errorMsg = "";
        return true;
    }
}
function verifyImgCode(){
    var verifyCode = $.trim($(".verifyCode").val());
    if(!verifyCode){
        errorMsg = "请填写图形验证码";
        return false;
    }else{
        errorMsg = "";
        return true;
    }
}
