
<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "404 not found";
?>
<?= Html::tag("meta","",["http-equiv"=>"refresh","content"=>"5;url=?r=home/index/index"])?>
<?= Html::cssFile("{$url}/Css/shopCart/index.css"); ?>
<div class="container">
    <div class="noCart" style="border: 0;">
        <div class="inner" style="width: 400px;">
            <i class="noCartIcon"></i>
            <p class="noCartInfo"><b style="font-size: 30pt;">404页面不存在</b></p>
        </div>
    </div>
</div>


