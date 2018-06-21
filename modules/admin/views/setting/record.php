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
</head>
<body>
    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>数据备份记录</h3>
                    <h5>网站系统数据备份的记录</h5>
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
                <li>建议定期备份数据库.备份文件所在data目录</li>
            </ul>
        </div>
        <!--  表格  -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>数据备份记录</h3><h5>（共<span>0</span>条记录）</h5>
                </div>
                <a href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th class="sign" axis="col0">
                                <div style="width: 24px;"><input type="checkbox" onclick="javascript:$('input[name*=tables]').prop('checked',this.checked);"></div>
                            </th>
                            <th align="left" abbr="article_title" axis="col3" class="">
                                <div style="min-width: 66px;" class="ta_c">备份记录</div>
                            </th>
                            <th align="center" abbr="ac_id" axis="col4" class="">
                                <div style="width: 202px;" class="ta_c">备份时间</div>
                            </th>
                            <th style="width:100%" axis="col7"><div></div></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="bDiv" style="height: auto;">
                <div id="flexigrid" >
                    <form  method="post" id="export-form" action="">
                        <table>
                            <?php
                            $exp = "/([a-zA-Z_]+)(\d{4})(\d{2})(\d{2})(\d{2})(\d{2})([\.A-Za-z]+)/";
                            for ($i=0;$i<count($sqlArr);$i++):
                                preg_match($exp,$sqlArr[$i],$sqltime);
                                $sqltime1 = substr($sqltime[1],0,-1).$sqltime[7];
                                $sqltime2 = $sqltime[2]."年".$sqltime[3]."月".$sqltime[4]."日".$sqltime[5]."时".$sqltime[6]."分";
                            ?>
                            <tr data-id="">
                                <td class="sign">
                                    <div style="width: 24px;"><input type="checkbox" name="tables[]" value=""></div>
                                </td>
                                <td align="left" class="">
                                    <div style="min-width: 63px;" class="ta_c">
                                        <a href="javascript:void(0)" class="btn green">
                                            <?=$sqltime1?>
                                            <i class="fa" style="width:14px;height:14px;background: url(<?=$url?>/Image/common/ysbIcon.png)"></i>
                                        </a>
                                    </div>
                                </td>
                                <td align="left" class="">
                                    <div style="width: 200px;" class="ta_c"><?=$sqltime2?></div>
                                </td>
                                <td align="" class="" style="width: 100%;">
                                    <?php if($sqltime1 == "shop_test.sql"):?>
                                        <div> <a style="color: rgba(145, 32, 53, 0.96)">静止</a></div>
                                    <?php else: ?>
                                        <div> <a href="?r=admin/setting/sqldel&tablename=<?=$sqlArr[$i]?>">删除</a></div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endfor; ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>