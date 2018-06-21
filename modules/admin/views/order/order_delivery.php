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
    <title>订单发货</title>
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
                    <h3>订单发货</h3>
                    <h5>订单发货编辑</h5>
                </div>
                <div class="subject" style="width:62%">
                    <a href="javascript:void(0);" target="_blank" style="float:right;margin-right:10px" class="ncap-btn-big ncap-btn-green"><i class="fa fa-print"></i>打印配货单</a>
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
                                <dt>订单号：</dt>
                                <dd>201702071145017310</dd>
                                <dt>下单时间：</dt>
                                <dd>2017-02-07 11:45</dd>
                                <dt>物流公司：</dt>
                                <dd>
                                    <select name="shipping_code">
                                        <option value="post_express">邮政快递包裹</option>
                                        <option value="yto">圆通速递</option>
                                        <option value="city_express">城际快递</option>
                                        <option value="flat">市内快递</option>
                                        <option value="sto_express">申通快递</option>
                                        <option value="post_mail">邮局平邮</option>
                                        <option value="fpd">运费到付</option>
                                    </select>
                                </dd>
                            </dl>
                            <dl>
                                <dt>配送费用：</dt>
                                <dd> 0.00</dd>
                                <dt>发货方式：</dt>
                                <dd>
                                    <select name="send_type">
                                        <option value="0">手填物流单号</option>
                                        <option value="3">无需物流</option>
                                    </select>
                                </dd>
                                <dt>配送单号：</dt>
                                <dd>
                                    <input class="input-txt" name="invoice_no" value="" onkeyup="this.value=this.value.replace(/[^\d]/g,'')">
                                </dd>
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
                                <dd>N</dd>
                            </dl>
                            <dl>
                                <dt>配送方式：</dt>
                                <dd></dd>
                                <dt>发票抬头：</dt>
                                <dd></dd>
                                <dt>纳税人识别号：</dt>
                                <dd></dd>
                            </dl>
                            <dl>
                                <dt>用户备注：</dt>
                                <dd></dd>
                            </dl>
                        </div>
                        <div class="goods-info">
                            <h4>商品信息</h4>
                            <table>
                                <thead>
                                <tr>
                                    <th colspan="2">商品</th>
                                    <th>规格属性</th>
                                    <th>购买数量</th>
                                    <th>商品单价</th>
                                    <th>选择发货</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="w30"><div class="goods-thumb"><a href="javascript:void(0);" target="_blank"><img alt="" src="../../Static/Image/order/detail/goods_thumb_140_200_200.jpeg"> </a></div></td>
                                    <td style="text-align: left;"><a href="javascript:void(0);" target="_blank">Apple iPhone 6s 16GB 玫瑰金色 移动联通电信4G手机</a><br></td>
                                    <td class="w80">网络:4G 内存:16G 颜色:黑色</td>
                                    <td class="w60">3</td>
                                    <td class="w60">8968.3</td>
                                    <td class="w80">
                                        <input type="checkbox" name="goods[]" value="1733" checked="checked">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="contact-info">
                            <h3>发货单备注</h3>
                            <dl class="row">
                                <dt class="tit">
                                    <label for="note">发货单备注</label>
                                </dt>
                                <dd class="opt" style="margin-left:10px">
                                    <textarea id="note" name="note" style="width:600px" rows="6" placeholder="请输入操作备注" class="tarea"></textarea>
                                </dd>
                            </dl>
                            <dl class="row">
                                <dt class="tit">
                                    <label for="note">可执行操作</label>
                                </dt>
                                <dd class="opt" style="margin-left:10px">
                                    <a class="ncap-btn-big ncap-btn-green">确认发货</a>
                                </dd>
                            </dl>
                        </div>
                        <div class="goods-info">
                            <h4>发货记录</h4>
                            <table>
                                <thead>
                                <tr>
                                    <th>操作者</th>
                                    <th>发货时间</th>
                                    <th>发货单号</th>
                                    <th>收货人</th>
                                    <th>快递公司</th>
                                    <th>备注</th>
                                </tr>
                                </thead>
                                <tbody id="order_action">
                                <tr>
                                    <td class="text-center">中宝小帅</td>
                                    <td class="text-center">2018-03-29 19:03:21</td>
                                    <td class="text-center">1234212154521</td>
                                    <td class="text-center">中宝小帅</td>
                                    <td class="text-center">圆通</td>
                                    <td class="text-center">您提交了订单，请等待系统确认</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>