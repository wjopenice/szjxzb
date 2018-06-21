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
    <title>订单详情</title>
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
                    <h3>商品订单</h3>
                    <h5>商城实物商品交易订单查询及管理</h5>
                </div>
                <div class="subject" style="width:62%">
                    <a href="javascript:void(0);" style="float:right;margin-right:10px" class="ncap-btn-big ncap-btn-green"><i class="fa fa-pencil-square-o"></i>修改订单</a>
                    <a href="javascript:void(0);" style="float:right;margin-right:10px" class="ncap-btn-big ncap-btn-green"><i class="fa fa-external-link-square"></i>拆分订单</a>
                    <a href="javascript:void(0);" target="_blank" style="float:right;margin-right:10px" class="ncap-btn-big ncap-btn-green"><i class="fa fa-print"></i>打印订单</a>
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
                                <dt>订单 ID：</dt>
                                <dd><?=$infoData['order_id']?></dd>
                                <dt>订单号：</dt>
                                <dd><?=$infoData['order_sn']?></dd>
                                <dt>会员：</dt>
                                <dd><?=$infoData['user_id']?></dd>
                            </dl>
                            <dl>
                                <dt>E-Mail：</dt>
                                <dd><?=$infoData['email']?></dd>
                                <dt>电话：</dt>
                                <dd><?=$infoData['mobile']?></dd>
                                <dt>应付金额：</dt>
                                <dd><?=$infoData['order_amount']?></dd>
                            </dl>
                            <dl>
                                <dt>订单状态：</dt>
                                <dd><?=Yii::$app->params['ORDER_STATUS'][$infoData['order_status']]?></dd>
<!--                                <dd>待确认 / 未支付<span style="color: red">(货到付款)</span>/ 未发货</dd>-->
                                <dt>下单时间：</dt>
                                <dd><?=$infoData['add_time']?></dd>
                                <dt>支付时间：</dt>
                                <dd><?=$infoData['pay_time']?></dd>
                            </dl>
                            <dl>
                                <dt>支付方式：</dt>
                                <dd><?=$infoData['pay_name']?></dd>
                                <dt>发票抬头：</dt>
                                <dd><?=$infoData['invoice_title']?></dd>
                                <dt>纳税人识别号：</dt>
                                <dd><?=$infoData['taxpayer']?></dd>
                            </dl>
                        </div>
                        <div class="addr-note">
                            <h4>收货信息</h4>
                            <dl>
                                <dt>收货人：</dt>
                                <dd><?=$infoData['consignee']?></dd>
                                <dt>联系方式：</dt>
                                <dd><?=$infoData['mobile']?></dd>
                            </dl>
                            <dl>
                                <dt>收货地址：</dt>
                                <dd><?=ConvertCityName($infoData['province'])?>，<?=ConvertCityName($infoData['city'])?>，<?=ConvertCityName($infoData['district'])?>，<?=$infoData['address']?></dd>
                            </dl>
                            <dl>
                                <dt>邮编：</dt>
                                <dd><?=$infoData['zipcode']?></dd>
                            </dl>
                            <dl>
                                <dt>配送方式：</dt>
                                <dd><?=$infoData['shipping_name']?></dd>
                            </dl>
                            <dl>
                                <dt>留言：</dt>
                                <dd><?=$infoData['user_note']?></dd>
                            </dl>
                        </div>
                        <div class="goods-info">
                            <h4>商品信息</h4>
                            <table>
                                <thead>
                                <tr>
                                    <th>商品ID</th>
                                    <th >商品</th>
<!--                                    <th>规格属性</th>-->
                                    <th>数量</th>
                                    <th>单品价格</th>
<!--                                    <th>会员折扣价</th>-->
                                    <th>单品小计</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($ordergoods as $k=>$v):?>
                                <tr>
                                    <td class="w60"><?=$v['goodid']?></td>

                                    <td style="text-align: center;"><a href="?r=home/index/goodsdetail&id=<?=$v['goodid']?>" target="_blank"><?=$v['name']?></a><br></td>
<!--                                    <td class="w80">网络:4G 内存:16G 颜色:黑色</td>-->
                                    <td class="w60"><?=$v['goodsNum']?></td>
                                    <td class="w100">￥<?=$v['unitPrice']?></td>
<!--                                    <td class="w60">4469.36</td>-->
                                    <td class="w80">￥<?=$v['subGoodsTotal']?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="total-amount contact-info">
                            <h3>订单总额：￥<?=$infoData['order_amount']?></h3>
                        </div>
                        <div class="contact-info">
                            <h3>费用信息 </h3>
                            <div class="form_class">
                                <a class="btn green" href="javascript:window.parent.window.f_addTab('editprice','修改费用','?r=admin/order/editprice')"><i class="fa fa-pencil-square-o"></i>修改费用</a>
                            </div>
                            <dl>
                                <dt>小计：</dt>
                                <dd><?=$infoData['order_amount']?></dd>
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
                                <dd><strong class="red_common"><?=$infoData['order_amount']?></strong></dd>
                            </dl>
                        </div>
                        <div class="contact-info">
                            <h3>操作信息</h3>
                            <dl class="row">
                                <dt class="tit">
                                    <label for="note">操作备注</label>
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
                                    <a class="ncap-btn-big ncap-btn-green" onclick="verifyForm('order-action','/index.php/Admin/order/order_action/order_id/1637/type/confirm');">确认</a>
                                    <a class="ncap-btn-big ncap-btn-green" onclick="verifyForm('order-action','/index.php/Admin/order/order_action/order_id/1637/type/invalid');">无效</a>
                                </dd>
                            </dl>
                        </div>
                        <div class="goods-info">
                            <h4>操作记录</h4>
                            <table>
                                <thead>
                                    <tr>
                                        <th>操作者</th>
                                        <th>操作时间</th>
                                        <th>订单状态</th>
                                        <th>付款状态</th>
                                        <th>发货状态</th>
                                        <th>描述</th>
                                        <th>备注</th>
                                    </tr>
                                </thead>
                                <tbody id="order_action">
                                    <tr>
                                        <td class="text-center">用户:hello</td>
                                        <td class="text-center">2018-03-29 19:03:21</td>
                                        <td class="text-center">待确认</td>
                                        <td class="text-center">未支付</td>
                                        <td class="text-center">未发货</td>
                                        <td class="text-center">提交订单</td>
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
