<?php
use yii\helpers\Html;
$url = "./web/home/Static";
if(!empty($_COOKIE['username'])) {
    $len = cartlen($_COOKIE['username']);
}else{
    $len = 0;
}
?>
<?php
//导航结构数据
$alink = [
    '?r=home/index/index&type=index'=>"金轩首页",
    '?r=home/shop_classify/fashionclothe&type=fashionclothe'=>"高贵黄金",
    '?r=home/shop_classify/boundless&type=boundless'=>"奢华钻石",
    '?r=home/shop_classify/gorgeous&type=gorgeous'=>"智能电器",
    '?r=home/shop_classify/lightmakeup&type=lightmakeup'=>"家居家纺",
    '?r=home/shop_classify/multipurpose&type=multipurpose'=>"箱包鞋类",
    '?r=home/shop_classify/anexplosive&type=anexplosive'=>"衣裳服饰"
];
//导航颜色选择
$liclass = [
    'subNavBar fl active',
    'subNavBar fl',
];
//导航结构生成
$strli = "";
foreach ($alink as $key=>$value){
    $x = strchr(substr(strrchr($key,"/"),1),"&",true);
    $serverIp = $_SERVER['QUERY_STRING'];
    if(empty($serverIp)){
       $y = "index"; //默认路由
    }else{
        $z = substr(strrchr($serverIp,"/"),1);
        $y = !isset($_GET['type']) ? $z : $_GET['type']; //非默认路由
    }
    //导航是否默认特效颜色选择
    if($x == $y){
        $strli .= Html::tag("li",Html::a($value,$key,['class'=>'navBarLink']),['class'=>$liclass[0]]);
    }else{
        $strli .= Html::tag("li",Html::a($value,$key,['class'=>'navBarLink']),['class'=>$liclass[1]]);
    }
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
        <?=Html::beginTag("div",['class'=>"fr"])?>
            <?php if(!empty($_COOKIE['username'])): ?>
                <?=Html::a("我的订单","?r=user/tm/order&type=order",['class'=>'navLink'])?>
            <?php endif;?>
        <?=Html::endTag("div")?>
    <?=Html::endTag("div")?>
<?=Html::endTag("div")?>
<?=Html::beginTag("div",['class'=>"logoBox"])?>
    <?=Html::beginTag("div",['class'=>"container cf"])?>
        <?=Html::a(Html::img("{$url}/Image/common/logo/logo1.png",['class'=>'logoImg','alt'=>'']),"?r=home/index/index",['class'=>'logoLink fl','encode' => false])?>
        <?=Html::beginTag("div",['class'=>"cartBox fr cf"])?>
            <?=Html::tag("i","",['class'=>'cartIcon fl'])?>
            <?php if(!empty($_COOKIE['username'])): ?>
                <?=Html::tag("p","我的购物车(<span id='shop_cart_span'>$len</span> )",['class'=>'fl','id'=>'shop_cart'])?>
            <?php else: ?>
                <?=Html::tag("p","我的购物车(<span id='shop_cart_span'>0</span> )",['class'=>'fl','id'=>'shop_cart'])?>
            <?php endif;?>
        <?=Html::endTag("div")?>
        <?=Html::beginForm("?r=home/index/search","get")?>
        <?=Html::beginTag("div",['class'=>"searchBox fr cf"])?>
            <?=Html::input("text","search","",['class'=>'searchInput fl'])?>
            <?=Html::input("hidden","type","index")?>
            <?=Html::input("submit",'',"",["class"=>"searchIcon fr"])?>
        <?=Html::endTag("div")?>
        <?=Html::endForm()?>
    <?=Html::endTag("div")?>
<?=Html::endTag("div")?>
<?= Html::beginTag("div",['class'=>'navBar'])?>
    <?= Html::beginTag("ul",['class'=>'container cf'])?>
        <!--nav start-->
        <?=$strli ?>
        <!--nav end-->
    <?= Html::endTag("ul")?>
<?= Html::endTag("div")?>
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
    window.location.href='?r=home/shop_cart/index&type=index';
}
")?>
