/**
 * Created by ZB on 2018/4/12.
 */
$(function(){
    var url = window.location.href;
    console.log(url);
    var title = decodeURI(getPara(url,"title"));
    $(".detailTitle").text(title);

});

function getPara(url,name) {
    if(url.indexOf(name+"=")>0){
        var temp = url.split(name+"=")[1];
        if(temp.indexOf("&")>0){
            temp = temp.split("&")[0];
        }
        return temp;
    }else {
        return null;
    }
}