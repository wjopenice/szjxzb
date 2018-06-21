/**
 * Created by ZB on 2018/4/13.
 */
$(function(){
    $(".save").click(function() {
        $.toast("感谢您的评论");
    });

    $("#area").keyup(function(){
        var len = $(this).val().length;
        if(len > 199){
            $(this).val($(this).val().substring(0,200));
        }
        var num = 200 - len;
        if(num < 0){
            num = 0;
        }
        $("#word").text(num);
    });

    

});

/* 描述相符评分星星 */
function describeStar(n){
    var array=new Array();
    array[0]=document.getElementById("describeOneStar");
    array[1]=document.getElementById("describeTwoStar");
    array[2]=document.getElementById("describeThreeStar");
    array[3]=document.getElementById("describeFourStar");
    array[4]=document.getElementById("describeFiveStar");
    for(var i=0;i<=n;i++)
    {
        array[i].innerHTML = '<img class="dib" src="../../Static/Image/myOrder/star.png" alt="">';
    }
    for( var j=4;j>n;j--)
    {
        array[j].innerHTML = '<img class="dib" src="../../Static/Image/myOrder/unStar.png" alt="">';
    }

    document.getElementById("evaluate1").innerText= (n+1) + "星";
}

/* 物流服务评分星星 */
function logisticsStar(n){
    var array=new Array();
    array[0]=document.getElementById("logisticsOneStar");
    array[1]=document.getElementById("logisticsTwoStar");
    array[2]=document.getElementById("logisticsThreeStar");
    array[3]=document.getElementById("logisticsFourStar");
    array[4]=document.getElementById("logisticsFiveStar");
    for(var i=0;i<=n;i++)
    {
        array[i].innerHTML = '<img class="dib" src="../../Static/Image/myOrder/star.png" alt="">';
    }
    for( var j=4;j>n;j--)
    {
        array[j].innerHTML = '<img class="dib" src="../../Static/Image/myOrder/unStar.png" alt="">';
    }

    document.getElementById("evaluate2").innerText= (n+1) + "星";
}

/* 服务态度评分星星 */
function attitudeStar(n){
    var array=new Array();
    array[0]=document.getElementById("attitudeOneStar");
    array[1]=document.getElementById("attitudeTwoStar");
    array[2]=document.getElementById("attitudeThreeStar");
    array[3]=document.getElementById("attitudeFourStar");
    array[4]=document.getElementById("attitudeFiveStar");
    for(var i=0;i<=n;i++)
    {
        array[i].innerHTML = '<img class="dib" src="../../Static/Image/myOrder/star.png" alt="">';
    }
    for( var j=4;j>n;j--)
    {
        array[j].innerHTML = '<img class="dib" src="../../Static/Image/myOrder/unStar.png" alt="">';
    }

    document.getElementById("evaluate3").innerText= (n+1) + "星";
}