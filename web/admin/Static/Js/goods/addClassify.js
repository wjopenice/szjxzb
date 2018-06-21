$(function(){

    navTab();
    $(document).on("click",'.goods_category',function(){
        navTab();
    });

    //选择商品分类
    $(document).on("change",'#parent_id',function(){
        get_category($(this).val(),'parent_id_2','0');
    });

    //图片上传
    ajax_FileUpload({
        btn: $("#changeBox"),
        acceptFileTypes: "gif|jpeg|jpg|png",
        url: '/index.php?r=admin/goods/upload',
        callback: function (data,btn) {
            var fileName = data.fileName.replace("\\", "/");

            $("#imagetext").val(fileName);
            $("#img_a").prop("href",fileName);
            $(".input-file-show").append('<img class="show_fileImg" src="'+fileName+'">');
        }
    });

});

function navTab(){
    var val = $(".goods_category:checked").val();
    if(val == 1){
        $("#category1").addClass('selected');
        $("#category0").removeClass('selected');
    }else{
        $("#category1").removeClass('selected');
        $("#category0").addClass('selected');
    }
}