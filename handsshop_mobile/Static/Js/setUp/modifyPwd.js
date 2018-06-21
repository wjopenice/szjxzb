/**
 * Created by ZB on 2018/4/11.
 */
$(function () {
    $(".next").click(function () {
        $("#next").hide();
        $("#sure").show();
    });
    
    $(".sure").click(function(){
        $.toast("修改成功");
    })
});