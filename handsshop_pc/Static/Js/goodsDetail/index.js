$(function(){

    //点击每一个小商品图片
    $(document).on("click",'.subLittleBox',function(){
        $(this).addClass('active').siblings().removeClass('active');
        var littleStr = $(this).attr("src");
        $(".goodsBig img").attr("src",littleStr)
    });

    //选择规格
    $(document).on("click",'.subSpec',function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

    //收藏
    $(document).on("click",'.btn_fav',function(){
        var isActive = $(this).hasClass('active');
        if(!isActive){
            $(this).addClass('active');
        }else{
            $(this).removeClass('active');
        }
    });

    //大家都在看
    $(".slide-box").hbySlide({
        slidePrev: ".slide-btns .prev",
        slideNext: ".slide-btns .next",
        isHoverBtns:false,
        mode: "left"
    });

    //点击详情Tab
    $(document).on("click",'.subDetailTab',function(){
        var index = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $(".subDetailCon").eq(index).show();
        $(".subDetailCon").eq(index).siblings().hide();
    });

});




