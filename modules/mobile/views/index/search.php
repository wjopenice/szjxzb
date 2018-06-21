<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/mobile/Static");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>搜索</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/search/index.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!--  页面    -->
    <div class="page-group">

        <!--  搜索    -->
        <form action="?m=m/index/search" method="post">
        <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
        <div class="bar bar-header-secondary">
            <div class="searchbar">
                <a class="searchbar-cancel">取消</a>
                <div class="search-input">
                    <label class="icon icon-search" for="search"></label>
                    <input type="search" id='search' name="search" placeholder='搜索感兴趣的内容...'/>
                </div>
            </div>
        </div>
        </form>
        <!--  热门搜索   -->
        <div class="hotSearchBox">
            <div class="searchTit cf">
                <span class="fl">热门搜索</span>
            </div>
            <div class="searchLinkBox cf">
                <?php
                    foreach ( $arrNav as $key=>$value):
                    $catType = "";
                    switch ($value['mobile_name']){
                        case "高贵黄金": $catType = 1;break;
                        case "奢华钻石": $catType = 2;break;
                        case "智能电器": $catType = 3;break;
                        case "家居家纺": $catType = 4;break;
                        case "箱包鞋类": $catType = 5;break;
                        case "衣裳服饰": $catType = 6;break;
                    }
                ?>
                <a class="subLink <?php if(strpos($value['mobile_name'],$search) ){ echo "active"; }?> " href="?m=m/classify/index&type=classify&nav=<?=$catType?>"><?=$value['mobile_name']?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 筛选类别 -->
        <div class="buttons-tab" id="searchTap">
            <a href="#" class="tab-link active button">默认</a>
            <a href="#" class="tab-link button">热度</a>
            <a href="#" class="tab-link button"><span>新品</span></a>
            <a href="#" class="tab-link button priceSearch"><span>价格</span><span class="dib icon-array"></span></a>
        </div>

        <!--  筛选的商品   -->
        <div class="filterGoods">
            <div class="subModel">
                <ul class="bestBoxWrap cf">
                    <?php foreach ($arrData as $k=>$v): ?>
                    <li class="subBest fl copy" onclick="window.location.href='?m=m/index/goodsdetail&type=classify&id=<?=$v['goods_id']?>'">
                        <img class="bestImg" src="<?=$v['image_url1']?>" alt="">
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
            <div class="bottomBox">已经到底了...</div>
        </div>

    </div>

<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/search/common.js"></script>
</body>
</html>