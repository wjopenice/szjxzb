// $(function(){
//     var $form = $("#export-form"),
//         $export = $("#export"), tables;
//     $export.click(function(){
//         if($("input[name^='tables']:checked").length == 0){
//             layer.alert('请选中要备份的数据表', {icon: 2});
//             return false;
//         }
//         $export.addClass("disabled");
//         $export.html("正在发送备份请求...");
//         $.post(
//             $form.attr("action"),
//             $form.serialize(),
//             function(data){
//                 if(data.status){
//                     tables = data.tables;
//                     $export.html(data.info + "开始备份，请不要关闭本页面！");
//                     backup(data.tab);
//                     window.onbeforeunload = function(){ return "正在备份数据库，请不要关闭！" }
//                 } else {
//                     layer.alert(data.info, {icon: 2});
//                     $export.removeClass("disabled");
//                     $export.html("立即备份");
//                 }
//             },
//             "json"
//         );
//         return false;
//     });
// });
//
// function backup(tab, status){
//     status && showmsg(tab.id, "开始备份...(0%)");
//     $.get($form.attr("action"), tab, function(data){
//         if(data.status){
//             showmsg(tab.id, data.info);
//             if(!$.isPlainObject(data.tab)){
//                 $export.removeClass("disabled");
//                 $export.html("备份完成，点击重新备份");
//                 window.onbeforeunload = function(){ return null }
//                 return;
//             }
//             backup(data.tab, tab.id != data.tab.id);
//         } else {
//             $export.removeClass("disabled");
//             $export.html("立即备份");
//         }
//     }, "json");
// }
// function showmsg(id, msg){
//     $form.find("input[value=" + tables[id] + "]").closest("tr").find(".info").html(msg);
// }