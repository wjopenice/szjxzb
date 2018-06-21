/**
 * Created by ZB on 2018/4/20.
 */
$(function(){

    //var height = document.getElementById("loginPopup");
    //var h = height.offsetHeight;
   // $(".popup").css("margin-top",(h-480)/2);

    setCookie("u1",0,1,"H");
    setCookie("u2",0,1,"H");
    setCookie("u3",0,1,"H");

    //点击忘记密码
    $(document).on("click",'.isChose',function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
        }else{
            $(this).addClass('active');
        }
    });

    $(document).on("blur","#username",function () {
         var data = $.trim($(this).val());
         if(data === ""){
             layer.msg('账号不能为空', {icon: 5});
         }else{
             $.get("?r=home/login/ajaxlogin&type=1",{d:data},function (msg) {
                 if(msg.code == 2){
                     layer.msg('账号可以使用', {icon: 6});
                     setCookie("u1",1,1,"H");
                 }else{
                     editCookie("u1",0,1,"H");
                     layer.msg('账号已经注册', {icon: 5});
                 }
             },"json");
         }
        btntime();
    });

    $(document).on("blur","#tell",function () {
        var data = $.trim($(this).val());
        if(data === ""){
            layer.msg('手机号不能为空', {icon: 5});
        }else{
            $.get("?r=home/login/ajaxlogin&type=2",{d:data},function (msg) {
                if(msg.code == 2){
                    layer.msg('手机可以使用', {icon: 6});
                    setCookie("u2",1,1,"H");
                }else{
                    layer.msg('手机已经注册', {icon: 5});
                    editCookie("u2",0,1,"H");
                }
            },"json");
        }
        btntime();
    });

    $(document).on("blur","#repwd",function () {
        var repwdValue = $(this).val();
        var userpassValue = $("#userpass").val();
        if(repwdValue !== userpassValue){
            layer.msg('两次密码不一致', {icon: 5});
            editCookie("u3",0,1,"H");
        }else{
            layer.msg('密码通过', {icon: 6});
            setCookie("u3",1,1,"H");
        }
        btntime();
    });

});

function btntime() {
    var u1 = getCookie("u1");
    var u2 = getCookie("u2");
    var u3 = getCookie("u3");
    if(u1 == 1 && u2 == 1 && u3 == 1){
        $("#btn").removeAttr("disabled");
    }else{
        $("#btn").attr("disabled","disabled");
    }
}

