<?php
use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to("@web/web/mobile/Static");
$this->title = "首页";
$this->keywords = "首页";
$this->description = "首页";
?>
<?=Html::cssFile("{$url}/Css/common/sm-extend.min.css")?>
<?=Html::cssFile("{$url}/Css/index/index.css")?>
<?=Html::jsFile("{$url}/Js/common/zepto.min.js")?>
        <!--  搜索    -->
        <form action="?m=m/index/search" method="post">
            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
            <div class="bar bar-header-secondary">
                <div class="searchbar">
                    <a class="searchbar-cancel">取消</a>
                    <div class="search-input">
                        <label class="icon icon-search" for="search"></label>
                        <input type="search" id='search' name="search" placeholder='搜索感兴趣的内容' />
                    </div>
                </div>
            </div>
        </form>

        <!--  banner   -->
        <div class="swiper-container bannerBox">
            <div class="swiper-wrapper slide-banner_uc">
                <?php foreach ($arrBanner as $kb=>$vb): ?>
                <div class="swiper-slide"><a href="" class="external"><img alt="<?=$vb['name']?>" src="<?=$vb['url']?>"></a></div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <!--  分类  -->
        <div class="classifyBoxWrap">
            <ul class="cf">
                <?php
                foreach ($arrNav as $kn=>$vn):
                $catType = "";
                switch ($vn['mobile_name']){
                    case "高贵黄金": $catType = 1;break;
                    case "奢华钻石": $catType = 2;break;
                    case "智能电器": $catType = 3;break;
                    case "家居家纺": $catType = 4;break;
                    case "箱包鞋类": $catType = 5;break;
                    case "衣裳服饰": $catType = 6;break;
                }
                ?>
                <li class="fl subClassify iconJewelry"><a class="cf" href="?m=m/classify/index&type=classify&nav=<?=$catType?>"><i style="background: url(<?=$vn['image']?>) no-repeat center center;"></i><p><?=$vn['mobile_name']?></p></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!--  优惠券banner图   -->
        <div class="coupon">
            <a class="couponLink" href="../../View/welfare/index.html">
                <img src="<?=$url?>/Image/index/banner/banner-coupon.png" class="couponImg" alt="">
            </a>
        </div>

        <!--  推荐   -->
        <div class="recommendBoxWrap cf">
            <div class="titCommon fl"><span>—</span> 推荐 <span>—</span></div>
            <div class="subModel">
                <div class="bannerImg"><img src="<?=$url?>/Image/index/recommend/banner1.png" alt=""></div>
                <div class="goodsBoxWrap cf ">
                    <?php foreach ($arrrRecommend[0] as $kr=>$vr):?>
                    <div class="subGoodsBox fl copy">
                        <a class="cf subGoodsLink" href="?m=m/index/goodsdetail&type=classify&id=<?=$vr['goods_id']?>">
                            <img class="goodsImg" src="" onerror="noPic(this,'<?=$vr['image_url1']?>')" alt="<?=$vr['goods_name']?>">
                            <p class="goodsName"><?=$vr['goods_name']?></p>
                            <p class="goodsPrice">￥<?=$vr['shop_price']?></p>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="bannerImg"><img src="<?=$url?>/Image/index/recommend/banner2.png" alt=""></div>
                <div class="goodsBoxWrap cf">
                    <?php foreach ($arrrRecommend[1] as $kr=>$vr):?>
                    <div class="subGoodsBox fl copy">
                        <a class="cf subGoodsLink" href="?m=m/index/goodsdetail&type=classify&id=<?=$vr['goods_id']?>">
                            <img class="goodsImg" src="" onerror="noPic(this,'<?=$vr['image_url1']?>')" alt="<?=$vr['goods_name']?>">
                            <p class="goodsName"><?=$vr['goods_name']?></p>
                            <p class="goodsPrice">￥<?=$vr['shop_price']?></p>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!--  至IN尖货  -->
        <div class="bestGoods">
            <div class="titCommon fl"><span>—</span> 至IN尖货 <span>—</span></div>
            <div class="subModel">
                <ul class="bestBoxWrap cf">
                    <?php foreach ($arrClick as $kc=>$vc):?>
                    <li class="subBest fl copy" onclick="window.location.href='?m=m/index/goodsdetail&type=classify&id=<?=$vc['goods_id']?>'">
                        <img class="bestImg" src="" alt="<?=$vc['goods_name']?>" onerror="noPic(this,'<?=$vc['image_url1']?>')">
                        <p class="bestName"><?=$vc['goods_name']?></p>
                        <p class="bestDetail"><?=$vc['keywords']?></p>
                        <p class="bestSale">已售 <span><?=$vc['sales_sum']?></span></p>
                        <p class="bestPrice">￥<?=$vc['shop_price']?></p>
                        <i class="lineBottom"></i>
                        <i class="lineRight"></i>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!--  热销榜单   -->
        <div class="hotList">
            <div class="titCommon fl"><span>—</span> 热销榜单 <span>—</span></div>
            <div class="subModel">
                <ul class="bestBoxWrap cf">
                    <?php foreach ($arrHot as $kh=>$vh):?>
                    <li class="subBest fl copy" onclick="window.location.href='?m=m/index/goodsdetail&type=classify&id=<?=$vh['goods_id']?>'">
                        <img class="bestImg" src="" alt="<?=$vh['goods_name']?>" onerror="noPic(this,'<?=$vh['image_url1']?>')">
                        <p class="bestName"><?=$vh['goods_name']?></p>
                        <p class="bestDetail"><?=$vh['keywords']?></p>
                        <p class="bestSale">已售 <span><?=$vh['sales_sum']?></span></p>
                        <p class="bestPrice">￥<?=$vh['shop_price']?></p>
                        <i class="lineBottom"></i>
                        <i class="lineRight"></i>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

<?=Html::jsFile("{$url}/Js/common/sm-extend.min.js")?>
<?=Html::jsFile("{$url}/Js/index/index.js")?>
