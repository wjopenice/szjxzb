$(function(){

    //选择优惠券
    $(document).on("click",'.subCouponBox',function(){
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    });

    //确定优惠券
    $(document).on("click",'.operationBox .confirm',function(){
        var couponInfo = $(".subCouponBox.active").attr("data-coupon");
        $(".couponValBox").find(".couponVal").text(couponInfo);
        $(this).addClass('close-popup');
    });

    //点击提交订单
    $(document).on("click",'.submitBtn',function(){
        var money = $(".submitNavBar .money").text();
        alertPayModel(money);
    });

    //确认支付
    $(document).on("click",'.alertBoxWrap .confirmPayBtn',function(){
        var money = $(this).parents(".alertBoxWrap").find(".finalMoney").text();//支付金额
    });

});



