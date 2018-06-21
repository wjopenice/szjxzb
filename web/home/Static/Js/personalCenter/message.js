/**
 * Created by ZB on 2018/4/25.
 */
$(function(){
    //点击切换
    $('.rightContentTitle').find('a').click(function(){
        var index = $(this).index();
        $(".rightContentTitle a").eq(index).addClass('active').siblings().removeClass('active');
        $(".messageContentList").eq(index).addClass('cur').siblings().removeClass('cur');
    });



    


});