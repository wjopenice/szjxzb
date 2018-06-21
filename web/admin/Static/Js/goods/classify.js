// 点击展开 收缩节点
function  tree_open(obj) {
    var tree = $('#article_cat_table tr[id^="2_"], #article_cat_table tr[id^="3_"] '); //,'table-row'
    if(tree.css('display')  == 'table-row')
    {
        $(obj).html("<i class='fa fa-angle-double-down'></i>展开分类");
        tree.css('display','none');
        $("img[id^='icon_']").attr('src','/web/admin/Static/Image/common/tv-expandable.gif');
    }else
    {
        $(obj).html("<i class='fa fa-angle-double-up'></i>收缩分类");
        tree.css('display','table-row');
        $("img[id^='icon_']").attr('src','/web/admin/Static/Image/common/tv-collapsable-last.gif');
    }
}

function treeClicked(obj,cat_id){
    var src = $(obj).attr('src');
    if(src == '/web/admin/Static/Image/common/tv-expandable.gif')
    {
        $(".parent_id_"+cat_id).show();
        $(obj).attr('src','/web/admin/Static/Image/common/tv-collapsable-last.gif');
    }else{
        $(obj).attr('src','/web/admin/Static/Image/common/tv-expandable.gif');

        // 如果是点击减号, 遍历循环他下面的所有都关闭
        var tbl = document.getElementById("article_cat_table");
        cur_tr = obj.parentNode.parentNode.parentNode;
        var fnd = false;
        for (i = 0; i < tbl.rows.length; i++)
        {
            var row = tbl.rows[i];

            if (row == cur_tr)
            {
                fnd = true;
            }
            else
            {
                if (fnd == true)
                {

                    var level = parseInt($(row).data('level'));
                    var cur_level = $(cur_tr).data('level');

                    if (level > cur_level)
                    {
                        $(row).hide();
                        $(row).find('img').attr('src','/web/admin/Static/Image/common/tv-expandable.gif');
                    }
                    else
                    {
                        fnd = false;
                        break;
                    }
                }
            }
        }
    }
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
        var val = $(obj).val();
    }

    $.ajax({
        url:"/index.php?r=admin/goods/upstatus&table="+table+"&id_name="+id_name+"&id_value="+id_value+"&field="+field+'&val='+val,
        success: function(){
            /*if(!$(obj).hasClass('no') && !$(obj).hasClass('yes'))
             layer.msg('更新成功', {icon: 1});*/
        }
    });
}
