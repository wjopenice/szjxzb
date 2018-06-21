/**
 * Created by ZB on 2018/4/12.
 */
$(function(){

    //是否选择默认地址
    $(document).on("click",'.choseDefault',function(){
        if(!$(this).hasClass('active')){
            $(this).addClass('active');
        }else{
            $(this).removeClass('active');
        }
    });

    //删除地址
    $(document).on("click",'.delBtn',function(){
        var $this = $(this);
        $.confirm("确定删除该地址吗？",function(){
            $this.parents(".subAddress").remove();
        });
    });

});