<?php
use yii\helpers\Html;
use yii\helpers\Url;
$session = Yii::$app->session;
$url = Url::to("@web/web/admin/Static");
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>商品列表</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
    <?= Html::jsFile("{$url}/Js/setting/sql.js")?>
</head>
<body>
    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>数据备份</h3>
                    <h5>网站系统数据备份</h5>
                </div>
            </div>
        </div>
        <!--  操作提示  -->
        <div id="explanation" class="explanation">
            <div id="checkZoom" class="title">
                <i class="fa pressIcon"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span title="收起提示" id="explanationZoom"></span>
            </div>
            <ul>
                <li>数据备份功能根据你的选择备份全部数据或指定数据，导出的数据文件可用phpMyAdmin导入.</li>
                <li>建议定期备份数据库.</li>
            </ul>
        </div>
        <!--  表格  -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>数据库表列表</h3><h5>（共<span><?=$total?></span>张记录，共计<span><?=round($total_length,6)?>MB</span>）</h5>
                </div>
                <a href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th class="sign" axis="col0">
                                <div style="width: 24px;"><input type="checkbox" class="allCheckBtn" onclick="javascript:$('input[name*=tables]').prop('checked',this.checked);"></div>
                            </th>
                            <th align="left" abbr="article_title" axis="col3" class="">
                                <div style="width: 202px;" class="ta_l">数据库表</div>
                            </th>
                            <th align="center" abbr="ac_id" axis="col4" class="">
                                <div style="width: 55px;" class="ta_c">引擎</div>
                            </th>
                            <th align="center" abbr="ac_id" axis="col4" class="">
                                <div style="width: 50px;" class="ta_c">记录条数</div>
                            </th>
                            <th align="center" abbr="article_show" axis="col5" class="">
                                <div style="width: 90px;" class="ta_c">占用空间</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 104px;" class="ta_c">编码</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 142px;" class="ta_c">创建时间</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 102px;" class="ta_c">备份状态</div>
                            </th>
                            <th align="center" abbr="" axis="col6" class="">
                                <div style="width: 62px;" class="ta_c">操作</div>
                            </th>
                            <th style="width:100%" axis="col7"><div></div></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="tDiv">
                <div class="tDiv2">
                    <div class="fbutton">
                        <a href="javascript:void(0)" id="ing_btn">
                            <div class="add downAllBtn" data-tableNameStr="" title="数据备份">
                                <span><i class="fa fa-book"></i><span id="export">数据备份</span></span>
                            </div>
                        </a>
                    </div>
                    <div class="fbutton" style="border-right: none;">
                        <a href="javascript:window.parent.window.f_addTab('dataRecord','数据备份记录','?r=admin/setting/record')">
                            <div class="add" title="记录">
                                <span>记录</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bDiv" style="height: auto;">
                <div id="flexigrid" >
                    <form  method="post" id="export-form" action="">
                        <table>
                            <?php foreach ($tableName as $key=>$value): ?>
                                <tr data-id="">
                                <td class="sign">
                                    <div style="width: 24px;"><input class="subCheckBtn" type="checkbox" name="tables[]" value=""></div>
                                </td>
                                <td align="left" class="">
                                    <div style="width: 200px;" class="ta_l dataTableName"><?=$value[$dbkey]?></div>
                                </td>
                                <td align="left" class="">
                                    <div style="width: 53px;" class="ta_l"><?=$value["engine"]?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 50px;" class="ta_c"><?=$value["count"]?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 90px;" class="ta_c"><?=round($value["Data_length"]+$value["Index_length"],6)?>MB</div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 100px;" class="ta_c"><?=$value["charset"]?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 140px;" class="ta_c"><?=$value["create_time"]?></div>
                                </td>
                                <td align="center" class="">
                                    <?php
                                    $int = strpos($dirstr,$value[$dbkey]);
                                    if($int === false){
                                         $sqlstrb = "<span style='color:red;'>未备份</span>";
                                    }else{
                                         $sqlstrb = "<span style='color:#65ff19;'>已备份</span>";
                                    }
                                    ?>
                                    <div style="width: 100px;" class="info ta_c"><?=$sqlstrb?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 60px;" class="ta_c">
                                        <a  class="btn green downBtn"><i class="fa fa-list-alt"></i>备份</a>
                                    </div>
                                </td>
                                <td align="" class="" style="width: 100%;"><div>&nbsp;</div></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
$(function () {

    //全选
    $(document).on("click",".allCheckBtn",function(){
        var isChecked = $(this).prop("checked");
        if(isChecked){
            $("#export-form tr").addClass('trSelected');
        }else{
            $("#export-form tr").removeClass('trSelected');
        }
    });
    //单选
    $(document).on("click",'#export-form .subCheckBtn',function(){
        var isChecked = true;
        $.each($("#export-form tr"),function(i,obj){
            isChecked = $(obj).hasClass("trSelected") && isChecked;
        });

        if(!isChecked){
            $(".allCheckBtn").prop("checked",true);
        }else{
            $(".allCheckBtn").prop("checked",false);
        }
    });

    // 点击备份
    $(document).on("click",'.downBtn',function(){
        var dataTable = $(this).parents("tr").find(".dataTableName").text();
        $.get("?r=admin/setting/dump_sql",{table:dataTable,type:"one"},function (msg) {
            window.location.href = window.location;
        },"text");

    });

    //批量备份
    $(document).on("click",'.downAllBtn',function(){
        var dataTableNameStr = "";

       $.each($("#flexigrid tr.trSelected"),function(i,obj){
           dataTableNameStr = $(obj).find(".dataTableName").text() + "," + dataTableNameStr;
       });


        dataTableNameStr = dataTableNameStr.substr(0, dataTableNameStr.length - 1);

        $.get("?r=admin/setting/dump_sql",{table:dataTableNameStr,type:"all"},function (msg) {
            window.location.href = window.location;
        },"text");
    });

});
</script>
</html>
