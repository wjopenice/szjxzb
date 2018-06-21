<?php
use yii\helpers\Html;
$url = "./web/home/Static";
if(!empty($_COOKIE['username'])) {
    $len = cartlen($_COOKIE['username']);
}else{
    $len = 0;
}
?>
<?=Html::beginTag("div",['class'=>"nav"])?>
    <?=Html::beginTag("div",['class'=>"container cf"])?>
        <?=Html::beginTag("div",['class'=>"fl"])?>
            <?php if(!empty($_COOKIE['username'])): ?>
                <?=Html::tag("span","欢迎{$_COOKIE['username']}回来",['class'=>'navInterval'])?>
                <?=Html::tag("span","/",['class'=>'navInterval'])?>
                <?=Html::a("个人中心","?r=user/uc/index",['class'=>'navLink'])?>
                <?=Html::tag("span","/",['class'=>'navInterval'])?>
                <?=Html::a("退出","?r=home/login/loginout",['class'=>'navLink'])?>
            <?php else: ?>
                <?=Html::a("登录","?r=home/login/login",['class'=>'navLink'])?>
                <?=Html::tag("span","/",['class'=>'navInterval'])?>
                <?=Html::a("注册","?r=home/login/register",['class'=>'navLink'])?>
            <?php endif;?>
        <?=Html::endTag("div")?>
        <?=Html::beginTag("div",['class'=>"backHome fl"])?>
            <?=Html::a("返回金轩首页","?r=home/index/index",['class'=>'navLink'])?>
        <?=Html::endTag("div")?>
        <?=Html::beginTag("div",['class'=>"fr"])?>
            <?php if(!empty($_COOKIE['username'])): ?>
            <?=Html::a("我的订单","?r=user/tm/order&type=order",['class'=>'navLink'])?>
            <?php endif;?>
        <?=Html::endTag("div")?>
    <?=Html::endTag("div")?>
<?=Html::endTag("div")?>
<?=Html::beginTag("div",['class'=>"logoBox personalContent"])?>
    <?=Html::beginTag("div",['class'=>"container cf"])?>
<?=Html::a(Html::img("{$url}/Image/common/logo/logo1.png",['class'=>'logoImg','width'=>'180','height'=>'58','alt'=>'']),"?r=home/index/index",['class'=>'logoLink fl','encode' => false])?>
        <?=Html::beginTag("div",['class'=>"cartBox personalCartBox  fr cf"])?>
            <?=Html::tag("i","",['class'=>'cartIcon fl'])?>
            <?php if(!empty($_COOKIE['username'])): ?>
                <?=Html::tag("p","我的购物车(<span id='shop_cart_span'>$len</span> )",['class'=>'fl','id'=>'shop_cart'])?>
            <?php else: ?>
                <?=Html::tag("p","我的购物车(<span id='shop_cart_span'>0</span> )",['class'=>'fl','id'=>'shop_cart'])?>
            <?php endif;?>
        <?=Html::endTag("div")?>
        <?=Html::beginTag("div",['class'=>"searchBox personalSearchBox fr cf"])?>
            <?=Html::input("text","","",['class'=>'searchInput personalSearchInput fl'])?>
            <?=Html::tag("i","",['class'=>'searchIcon personalSearchIcon fr'])?>
        <?=Html::endTag("div")?>
    <?=Html::endTag("div")?>
<?=Html::endTag("div")?>
<?= Html::script("
var shopNode = document.getElementById('shop_cart');
var shopValue = document.getElementById('shop_cart_span');
window.onload = function() {
    if (shopValue.innerHTML == 0) {
        shopNode.style.color = '#ccc';
    }else{
        shopNode.style.color = '#333';
    }
}
shopNode.onclick=function(){ 
    window.location.href='?r=home/shop_cart/index';
}
")?>

