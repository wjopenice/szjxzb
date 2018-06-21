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
    <title>首页框架</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
</head>
<body>
<!--  头  -->
<div class="header cf">
    <div class="logoBox"><?= Html::img("{$url}/Image/common/logo.png",["alt"=>""]); ?></div>
    <div class="headerRight cf">
        <div class="manager cf">
                <span class="avatar fr">
                    <?= Html::img("{$url}/Image/common/admint.png",["alt"=>""]); ?>
                </span>
            <dl class="cf fl">
                <dt class="name"><?= $session->get('username') ?></dt>
                <dd class="group">管理员</dd>
            </dl>
        </div>
        <ul class="operate cf nc-row">
            <li><a class="toast show-option" href="javascript:void(0);" title="查看待处理事项">&nbsp;<em class="num">0</em></a></li>
<!--            <li><a class="siteMap show-option" id="trace_show" href="javascript:void(0)" target="workspace" title="更新缓存">&nbsp;</a></li>-->
            <li><a class="siteMap show-option" target="_blank" href="javascript:f_addTab('welcome', '首页', '?r=admin/index/welcome')" title='新窗口打开商城后台首页'>&nbsp;</a></li>
            <li><a class="homepage show-option" target="_blank" href="?r=home/index/index" title="新窗口打开商城首页">&nbsp;</a></li>
            <li><a class="loginOut show-option" href="?r=admin/login/loginout" title="安全退出管理中心">&nbsp;</a></li>
        </ul>
    </div>
</div>
<!--   主体内容   -->
<div class="adminConWrap">
    <div class="adminLeft">
        <div class="nav-tabs cf">
            <!--商品-->
            <?=$this->render('index_goods.php')?>
            <?php if($session->get('username') != "test"):?>
                <!--订单-->
                <?=$this->render('index_order.php')?>
            <?php endif;?>
            <!--促销-->
            <?=$this->render('index_promotion.php')?>
            <!--统计-->
            <?=$this->render('index_statistics.php')?>
            <!--广告-->
            <?=$this->render('index_advertisement.php')?>
            <?php if($session->get('username') != "test"):?>
                <!--设置-->
                <?=$this->render('index_setting.php')?>
                <!--会员-->
                <?=$this->render('index_member.php')?>
                <!--日志-->
                <?=$this->render('index_log.php')?>
            <?php endif;?>
        </div>
        <div class="about" title="关于系统"><i class="fa"></i><span>shop.com</span></div>
    </div>
    <div class="adminRight" id="frameCenter"></div>
</div>
</body>
</html>