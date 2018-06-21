/**
 * Created by ZB on 2018/4/24.
 */
$(function(){
    //商品列表头部排序选中
    $(document).on("click",'.modeUl li',function(){
        $(this).addClass('active').siblings().removeClass('active');
    });
});