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
    <title>退换货</title>
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
</head>
<body>
<div class="page">
    <!--  标题栏   -->
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>退货退款管理</h3>
                <h5>商品订单退货申请及审核处理</h5>
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
            <li>买家提交的退货申请, 商家同意并平台审核通过之后, 以余额的方式返回到用户账户上</li>
        </ul>
    </div>
    <!--  表格     -->
    <div class="flexigrid">
        <div class="mDiv cf">
            <div class="ftitle fl">
                <h3>待处理的线上实物交易订单退货列表</h3><h5>(共45条记录)</h5>
            </div>
            <a class="fl" href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
            <form class="navbar-form form-inline fr" method="get">
                <input type="hidden" name="ctime" value="{$ctime}">
                <div class="sDiv">
                    <div class="sDiv2">
                        <select class="form-control" id="status" name="mtype" style="border: none;width:100px;padding-right:5px;padding-left:5px;height: 26px;">
                            <option value="">处理状态</option>
                            <option value="1">已取消</option>
                            <option value="-1">审核未通过</option>
                            <option value="">待审核</option>
                            <option value="1">审核通过</option>
                            <option value="-1">已发货</option>
                            <option value="-1">已完成</option>
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
                    <thead>
                    <tr class="cf">
                        <th class="sign fl" axis="col6" onclick="checkAllSign(this)">
                            <div style="width: 26px;"><i class="ico-check"></i></div>
                        </th>
                        <th align="center" abbr="article_title" axis="col6" class="fl">
                            <div style=" width:180px;" class="ta_c">订单编号</div>
                        </th>
                        <th align="center" abbr="ac_id" axis="col4" class="fl">
                            <div style=" width: 300px;" class="ta_c">商品名称</div>
                        </th>
                        <th align="center" abbr="ac_img" axis="col10" class="fl">
                            <div style=" width: 130px;" class="ta_c">类型</div>
                        </th>
                        <th align="center" abbr="article_show" axis="col6" class="fl">
                            <div style="width: 120px;" class="ta_c">申请日期</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="fl">
                            <div style="width: 100px;" class="ta_c">状态</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="fl">
                            <div style="width: 200px;" class="ta_c">操作</div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="bDiv">
            <div id="flexigrid">
                <table>
                    <tr class="cf">
                        <td class="sign fl" axis="col6">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 178px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">201709271337419178</div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 298px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">爸爸2陆毅代言索扬20000毫安充电宝轻薄正品手爸爸2陆毅代言索扬20000毫安充电宝轻薄正品手</div>
                        </td>
                        <td align="center" axis="col10">
                            <div class="ta_c" style="width: 128px;">退货退款</div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 118px;">2017-09-27 13:57</div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 98px;">待审核</div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 198px;">
                                <a class="btn green btn-info" href="javascript:window.parent.window.f_addTab('return_details','退换货详情','?r=admin/order/return_details')" data-toggle="tooltip" title=""><i class="fa fa-list-alt"></i>查看</a>
                                <a class="btn green btn-info" href="javascript:void(0)" data-toggle="tooltip" onclick="del(1,'del')"><i class="fa fa-list-alt"></i>删除</a>
                            </div>
                        </td>
                        <td style="width: 100%;"><div>&nbsp;</div></td>
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