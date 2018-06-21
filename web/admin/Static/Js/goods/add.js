//选择分类
$(function(){

    var url="";
    //初始化编辑器
    var ue = UE.getEditor('goods_content',{
        serverUrl :url,
        zIndex: 999,
        initialFrameWidth: "100%", //初化宽度
        initialFrameHeight: 300, //初化高度
        focus: false, //初始化时，是否让编辑器获得焦点true或false
        maximumWords: 99999,
        removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
        pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
        autoHeightEnabled: true
    });

    //是否显示运费模板
    initFreight();
    //初始化是否虚拟商品
    initIsVirtual();

    //选择商品分类
    $(document).on("change",'#cat_id',function(){
        get_category($(this).val(),'cat_id_2','0');
        $('#cat_id_3').empty().html("<option value='0'>请选择商品分类</option>");
    });
    /*$(document).on("click",'#cat_id',function(){
        get_category($(this).val(),'cat_id_2','0');
        $('#cat_id_3').empty().html("<option value='0'>请选择商品分类</option>");
    });*/
    $(document).on("change",'#extend_cat_id',function(){
        get_category($(this).val(),'extend_cat_id_2','0');
        $('#extend_cat_id_3').empty().html("<option value='0'>请选择商品分类</option>");
    });

    //点击是否为虚拟商品
    $(document).on("click",'.is_virtual',function(){
        initIsVirtual();
    });

    //点击是否包邮
    $(document).on("click", '.is_free_shipping', function (e) {
        initFreight();
    });

    //图片上传
    ajax_FileUpload({
        btn: $("#changeBox"),
        acceptFileTypes: "gif|jpeg|jpg|png",
        url: '/index.php?r=admin/goods/upload',
        callback: function (data,btn) {
            var fileName = data.fileName.replace("\\", "/");
            console.log(fileName);
            $("#imagetext").val(fileName);
            $("#img_a").prop("href",fileName);
            $(".input-file-show").append('<img class="show_fileImg" src="'+fileName+'">');
        }
    });


});

function img_call_back(fileurl_tmp){
    $("#imagetext").val(fileurl_tmp);
    $("#img_a").attr('href', fileurl_tmp);
    $("#img_i").attr('onmouseover', "layer.tips('<img src="+fileurl_tmp+">',this,{tips: [1, '#fff']});");
}
function initIsVirtual(){
    var is_virtual = $("input[name='is_virtual']:checked").val();
    if(is_virtual == 1){
        $('.virtual').show();
        $('#is_free_shipping_label_1').trigger('click');
        initFreight();
        $(".goods_shipping").hide();

        $("#is_V1").addClass("selected");
        $("#is_V0").removeClass("selected");
    }else{
        $('.virtual').hide();
        $(".goods_shipping").show();

        $("#is_V1").removeClass("selected");
        $("#is_V0").addClass("selected");
    }
}
function initFreight(){
    var is_free_shipping = $("input[name='is_free_shipping']:checked").val();
    if(is_free_shipping == 0){
        $("#is_free_shipping_label_1").removeClass("selected");
        $("#is_free_shipping_label_0").addClass("selected");
        $('.freight_template').show();
    }else{
        $("#is_free_shipping_label_1").addClass("selected");
        $("#is_free_shipping_label_0").removeClass("selected");
        $('.freight_template').hide();
    }
}

/*function ajax_submit_form() {
    $.ajax({
        type: "POST",
        url: "/index.php?r=admin/goods/add",//+tab,
        data: $('#addEditGoodsForm').serialize(),// 你的formid
        success: function (data) {
            console.log(data);
        }
    });
}*/

function getCategoryBindList(val){
    $.ajax({
        'url':"{:U('goods/getCategoryBindList')}",
        'data':{cart_id:val},
        'dataType':'json',
        success:function(data){
            if(data.status == 1){
                var html = '<option value="">所有品牌</option>'
                for (var i=0 ;i<data.result.length;i++){
                    html += '<option value="'+data.result[i].id+'">'+data.result[i].name+'</option>'
                }
                $('#brand_id').html('');
                $('#brand_id').html(html);
            }
        }
    })
}


