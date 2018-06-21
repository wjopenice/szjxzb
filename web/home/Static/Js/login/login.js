/**
 * Created by ZB on 2018/4/19.
 */
$(function(){

    //点击忘记密码
    $(document).on("click",'.isChose',function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
        }else{
            $(this).addClass('active');
        }
    });
    
});