<?php
use yii\helpers\Html;
?>
<!DOCTYPE HTML>
<?= Html::beginTag("html",['lang'=>"en"]); ?>
    <?= Html::beginTag("head"); ?>
        <?= Html::tag("link","",['rel'=>'Shortcut Icon','href'=>'favicon.ico'])?>
        <?= Html::tag("link","",['rel'=>'Bookmark','href'=>'favicon.ico'])?>
        <?= Html::tag("meta","",['charset'=>Yii::$app->charset ]); ?>
        <?= Html::tag("meta","",['http-equiv'=>'x-ua-compatible','content'=>'ie=edge']); ?>
        <?= Html::tag("meta","",['name'=>'viewport','content'=>'initial-scale=1, maximum-scale=1']); ?>
        <?= Html::tag("meta","",['name'=>'apple-mobile-web-app-capable','content'=>'yes']); ?>
        <?= Html::tag("meta","",['name'=>'apple-mobile-web-app-status-bar-style','content'=>'black']); ?>
        <?= Html::tag("title",Html::encode($this->title)); ?>
        <?= Html::tag("meta","",['name'=>"keywords",'content'=>Html::encode($this->keywords)]); ?>
        <?= Html::tag("meta","",['name'=>"description",'content'=>Html::encode($this->description)]); ?>
        <?= Html::cssFile("@web/web/mobile/Static/Css/common/sm.min.css"); ?>
        <?= Html::cssFile("@web/web/mobile/Static/Css/common/base.css"); ?>
    <?= Html::endTag("head"); ?>
    <?= Html::beginTag("body",['class'=>'mHome']); ?>
        <!--  加载层   -->
        <?= Html::beginTag("div",['id'=>'loader']); ?>
            <?= Html::beginTag("div",['class'=>'loaderInner']); ?>
                <?= Html::img("@web/web/mobile/Static/Image/common/logo/logo1.png",['alt'=>""])?>
            <?= Html::endTag("div"); ?>
        <?= Html::endTag("div"); ?>
        <!--  页面    -->
        <?= Html::beginTag("div",['class'=>'page-group']); ?>
            <?=$content?>
            <!--   底部导航栏   -->
            <?=$this->render('footer_nav.php')?>
        <?= Html::endTag("div"); ?>
        <?= Html::jsFile("@web/web/mobile/Static/Js/common/sm.min.js"); ?>
        <?= Html::jsFile("@web/web/mobile/Static/Js/common/public.js"); ?>
    <?= Html::endTag("body"); ?>
<?= Html::endTag("html"); ?>

