$(function(){

    //点击类别的切换
    $(document).on("click",'.subTypeName',function(){
        $(this).addClass('active').siblings().removeClass('active');
    });


});

