$(function(){

    $('#add_time_begin').layDate();
    $('#add_time_end').layDate();


    $('.ico-check ' , '.hDivBox').click(function(){
        $('tr' ,'.hDivBox').toggleClass('trSelected' , function(index,currentclass){
            var hasClass = $(this).hasClass('trSelected');
            $('tr' , '#flexigrid').each(function(){
                if(hasClass){
                    $(this).addClass('trSelected');
                }else{
                    $(this).removeClass('trSelected');
                }
            });
        });
    });

});

//ajax 抓取页面
function ajax_get_table(form, page) {

    cur_page = page; //当前页面 保存为全局变量
    var selectData = $('#' + form).serialize();
    var v = '' ;

    $.ajax({
        type: "POST",
        url: "/index.php?r=admin/order/order_list",//+tab,
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
            /*$("#cat_id option[value='"+formData.cat_id+"']").prop("selected","selected");
            $("#is_on_sale option[value='"+formData.is_on_sale+"']").prop("selected","selected");
            $("#intro option[value='"+formData.intro+"']").prop("selected","selected");
            $("input[name=keywords]").val(decodeURI(formData.keywords));*/
        }
    });
}



//导出数据
function exportReport(){
    var selected_ids = '';
    $('.trSelected' , '#flexigrid').each(function(i){
        selected_ids += $(this).data('order-id')+',';
    });
    if(selected_ids != ''){
        $('input[name="order_ids"]').val(selected_ids.substring(0,selected_ids.length-1));
    }
    $('#search-form2').submit();
}