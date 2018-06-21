$(function(){

    //banner
    $(".slide-box.banner").hbySlide();

    //分类滚动
    $(".slide-box").hbySlide({
        slidePrev: ".slide-btns .prev",
        slideNext: ".slide-btns .next",
        isHoverBtns:false,
        mode: "left"
    });

    //左侧楼层当行导航栏
    $(document).scroll(function(){

        if($(document).scrollTop() > ($('#floor1').offset().top - 200)){
            $('.fixFloor').show();
        }else{
            $('.fixFloor').hide();
        }

        var sTop = $(window).scrollTop();
        var floor1 = $("#floor1").offset().top;
        var floor2 = $("#floor2").offset().top;
        var floor3 = $("#floor3").offset().top;
        var floor4 = $("#floor4").offset().top;
        var floor5 = $("#floor5").offset().top;
        var floor6 = $("#floor6").offset().top;

        if(sTop >= floor1-200){
            $(".floor1").delay(300).addClass("active").siblings("li").removeClass("active");
        }
        if(sTop >= floor2-200){
            $(".floor2").delay(300).addClass("active").siblings("li").removeClass("active");
        }
        if(sTop >= floor3-200){
            $(".floor3").delay(300).addClass("active").siblings("li").removeClass("active");
        }
        if(sTop >= floor4-200){
            $(".floor4").delay(300).addClass("active").siblings("li").removeClass("active");
        }
        if(sTop >= floor5-200){
            $(".floor5").delay(300).addClass("active").siblings("li").removeClass("active");
        }
        if(sTop >= floor6-200){
            $(".floor6").delay(300).addClass("active").siblings("li").removeClass("active");
        }

    });

    //点击左侧导航栏
    $(document).on("click",'.subFloor',function(){
        var thisId = $(this).attr("data-floor");
        $('html,body').animate({ scrollTop: ($('#' + thisId).offset().top -70) }, 100);
    });

    //点击返回顶部
    $(document).on("click",'.returnTopFloor',function(){
        $('html,body').animate({scrollTop:0},500);
    });

    //点击优惠券
    $(document).on("click",'.coupon',function(){
        $(".getCouponAlert").hbyPopShow({
            width: "780",
            height: "500",
            isHideTitle: true
        });
    });

    //点击领取成功关闭弹窗
    $(document).on("click",'.getCouponAlert',function(){
        $(".getCouponAlert").hbyPopHide();
    });





});
