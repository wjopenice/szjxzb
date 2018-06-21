/**
 * Created by ZB on 2018/5/4.
 */
$(function(){
    //电话号码隐藏中间四位
    var tel = $('.tel').html();

    var mtel = tel.substr(0, 3) + '****' + tel.substr(7);
    $('.tel').text(mtel);




});