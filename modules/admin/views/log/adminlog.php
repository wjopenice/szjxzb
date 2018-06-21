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
    <title>管理系统日志</title>
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
    </style>
</head>
<body>

    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>管理系统日志</h3>
                    <h5>商城系统日志管理</h5>
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
                <li>商城系统日志管理注意发布商品后清理缓存.</li>
                <li>商城系统日志管理也有缓存.</li>
            </ul>
        </div>
        <!--  表格     -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>管理系统列表</h3><h5></h5>
                </div>
                <a href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
                <form action="" id="search-form2" class="form-inline fr" method="post" onSubmit="return false">
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
                        <div class="sDiv2">
                            <div class="dib">
                                <span class="selectLeft">管理员：</span>
                                <select name="admin_id" id="admin_id" class="select">
                                    <option value="">-- 全部 --</option>
                                    <?php foreach ($adminList as $admin): ?>   
		                                <option value="<?=$admin['id']?>"><?=$admin['username']?></option>
		                            <?php endforeach; ?>  
                                </select>
                            </div>
                            <div class="dib">
                                <span class="selectLeft">IP地址：</span>
                                <input type="text" size="30" name="log_ip" class="qsbox" placeholder="IP地址">
                            </div>
                            <!-- <div class="dib">
                                <span class="selectLeft">时间：</span>
                                <select name="is_on_sale" class="select">
                                    <option value="">-- 全部 --</option>
                                </select>
                            </div> -->
                            <!--排序规则-->
                            <input type="button" class="btn" onClick="ajax_get_table('search-form2',1)" value="搜索">
                        </div>
                    </div>
                </form>
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellspacing="0" cellpadding="0">
                        <thead>
                        <tr>
                            <th class="sign" axis="col6" onclick="checkAllSign(this)">
                                <div style="width: 26px;"><i class="ico-check"></i></div>
                            </th>
                            <th align="center" abbr="article_title" axis="col6" class="">
                                <div style=" width:162px;" class="ta_c">选择</div>
                            </th>
                            <th align="center" abbr="ac_id" axis="col4" class="">
                                <div style=" width: 162px;" class="ta_c">管理员</div>
                            </th>
                            <th align="center" abbr="ac_img" axis="col10" class="">
                                <div style=" width: 262px;" class="ta_c">访问文件</div>
                            </th>
                            <th align="center" abbr="article_show" axis="col6" class="">
                                <div style="width: 162px;" class="ta_c">操作详情</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 162px;" class="ta_c">访问IP</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 162px;" class="ta_c">时间</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col10" class="">
                                <div style="width: 362px;" class="ta_c">Query参数</div>
                            </th>
                            <th style="" axis="col7">
                                <div></div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="tDiv">
                <div class="tDiv2">
                    <div class="fbutton">
                        <a href="javascript:void(0)">
                            <div class="add" title="反选">
                                <span>反选</span>
                            </div>
                        </a>
                    </div>
                    <div class="fbutton">
                        <a href="javascript:void(0)">
                            <div class="add" title="删除所选">
                                <span>删除所选</span>
                            </div>
                        </a>
                    </div>
                    <div class="fbutton">
                        <a href="javascript:void(0)">
                            <div class="add" title="清空所有日志">
                                <span>清空所有日志</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bDiv">
                <div id="flexigrid">
                    <table>
                    	<?php foreach ($arrData as $list): ?> 
                        <tr>
                            <td class="sign" axis="col6">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </td>
                            <td align="center" axis="col6">
                                <div class="ta_c" style="width: 160px;">
                                    <input class="checkbox" type="checkbox" name="vehicle" value="">
                                </div>
                            </td>
                            <td align="center" axis="col6">
                                <div class="ta_c" style="width: 160px;"><?=$list['username']?></div>
                            </td>
                            <td align="center" axis="col10">
                                <div class="ta_c" style="width: 260px;"><?=$list['log_url']?></div>
                            </td>
                            <td align="center" axis="col6">
                                <div class="ta_c" style="width: 160px;"><?=$list['log_info']?></div>
                            </td>
                            <td align="center" axis="col6">
                                <div class="ta_c" style="width: 160px;"><?=$list['log_ip']?></div>
                            </td>
                            <td align="center" axis="col6">
                                <div class="ta_c" style="width: 160px;"><?=date('Y-m-d h:m:s',$list['log_time'])?></div>
                            </td>
                            <td align="center" axis="col10">
                                <div class="ta_c" style="width: 360px;"><?=$list['username']?></div>
                            </td>
                            <td class="" style="width: 100%;">
                                <div>&nbsp;</div>
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
		        url: "/index.php?r=admin/log/adminlog",//+tab,
		        data: selectData,// 你的formid
		        success: function (data) {
		            var formData = selectData.split("&");
		            for (k in formData){
		                v = formData[k].split("=");
		                formData[v[0]] = v[1];
		            }

		            console.log(formData);
		            $(".page").remove();
		            $("body").append(data);
		            $("#admin_id option[value='"+formData.admin_id+"']").prop("selected","selected");
		            $('#start_time').val(formData.start_time);
                    $('#end_time').val(formData.end_time);
		            $("input[name=log_ip]").val(decodeURI(formData.log_ip));
		        }
		    });
		}
    </script> 

</body>
</html>