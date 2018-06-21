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

    //修改地址
    $(document).on("click",'.editBtn',function(){
        $(".getEditAlert").hbyPopShow({
            width: "700",
            height: "380",
            isHideTitle: true
        });
    });
    //修改地址关闭
    $(document).on("click",'.close',function(){
        $(".getEditAlert").hbyPopHide();
        if(getCookie("address")){
            delCookie("address","",0,"d");
        }
    });

    //删除地址
    $(document).on("click",'.delBtn',function(){
        $(".getDelAlert").hbyPopShow({
            width: "700",
            height: "290",
            isHideTitle: true
        });
        $("#delDetail").empty();
        $("#subFormDelBtn").empty();
        $.get("?r=user/uc/addressdel&type=1",{id:$(this).attr("url")},function (msg) {
              var id = msg.id;
              var cityaddr = msg.cityaddr;
              var tell = msg.tell;
              var username = msg.username;
              $("<p><span class='delName dib'>排序：</span><span class='delText'>"+id+"</span></p><p><span class='delName dib'>收件人：</span><span class='delText'>"+username+"</span></p><p><span class='delName dib'>联系电话：</span><span class='delText tel'>"+tell+"</span></p><p><span class='delName dib'>收件地址：</span><span class='delText'>"+cityaddr+"</span></p>").appendTo($("#delDetail"));
              $("<a class='sure' href='?r=user/uc/addressdel&type=2&id="+id+"'>确定</a><a class='cancel close' href='javascript:;'>取消</a>").appendTo($("#subFormDelBtn"));
        },"json");
    });

    //新增地址关闭
    $(document).on("click",'.close',function(){
        $(".getCouponAlert").hbyPopHide();
    });

    //删除地址关闭
    $(document).on("click",'.close',function(){
        $(".getDelAlert").hbyPopHide();
        if(getCookie("address")){
            delCookie("address","",0,"d");
        }
    });

    //设置默认
    $(document).on("click",'.activeDefaultIcon',function(){
        if($(this).hasClass('activeIcon')){
            $(this).removeClass('activeIcon');
            $(this).val("2");
        }else{
            $(this).addClass('activeIcon');
            $(this).val("1");
        }
    });


});