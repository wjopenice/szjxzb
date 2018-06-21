$(function(){

    isChecked();
    //全部
    $(document).on("click", '.collectionHead .all', function(){
        isDownIcon();
        $(".classify").slideToggle("slow");
    });
    //管理
    $(document).on("click", '.collectionHead .manageBtn', function(){
        $('.hotList').addClass('padBot3');
        $(".cancelBtn").show();
        $('.isChecked').show();
        $('.balanceBox').show();
    });
    //取消
    $(document).on("click", '.collectionHead .cancelBtn', function(){
        $('.hotList').removeClass('padBot3');
        $(".cancelBtn").hide();
        $('.isChecked').hide();
        $('.balanceBox').hide();
    });
    //全选与反全选
    $(document).on("click",'.balanceBox .isChecked',function(){
        isChecked();
    });
    //是否去掉全选
    $(document).on("click",'.subBest .isChecked',function(){
        isAllChecked();
    });
    //勾选框
    $(document).on("click",'.isChecked',function(){
        var checked = $(this).parents('.subBest').hasClass('active');
        if(!checked){
            $(this).parents('.subBest').addClass('active');
        }else{
            $(this).parents('.subBest').removeClass('active');
        }
    });
    //点击删除
    $(document).on("click",'.balanceBox .balanceBtn',function(){
        $.each($(".subBest.active"),function(i,val){
            $(this).remove();
        });
        if(!$(".subBest").length>0){
            $(".hotList").hide();
            $(".noGoods").show();
            $(".balanceBox").hide();
            $(".manage").hide();
        }
    });

});
function isDownIcon(){
    var isDownIcon = $(".all .icon").hasClass('active');
    if(isDownIcon){
        $(this).removeClass('active');
        $(".all").find(".icon").removeClass('active');
    }else{
        $(this).addClass('active');
        $(".all").find(".icon").addClass('active');
    }
}
function isChecked(){
    var isChecked = $(".balanceBox .isChecked").hasClass('active');
    if(isChecked){
        $(this).addClass('active');
        $(".subBest").addClass('active');
        $(".subBest").find(".isChecked").addClass('active');
    }else{
        $(this).removeClass('active');
        $(".subBest").removeClass('active');
        $(".subBest").find(".isChecked").removeClass('active');
    }
}
function isAllChecked(){
    var bool = true;
    $.each($(".subBest .isChecked"),function(i,val){
        bool = $(".subBest .isChecked").eq(i).hasClass('active') && bool;
    });
    if(!bool){
        $(".balanceBox .isChecked").removeClass('active');
    }else{
        $(".balanceBox .isChecked").addClass('active');
    }
}