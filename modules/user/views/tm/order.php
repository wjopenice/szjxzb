<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "订单管理";
$this->keywords = "订单管理";
$this->description = "订单管理";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/order.css"); ?>
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
                <div class="rightContentTitle cf">
                    <a class="active" href="javascript:;"><span class="messageLine dib">全部订单</span></a>
                    <a href="javascript:;"><span class="messageLine dib">待付款</span></a>
                    <a href="javascript:;"><span class="messageLine dib">待发货</span></a>
                    <a href="javascript:;"><span class="messageLine dib">已发货</span></a>
                    <a href="javascript:;"><span class="dib">待评价</span></a>
                    <div class="searchOrderBox fr cf">
                        <input class="fl" type="text" placeholder="输入商品名称或订单号搜素">
                        <a class="fr btnSearchOrder" href="javascript:void(0)">搜索</a>
                    </div>
                </div>
                <div class="orderContentWrap">
                    <div class="subOrder">
                        <div class="orderTit cf"><p class="fl orderTime">已付款订单</p><p class="fr delIcon"><i></i></p></div>
                        <div class="allOrderGoodsBox">
                            <?php foreach ($orderArr[0] as $k=>$v): ?>
                            <div class="subOrderGoods cf copy">
                                <?php $orderData = json_decode($v['ordergoods'],true); ?>
                                <?php foreach ($orderData as $ok=>$ov): ?>
                                <?= Html::img(getGoodsurl($ov['goodid']),["class"=>"orderImgBox fl","alt"=>""]); ?>
                                <div class="orderName fl">
                                    <p class="ofh" title="<?=$ov['name']?> [交易快照]"><?=$ov['name']?> [交易快照]</p>
                                </div>
                                <div class="orderNum fl"><?=$ov['goodsNum']?></div>
                                <?php endforeach; ?>
                                <div class="orderState fl">
                                    <p>已发货</p>
                                    <p class="look"><a href="?r=user/tm/orderdetail&type=order&order_id=<?=$v['order_id']?>">订单详情</a></p>
                                    <p class="look"><a href="?r=home/index/index">再次购买</a></p>
                                    <p class="look"><a href="javascript:;">申请售后</a></p>
                                    <p class="look"><a class="lookLogistics" href="javascript:;">查看物流</a></p>
                                </div>
                                <div class="orderMoney fl">
                                    <p>￥<?=$v['goods_price']?></p>
                                    <p>（含运费：￥10元）</p>
                                </div>
                                <div class="orderSure fl"><a class="collect" href="javascript:;">确认收货</a></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>


                    <?php if(!empty($orderArr[1])): ?>
                    <div class="">
                        <!-- 待付款 -->
                        <div class="subOrder">
                            <div class="orderTit cf"><p class="fl orderTime">未付款订单</p><p class="fr delIcon"><i></i></p></div>
                            <?php foreach ($orderArr[1] as $k=>$v): ?>
                            <div class="unPay">
                                <?php $orderData = json_decode($v['ordergoods'],true); ?>
                                <div class="unPayLeft">
                                    <?php foreach ($orderData as $ok=>$ov): ?>
                                    <div class="unPayDetail cf">
                                        <?= Html::img(getGoodsurl($ov['goodid']),["class"=>"orderImgBox fl","alt"=>""]); ?>
                                        <div class="orderName fl">
                                            <p class="ofh" title="<?=$ov['name']?> [交易快照]"><?=$ov['name']?> [交易快照]</p>
                                        </div>
                                        <div class="orderNum fl"><?=$ov['goodsNum']?></div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="orderState unPayState">
                                    <p>未付款</p>
                                    <p class="look"><a href="?r=user/tm/orderdetail&type=order&order_id=<?=$v['order_id']?>">订单详情</a></p>
                                    <p class="look"><a href="javascript:;">取消订单</a></p>
                                </div>
                                <div class="orderMoney unPayMoney">
                                    <p>￥<?=$v['goods_price']?></p>
                                    <p>（含运费：￥10元）</p>
                                </div>
                                <div class="orderSure unPaySure"><a class="collect" href="javascript:;">立即付款</a></div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php else: ?>
                    <!-- 暂无订单 -->
                    <div class="notShop">
                        <i class="notShopIcon dib"></i>
                        <p class="notShopText">当前暂无任何订单</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- 追踪物流弹窗 -->
    <div class="getCouponAlert hide">
        <div class="alertDel cf"><span class="track fl">追踪物流</span><i class="close fr"></i></div>
        <div class="logisticsCar cf">
            <i class="fl"></i>
            <div class="logisticsText fl">
                <p><span>物流公司：</span><span class="oddNum">顺风快递</span></p>
                <p><span>快递单号：</span><span class="oddNum">VB41153264154</span></p>
                <p><span>预计到达：</span><span class="oddNum">4月15日前到达</span></p>
            </div>
        </div>
        <div class="timeList">留空，调用物流系统</div>
        <div class="complaint"><a href="javascript:;">投诉物流服务&gt;&gt;</a></div>
        <div class="submit"><a class="submitBtn" href="javascript:;">确定</a></div>
    </div>
<?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
<?= Html::jsFile("{$url}/Js/personalCenter/order.js"); ?>
