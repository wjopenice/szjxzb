$(function(){

    //删除最近搜索
    $(document).on("click",'.recentlySearchBox .del',function(){
        $(".recentlySearchBox .searchLinkBox").empty();
        $(".recentlySearchBox").hide();
    });

    //点击筛选商品
    $(document).on("click",'.tab-link',function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

    //点击价格
    $(document).on("click",'.priceSearch',function(){

        var isTop = $(this).find(".icon-array");
        if(!isTop.hasClass('active')){
            isTop.addClass('active');
        }else{
            isTop.removeClass('active');
        }
    });

});