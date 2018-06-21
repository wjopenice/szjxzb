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
            <?= Html::tag("title",Html::encode($this->title)); ?>
            <?= Html::tag("meta","",['name'=>"keywords",'content'=>Html::encode($this->keywords)]); ?>
            <?= Html::tag("meta","",['name'=>"description",'content'=>Html::encode($this->description)]); ?>
            <?= Html::cssFile("@web/web/home/Static/Css/common/base.css"); ?>
            <?= Html::cssFile("@web/web/home/Static/Css/common/public.css"); ?>
            <?= Html::jsFile("@web/web/home/Static/Js/common/jquery.js"); ?>
            <?= Html::jsFile("@web/web/home/Static/Js/common/public.js"); ?>
    <?= Html::endTag("head"); ?>
    <?= Html::beginTag("body",['class'=>'mPage']); ?>
        <?= Html::beginTag("div",['class'=>'header cf','id'=>'header']); ?>
            <?=$this->render('inc_header.php')?>
        <?= Html::endTag("div"); ?>
        <?= $content ?>
        <?= Html::beginTag("div",['class'=>'footer','id'=>'footer']); ?>
            <?=$this->render('inc_footer.php')?>
        <?= Html::endTag("div"); ?>
    <?= Html::endTag("body"); ?>
<?= Html::endTag("html"); ?>

