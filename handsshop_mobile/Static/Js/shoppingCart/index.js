var totalPrice = 0;
$(function(){

    isChecked();
    countTotalPrice();

    //减
    $(document).on('click', '.cart_min', function() {
        countTotalPrice();
    });
    //加
    $(document).on('click', '.cart_add', function() {
        countTotalPrice();
    });
    //全选与反全选
    $(document).on("click",'.balanceBox .isChecked',function(){
        isChecked();
        countTotalPrice();
    });
    //是否去掉全选
    $(document).on("click",'.subCartBox .isChecked',function(){
        isAllChecked();
        countTotalPrice();
    });
    //勾选框
    $(document).on("click",'.isChecked',function(){
        var checked = $(this).parents('.subCartBox').hasClass('active');
        if(!checked){
            $(this).parents('.subCartBox').addClass('active');
        }else{
            $(this).parents('.subCartBox').removeClass('active');
        }
        countTotalPrice();
    });
    //点击删除
    $(document).on("click",'.shoppingCartBox .deleteIcon',function(){
        $(".shoppingCartBox .delete").hide();
        $(".shoppingCartBox .subCartBox").hide();
        $(".shoppingCartBox .noGoods").show();
        $(".balanceBox").hide();
        $(".hotList").removeClass('marBot');
    });

});

function isChecked(){
    var isChecked = $(".balanceBox .isChecked").hasClass('active');
    if(isChecked){
        $(this).addClass('active');
        $(".subCartBox").addClass('active');
        $(".subCartBox").find(".isChecked").addClass('active');
    }else{
        $(this).removeClass('active');
        $(".subCartBox").removeClass('active');
        $(".subCartBox").find(".isChecked").removeClass('active');
    }
}
function isAllChecked(){
    var bool = true;
    $.each($(".subCartBox .isChecked"),function(i,val){
       bool = $(".subCartBox .isChecked").eq(i).hasClass('active') && bool;
    });
    if(!bool){
        $(".balanceBox .isChecked").removeClass('active');
    }else{
        $(".balanceBox .isChecked").addClass('active');
    }
}

//计算总价
function countTotalPrice(){
    totalPrice = 0;
    $.each($(".subCartBox.active"),function(i,val){
        var unitPrice = $(this).find(".goodsPriceVal").text();
        var quantity = $(this).find(".cart_text_box").val();
        totalPrice = unitPrice*quantity + totalPrice;
    });
    $("#confirmTotalPrice").text(totalPrice);
}
