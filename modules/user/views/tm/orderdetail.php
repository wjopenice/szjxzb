<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "订单详情";
$this->keywords = "订单详情";
$this->description = "订单详情";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/orderDetail.css"); ?>
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
                <div class="address">
                    <div class="orderTit cf"><p class="fl orderTime">订单号：<span><?=$orderArr['order_sn']?></span><p class="fl">下单时间：<span><?=$orderArr['add_time']?></span></p></p></div>
                    <div class="addressDetail cf">
                        <div class="addressLeft fl">
                            <p class="addressBox"><span class="addressTitle">&emsp;收件人：</span><span><?=$orderArr['consignee']?></span></p>
                            <p class="addressBox"><span class="addressTitle">联系方式：</span><span class="tel"><?=$orderArr['mobile']?></span></p>
                            <p class="addressBox"><span class="addressTitle">收货地址：</span><span class="addressTitle"><?=ConvertCityName($orderArr['province'])?><?=ConvertCityName($orderArr['city'])?><?=ConvertCityName($orderArr['district'])?><?=$orderArr['address']?></span></p>
                        </div>
                        <div class="payRight fr">
                            <p class="addressBox cf"><span class="addressTitle fl">支付方式：</span><span class="fr"><?=$orderArr['pay_name']?></span></p>
                            <p class="addressBox cf"><span class="addressTitle fl">商品合计：</span><span class="fr">￥<?=$orderArr['goods_price']?></span></p>
                            <p class="addressBox totalLine cf"><span class="addressTitle fl">&emsp;&emsp;运费：</span><span class="fr">￥10.00</span></p>
                            <p class="addressBox realPay cf"><span class="addressTitle fl">&emsp;&emsp;实付：</span><span class="total fr">￥<?=$orderArr['order_amount']?></span></p>
                        </div>
                    </div>
                </div>
                <div class="orderDetail">
                    <div class="orderDetailTitle">
                        <div class="orderState cf">
                            <span class="fl">已发货</span>
                            <p class="service fr">
                                <a class="afterSale" href="javascript:;">申请售后</a>
                                <a class="again" href="javascript:;">再次购买</a>
                                <a class="sure" href="javascript:;">确认收货</a>
                            </p>
                        </div>
                        <div class="logistics cf"><span class="logisticsInfo fl">物流信息：......</span><span class="fr">查看详情</span></div>
                    </div>
                    <div class="shopDetail">
                        <div class="shopDetailTitle cf">
                            <span class="goodInfo fl">商品信息</span>
                            <span class="unitPrice fl">单价</span>
                            <span class="num fl">数量</span>
                            <span class="smallPlan fl">小计</span>
                            <span class="realPayment fl">实付</span>
                        </div>
                        <?php
                        $orderdata = json_decode($orderArr['ordergoods'],true);
                        foreach ($orderdata as $k=>$v): ?>
                        <div class="shopInfo cf">
                            <div class="shopInfoPic cf fl">
                                <img src="<?=getGoodsurl($v['goodid'])?>" alt="" class="orderImgBox fl">
                                <div class="orderName fl">
                                    <p class="ofh" title="<?=$v['name']?> [交易快照]"><?=$v['name']?> [交易快照]</p>
                                </div>
                            </div>
                            <div class="amount unitPrice fl">￥<?=$v['unitPrice']?></div>
                            <div class="amount num fl"><?=$v['goodsNum']?></div>
                            <div class="amount smallPlan fl">￥<?=$v['subGoodsTotal']?></div>
                            <div class="amount realPayment fl">￥<?=$v['subGoodsTotal']?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/personalCenter/orderDetail.js"); ?>
