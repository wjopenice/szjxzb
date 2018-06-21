<?php
use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::to("@web/web/home/Static");
$this->title = "首页";
$this->keywords = "首页";
$this->description = "首页";
?>

    <?= Html::cssFile("{$url}/Css/index/index.css"); ?>
    <!-- banner图  -->
    <div class="slide-box banner">
        <ul class="slide-content">
            <?php foreach ($arrBanner as $kb=>$vb): ?>
            <li  style="background: url(<?=$vb['url']?>) no-repeat center center;">
                <a href="javascript:void(0)" target="_blank" title="<?=$vb['name'] ?>"></a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="slide-btns bannerBtns">
            <div class="prev"></div>
            <div class="next"></div>
        </div>
        <ol class="slide-triggers">
            <li class="copy" data-num="<?=count($arrBanner)?>"></li>
        </ol>
    </div>

    <!--  内容部分  -->
    <div class="container">
        <div class="coupon">
            <?= Html::img("{$url}/Image/index/coupon.png",['alt'=>'']) ?>
        </div>
        <!--   推荐    -->
        <div class="recommendBoxWrap">
            <div class="commonTit cf">
                <p class="titName fl">热门推荐</p>
                <?= Html::a('查看更多&gt;',"javascript:void(0)",['class'=>'titMore fr']) ?>
            </div>
            <div class="commonCon cf">
                <?php foreach ($recommendpage as $key=>$recommend): ?>
                <div class="subRecommendBox fl cf">
                    <div class="recommendType fl">
                        <?= Html::img("{$recommend[0]['image_url1']}",['alt'=>$recommend[0]['goods_name'],'picid'=>$recommend[0]['goods_id'],'typeid'=>navDataEx($recommend[0]['mzsm_cat_id']) ,'onclick'=>'goodsdetail(this)','style'=>'cursor: pointer;']) ?>
                    </div>
                    <div class="recommendGoodsBox cf fl">
                        <div class="subRecommendGoods fl cf">
                            <a href="?r=home/index/goodsdetail&id=<?=$recommend[1]['goods_id']?>&type=<?=navDataEx($recommend[1]['mzsm_cat_id'])?>">
                                <img class="reGoodsImg fl" src="<?=$recommend[1]['image_url1']?>" alt="<?=$recommend[1]['goods_name']?>">
                            </a>
                            <p class="reGoodsName ofh fl"><?=mb_substr( $recommend[1]['goods_name'],0,18)?></p>
                            <p class="reGoodsPrice fl">￥<span><?=$recommend[1]['shop_price']?></span></p>
                        </div>
                        <div class="subRecommendGoods fl cf">
                            <a href="?r=home/index/goodsdetail&id=<?=$recommend[2]['goods_id']?>&type=<?=navDataEx($recommend[2]['mzsm_cat_id'])?>">
                                <img class="reGoodsImg fl" src="<?=$recommend[2]['image_url1']?>" alt="<?=$recommend[2]['goods_name']?>">
                            </a>
                            <p class="reGoodsName ofh fl"><?=mb_substr($recommend[2]['goods_name'],0,18)?></p>
                            <p class="reGoodsPrice fl">￥<span><?=$recommend[2]['shop_price']?></span></p>
                        </div>
                        <div class="subRecommendGoods fl cf">
                            <a href="?r=home/index/goodsdetail&id=<?=$recommend[3]['goods_id']?>&type=<?=navDataEx($recommend[3]['mzsm_cat_id'])?>">
                                <img class="reGoodsImg fl" src="<?=$recommend[3]['image_url1']?>" alt="<?=$recommend[3]['goods_name']?>">
                            </a>
                            <p class="reGoodsName ofh fl"><?=mb_substr($recommend[3]['goods_name'],0,18)?></p>
                            <p class="reGoodsPrice fl">￥<span><?=$recommend[3]['shop_price']?></span></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!--   每个分类   -->
        <div class="classifyBoxWrap">

            <div class="subClassifyBoxWrap" id="floor1">
                <div class="commonTit">
                    <p class="titName fl">高贵黄金</p>
                    <div class="titTypeBox fr cf">
                        <a class="titMore fr" href="?r=home/shop_classify/fashionclothe&type=fashionclothe">查看更多&gt;</a>
                    </div>
                </div>
                <div class="commonCon">
                    <div class="classifyBanner">
                        <?= Html::img($arrBanner[0]['url'],['alt'=>'']) ?>
                    </div>
                    <div class="slide-box">
                        <ul class="cf classifyUL slide-content">
                            <?php foreach ($arrData as $k1=>$list1): ?>
                                <?php if($list1['mzsm_cat_id'] == 1):?>
                                    <li class="fl subClassifyBox">
                                        <div class="classifyImgBox">
                                            <a href="?r=home/index/goodsdetail&id=<?=$list1['goods_id']?>&type=<?=navDataEx($list1['mzsm_cat_id'])?>">
                                                <img src="<?=$list1['image_url1']?>" alt="<?=$list1['goods_name']?>">
                                            </a>
                                        </div>
                                        <p class="classifyName ofh"><?=mb_substr($list1['goods_name'],0,12)?></p>
                                        <p class="classifyPrice">￥<span><?=$list1['shop_price']?></span></p>
                                    </li>
                                 <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <div class="slide-btns">
                            <div class="prev"></div>
                            <div class="next"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="subClassifyBoxWrap" id="floor2">
                <div class="commonTit">
                    <p class="titName fl">奢华钻石</p>
                    <div class="titTypeBox fr cf">
                        <a class="titMore fr" href="?r=home/shop_classify/boundless&type=boundless">查看更多&gt;</a>
                    </div>
                </div>
                <div class="commonCon">
                    <div class="classifyBanner">
                        <?= Html::img($arrBanner[4]['url'],['alt'=>'']) ?>
                    </div>
                    <div class="slide-box">
                        <ul class="cf classifyUL slide-content">
                            <?php foreach ($arrData as $k1=>$list1): ?>
                                <?php if($list1['mzsm_cat_id'] == 2):?>
                                    <li class="fl subClassifyBox">
                                        <div class="classifyImgBox">
                                            <a href="?r=home/index/goodsdetail&id=<?=$list1['goods_id']?>&type=<?=navDataEx($list1['mzsm_cat_id'])?>">
                                                <img src="<?=$list1['image_url1']?>" alt="<?=$list1['goods_name']?>">
                                            </a>
                                        </div>
                                        <p class="classifyName ofh"><?=mb_substr($list1['goods_name'],0,12)?></p>
                                        <p class="classifyPrice">￥<span><?=$list1['shop_price']?></span></p>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <div class="slide-btns">
                            <div class="prev"></div>
                            <div class="next"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="subClassifyBoxWrap" id="floor3">
                <div class="commonTit">
                    <p class="titName fl">智能电器</p>
                    <div class="titTypeBox fr cf">
                        <a class="titMore fr" href="?r=home/shop_classify/gorgeous&type=gorgeous">查看更多&gt;</a>
                    </div>
                </div>
                <div class="commonCon">
                    <div class="classifyBanner">
                        <?= Html::img($arrBanner[8]['url'],['alt'=>'']) ?>
                    </div>
                    <div class="slide-box">
                        <ul class="cf classifyUL slide-content">
                            <?php foreach ($arrData as $k1=>$list1): ?>
                                <?php if($list1['mzsm_cat_id'] == 3):?>
                                    <li class="fl subClassifyBox">
                                        <div class="classifyImgBox">
                                            <a href="?r=home/index/goodsdetail&id=<?=$list1['goods_id']?>&type=<?=navDataEx($list1['mzsm_cat_id'])?>">
                                                <img src="<?=$list1['image_url1']?>" alt="<?=$list1['goods_name']?>">
                                            </a>
                                        </div>
                                        <p class="classifyName ofh"><?=mb_substr($list1['goods_name'],0,12)?></p>
                                        <p class="classifyPrice">￥<span><?=$list1['shop_price']?></span></p>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <div class="slide-btns">
                            <div class="prev"></div>
                            <div class="next"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="subClassifyBoxWrap" id="floor4">
                <div class="commonTit">
                    <p class="titName fl">家居家纺</p>
                    <div class="titTypeBox fr cf">
                        <a class="titMore fr" href="?r=home/shop_classify/lightmakeup&type=lightmakeup">查看更多&gt;</a>
                    </div>
                </div>
                <div class="commonCon">
                    <div class="classifyBanner">
                        <?= Html::img($arrBanner[7]['url'],['alt'=>'']) ?>
                    </div>
                    <div class="slide-box">
                        <ul class="cf classifyUL slide-content">
                            <?php foreach ($arrData as $k1=>$list1): ?>
                                <?php if($list1['mzsm_cat_id'] == 4):?>
                                    <li class="fl subClassifyBox">
                                        <div class="classifyImgBox">
                                            <a href="?r=home/index/goodsdetail&id=<?=$list1['goods_id']?>&type=<?=navDataEx($list1['mzsm_cat_id'])?>">
                                                <img src="<?=$list1['image_url1']?>" alt="<?=$list1['goods_name']?>">
                                            </a>
                                        </div>
                                        <p class="classifyName ofh"><?=mb_substr($list1['goods_name'],0,12)?></p>
                                        <p class="classifyPrice">￥<span><?=$list1['shop_price']?></span></p>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <div class="slide-btns">
                            <div class="prev"></div>
                            <div class="next"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="subClassifyBoxWrap" id="floor5">
                <div class="commonTit">
                    <p class="titName fl">箱包鞋类</p>
                    <div class="titTypeBox fr cf">
                        <a class="titMore fr" href="?r=home/shop_classify/multipurpose&type=multipurpose">查看更多&gt;</a>
                    </div>
                </div>
                <div class="commonCon">
                    <div class="classifyBanner">
                        <?= Html::img($arrBanner[3]['url'],['alt'=>'']) ?>
                    </div>
                    <div class="slide-box">
                        <ul class="cf classifyUL slide-content">
                            <?php foreach ($arrData as $k1=>$list1): ?>
                                <?php if($list1['mzsm_cat_id'] == 5):?>
                                    <li class="fl subClassifyBox">
                                        <div class="classifyImgBox">
                                            <a href="?r=home/index/goodsdetail&id=<?=$list1['goods_id']?>&type=<?=navDataEx($list1['mzsm_cat_id'])?>">
                                                <img src="<?=$list1['image_url1']?>" alt="<?=$list1['goods_name']?>">
                                            </a>
                                        </div>
                                        <p class="classifyName ofh"><?=mb_substr($list1['goods_name'],0,12)?></p>
                                        <p class="classifyPrice">￥<span><?=$list1['shop_price']?></span></p>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <div class="slide-btns">
                            <div class="prev"></div>
                            <div class="next"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="subClassifyBoxWrap" id="floor6">
                <div class="commonTit">
                    <p class="titName fl">衣裳服饰</p>
                    <div class="titTypeBox fr cf">
                        <a class="titMore fr" href="?r=home/shop_classify/anexplosive&type=anexplosive">查看更多&gt;</a>
                    </div>
                </div>
                <div class="commonCon">
                    <div class="classifyBanner">
                        <?= Html::img($arrBanner[1]['url'],['alt'=>'']) ?>
                    </div>
                    <div class="slide-box">
                        <ul class="cf classifyUL slide-content">
                            <?php foreach ($arrData as $k1=>$list1): ?>
                                <?php if($list1['mzsm_cat_id'] == 6):?>
                                    <li class="fl subClassifyBox">
                                        <div class="classifyImgBox">
                                            <a href="?r=home/index/goodsdetail&id=<?=$list1['goods_id']?>&type=<?=navDataEx($list1['mzsm_cat_id'])?>">
                                                <img src="<?=$list1['image_url1']?>" alt="<?=$list1['goods_name']?>">
                                            </a>
                                        </div>
                                        <p class="classifyName ofh"><?=mb_substr($list1['goods_name'],0,12)?></p>
                                        <p class="classifyPrice">￥<span><?=$list1['shop_price']?></span></p>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                        <div class="slide-btns">
                            <div class="prev"></div>
                            <div class="next"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--  左侧导航栏  -->
    <?=$this->render('left.php')?>

    <!--   弹窗   -->
    <div class="getCouponAlert hide">
        <p class="couponTit">领取成功</p>
        <p class="activeTimeBox">活动时间：<span>2017年4月1日</span><span>-</span><span>4月11日</span></p>
        <div class="couponImgBox cf">
            <?= Html::img("{$url}/Image/common/coupon/coupon1.png",['alt'=>'']) ?>
            <?= Html::img("{$url}/Image/common/coupon/coupon2.png",['alt'=>'']) ?>
            <?= Html::img("{$url}/Image/common/coupon/coupon3.png",['alt'=>'']) ?>
        </div>
        <div class="couponRuleBox">
            <p>优惠券使用规则为：</p>
            <p>（1）单笔订单只能使用1张优惠券，不能同时使用多张优惠券；</p>
            <p>（2）请在有效期内使用优惠券，未使用的优惠券过期后，将自动作废；</p>
            <p>（3）优惠券严禁出售或转让，如经发现并证实的，改券将予以作废处理；</p>
            <p>（4）使用优惠券支付的订单，若产生退货，优惠券均不退回，退款金额按优惠后的小计金额退款；</p>
        </div>
    </div>
    <?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
    <?= Html::jsFile("{$url}/Js/index/index.js"); ?>

<script>
function goodsdetail(tag) {
    var id = $(tag).attr("picid");
    var typeid = $(tag).attr("typeid");
    window.location.href = '?r=home/index/goodsdetail&id='+id+'&type='+typeid;
}    
</script>