/**
 * Created by ZB on 2018/5/7.
 */

$(function(){
    //投诉文本框输入字数
    $("#area").keyup(function(){
        var len = $(this).val().length;
        if(len > 299){
            $(this).val($(this).val().substring(0,300));
        }
        var num = 300 - len;
        if(num < 0){
            num = 0;
        }
        $("#word").text(num);
    });




    $(".fileInput").on("change", "input[type=file]", function() {
        $(this).prev().css("opacity","1");

        //读取图片路径
        var filePath = $(this).val();
        //创建new FileReader()对象
        var fr = new FileReader();
        //获取图片
        var imgObj = this.files[0];
        //将图片读取为DataURL
        fr.readAsDataURL(imgObj);
        var obj = $(this).prev()[0];

        if(filePath.indexOf("jpg") != -1 || filePath.indexOf("JPG") != -1 || filePath.indexOf("PNG") != -1 || filePath.indexOf("png") != -1) {
            $(this).parent().next().show();
            fr.onload = function() {
                obj.src = this.result;
                $(".fileTitle").css('display', 'none');
            };
        } else {
            $(this).parent().next().show();
            $(this).parent().next().children("i").html("您未上传文件，或者您上传文件类型有误！").css("color", "red");
            return false
        }
    });




});


/* 评分星星 */
function logisticsStar(n){

    var array=new Array();
    array[0]=document.getElementById("logisticsOneStar");
    array[1]=document.getElementById("logisticsTwoStar");
    array[2]=document.getElementById("logisticsThreeStar");
    array[3]=document.getElementById("logisticsFourStar");
    array[4]=document.getElementById("logisticsFiveStar");
    for(var i=0;i<=n;i++)
    {
        array[i].innerHTML = '<img src="../../Static/Image/personalCenter/evaluate/star.png" width="16" height="15" alt="">';
    }
    for( var j=4;j>n;j--)
    {
        array[j].innerHTML = '<img src="../../Static/Image/personalCenter/evaluate/unStar.png" width="16" height="15" alt="">';
    }

    document.getElementById("starNum").innerText= (n+1) + "星好评";
}