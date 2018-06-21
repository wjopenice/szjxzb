/**
 * Created by ZB on 2018/4/11.
 */
$(function(){
    //点击QQ绑定weiBo
    $(document).on("click",'.QQBind',function(){
        bindHtml('手上商城想要打开“QQ”');
    });

    //点击weiBo绑定
    $(document).on("click",'.weiBo',function(){
        bindHtml('手上商城想要打开“微博”');
    });
    

    //点击解除微信绑定
    $(document).on("click",'.weChat',function(){
        alertHtml('解除绑定','确定要解除微信与此账号的关联？');
    });

    //解除绑定
    $(document).on("click",'.modal-button-bold',function(){
        $(".bind").addClass("unBind");
        $(".bind").text('未绑定');
    });
});

//绑定
function bindHtml(date){
    var alertHtml = '<div class="successBoxWrap"><p class="state">'+date+'</p></div>';
    $.confirm(alertHtml, function(){});
}

//解除绑定
function alertHtml(onlineDate,date){
    var alertHtml = '<div class="successBoxWrap"><p class="successTitle">'+onlineDate+'</p><p class="state">'+date+'</p></div>';
    $.confirm(alertHtml, function(){});
}