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
    <title>会员等级</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/layer/layer.js")?>
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
                <h3>会员等级管理</h3>
                <h5>网站系统会员等级索引与管理</h5>
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
            <li>会员等级管理， 不同会员等级可设置不同折扣</li>
        </ul>
    </div>
    <!--  表格     -->
    <div class="flexigrid">
        <div class="mDiv">
            <div class="ftitle">
                <h3>会员等级列表</h3><h5>（共<span>6</span>条记录）</h5>
            </div>
            <a href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
        </div>
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <th class="sign" axis="col0">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </th>
                        <th align="left" abbr="user_id" axis="col3" class="">
                            <div style="width: 56px;" class="ta_c">等级</div>
                        </th>
                        <th align="left" abbr="nickname" axis="col4" class="">
                            <div style="width: 50px;" class="ta_c">等级名称</div>
                        </th>
                        <th align="center" abbr="level" axis="col5" class="">
                            <div style="width: 104px;" class="ta_c">消费额度</div>
                        </th>
                        <th align="center" abbr="total_amount" axis="col6" class="">
                            <div style="width: 50px;" class="ta_c">折扣率</div>
                        </th>
                        <th align="center" abbr="email" axis="col6" class="">
                            <div style="width: 102px;" class="ta_c">等级描述</div>
                        </th>
                        <th align="center" axis="col6" class="">
                            <div style="width: 172px;" class="ta_c">操作</div>
                        </th>
                        <th style="width:100%" axis="col7"><div></div></th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="tDiv">
            <div class="tDiv2">
                <div class="fbutton">
                    <a href="javascript:void(0)">
                        <div class="add" title="新增会员等级">
                            <span><i class="fa fa-plus"></i>新增会员等级</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="bDiv" style="height: auto;">
            <div cellpadding="0" cellspacing="0" border="0">
                <table>
                    <tbody>
                    <tr>
                        <td class="sign">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </td>
                        <td align="left" class="">
                            <div style="text-align: left; width: 50px;">1</div>
                        </td>
                        <td align="left" class="">
                            <div style="text-align: left; width: 50px;">注册会员</div>
                        </td>
                        <td align="center" class="">
                            <div style="text-align: center; width: 100px;">0.00</div>
                        </td>
                        <td align="center" class="">
                            <div style="text-align: center; width: 50px;">100%</div>
                        </td>
                        <td align="center" class="">
                            <div style="text-align: center; width: 100px;">注册会员</div>
                        </td>
                        <td align="center" class="handle">
                            <div style="text-align: center; width: 170px; max-width:170px;">
                                <a href="javascript:window.parent.window.f_addTab('edit_grade','编辑会员等级','?r=admin/member/edit_grade')" class="btn blue"><i class="fa fa-pencil-square-o"></i>编辑</a>
                                <a class="btn red" href="javascript:void(0)" data-id="1" onclick="delfun(this)"><i class="fa fa-trash-o"></i>删除</a>
                            </div>
                        </td>
                        <td align="" class="" style="width: 100%;">
                            <div>&nbsp;</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="iDiv" style="display: none;"></div>
        </div>
    </div>
</div>
<script>
    function delfun(obj) {
        // 删除按钮
        layer.confirm('确认删除？', {
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.ajax({
                type: 'post',
                url: $(obj).attr('data-url'),
                data : {act:'del',level_id:$(obj).attr('data-id')},
                dataType: 'json',
                success: function (data) {
                    layer.closeAll();
                    if (data.status == 1) {
                        layer.msg(data.msg, {icon: 1});
                        $(obj).parent().parent().parent().remove();
                    } else {
                        layer.alert(data.msg, {icon: 2});
                    }
                }
            })
        }, function () {
            layer.closeAll();
        });
    }

</script>
</body>