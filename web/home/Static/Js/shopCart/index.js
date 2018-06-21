$(function(){

    countTotal();
    countHasChose();
    //全选和反选
    $(document).on("click",'.cartOperation .check',function(){
        var isActive = $(this).hasClass('active');
        if(!isActive){
            $(".cartInfoBox .check").removeClass('active');
            $(".operationBox .check").removeClass('active');
        }else{
            $(".cartInfoBox .check").addClass('active');
            $(".operationBox .check").addClass('active');
        }
        countHasChose();
        countTotal();
    });
    //点击批量删除的全选和反选
    $(document).on("click",'.operationBox .check',function(){
        var isChecked = $(this).hasClass('active');
        if(!isChecked){
            $(".subCart .check").removeClass('active');
            $(".checkDiv .check").removeClass('active');
        }else{
            $(".subCart .check").addClass('active');
            $(".checkDiv .check").addClass('active');
        }
        countHasChose();
        countTotal();
    });
    //选择每一个商品
    $(document).on("click",'.subCart .check',function(){
        var bool = true;
        var boolChose = false;
        $.each($(".subCart .check"),function(i,obj){
            bool = $(obj).hasClass('active') && bool;
            boolChose = $(obj).hasClass('active') || boolChose;
        });
        if(bool){
            $(".cartOperation .check").addClass('active');
            $(".operationBox .check").addClass('active');
        }else{
            $(".cartOperation .check").removeClass('active');
            $(".operationBox .check").removeClass('active');
        }
        if(boolChose){
            $(".operationBox .check").addClass('active');
        }
        countHasChose();
        countTotal();
    });
    //减
    $(document).on("click",'.cart_min',function(){
        countSubTotal($(this));
        countTotal();
    });
    //加
    $(document).on("click",'.cart_add',function(){
        countSubTotal($(this));
        countTotal();
    });
    //填写数量
    $(document).on("keyup",'.cart_text_box',function(){
        countSubTotal($(this));
        countTotal();
    });
    //单条删除
    $(document).on("click",'.delBtn',function(){
        $(this).parents(".subCart").remove();
        countTotal();
    });
    //单条移入收藏夹(后端加入收藏)
    $(document).on("click",'.addFavBtn',function(){
        $(this).parents(".subCart").remove();
    });
    //清空时效商品
    $(document).on("click",'.clearGoods',function(){
        $(".subCart[data-isExpire='0']").remove();
    });
    //批量删除
    $(document).on("click",'.batchDel',function(){
        var isChecked = $(".operationBox .check").hasClass('active');
        if(!isChecked){
            $.hbySystemTip('warn','请选择您要删除的商品');
        }else{
            var bool = true;
            $.each($(".subCart .check"),function(i,obj){
                bool = $(obj).hasClass('active') && bool;
            });
            if(bool){
                $(".cartInfoBox").empty();
                $(".cartCon").hide();
                $(".noCart").show();
            }else{
                $(".subCart .check.active").parents(".subCart").remove();
                countHasChose();
            }
        }
    });
    //猜你喜欢
    $(".slide-box").hbySlide({
        slidePrev: ".slide-btns .prev",
        slideNext: ".slide-btns .next",
        isHoverBtns:false,
        mode: "left"
    });
});

//计算小计
function countSubTotal(obj){
    var unitPrice = obj.parents(".subCart").find(".unitPriceMoney").text();
    var num = obj.parents(".cart_num").find(".cart_text_box").val();
    obj.parents(".subCart").find(".eachTotalMoney").text(unitPrice*num);
}
//计算总计
function countTotal(){
    var subTotal = $(".subCart");
    var total = 0;
    var couponMoney = $(".couponPayMoney").text();
    $.each(subTotal,function(i,obj){
        var isChecked = $(obj).find(".check").hasClass('active');
        var num = $(obj).find(".cart_text_box").val();
        var unitPrice = $(obj).find(".unitPriceMoney").text();
        if(isChecked){
            total = parseInt(num * unitPrice) + total;
        }
    });



    $(".lastPay span").text(total);
    $(".shouldPay .factPayMoney").text(total - couponMoney);
}
//计算已选商品数量
function countHasChose(){
    var num = 0;
    $.each($(".subCart .check"),function(i,obj){
        num = $(obj).hasClass('active') ? num+1 : num;
    });
    if(!num){
        $(".operationBox .check").removeClass('active');
        $(".cartOperation .check").removeClass('active');
    }
    $(".choseNum").text(num);
}




