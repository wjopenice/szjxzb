/**
 * Created by ZB on 2018/4/12.
 */
function goPage(i) {
    var title = $("#title-"+i).text();
    window.location.href = "?m=m/setting/cpdetail&tab=1&title="+encodeURI(title);
}