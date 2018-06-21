<?php
use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to("@web/web/mobile/Static");
$this->title = "购物车";
$this->keywords = "购物车";
$this->description = "购物车";
?>


<?=Html::cssFile("{$url}/Css/shoppingCart/index.css")?>

        <!--  商品   -->
        <div class="shoppingCartBox">
            <div class="delete cf"><span class="icon icon-remove fr deleteIcon"></span></div>
            <?php if(!empty($cartData)):?>
            <?php foreach ($cartData as $key=>$value):?>
            <div class="subCartBox cf copy">
                <i class="isChecked fl"></i>
                <div class="cartImgBox fl"><img src="<?=$value['goodurl']?>" alt=""></div>
                <div class="cartInfo fl">
                    <p class="bestName"><?=$value['goodname']?></p>
                    <p class="bestDetail"><?=$value['keywords']?></p>
                    <p class="goodsPrice">￥<span class="goodsPriceVal"><?=$value['goodprice']?></span></p>
                </div>
                <div class="cart_num cf">
                    <input class="cart_min pull-left" type="button" value="-" disabled="disabled">
                    <input class="cart_text_box" id="quantity" type="number" value="<?=$value['goodnum']?>" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}">
                    <input class="cart_add pull-right" type="button" value="+">
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <!--  没有商品   -->
            <div class="noGoods cf">
                <p class="info fl">空空如也~ </p>
                <a class="goLink fl" href="?m=m/index/index&type=index">去逛逛</a>
            </div>
            <?php endif; ?>
        </div>

        <!--  全选结算栏  -->
        <div class="balanceBox cf">
            <div class="allCheckBox cf fl"><i class="isChecked fl active"></i><span class="checkName">全选</span></div>
            <a class="balanceBtn fr" href="?m=m/sc/order">结算</a>
            <div class="balanceInfo fr">
                <p class="totalPrice">总价：￥<span id="confirmTotalPrice">0</span></p>
                <p class="post">邮费：包邮</p>
            </div>
        </div>

        <!--  热销榜单   -->
        <div class="hotList bg_white marBot">
            <div class="titCommon fl"><span>—</span> 热销榜单 <span>—</span></div>
            <div class="subModel">
                <ul class="bestBoxWrap cf">
                    <?php foreach ($arrHot as $k=>$v):?>
                    <li class="subBest fl copy" onclick="window.location.href='?m=m/index/goodsdetail&type=classify&id=<?=$v['goods_id']?>'">
                        <img class="bestImg" src="<?=$v['image_url1']?>" alt="<?=$v['goods_name']?>">
                        <p class="bestName"><?=$v['goods_name']?></p>
                        <p class="bestDetail"><?=$v['keywords']?></p>
                        <p class="bestSale">已售 <span><?=$v['sales_sum']?></span></p>
                        <p class="bestPrice">￥<?=$v['shop_price']?></p>
                        <i class="lineBottom"></i>
                        <i class="lineRight"></i>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>


<?=Html::jsFile("{$url}/Js/common/zepto.min.js")?>
<?=Html::jsFile("{$url}/Js/shoppingCart/index.js")?>
