$(function(){

    // 点击刷新数据
    var ssort = 'sdesc';
    var on_sclick = 0;
    $('.hDivBox > table>thead>tr>th').hover(
        function () {
            if(typeof($(this).attr('abbr')) == "undefined"){
                return false;
            }
            $(this).addClass('thOver');
            if($(this).hasClass('sorted')){
                if(ssort == 'sdesc'){
                    $(this).find('div').removeClass('sdesc');
                    $(this).find('div').addClass('sasc');
                }else{
                    $(this).find('div').removeClass('sasc');
                    $(this).find('div').addClass('sdesc');
                }
            }else{
                $(this).find('div').addClass(ssort);
            }
        }, function () {
            if(typeof($(this).attr('abbr')) == "undefined"){
                return false;
            }
            if(on_sclick == 0){
                if($(this).hasClass('sorted')){
                    if(ssort == 'sdesc'){
                        $(this).find('div').removeClass('sasc');
                        $(this).find('div').addClass('sdesc');
                    }else{
                        $(this).find('div').removeClass('sdesc');
                        $(this).find('div').addClass('sasc');
                    }
                }else{
                    $(this).find('div').removeClass(ssort);
                }
            }
            $(this).removeClass("thOver");
            on_sclick = 0;
        }
    );
    $('.hDivBox > table>thead>tr>th').click(function(){
        if(typeof($(this).attr('abbr')) == "undefined"){
            return false;
        }
        if($(this).hasClass('sorted')){
            $(this).find('div').removeClass(ssort);
            if(ssort == 'sdesc'){
                ssort = 'sasc';
            }else{
                ssort = 'sdesc';
            }
            $(this).find('div').addClass(ssort);
            on_sclick = 1;
        }else{
            $('.hDivBox > table>thead>tr>th').removeClass('sorted');
            $('.hDivBox > table>thead>tr>th').find('div').removeClass(ssort);
            $(this).addClass('sorted');
            $(this).find('div').addClass(ssort);
            var hDivBox_th_index = $(this).index();
            var flexigrid_tr =   $('#flexigrid > table>tbody>tr')
            flexigrid_tr.each(function(){
                $(this).find('td').removeClass('sorted');
                $(this).children('td').eq(hDivBox_th_index).addClass('sorted');
            });
        }
        sort($(this).attr('abbr'));
    });

    //ajax_get_table('search-form2',1);

    //选中全部
    $(document).on("click",'.hDivBox .sign',function(){
        var sign = $('#flexigrid > table>tbody>tr');
        if($(this).parent().hasClass('trSelected')){
            sign.each(function(){
                $(this).removeClass('trSelected');
            });
            $(this).parent().removeClass('trSelected');
        }else{
            sign.each(function(){
                $(this).addClass('trSelected');
            });
            $(this).parent().addClass('trSelected');
        }
    });

});


// ajax 删除用户
function del(id){

    $.ajax({
        type : "GET",
        url:"/index.php?r=admin/member/delmember",//+tab,
        data : {id:id},// 你的formid
        success: function(data){
            console.log(data);
        }
    });
}


// ajax 抓取页面
function ajax_get_table(tab,page){
    var tell = $.trim($('#tell').val());
    cur_page = page; //当前页面 保存为全局变量
    var selectData = $('#' + tab).serialize();
    var v = '' ;
    
    $.ajax({
        type : "POST",
        url:"/index.php?r=admin/member/member_list&p/"+page,//+tab,
        data : selectData,// 你的formid
        success: function(data){
            var formData = selectData.split("&");
            for (k in formData){
                v = formData[k].split("=");
                formData[v[0]] = v[1];
            }

            console.log(formData);
            $(".page").remove();
            $("body").append(data);
            $('#tell').val(formData.tell);
        }
    });
}

//发送邮件
function send_mail(){
    var obj = $('.trSelected');
    var url = "{:U('Admin/User/sendMail')}";
    if(obj.length > 0){
        var check_val = [];
        obj.each(function(){
            check_val.push($(this).attr('data-id'));
        });
        url += "?user_id_array="+check_val;
        layer.open({
            type: 2,
            title: '发送邮箱',
            shadeClose: true,
            shade: 0.8,
            area: ['580px', '480px'],
            content: url
        });
    }else{
        layer.msg('请选择会员',{icon:2});
    }
}

//发送站内信
function send_message(){
    var obj = $('.trSelected');
    var url = "{:U('Admin/User/sendMessage')}";
    if(obj.length > 0){
        var check_val = [];
        obj.each(function(){
            check_val.push($(this).attr('data-id'));
        });
        url += "?user_id_array="+check_val;
        layer.open({
            type: 2,
            title: '站内信',
            shadeClose: true,
            shade: 0.8,
            area: ['580px', '480px'],
            content: url
        });
    }else{
        layer.msg('请选择会员',{icon:2});
    }

}


