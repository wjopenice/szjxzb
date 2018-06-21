/**
 * Created by ZB on 2018/5/7.
 */
$(function(){
    //查看物流
    $(document).on("click",'.lookBtn',function(){
        $(".getCouponAlert").hbyPopShow({
            width: "650",
            height: "600",
            isHideTitle: true
        });
    });

    //关闭查看物流
    $(document).on("click",'.close',function(){
        $(".getCouponAlert").hbyPopHide();
    });


    //退款说明
    $("#area").keyup(function(){
        var len = $(this).val().length;
        if(len > 199){
            $(this).val($(this).val().substring(0,200));
        }
        var num = 200 - len;
        if(num < 0){
            num = 0;
        }
        $("#word").text(num);
    });
});