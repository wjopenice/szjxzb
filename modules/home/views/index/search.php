<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "商品搜索";
$this->keywords = "商品搜索";
$this->description = "商品搜索";
?>
<?= Html::cssFile("{$url}/Css/shopClassify/fashionClothe.css"); ?>
    <div class="shopContent">
        <div class="container shopClassifyContainer">
            <!-- banner -->
            <div class="slide-box banner"></div>

            <!-- contentList -->
            <div class="shopList">
                <div class="shopClassify pr">
                    <h3>分类：</h3>
                    <ul class="shopListClassifyUl cf">
                        <li class="fl all active">全部</li>
                        <?php foreach ($cat as $key=>$value): ?>
                            <li class="fl"><?=$value['name']?></li>
                        <?php endforeach; ?>
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
                <ul class="shopUl cf">
                    <?php if(!empty($arrData)):?>
                        <?php foreach ($arrData as $key=>$value): ?>
                            <li class="copy fl">
                                <a href="?r=home/index/goodsdetail&id=<?=$value['goods_id']?>">
                                    <?= Html::img($value['image_url1'],[ "alt"=>$value['goods_name'],'style'=>'padding: 22px 22px;background: #F4F4F4;margin:10px 0;width:230px;height:230px;' ]); ?>
                                    <div class="shopExplain"><p class="shopName"><?=$value['goods_name']?></p><p class="money">¥<?=$value['shop_price']?></p></div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else:?>
                        <a href="javascript:;">
                            <div class="shopExplain"><p class="shopName">没有找到你搜索的数据</p></div>
                        </a>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </div>
    <?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
    <?= Html::jsFile("{$url}/Js/shopClassify/fashionClothe.js"); ?>

