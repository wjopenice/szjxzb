<?php
use yii\helpers\Html;
use yii\helpers\Url;
$session = Yii::$app->session;
$url = Url::to("@web/web/admin/Static");
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>退款单详情</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
</head>
<body>
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>退款单详情</h3>
                <h5>用户提交退款单详情</h5>
            </div>
        </div>
    </div>
    <div class="ncap-order-style">
        <div class="ncap-order-details">
            <form id="order-action">
                <div class="tabs-panels">
                    <div class="misc-info">
                        <h3>基本信息</h3>
                        <dl>
                            <dt>订单ID：</dt>
                            <dd>154</dd>
                            <dt>订单号：</dt>
                            <dd>201603121816246688</dd>
                            <dt>会员：</dt>
                            <dd>4544</dd>
                        </dl>
                        <dl>
                            <dt>E-Mail：</dt>
                            <dd>1770073414@qq.com</dd>
                            <dt>电话：</dt>
                            <dd>17688830262</dd>
                            <dt>应付金额：</dt>
                            <dd>0.00</dd>
                        </dl>
                        <dl>
                            <dt>订单状态：</dt>
                            <dd>已取消 / 拒绝退款 / 未发货</dd>
                            <dt>下单时间：</dt>
                            <dd>2016-03-12 18:16</dd>
                            <dt>支付时间：</dt>
                            <dd>2016-03-15 20:34</dd>
                        </dl>
                        <dl>
                            <dt>支付方式：</dt>
                            <dd>支付宝支付</dd>
                            <dt>发票抬头：</dt>
                            <dd> N</dd>
                            <dt>纳税人识别号：</dt>
                            <dd> N</dd>
                        </dl>
                    </div>
                    <div class="addr-note">
                        <h4>收货信息</h4>
                        <dl>
                            <dt>收货人：</dt>
                            <dd>张谷泉</dd>
                            <dt>联系方式：</dt>
                            <dd>13512345678</dd>
                        </dl>
                        <dl>
                            <dt>收货地址：</dt>
                            <dd>广东省，深圳市，龙岗区，五和大道五和商业广场2017</dd>
                        </dl>
                        <dl>
                            <dt>邮编：</dt>
                            <dd> t454</dd>
                        </dl>
                        <dl>
                            <dt>配送方式：</dt>
                            <dd> 申通物流</dd>
                        </dl>
                        <dl>
                            <dt>取消订单留言：</dt>
                            <dd></dd>
                        </dl>
                    </div>
                    <div class="goods-info">
                        <h4>商品信息</h4>
                        <table>
                            <thead>
                            <tr>
                                <th>商品编号</th>
                                <th colspan="2">商品</th>
                                <th>规格属性</th>
                                <th>购买数量</th>
                                <th>单品价格</th>
                                <th>会员折扣价</th>
                                <th>单品小计</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="w60">TP0000051</td>
                                <td class="w30"><div class="goods-thumb"><a href="javascript:void(0);" target="_blank"><img alt="" src="../../Static/Image/order/detail/goods_thumb_140_200_200.jpeg"> </a></div></td>
                                <td style="text-align: left;"><a href="javascript:void(0);" target="_blank">Apple iPhone 6s 16GB 玫瑰金色 移动联通电信4G手机</a><br></td>
                                <td class="w80">网络:4G 内存:16G 颜色:黑色</td>
                                <td class="w60">3</td>
                                <td class="w60">8968.3</td>
                                <td class="w80">8968.3</td>
                                <td class="w80">8968.3</td>
                            </tr>
                            <tr>
                                <td class="w60">TP0000051</td>
                                <td class="w30"><div class="goods-thumb"><a href="javascript:void(0);" target="_blank"><img alt="" src="../../Static/Image/order/detail/goods_thumb_140_200_200.jpeg"> </a></div></td>
                                <td style="text-align: left;"><a href="javascript:void(0);" target="_blank">Apple iPhone 6s 16GB 玫瑰金色 移动联通电信4G手机</a><br></td>
                                <td class="w80">网络:4G 内存:16G 颜色:黑色</td>
                                <td class="w60">3</td>
                                <td class="w60">8968.3</td>
                                <td class="w80">8968.3</td>
                                <td class="w80">8968.3</td>
                            </tr>
                            <tr>
                                <td class="w60">TP0000051</td>
                                <td class="w30"><div class="goods-thumb"><a href="javascript:void(0);" target="_blank"><img alt="" src="../../Static/Image/order/detail/goods_thumb_140_200_200.jpeg"> </a></div></td>
                                <td style="text-align: left;"><a href="javascript:void(0);" target="_blank">Apple iPhone 6s 16GB 玫瑰金色 移动联通电信4G手机</a><br></td>
                                <td class="w80">网络:4G 内存:16G 颜色:黑色</td>
                                <td class="w60">3</td>
                                <td class="w60">8968.3</td>
                                <td class="w80">8968.3</td>
                                <td class="w80">8968.3</td>
                            </tr>
                            <tr>
                                <td class="w60">TP0000051</td>
                                <td class="w30"><div class="goods-thumb"><a href="javascript:void(0);" target="_blank"><img alt="" src="../../Static/Image/order/detail/goods_thumb_140_200_200.jpeg"> </a></div></td>
                                <td style="text-align: left;"><a href="javascript:void(0);" target="_blank">Apple iPhone 6s 16GB 玫瑰金色 移动联通电信4G手机</a><br></td>
                                <td class="w80">网络:4G 内存:16G 颜色:黑色</td>
                                <td class="w60">3</td>
                                <td class="w60">8968.3</td>
                                <td class="w80">8968.3</td>
                                <td class="w80">8968.3</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="contact-info">
                        <h3>费用信息 </h3>
                        <dl>
                            <dt>小计：</dt>
                            <dd>16760.00</dd>
                            <dt>运费：</dt>
                            <dd>+0.00</dd>
                            <dt>积分 (-0)：</dt>
                            <dd>-0.00</dd>
                        </dl>
                        <dl>
                            <dt>余额抵扣：</dt>
                            <dd>-0.00</dd>
                            <dt>优惠券抵扣：</dt>
                            <dd>-0.00</dd>
                            <dt>价格调整：</dt>
                            <dd>减：0.00</dd>
                        </dl>
                        <dl>
                            <dt>应付：</dt>
                            <dd><strong class="red_common">0.00</strong></dd>
                        </dl>
                    </div>

                    <div class="contact-info">
                        <h3>退款处理</h3>
                        <dl class="row">
                            <dt class="tit">
                                <label for="note">处理备注  </label>
                            </dt>
                            <dd class="opt" style="margin-left:10px">
                                <textarea id="note" name="note" style="width:600px" rows="6" placeholder="不存在退款" class="tarea"></textarea>
                            </dd>
                        </dl>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>