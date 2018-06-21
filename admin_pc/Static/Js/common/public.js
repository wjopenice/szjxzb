var tab = null;    //声明一个tab变量
var accordion = null;  //声明一个accordion变量

$(function() {

    countPageWidth();

    $("#layout1").ligerLayout({
        allowLeftResize:false,
        allowRightResize:false,
        height: '100%',
        heightDiff:0,
        space:0,
        onHeightChanged: f_heightChanged
    });

    var height = $(".adminLeft").height();
    $("#frameCenter").ligerTab({
        height:height ,  //高度为height
        showSwitchInTab : true,  //切换窗口按钮显示在最后一项
        showSwitch: true//显示切换窗口按钮
    });
    tab = liger.get("frameCenter");
    accordion = liger.get("accordion1");

    //一二级菜单添加默认选中
    $(".subTabBig").each(function(){
       $(".subTabBig:first").addClass('active');
       $(".subTabLit:first-child").addClass('active');
   });

    //点击一级菜单
    $(document).on("click",'.subTabBigLink',function(){
        $(this).parents(".subTabBig").addClass('active').siblings().removeClass('active');
    });

    //点击二级菜单
    $(document).on("click",'.subTabLit',function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

    //*********************   框架内容部分  *********************

    //操作提示缩放动画
    $("#checkZoom").toggle(function() {
        $("#explanation").animate({
            color: "#FFF",
            backgroundColor: "#4FD6BE",
            width: "80",
            height: "20"
        },300);
        $("#explanationZoom").hide();
    },function() {
        $("#explanation").animate({
            color: "#2CBCA3",
            backgroundColor: "#EDFBF8",
            width: "99%",
            height: "20",
        },300,function() {
            $(this).css('height', '100%');
        });
        $("#explanationZoom").show();
    });

    // 刷选条件 鼠标 移动进去 移出 样式
    $(".hDivBox thead th").mousemove(function(){
        $(this).addClass('thOver');
    }).mouseout(function(){
        $(this).removeClass('thOver');
    });

    // 表格行点击选中切换
    $(document).on('click','.flexigrid tr',function(){
        $(this).toggleClass('trSelected');
        var checked = $(this).hasClass('trSelected');
        $(this).find('input[type="checkbox"]').attr('checked',checked);
    });

    //点击刷新数据
    $('.fa-refresh').click(function(){
        location.href = location.href;
    });

});

//计算分页宽度
function countPageWidth(){
    var pageWidth = -$(".flexigrid .pDiv").width()/2;
    $(".flexigrid .pDiv").css("margin-left",pageWidth);
}

//打开新页签
function f_addTab(tabid, text, url, callbackFunction){
    if(url.indexOf("&")>0){url += "&";}
    else{url += "&";}
    url += "pageTabId"+tabid + "&pageTabName"+text;
    tab.addTabItem({
        tabid: tabid,
        text: text,
        url: url,
        callback: function(){
            if(callbackFunction){
                callbackFunction();
            }
        }
    });
}
//高度改变事件
function f_heightChanged(options) {
    if (tab)
        tab.addHeight(options.diff);
    if (accordion && options.middleHeight - 50 > 0)
        accordion.setHeight(options.middleHeight - 50);
}

function get_category(id,next,select_id){
    $.ajax({
        type : "GET",
        url  : ''+ id,
        dataType:'json',
        success: function(data) {
            var html = "<option value='0'>请选择商品分类</option>";
            for (var i=0 ;i<data.result.length;i++){
                html+= "<option value='"+data.result[i].id+"'>"+data.result[i].name+"</option>";
            }
            $('#'+next).empty().html(html);
            (select_id > 0) && $('#'+next).val(select_id);//默认选中
        }
    });
}

function checkInputNum(name,min,max,keep,def){
    var input = $('input[name='+name+']');
    var inputVal = parseInt(input.val());
    var a = parseInt(arguments[3]) ? parseInt(arguments[3]) : 0;//设置第四个参数的默认值
    var b = parseInt(arguments[4]) ? parseInt(arguments[4]) : '';//设置第四个参数的默认值
    if(isNaN(inputVal)){
        input.val('');
    }else{
        if(inputVal < min || inputVal > max){
            if(a > 0){
                input.val(number_format(b,a));
            }else{
                input.val(b);
            }
        }else{
            if(a > 0){
                input.val(number_format(inputVal, a));
            }else{
                input.val(inputVal);
            }
        }
    }
}

function GetUploadify(num,elementid,path,callback,fileType) {
    var upurl ='/index.php?m=Admin&c=Uploadify&a=upload&num='+num+'&input='+elementid+'&path='+path+'&func='+callback+'&fileType='+fileType;
    var title = '上传图片';
    if(fileType == 'Flash'){
        title = '上传视频';
    }
    layer.open({
        type: 2,
        title: title,
        shadeClose: true,
        shade: false,
        maxmin: true, //开启最大化最小化按钮
        area: ['50%', '60%'],
        content: upurl
    });
}

function check_form(){
    var start_time = $.trim($('#start_time').val());
    var end_time =  $.trim($('#end_time').val());
    if(start_time == '' ^ end_time == ''){
        layer.alert('请选择完整的时间间隔', {icon: 2});
        return false;
    }
    return true;
}