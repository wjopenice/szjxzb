/**
 * Created by ZB on 2018/4/12.
 */
$(function(){

    //选择地址
    $(document).on("click",'.areaBox',function(){
        $('.area-warp').addClass('open');
    });

    //点击确定地址
    $('.area-sure').click(function() {
        $(".areaBox .areaInfo").text(AreaGetName());
        $('.area-warp').removeClass('open');
        return false;
    });

});