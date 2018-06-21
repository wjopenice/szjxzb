<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/mobile/Static");
$this->title = "分类";
$this->keywords = "分类";
$this->description = "分类";
?>
<?=Html::cssFile("{$url}/Css/classify/index.css")?>
<!--  类别   -->
<div class="typeBoxWrap cf">
    <?=$this->render('left_nav.php',compact("arrNav"))?>
    <div class="typeBoxContent fl">
        <img class="bannerImg" src="<?=$arrBanner['url']?>" alt="">
        <div class="subClassifyBox">
            <div class="classifyTit">热销推荐</div>
            <div class="classifyContent">
                <ul class="cf">
                    <?php foreach ($arrData as $key=>$value): ?>
                        <li class="subClassify cf fl copy">
                            <a href="?m=m/index/goodsdetail&type=classify&id=<?=$value['goods_id']?>">
                                <img class="classifyImg" src="<?=$value['image_url1']?>" alt="<?=$value['goods_name']?>">
                                <p class="classifyName"><?=$value['goods_name']?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?=Html::jsFile("{$url}/Js/common/zepto.min.js")?>
<?=Html::jsFile("{$url}/Js/classify/index.js")?>
