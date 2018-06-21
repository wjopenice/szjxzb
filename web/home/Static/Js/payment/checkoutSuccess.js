/**
 * Created by ZB on 2018/4/24.
 */
$(function(){
    //身份验证
    var tel = $('.tel').html();

    var mtel = tel.substr(0, 3) + '****' + tel.substr(7);
    $('.tel').text(mtel);




});