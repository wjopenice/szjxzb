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
    <title>订单日志</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/layer/laydate/laydate.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
</head>
<body>
<div class="page">
    <!--  标题栏   -->
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>订单管理 - 订单日志</h3>
                <h5>所有用户操作订单生成的日志明细</h5>
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
            <li>所有用户操作订单生成的日志明细</li>
            <li>商城订单日志也有缓存</li>
        </ul>
    </div>
    <!--  表格     -->
    <div class="flexigrid">
        <div class="mDiv cf">
            <div class="ftitle fl">
                <h3>订单操作列表</h3><h5>(共5条记录)</h5>
            </div>
            <a class="fl" href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
            <form class="navbar-form form-inline fr" method="get">
                <input type="hidden" name="ctime" value="{$ctime}">
                <div class="sDiv">
                    <div class="sDiv2" style="margin-right: 10px;">
                        <input type="text" size="30" id="start_time" value="2018-10-12" placeholder="起始时间" class="qsbox">
                        <input type="button" class="btn" value="起始时间">
                    </div>
                    <div class="sDiv2" style="margin-right: 10px;">
                        <input type="text" size="30" id="end_time" value="2018-10-18" placeholder="截止时间" class="qsbox">
                        <input type="button" class="btn" value="截止时间">
                    </div>
                    <div class="sDiv2" style="margin-right: 10px;">
                        <select class="form-control" id="status" name="mtype" style="border: none;">
                            <option value="">选择管理员</option>
                        </select>
                    </div>
                    <div class="sDiv2">
                        <input size="30" placeholder="订单编号" value="" name="goods_name" class="qsbox" type="text">
                        <input class="btn" value="搜索" type="submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0" style="width: 100%;">
                    <tr class="cf">
                        <th class="sign fl" axis="col6" onclick="checkAllSign(this)">
                            <div style="width: 26px;"><i class="ico-check"></i></div>
                        </th>
                        <th align="center" abbr="article_title" axis="col6" class="fl">
                            <div style=" width:120px;" class="ta_c">订单ID</div>
                        </th>
                        <th align="center" abbr="ac_id" axis="col4" class="fl">
                            <div style=" width: 300px;" class="ta_c">操作动作</div>
                        </th>
                        <th align="center" abbr="ac_img" axis="col10" class="fl">
                            <div style=" width: 260px;" class="ta_c">操作员</div>
                        </th>
                        <th align="center" abbr="article_show" axis="col6" class="fl">
                            <div style="width: 200px;" class="ta_c">操作备注</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="fl">
                            <div style="width: 120px;" class="ta_c">操作时间</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="fl">
                            <div style="width: 100px;" class="ta_c">操作</div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="tDiv">
            <div class="tDiv2">
                <div class="fbutton">
                    <a href="javascript:void(0)">
                        <div class="add" title="删除所选">
                            <span>批量删除</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="bDiv">
            <div id="flexigrid">
                <table style="width: 100%;">
                    <tr class="cf">
                        <td class="sign fl" axis="col6">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </td>
                        <td align="center" axis="col6" class="fl">
                            <div class="ta_c" style="width: 118px;">41</div>
                        </td>
                        <td align="center" axis="col6" class="fl">
                            <div class="ta_c" style="width: 298px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">小米手机5,十余项黑科技，很轻狠快小米手机5,十余项黑科技，很轻狠快</div>
                        </td>
                        <td align="center" axis="col10" class="fl">
                            <div class="ta_c" style="width: 258px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">内存:32G 颜色内存:32G 颜色内存:32G 颜色内存:32G 颜色</div>
                        </td>
                        <td align="center" axis="col6" class="fl">
                            <div class="ta_c" style="width: 198px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">201801311409282905</div>
                        </td>
                        <td align="center" axis="col6" class="fl">
                            <div class="ta_c" style="width: 118px;">2018-03-29 19:03</div>
                        </td>
                        <td align="center" axis="col6" class="fl">
                            <!--<div class="ta_c" style="width: 98px;">商品库存</div>-->
                            <div class="ta_c" style="width: 98px;">
                                <a class="btn green btn-info" href="detail.html" data-toggle="tooltip" title="" data-original-title="查看详情"><i class="fa fa-list-alt"></i>查看</a>
                                <a class="btn green btn-info" href="javascript:;" data-toggle="tooltip" onclick="del(1,'del')"><i class="fa fa-list-alt"></i>删除</a>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // 点击刷新数据
        $('.fa-refresh').click(function(){
            location.href = location.href;
        });

        $('#start_time').layDate();
        $('#end_time').layDate();
    });
    function del(ids,handle_type){
        layer.confirm('确认当前操作？', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                // 确定
                $.ajax({
                    url: $('#flexigrid').data('url'),
                    type:'post',
                    data:{ids:ids,type:handle_type},
                    dataType:'JSON',
                    success: function (data) {
                        layer.closeAll();
                        if (data.status == 1){
                            layer.msg(data.msg, {icon: 1, time: 2000},function(){
                                location.href = data.url;
                            });
                        }else{
                            layer.msg(data.msg, {icon: 2, time: 2000});
                        }
                    }
                });
            }, function (index) {
                layer.close(index);
            }
        );
    }

</script>
</body>
</html>