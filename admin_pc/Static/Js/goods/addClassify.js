$(function(){

    navTab();
    $(document).on("click",'.goods_category',function(){
        navTab();
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