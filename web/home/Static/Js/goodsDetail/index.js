$(function(){

    $(document).scroll(function(){
        if ($(document).scrollTop() > 100){
            $(".logoBox").addClass("fixedTopBar");
        }else{
            $(".logoBox").removeClass("fixedTopBar");
        }
    });

    //点击每一个小商品图片
    $(document).on("click",'.subLittleBox',function(){
        $(this).addClass('active').siblings().removeClass('active');
        var littleStr = $(this).attr("src");
        $(".goodsBig img").attr("src",littleStr)
    });

    //增加数量小于库存
    $(document).on("click",'.cart_add',function(){
        var stock = parseInt($(".stockNum").text());
        var textNum = parseInt($(this).parents(".cart_num").find(".cart_text_box").val());
        if(textNum > stock){
            $(this).parents(".cart_num").find(".cart_text_box").val(stock);
        }
    });

    //输入数量小于库存
    $(document).on("keyup",'.cart_text_box',function(){
        var stock = parseInt($(".stockNum").text());
        var textNum = parseInt($(this).parents(".cart_num").find(".cart_text_box").val());
        if(textNum > stock){
            $(this).parents(".cart_num").find(".cart_text_box").val(stock);
        }
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




