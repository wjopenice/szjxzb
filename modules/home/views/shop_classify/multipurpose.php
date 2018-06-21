<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "分类-箱包鞋类";
$this->keywords = "分类-箱包鞋类";
$this->description = "分类-箱包鞋类";
?>
<?= Html::cssFile("{$url}/Css/shopClassify/fashionClothe.css"); ?>
    <div class="shopContent">
        <div class="container shopClassifyContainer">
            <!-- banner -->
            <div class="slide-box banner">
                <ul class="slide-content">
                    <li class="copy" data-num="2" style="background: url(<?=$banner['url']?>) no-repeat center center;"><a href="javascript:void(0)" target="_blank"></a></li>
                </ul>
                <div class="slide-btns">
                    <div class="prev"></div>
                    <div class="next"></div>
                </div>
            </div>

            <!-- contentList -->
            <div class="shopList">
                <div class="shopClassify pr">
                    <h3>分类：</h3>
                    <ul class="shopListClassifyUl cf">
                        <li class="fl all active">全部</li>
                        <li class="fl">帅哥</li>
                        <li class="fl">靓女</li>
                        <li class="fl">小可爱</li>
                        <li class="fl">好梦</li>
                        <li class="fl">贴身</li>
                        <li class="fl">宽松</li>
                    </ul>
                </div>
                <div class="shopSort pr">
                    <h3>排序：</h3>
                    <ul class="shopListClassifyUl cf">
                        <li class="fl all active">默认</li>
                        <li class="fl">价格</li>
                        <li class="fl">上架时间</li>
                    </ul>
                </div>
                <div class="classifyTitle">
                    <i style="background: url(<?=$url?>/Image/icon/xxb.png) no-repeat center"></i>
                    <span>箱包鞋类</span>
                </div>
                <ul class="shopUl cf">
                    <?php foreach ($arrData as $key=>$value): ?>
                        <li class="copy fl">
                            <a href="?r=home/index/goodsdetail&id=<?=$value['goods_id']?>&type=<?=navDataEx($value['mzsm_cat_id'])?>">
                                <?= Html::img($value['image_url1'],["width"=>"215","height"=>"230","alt"=>$value['goods_name']]); ?>
                                <div class="shopExplain"><p class="shopName"><?=$value['goods_name']?></p><p class="money">¥<?=$value['shop_price']?></p></div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
<?= Html::jsFile("{$url}/Js/shopClassify/fashionClothe.js"); ?>