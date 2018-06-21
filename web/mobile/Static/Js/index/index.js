$(function(){

    //   banner轮播图
    $(".swiper-container.bannerBox").swiper({
        speed: 3000,
        autoplay: true,
        pagination: '.swiper-pagination',
        loop: true,
        autoplayDisableOnInteraction: false//用户操作后，禁止停止autoplay
    });

});