/**
 * Created by ZB on 2018/4/28.
 */
$(function(){

    //批量删除
    $(document).on("click", '.batch', function(){
        $('.del').show();
        $(".batch").hide();
        $('.complete').show();
    });

    //完成
    $(document).on("click", '.complete', function(){
        $('.batch').show();
        $(".del").hide();
        $(".complete").hide();
    });

    $(document).on("click",'.del',function(){
        $(this).parent().remove();
    });


});