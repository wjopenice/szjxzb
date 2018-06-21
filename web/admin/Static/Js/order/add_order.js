$(function(){

    //表单验证
    $("#order-add").validate({
        debug: false, //调试模式取消submit的默认提交功能
        focusInvalid: false, //当为false时，验证无效时，没有焦点响应
        onkeyup: false,
        submitHandler: function(form){   //表单提交句柄,为一回调函数，带一个参数：form
            if($("input[name^='goods_id']").length ==0){
                layer.alert('订单中至少要有一个商品', {icon: 2});
                return false;
            }else{
                form.submit();   //提交表单
            }
        },
        ignore:":button",	//不验证的元素
        rules:{
            consignee:{
                required:true
            },
            mobile:{
                required:true
            },
            province:{
                required:true
            },
            city:{
                required:true
            },
            district:{
                required:true
            },
            address:{
                required:true
            },
            zipcode:{
                required:true
            }
        },
        messages:{
            consignee:{
                required:"请填写收货人"
            },
            mobile:{
                required:"收货人联系电话"
            },
            province:{
                required:"请选择所在省份"
            },
            city:{
                required:"请选择所在城市"
            },
            district:{
                required:"请选择所在区县"
            },
            address:{
                required:"请填写详细地址"
            },
            zipcode:{
                required:"请填写收货地邮编"
            }
        }
    });

    //选择用户
    $(document).on('change','#user_id',function(){
        $('#user_name').val($(this).find("option:selected").attr('nickname'));
    })

});

//搜索用户
function search_user(){
    var user_name = $('#user_name').val();
    if($.trim(user_name) == '')
        return false;
    $.ajax({
        type : "POST",
        url:"",//+tab,
        data :{search_key:$('#user_name').val()},// 你的formid
        dataType :'json',
        success: function(data){
            if(data.status == 1){
                var html='';
                for(var i=0 ; i<data.result.length ;i++){
                    html +="<option value='"+data.result[i].user_id+"' nickname='"+data.result[i].nickname+"'>"+data.result[i].nickname+"</option>"
                }
                $('#user_id').html(html);
            }else{
                layer.msg(data.msg, {icon: 2});
            }
        }
    });
}

//选择商品
function selectGoods(){
    var url = "";
    layer.open({
        type: 2,
        title: '选择商品',
        shadeClose: true,
        shade: 0.8,
        area: ['60%', '60%'],
        content: url
    });
}

//点击提交表单验证
function checkSubmit(){
    $('#order-add').submit();
}