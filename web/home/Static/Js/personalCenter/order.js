/**
 * Created by ZB on 2018/5/4.
 */
$(function(){
    //新增地址
    $(document).on("click",'.lookLogistics',function(){
        $(".getCouponAlert").hbyPopShow({
            width: "650",
            height: "600",
            isHideTitle: true
        });
    });

    //新增地址关闭
    $(document).on("click",'.close',function(){
        $(".getCouponAlert").hbyPopHide();
    });
    
    
});