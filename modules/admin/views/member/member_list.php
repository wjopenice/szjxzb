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
    <title>会员列表</title>
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
    <?= Html::jsFile("{$url}/Js/member/member_list.js")?>
</head>
<body>

    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>会员管理</h3>
                    <h5>网站系统会员索引与管理</h5>
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
                <li>会员列表管理，可以给会员群发站内信、邮件等.</li>
                <li>分销系统可以查看会员上下级信息.</li>
            </ul>
        </div>
        <!--  表格     -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>会员列表</h3><h5>（共<span><?=$total?></span>条记录）</h5>
                </div>
                <a href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
                <form action="" id="search-form2" class="form-inline fr" method="post" onSubmit="return false">
                    <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                    <div class="sDiv">
                        <div class="sDiv2">
                            <!--排序规则-->
                            <input type="text" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" size="30" id="tell" name="tell" class="qsbox" placeholder="请输入手机">
                            <input type="button" onClick="ajax_get_table('search-form2',1)" class="btn" value="搜索">
                        </div>
                    </div>
                </form>
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th class="sign" axis="col0">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </th>
                            <th align="left" abbr="id" axis="col3" class="">
                                <div style="width: 40px;" class="ta_c">ID</div>
                            </th>
                            <th align="left" abbr="username" axis="col4" class="">
                                <div style="width: 150px;" class="ta_c">会员名</div>
                            </th>
                            <th align="left" abbr="nickname" axis="col4" class="">
                                <div style="width: 150px;" class="ta_c">会员昵称</div>
                            </th>
                            <th align="left" abbr="sex" axis="col4" class="">
                                <div style="width: 150px;" class="ta_c">会员性别</div>
                            </th>
                            <th align="center" abbr="tell" axis="col6" class="">
                                <div style="width: 80px;" class="ta_c">手机号</div>
                            </th>
                            <th align="center" abbr="birthdate" axis="col6" class="">
                                <div style="width: 120px;" class="ta_c">注册日期</div>
                            </th>
                            <th align="center" axis="col1" class="handle">
                                <div style="width: 150px;" class="ta_c">操作</div>
                            </th>
                            <th style="width:100%" axis="col7"><div></div></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="tDiv">
                <div class="tDiv2">
                    <!-- <div class="fbutton">
                        <a href="javascript:void(0)">
                            <div class="add" title="添加会员">
                                <span><i class="fa fa-plus"></i>添加会员</span>
                            </div>
                        </a>
                    </div> -->
                    <div class="fbutton">
                        <a href="javascript:void(0)">
                            <div class="add" title="添加会员">
                                <span><i class="fa fa-share"></i>导出会员</span>
                            </div>
                        </a>
                    </div>
                    <div class="fbutton">
                        <a onclick="send_message();">
                            <div class="add" title="发送站内信">
                                <span>发送站内信</span>
                            </div>
                        </a>
                    </div>
                    <div class="fbutton">
                        <a onclick="send_mail();">
                            <div class="add" title="发送邮件">
                                <span>发送邮件</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bDiv">
                <div id="flexigrid">
                    <table >
                        <?php foreach ($arrData as $list): ?> 
                        <tr class="cf">
                            <td class="sign fl" axis="col6">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 40px;"><?=$list['id']?></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 150px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><?=$list['username']?></div>
                            </td>
                            <td align="center" axis="col10" class="fl">
                                <div class="ta_c" style="width: 150px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><?=$list['nickname']?></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 150px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><?=$list['sex']?></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 80px;"><?=$list['tell']?></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <div class="ta_c" style="width: 120px;"><?=$list['birthdate']?></div>
                            </td>
                            <td align="center" axis="col6" class="fl">
                                <!--<div class="ta_c" style="width: 98px;">商品库存</div>-->
                                <div class="ta_c" style="width: 150px;">
                                    <!-- <a class="btn green" href="detail.html" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="查看详情"><i class="fa fa-list-alt"></i>查看</a> -->
                                    <a class="btn green" href="javascript:;" data-toggle="tooltip"  class="btn btn-info" onclick="del(<?=$list['id']?>)"><i class="fa fa-list-alt"></i>删除</a>
                                </div>
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

</body>