/**
 * Created by ZB on 2018/5/7.
 */
$(function(){
    //投诉文本框输入字数
    $("#area").keyup(function(){
        var len = $(this).val().length;
        if(len > 299){
            $(this).val($(this).val().substring(0,300));
        }
        var num = 300 - len;
        if(num < 0){
            num = 0;
        }
        $("#word").text(num);
    });

});