/**
 * Created by ZB on 2018/4/11.
 */
$(function(){
    $(".save").click(function() {
        $.toast("感谢您的反馈");
    });
    
    $("#area").keyup(function(){
        var len = $(this).val().length;
        if(len > 499){
            $(this).val($(this).val().substring(0,500));
        }
        var num = 500 - len;
        if(num < 0){
            num = 0;
        }
        $("#word").text(num);
    });
});