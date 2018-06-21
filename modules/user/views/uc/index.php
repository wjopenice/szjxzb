<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "个人中心";
$this->keywords = "个人中心";
$this->description = "个人中心";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/index.css"); ?>
    <div class="container">
        <!-- 面包屑 -->
        <div class="crumbs">
            <span>首页</span> &gt; <span class="secondLevel">个人中心</span>
        </div>

        <!-- content -->
        <div class="content cf">
            <!-- 左侧边导航 -->
            <?=$this->render('../layouts/uc_left_nav.php')?>

            <!-- 右侧内容 -->
            <div class="rightContent fl">
                <div class="userInfo cf">
                    <div class="userInfoLeft fl">
                        <div class="headPortrait cf">
                            <?= Html::img("{$url}/Image/personalCenter/personalIcon.png",["class"=>"fl","width"=>"66","height"=>"66","alt"=>""]); ?>
                            <span class="fl"><?=$_COOKIE['username']?></span>
                        </div>
                        <div class="growthValue">
                            <div class="growthValueText cf"><span class="fl">成长值&gt;&gt;</span><span class="fr">0/1</span></div>
                            <div class="percent"><div class="percentSpeed" style="width: 80%;"></div></div>
                        </div>
                    </div>
                    <div class="userInfoRight fl">
                        <div class="userInfoRightList dib"><span class="userInfoRightName dib">我的红包</span><span>￥0.00</span></div>
                        <div class="userInfoRightList dib"><span class="userInfoRightName dib">优惠券</span><span>0张</span></div>
                        <div class="userInfoRightList dib"><span class="userInfoRightName dib">可兑返利</span><span>￥0.00</span></div>
                        <div class="userInfoRightList dib"><span class="userInfoRightName dib">礼品卡</span><span>￥0.00</span></div>
                        <div class="userInfoRightList dib"><span class="userInfoRightName dib">我的积分</span><span>0</span></div>
                        <div class="userInfoRightList dib"><span class="userInfoRightName dib">待领礼包</span><span>0个</span></div>
                    </div>
                </div>
                <div class="unOrder">
                    <div class="unOrderTitle cf">
                        <span class="fl">未完成订单(1)</span>
                        <a class="orderBtn fr" href="?r=user/tm/order&type=order">查看全部订单</a>
                    </div>
                    <ul class="unOrderContent">
                        <?php if(!empty($orderArr)): ?>
                        <?php foreach ($orderArr as $k=>$v): ?>
                        <li class="copy cf">
                            <div class="orderList fl orderNum">订单号：<?=$v['order_sn']?></div>
                            <div class="orderList fl orderName">包裹<?=$k?></div>
                            <div class="orderList fl orderSend"><?=$v['shipping_name']?></div>
                            <div class="orderList fl orderMoney">￥<?=$v['goods_price']?></div>
                            <a class="orderList fl orderDetail" href="javascript:;">查看详情</a>
                        </li>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <div class="notOrder">
                            <p class="notOrderText">缺一张图片</p>
                            <a href="javascript:;">去逛逛</a>
                        </div>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="myCollection">
                    <div class="myCollectionTitle cf">
                        <span class="fl">我的收藏</span>
                        <a class="myCollectionBtn fr" href="?r=user/uc/mycollection&type=mycollection">查看全部收藏</a>
                    </div>
                    <div class="myCollectionContent">
                        <ul class="myCollectionUl cf">
                            <?php foreach ($collectionArr as $key=>$value): ?>
                            <li class="fl"><a href="?r=home/index/goodsdetail&id=<?=$value['goods_id']?>"><?= Html::img($value['url'],["width"=>"155","height"=>"155","alt"=>""]); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="notOrder hide">
                        <p class="notOrderText">缺一张图片</p>
                        <a href="javascript:;">去逛逛</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/personalCenter/index.js"); ?>