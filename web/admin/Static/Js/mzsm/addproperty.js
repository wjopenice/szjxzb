$(function(){

    //点击添加属性
    $(document).on("click",".addPropertyBtn",function(){
        $(".addPropertyBox").show();
    });

    //点击取消按钮
    $(document).on("click",'.cancelBtn',function(){
        $(".proInput").val("");
        $(".addPropertyBox").hide();
    });

    //点击确定按钮
    $(document).on("click",'.confirmBtn',function(){
        var propertyVal = $(".proInput").val();
        var pingIndex = pinyinUtil.getFirstLetter(propertyVal).toLowerCase();

        if(!propertyVal){
            alert("请填写属性值");
            return false;
        }

       $(".propertyUpdate").append('<li class="cf">' +
           '<div class="proName">'+propertyVal+'：</div>' +
           '<div class="propertyRight"><input type="text" name="'+propertyVal+'" data-chineseNmae="'+pingIndex+'" value="" placeholder="请填写'+propertyVal+'"><span class="delPro hide">删除</span></div>' +
           '</li>') ;
        $(".proInput").val("");
       $(".addPropertyBox").hide();
    });

    //点击删除
    $(document).on("click",'.delPro',function(){
        $(this).parents("li").remove();
    });

    //鼠标移入删除显示隐藏
    $(".propertyUpdate li").hover(function(){
        $(this).find(".delPro").show();
    },function(){
        $(this).find(".delPro").hide();
    });

});

