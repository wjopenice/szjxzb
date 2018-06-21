/**
 * Created by ZB on 2018/4/10.
 */
$(function(){

    //点击领取
    $(document).on("click",'.receive',function(){
        var index = $(this).attr("index");
        var money = $("#num"+index).text();
        alertHtml(money +'元优惠券','领取成功');
    });
});

function alertHtml(Num,state){
    var alertHtml = '<div class="successBoxWrap"><p class="successTitle">'+Num+'</p><p class="state">'+state+'</p></div>';

    $.alert(alertHtml, function(){});
}