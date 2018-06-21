$(function(){

    //点击批量删除
    $(document).on("click",'#batchDel',function(){

        var length = $("#flexigrid tr.trSelected").length;
        if(!length){
            alert("请选择删除的数据！");
            return false;
        }
        var delIdStr = "";

        $.each($("#flexigrid tr.trSelected"),function(i,obj){
            delIdStr = $(obj).attr("data-id") + "," + delIdStr;
            $(this).remove();
        });
        delIdStr = delIdStr.substr(0, delIdStr.length - 1);
        //ajax 数据库删除
        $.ajax({
            type: "POST",
            url: "/index.php?r=admin/goods/delgoods",//+tab,
            data: {ids:delIdStr},// 你的formid
            success: function (data) {
                /*if(data.status == 0){
                    $.each($("#flexigrid tr.trSelected"),function(i,obj){
                        $(this).remove();
                    });
                } */
            }
        });
        
    });

});

// ajax 抓取页面 form 为表单id  page 为当前第几页
function ajax_get_table(form, page) {

    cur_page = page; //当前页面 保存为全局变量
    var selectData = $('#' + form).serialize();
    var v = '' ;

    $.ajax({
        type: "POST",
        url: "/index.php?r=admin/mzsm/select",//+tab,
        data: selectData,// 你的formid
        success: function (data) {
            var formData = selectData.split("&");
            for (k in formData){
                v = formData[k].split("=");
                formData[v[0]] = v[1];
            }

            console.log(formData);
            $(".page").remove();
            $("body").append(data);
            $("#cat_id option[value='"+formData.cat_id+"']").prop("selected","selected");
            $("#is_on_sale option[value='"+formData.is_on_sale+"']").prop("selected","selected");
            $("#intro option[value='"+formData.intro+"']").prop("selected","selected");
            $("input[name=key_word]").val(decodeURI(formData.key_word));
        }
    });
}

// 修改指定表的指定字段值 包括有按钮点击切换是否 或者 排序 或者输入框文字
function changeTableVal(table,id_name,id_value,field,obj){
    var val = 0;
    if($(obj).hasClass('no')) {
        var val = 1;
        $(obj).removeClass('no').addClass('yes');
        $(obj).html("<i class='fa fa-check-circle'></i>是");
    }else if($(obj).hasClass('yes')){
        $(obj).removeClass('yes').addClass('no');
        $(obj).html("<i class='fa fa-ban'></i>否");
    }else{ // 其他输入框操作
        var value = $(obj).val();
    }

    $.ajax({
        url:"/index.php?r=admin/goods/upstatus&table="+table+"&id_name="+id_name+"&id_value="+id_value+"&field="+field+'&value='+value+'&val='+val,
        success: function(){
            /*if(!$(obj).hasClass('no') && !$(obj).hasClass('yes'))
             layer.msg('更新成功', {icon: 1});*/
        }
    });
}

// 点击排序
function sort(field){
    $("input[name='orderby1']").val(field);
    var v = $("input[name='orderby2']").val() == 'desc' ? 'asc' : 'desc';
    $("input[name='orderby2']").val(v);
    ajax_get_table('search-form2',cur_page);
}
