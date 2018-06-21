/**
 * Created by ZB on 2018/4/28.
 */
$(function(){

    //退货 全部 换货tap
    $(".recordTapLi").click(function(){
        var index = $(this).index();
        $(".recordTapLi").eq(index).addClass('on').siblings().removeClass('on');
        $(".recordListContent").eq(index).addClass('cur').siblings().removeClass('cur');
    });

    //查看详情
    $(document).on("click",'.recordLiLook',function(){
        $(".getCouponAlert").hbyPopShow({
            width: "1020",
            height: "620",
            isHideTitle: true
        });
    });

    //删除删除查看详情
    $(document).on("click",'.pop-cont',function(){
        $(".getCouponAlert").hbyPopHide();
    });
});