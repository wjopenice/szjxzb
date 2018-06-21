/**
 * Created by ZB on 2018/5/4.
 */
$(function(){
    //订单管理Tap切换
    $('.rightContentTitle').find('a').click(function(){
        var index = $(this).index();
        $(".rightContentTitle a").eq(index).addClass('active').siblings().removeClass('active');
        $(".orderModule").eq(index).addClass('cur').siblings().removeClass('cur');
    });





    //查看物流
    $(document).on("click",'.lookLogistics',function(){
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


    //确认收货
    $(document).on("click",'.collect',function(){
        $(".getCollectAlert").hbyPopShow({
            width: "400",
            height: "240",
            isHideTitle: true
        });
    });

    //关闭确认收货
    $(document).on("click",'.closeBtn ,.cancelBtn',function(){
        $(".getCollectAlert").hbyPopHide();
    });

    //确认删除该订单
    $(document).on("click",'.delIcon',function(){
        $(".getDelAlert").hbyPopShow({
            width: "400",
            height: "240",
            isHideTitle: true
        });
    });

    //关闭删除该订单
    $(document).on("click",'.closeBtn ,.cancelBtn',function(){
        $(".getDelAlert").hbyPopHide();
    });
    

    
});