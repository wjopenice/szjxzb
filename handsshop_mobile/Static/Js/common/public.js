$(function(){

    //隐藏加载中...
    $('#loader').fadeOut();

    //勾选框
    $(document).on("click",'.isChecked',function(){
        var checked = $(this).hasClass('active');
        if(!checked){
            $(this).addClass('active');
        }else{
            $(this).removeClass('active');
        }
    });

    // 加减框
    $(document).on('click', '.cart_min', function() {
        var item = $(this).closest('.cart_num');
        var t = item.find(".cart_text_box");
        t.val(parseInt(t.val()) - 1);
        if (parseInt(t.val()) == 1) {
            item.find('.cart_min').attr('disabled', true);
        }
    });
    $(document).on('click', '.cart_add', function() {
        var item = $(this).closest('.cart_num');
        var t = item.find(".cart_text_box");
        if (parseInt(t.val()) != 1) {
            item.find('.cart_min').removeAttr('disabled');
        }
        if (parseInt(t.val()) >= 999) {
            item.find('.cart_add').attr('disabled', true);
            return false;
        }
        t.val(parseInt(t.val()) + 1);
    });

    //关闭弹窗
    $(document).on("click",'.chosePayType .closeBtn',function(){
        $(".alertBoxWrap").remove();
    });

    //用于copy
    $('.copy').each(function(i, item) {
        //定义该值是为了省略后面程序的的字符数，并且取copy的第一个
        var that = $('.copy').eq(0);
        //获得当前copy标签的data-num的值，即要复制的次数
        var num = that.attr("data-num");
        //获得包括当前节点的html代码
        var obj = that.clone().prop("outerHTML");
        //将获得到的html代码中的copy字符串去除，以免js出现死循环或错误循环，并存为变量
        var newObj = obj.replace('copy', '');

        for (i = 1; i < num; i++) {
            //在当前节点后插入html代码
            that.after(newObj);
        }
        //移除当前节点的copy的class,避免对页面第二个copy标签的复制影响
        that.removeClass('copy');
    });

});

//发送请求
function sendReq(url,param,tip,callback){
    $.ajax({
        type:'post',
        dataType:'json',
        data:param,
        async:false,
        url:url,
        success:function(result) {
            callback && callback(result);
        },
        error:function() {}
    });
}

function alertHtml(onlineDate,date,sure){
    var alertHtml = '<div class="successBoxWrap"><p class="successTitle">'+onlineDate+'</p><p class="state">'+date+'</p><p class="sure">'+sure+'</p></div>';
    $.confirm(alertHtml, function(){});
}

//支付弹窗
function alertPayModel(money){

    var alertCon = '<div class="alertBoxWrap">' +
        '<div class="alertCon chosePayType">' +
        '<div class="tit">选择支付方式 <i class="closeBtn"></i></div>' +
        '<div class="payMoney">￥<span class="finalMoney">'+money+'</span></div>' +
        '<div class="payTypeBox cf">' +
        '<i class="wxIcon fl"></i><span class="fl">微信支付</span><span class="icon icon-right fr hide"></span></i>' +
        '</div>' +
        '<a class="confirmPayBtn" href="javascript:void(0)">确认支付</a>' +
        '</div>' +
        '</div>';

    $("body").append(alertCon);
}

//验证账号
function verifyAccount(account){
    var account = $.trim(account);
    var accountReg = /^[a-zA-Z]+[0-9a-zA-Z_]{5,14}$/;
    var phoneReg = /^(13|14|15|17|18)[0-9]{9}$/;
    if(!account){
        errorMsg = "请输入您的账号";
        return false;
    }else if(!accountReg.test(account)&&!phoneReg.test(account)){
        errorMsg = "请填写正确的账号";
        return false;
    }
    else{
        errorMsg = "";
        return true;
    }
}

//验证手机号
function verifyPhone(phone){

    var phone = $.trim(phone);
    var phoneReg = /^(13|14|15|17|18)[0-9]{9}$/;

    if(!phone){
        errorMsg = "请填写您的手机号";
        return false;
    }else if(!phoneReg.test(phone)){
        errorMsg = "请填写正确的手机号";
        return false;
    }else{
        errorMsg = "";
        return true;
    }
}

//验证注册密码
function verifyPwd(pwd){
    var pwd = $.trim(pwd);
    var pwdReg = /^(?![0-9]+$)[0-9A-Za-z]{6,15}$/;
    if(!pwd){
        errorMsg = "请填写您的密码";
        return false;
    }else if(!pwdReg.test(pwd)){
        errorMsg = "请填写正确的密码";
        return false;
    }else{
        errorMsg = "";
        return true;
    }
}

//验证真实姓名
function verifyRealName(realName){

    var realName = $.trim(realName);
    var realNameReg = /^([\u4e00-\u9fa5]{1,20}|[a-zA-Z\.\s]{1,20})$/;
    if(!realName){
        errorMsg = "请填写您的真实姓名";
        return false;
    }else if(!realNameReg.test(realName)){
        errorMsg = "请填写正确的真实姓名";
        return false;
    }else{
        errorMsg = "";
        return false;
    }

}

//验证身份证
function verifyCardId(cardId){

    var cardId = $.trim(cardId);
    var cardIdReg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
    if(!cardId){
        errorMsg = "请填写您的身份证号码";
        return false;
    }else if(!cardIdReg.test(cardId)){
        errorMsg = "请填写真确的身份证号码";
        return false;
    }else{
        errorMsg = "";
        return true;
    }

}

//验证短信验证码
function verifyCode(code){

    var code = $.trim(code);
    if(!code){
        errorMsg = "请填写您的短信验证码";
        return false;
    }else if(code.length != 4){
        errorMsg = "请填写正确的短信验证码";
        return false;
    }else{
        errorMsg = "";
        return true;
    }

}


