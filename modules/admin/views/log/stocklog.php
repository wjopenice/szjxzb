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
    <title>库存日志</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/layer/laydate/laydate.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
    <style>
        .dib{display: inline-block;}
        .selectLeft{height: 26px;line-height: 26px;}
        .flexigrid .sDiv2{border: none;}
        .flexigrid .sDiv2 .qsbox, .flexigrid .sDiv2 .select, .flexigrid .sDiv2 .btn{border: 1px solid #D7D7D7;}
        .checkbox{width: 18px;height: 18px;margin-top: 4px;}
        .fl{float: left;}
        .fr{float: right;}
        .cf{zoom:1;}
        .flexigrid .hDiv th, .flexigrid .bDiv td{border-bottom: none;}
        .flexigrid tr{border-bottom: solid 1px #f5eded;}
        .flexigrid .sDiv2 .qsbox, .flexigrid .sDiv2 .select, .flexigrid .sDiv2 .btn{border: none;}
        .flexigrid .sDiv2{border: 1px solid #D7D7D7;}
        .trSelected{color: #333;background: #FFFFDF;border-color: transparent;}
        .flexigrid div.bDiv tr.trSelected:hover td, .flexigrid div.bDiv tr.trSelected:hover td.sorted, .flexigrid div.bDiv tr.trOver.trSelected td.sorted, .flexigrid div.bDiv tr.trOver.trSelected td, .flexigrid tr.trSelected td.sorted, .flexigrid tr.trSelected td{border-bottom: none;}
        .flexigrid .hDiv th{border-bottom: none;}
        .flexigrid div.bDiv tr:hover td, .flexigrid div.bDiv tr:hover td.sorted, .flexigrid div.bDiv tr.trOver td.sorted, .flexigrid div.bDiv tr.trOver td{background:#fff;}
    </style>
</head>
<body>
    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>库存日志</h3>
                    <h5>网站系统库存日志</h5>
                </div>
            </div>
        </div>
        <!--  操作提示  -->
        <div id="explanation" class="explanation">
            <div id="checkZoom" class="title">
                <i class="fa pressIcon"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span title="收起提示"></span>
            </div>
            <ul>
                <li>库存日志.</li>
                <li>商城库存日志也有缓存.</li>
            </ul>
        </div>
        <!--  表格     -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>库存日志</h3><h5>(共<?=$total?>条记录)</h5>
                </div>
                <a href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
                <form  action=""  class="navbar-form form-inline fr" method="post" id="search-form">
                    <input type="hidden" name="ctime" value="">
                    <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                    <div class="sDiv">
                        <div class="sDiv2" style="margin-right: 10px;">
                            <input type="text" size="30" name="start_time" id="start_time" value="<?=date('Y-m-d',time())?>" placeholder="起始时间" class="qsbox">
                            <input type="button" class="btn" value="起始时间">
                        </div>
                        <div class="sDiv2" style="margin-right: 10px;">
                            <input type="text" size="30" name="end_time"  id="end_time" value="<?=date('Y-m-d',time())?>" placeholder="截止时间" class="qsbox">
                            <input type="button" class="btn" value="截止时间">
                        </div>
                        <div class="sDiv2" style="margin-right: 10px;">
                            <select class="form-control" id="status" name="mtype" style="border: none;">
                                <option value="">全部</option>
                                <option value="1">入库</option>
                                <option value="-1">出库</option>
                            </select>
                        </div>
                        <div class="sDiv2">
                            <input size="30" placeholder="商品名称" value="" name="goods_name" class="qsbox" type="text">
                            <input class="btn" value="搜索" type="button" onClick="ajax_get_table('search-form',1)">
                        </div>
                    </div>
                </form>
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellspacing="0" cellpadding="0" style="width: 100%;">
                        <thead>
                        <tr class="cf">
                            <th class="sign fl" axis="col6" onclick="checkAllSign(this)">
                                <div style="width: 26px;"><i class="ico-check"></i></div>
                            </th>
                            <th align="center" abbr="article_title" axis="col6" class="fl">
                                <div style=" width:60px;" class="ta_c">编号</div>
                            </th>
                            <th align="center" abbr="ac_id" axis="col4" class="fl">
                                <div style=" width: 300px;" class="ta_c">商品名称</div>
                            </th>
                            <th align="center" abbr="ac_img" axis="col10" class="fl">
                                <div style=" width: 260px;" class="ta_c">商品规格</div>
                            </th>
                            <th align="center" abbr="article_show" axis="col6" class="fl">
                                <div style="width: 200px;" class="ta_c">订单号</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="fl">
                                <div style="width: 100px;" class="ta_c">库存</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="fl">
                                <div style="width: 100px;" class="ta_c">库存类型</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col10" class="fl">
                                <div style="width: 100px;" class="ta_c">操作人</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col10" class="fl">
                                <div style="width: 160px;" class="ta_c">日志时间</div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="bDiv">
                <div id="flexigrid">
                    <table style="width: 100%;">
                        <?php foreach ($arrData as $list): ?>  
                        <tr class="cf">
                            <td class="sign fl" axis="col6">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 58px;"><?=$list['id']?></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 298px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><?=$list['goods_name']?></div>
                            </td>
                            <td align="center" axis="col10" class="fl">
                                <div class="ta_c" style="width: 258px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><?=$list['goods_spec']?></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 198px;"><?=$list['order_sn']?></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 98px;"><?=$list['stock']?></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 98px;">商品库存</div>
                            </td>
                            <td align="center" axis="col10" class="fl">
                                <div class="ta_c" style="width: 98px;"><?=$list['muid']?></div>
                            </td>
                            <td align="center" axis="col10" class="fl">
                                <div class="ta_c" style="width: 158px;"><?=date('Y-m-d h:m:s',$list['ctime'])?></div>
                            </td>
                        </tr>
                        <?php endforeach; ?>  
                    </table>
                </div>
            </div>
            <div class="pDiv">
                <?php echo $pageShow;?>
            </div>
        </div>
    </div>

    <script>
        /*$(document).ready(function(){
            // 点击刷新数据
            $('.fa-refresh').click(function(){
                location.href = location.href;
            });

            $('#start_time').layDate();
            $('#end_time').layDate();
        });*/

        $(function(){

            $('#start_time').layDate();
            $('#end_time').layDate();

        });
        // ajax 抓取页面 form 为表单id  page 为当前第几页
		function ajax_get_table(form, page) {

		    cur_page = page; //当前页面 保存为全局变量
		    var selectData = $('#' + form).serialize();
		    var v = '' ;

		    $.ajax({
		        type: "POST",
		        url: "/index.php?r=admin/log/stocklog",//+tab,
		        data: selectData,// 你的formid
		        success: function (data) {
		            var formData = selectData.split("&");
		            for (k in formData){
		                v = formData[k].split("=");
		                formData[v[0]] = v[1];
		            }

		            $(".page").remove();
		            $("body").append(data);
		            $("#status option[value='"+formData.mtype+"']").prop("selected","selected");
                    $('#start_time').val(formData.start_time);
                    $('#end_time').val(formData.end_time);
		            $("input[name=goods_name]").val(decodeURI(formData.goods_name));
		        }
		    });
		}
    </script> 
</body>
</html>