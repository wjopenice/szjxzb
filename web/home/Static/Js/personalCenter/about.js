$(function(){

    $(document).on("click",'.subUseTab',function(){
        var index = $(this).index();
        $(this).addClass('active').siblings().removeClass('active');
        $(".subUseCon").eq(index).show();
        $(".subUseCon").eq(index).siblings().hide();
    });


});
