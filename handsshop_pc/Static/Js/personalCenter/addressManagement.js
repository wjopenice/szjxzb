/**
 * Created by ZB on 2018/4/26.
 */
$(function(){
    //电话号码隐藏中间四位
    var tel = $('.tel').html();

    var mtel = tel.substr(0, 3) + '****' + tel.substr(7);
    $('.tel').text(mtel);


    //新增地址
    $(document).on("click",'.addBtn',function(){
        $(".getCouponAlert").hbyPopShow({
            width: "700",
            height: "380",
            isHideTitle: true
        });
    });

    //删除地址
    $(document).on("click",'.delBtn',function(){
        delBtnId = $(this).parent().parent().attr("data-id");
        console.log(delBtnId);
        $(".getDelAlert").hbyPopShow({
            width: "700",
            height: "290",
            isHideTitle: true
        });
    });

    //新增地址关闭
    $(document).on("click",'.close',function(){
        $(".getCouponAlert").hbyPopHide();
    });

    //删除地址关闭
    $(document).on("click",'.close',function(){
        $(".getDelAlert").hbyPopHide();
    });

    //设置默认
    $(document).on("click",'.set',function(){
        /*if($(this).hasClass('activeIcon')){
            $(this).removeClass('activeIcon');
        }else{
            $(this).addClass('activeIcon');
        }*/
        $(".set").text("设为默认地址").removeClass('defaultAddress');
        $(this).text("默认地址").addClass('defaultAddress');

    });




});