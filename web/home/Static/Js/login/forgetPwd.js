/**
 * Created by ZB on 2018/4/20.
 */
$(function(){

    expstr();
});

function expstr() {
    //电话号码隐藏中间四位
    var tel = $('.tel').html();

    var mtel = tel.substr(0, 3) + '****' + tel.substr(7);
    $('.tel').text(mtel);
}

//验证码倒计时60秒
var countdown=60;
function setTime(val) {
    if (countdown == 0) {
        val.removeAttr("disabled");
        val.val("获取验证码");
       // val.removeAttribute("disabled");
       // val.value="获取验证码";
        countdown = 60;
        return false;
    } else {
        val.attr("disabled",true);
        //val.setAttribute("disabled", true);
        val.val("(" + countdown + ")重新发送");
        //val.value="(" + countdown + ")重新发送";
        countdown--;
    }
    setTimeout(function() {
        setTime(val);
    },1000);
}


//滑动模块
(function($){
    $.fn.drag = function(options){
        var x, drag = this, isMove = false, defaults = {
        };
        var options = $.extend(defaults, options);
        //添加背景，文字，滑块
        var html = '<div class="drag_bg"></div>'+
            '<div class="drag_text" onselectstart="return false;" unselectable="on">&gt;&gt;&gt;请拖动滑块完成拼图&gt;&gt;&gt;</div>'+
            '<div class="handler handler_bg"></div>';
        drag.css({'color': '#999'});
        this.append(html);

        var handler = drag.find('.handler');
        var drag_bg = drag.find('.drag_bg');
        var text = drag.find('.drag_text');
        var maxWidth = drag.width() - handler.width();  //能滑动的最大间距

        //鼠标按下时候的x轴的位置
        handler.mousedown(function(e){
            isMove = true;
            x = e.pageX - parseInt(handler.css('left'), 10);
        });

        //鼠标指针在上下文移动时，移动距离大于0小于最大间距，滑块x轴位置等于鼠标移动距离
        $(document).mousemove(function(e){
            var _x = e.pageX - x;
            if(isMove){
                if(_x > 0 && _x <= maxWidth-4){
                    handler.css({'left': _x});
                    drag_bg.css({'width': _x});
                }else if(_x > maxWidth){  //鼠标指针移动距离达到最大时清空事件
                    dragOk();
                }
            }
        }).mouseup(function(e){
            isMove = false;
            var _x = e.pageX - x;
            if(_x < maxWidth){ //鼠标松开时，如果没有达到最大距离位置，滑块就返回初始位置
                handler.css({'left': 0});
                drag_bg.css({'width': 0});
            }
        });

        //清空事件
        function dragOk(){
            handler.removeClass('handler_bg').addClass('handler_ok_bg');
            text.text('验证通过');
            drag.css({'color': '#fff'});
            handler.unbind('mousedown');
            $(document).unbind('mousemove');
            $(document).unbind('mouseup');
        }
    };
})(jQuery);