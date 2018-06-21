$(function(){

    //收藏
    $(document).on("click",'.goodsNameContent .favourite',function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
        }else{
            $(this).addClass('active');
        }
    });

    //点击商品详情Tab
    $(document).on("click",'.subGoodsDetailTit',function(){
        var index = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $(".subGoodsDetailCon").eq(index).show();
        $(".subGoodsDetailCon").eq(index).siblings().hide();
    });

    //商品详情导航栏固定
    $(".page-group").scroll(function(){
        var topVal = $("#goodsDetailBox").offset().top;
        if(topVal <= 0){
            $(".goodsDetailTit").addClass('fixed');
        }else if(topVal > 0){
            $(".goodsDetailTit").removeClass('fixed');
        }
    });

    //点击商品属性
    $(document).on("click",'.propertyChose',function(){
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    });

    //商品图片Banner
    $(".swiper-container").swiper({
        speed: 1000,
        autoplay: false,
        pagination: '.swiper-pagination',
        loop: true
    });

    sliderNum();

    //滑动修改详情图片对应数量
    $(".swiper-slide").bind('touchmove',function(){
        sliderNum();
    });

});

//修改图片对应数
function sliderNum(){
    var sliderIndex = $(".swiper-pagination-bullet-active").index() + 1;
    var sliderTotal = $(".swiper-pagination-bullet").length;
    $(".goodsImgPageBox .imgIndexNum").text(sliderIndex);
    $(".goodsImgPageBox .imgTotalNum").text(sliderTotal);
}

