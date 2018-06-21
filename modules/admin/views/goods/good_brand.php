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
    <title>商品品牌管理</title>
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
                <h3>商品品牌管理</h3>
                <h5>商品品牌管理</h5>
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
    </div>
    <!--  表格     -->
    <div class="flexigrid">
        <?php if($session->get('username') != "test"):?>
            <div class="tDiv">
                <div class="tDiv2">
                    <div class="fbutton">
                        <a href="?r=admin/goods/addbrand">
                            <div class="add" title="添加品牌">
                                <span>添加品牌</span>
                            </div>
                        </a>
                    </div>
                    <div class="fbutton">
                        <a href="javascript:void(0)">
                            <div class="add" title="初始化商品搜索关键词">
                                <span>初始化商品搜索关键词</span>
                            </div>
                        </a>
                    </div>
                    <div class="fbutton">
                        <a href="javascript:void(0)">
                            <div class="add" title="批量删除">
                                <span>批量删除</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0" style="width: 100%;">
                    <thead>
                    <tr>
                        <th align="left" axis="col6"  style="width: 25%;" class="">
                            <div>品牌id</div>
                        </th>
                        <th align="left" axis="col6"  style="width: 25%;" class="">
                            <div>品牌名称</div>
                        </th>
                        <th align="left" axis="col6"  style="width: 25%;" class="">
                            <div>品牌logo</div>
                        </th>
                        <th align="left" axis="col6"  style="width: 25%;" class="">
                            <div>操作</div>
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
                        <tr>
                            <td align="center" valign="middle"  style="width: 25%; height: 100px; line-height: 100px;"><?=$list['id']?></td>
                            <td align="center" valign="middle" style="width: 25%; height: 100px; line-height: 100px;"><?=$list['name']?></td>
                            <td align="center" valign="middle" style="width: 25%; height: 100px; line-height: 100px;"><img src="<?=$list['logo']?>"></td>
                            <td align="center" valign="middle" style="width: 25%; height: 100px; line-height: 100px;">
                                <?php if($session->get('username') != "test"):?>
                                    <a href="?r=admin/goods/editbrand&id=<?=$list['id']?>">修改</a> | <a href="javascript:alert('未开放此功能')">删除</a>
                                <?php endif; ?>
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
</html>