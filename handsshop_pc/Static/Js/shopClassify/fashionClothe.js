/**
 * Created by ZB on 2018/4/23.
 */
$(function(){
    //分类滚动
    $(".slide-box").hbySlide({
        slidePrev: ".slide-btns .prev",
        slideNext: ".slide-btns .next",
        isHoverBtns:true,
        mode: "show"
    });

    //商品列表头部分类选中
    $(document).on("click",'.shopClassify ul li',function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

    //商品列表头部排序选中
    $(document).on("click",'.shopSort ul li',function(){
        $(this).addClass('active').siblings().removeClass('active');
    });


});