<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "商务合作";
$this->keywords = "商务合作";
$this->description = "商务合作";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/helpCenter.css"); ?>
    <div class="container">
        <!-- 面包屑 -->
        <div class="crumbs cf">
            <div class="fl"><span>首页</span> &gt; <span class="secondLevel">个人中心</span></div>
        </div>

        <!-- content -->
        <div class="content cf">

            <!-- 左侧边导航 -->
            <?=$this->render('../layouts/hc_left_nav.php')?>

            <!-- 右侧内容 -->
            <div class="rightContent fl">
                <div class="problem">商务合作</div>
                <div class="problemList">
                    <ul class="hide">
                        <li>
                            <div class="ask">问：<span>我的包裹多长时间能送到？</span></div>
                            <div>答：<span>我们会在订单支付成功后1-3天内发货（节假日顺延，部分特殊商品七天内发货），送达时间视快递配时间而定。</span></div>
                        </li>
                        <li>
                            <div class="ask">问：<span>如何免运费？</span></div>
                            <div>答：<span>对于单笔所购商品总价额（不含运费）大于或等于88元，我们提供一次性免费送货服务（港澳台地区需大于或等于500元）。</span></div>
                        </li>
                        <li>
                            <div class="ask">问：<span>订单生成后需要多长时间内支付货款？</span></div>
                            <div>答：<span>下单后我们会为您保留一小时，为确保订单的有效性，需要您在一小时内完成支付；订单不可修改或合并。</span></div>
                        </li>
                        <li>
                            <div class="ask">问：<span>在线支付已经成功，为什么我的订单状态还是显示”待付款“？</span></div>
                            <div>答：<span>一般来说，网上支付是即时到账的，但有时因为网络的原因，可能会有几分钟的延迟，请您耐心等待，并及时查询您的银行卡账户余额，如果费用已扣，但订单状态依然是”等待付款“，请联系客服处理。</span></div>
                        </li>
                        <li>
                            <div class="ask">问：<span>实物与图片有色差吗？</span></div>
                            <div>答：<span>手店桶中的商品照片均以实物拍摄，颜色经设计师校队，由于不同的电脑显示器、光线、亮度都有差异，造成轻微色差难以避免。</span></div>
                        </li>
                        <li>
                            <div class="ask">问：<span>下单后可以修改信息吗？</span></div>
                            <div>答：<span>订单支付前，用户可以在订单详情页中修改收货信息和发票信息，修改结果以实际页面修改提示为准；订单支付后暂不支持修改订单信息收货信息和发票信息。</span></div>
                        </li>
                        <li>
                            <div class="ask">问：<span>下单时忘记选择开发票，我该如何申请补开发票？</span></div>
                            <div>答：<span>下单时如未选择开发票，可在订单确认收货后180天内，在需要补开发票的订单详情页申请补开确认收货超过180天订单，请联系手店桶在线客服咨询是否可以补开。</span></div>
                        </li>
                        <li>
                            <div class="ask">问：<span>客服的联系方式是什么？</span></div>
                            <div>答：<span>您可以通过在线客服和电话联系客服。客服电话：400-1234-256。</span></div>
                        </li>
                    </ul>

                    <div class="noBuild">
                        <i class="dib"></i>
                        <p>正在努力搭建中...</p>
                    </div>
                </div>

            </div>
        </div>
    </div>