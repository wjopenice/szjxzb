/**
 * Created by ZB on 2018/4/11.
 */
$(function(){

    //点击领取
    $(document).on("click",'.iphone',function(){
        alertHtml('客服在线时间：','周一至周五：10:30~19:00','确定要联系客服吗？');
    });

    //点击确定拨打电话
    $(document).on("click",'.modal-button-bold',function(){
        window.location.href = "tel:17688830262";
    });
});

