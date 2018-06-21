/**
 * Created by ZB on 2018/4/10.
 */
$(function(){
    var url = window.location.href;
    var index = url.substring(url.indexOf("?tab=")+5);
    $(".button"+index).addClass('active').siblings().removeClass('active');
    $("#tab"+index).addClass('active').siblings().removeClass('active');
    
    //在页面是选项卡
    $(".button").click(function(){
        var index = $(this).index();
        $(".button").eq(index).addClass('active').siblings().removeClass('active');
        $(".tab").eq(index).addClass('active').siblings().removeClass('active');
    });

    //删除订单
    $(".deleteOrder").click(function(){
        alertHtml('确定删除订单？','删除之后将无法恢复');
    });
    
    //确定删除
    $(document).on("click",'.modal-button-bold',function(){
        $("#tab5 .comment").hide();
        $("#tab5 .noGoods").show();
    });

    //点击提交订单
    $(document).on("click",'.paymentOrder',function(){
        $(".alertBoxWrap").show();
    });

    //关闭弹窗
    $(document).on("click",'.chosePayType .closeBtn',function(){
        $(".alertBoxWrap").remove();
    });

    //取消订单
    $(".cancelOrder").click(function() {
        $.toast("取消订单成功");
    });

    //确认收货
    $(".confirmation").click(function() {
        $.toast("确认收货成功");
    });

    //提醒发货
    $(".remind").click(function() {
        $.toast("提醒发货成功");
    });

    //点击付款
    $(document).on("click",'.paymentOrder',function(){
        var money = $(this).parents("li").find(".unPayMoney").text();
        alertPayModel(money);
    });

});

//删除订单
function alertHtml(onlineDate,date){
    var alertHtml = '<div class="successBoxWrap"><p class="successTitle">'+onlineDate+'</p><p>'+date+'</p></div>';
    $.confirm(alertHtml, function(){});
}











