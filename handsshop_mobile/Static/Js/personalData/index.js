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

    jQuery("#fileUpLoad").fileupload({
        dataType: 'json',
        url: '',
        formData: { name: 'fileUpLoad' },
        done: function (e, data) {
            console.log(1111);
            console.log(data);
            var param = data.result;
            if (typeof (param.error) != 'undefined') {
                $.toast(param.error);
            } else {
                if (param.state) {
                    TicketIMG = TicketIMG != "" ? TicketIMG + "," + param.imgPath : param.imgPath;
                    //$(".refund-upload.clearfix").append('<div class="refund-upload-input upload-ok"><img src="' + param.imgPath + '"></div>');
                    $('img').on("error", function () {
                        $(this).attr('src', "../Static/images/personalData/head.png");
                    });

                } else {
                    $.toast(param.msg);
                }
            }
        }
    });
});
