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
    <title>订单列表</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>

    <?= Html::jsFile("{$url}/Js/common/layer/laydate/laydate.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
    <?= Html::jsFile("{$url}/Js/order/order_list.js")?>

</head>
<body>

    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>商品订单</h3>
                    <h5>商城实物商品交易订单查询及管理</h5>
                </div>
            </div>
        </div>
        <!--  操作提示  -->
        <div id="explanation" class="explanation">
            <div id="checkZoom" class="title">
                <i class="fa pressIcon"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span title="收起提示"></span>
            </div>
            <ul>
                <li>查看操作可以查看订单详情，包括支付费用，商品详情等.</li>
                <li>未支付的订单可以取消</li>
                <li>用户收货后，如果没有点击“确认收货”，系统自动根据设置的时间自动收货</li>
            </ul>
        </div>
        <!--  表格内容  -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>订单列表</h3>
                    <h5>(共<span><?=$total?></span>条记录)</h5>
                </div>
                <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
                <form class="navbar-form form-inline fr"  method="post" action=""  name="search-form2" id="search-form2">
                    <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                    <div class="sDiv">
                        <div class="sDiv2">
                            <input type="text" size="30" id="add_time_begin" name="start_time" value="" class="qsbox"  placeholder="下单开始时间">
                        </div>
                        <div class="sDiv2">
                            <input type="text" size="30" id="add_time_end" name="end_time" value="" class="qsbox"  placeholder="下单结束时间">
                        </div>
                        <div class="sDiv2">
                            <select name="pay_status" class="select sDiv3" style="margin-right:5px;margin-left:5px">
                                <option value="">支付状态</option>
                                <?php foreach (Yii::$app->params['PAY_STATUS'] as $id=>$status): ?>   
                                    <option value="<?=$id?>"><?=$status?></option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                        <div class="sDiv2">
                            <select name="pay_code" class="select sDiv3" style="margin-right:5px;margin-left:5px">
                                <option value="">支付方式</option>
                                <option value="alipay">支付宝支付</option>
                                <option value="weixin">微信支付</option>
                                <option value="cod">货到付款</option>
                            </select>
                        </div>
                        <div class="sDiv2">
                            <select name="shipping_status" class="select sDiv3" >
                                <option value="">发货状态</option>
                                <?php foreach (Yii::$app->params['SHIPPING_STATUS'] as $id=>$status): ?>   
                                    <option value="<?=$id?>"><?=$status?></option>
                                <?php endforeach; ?>  
                            </select>
                        </div>
                        <div class="sDiv2">
                            <select name="order_status" class="select sDiv3" >
                                <option value="">订单状态</option>
                                <?php foreach (Yii::$app->params['ORDER_STATUS'] as $id=>$status): ?>   
                                    <option value="<?=$id?>"><?=$status?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="sDiv2">
                            <select  name="keytype" class="select">
                                <option value="consignee">收货人</option>
                                <option value="order_sn">订单编号</option>
                            </select>
                        </div>
                        <div class="sDiv2">
                            <input type="text" size="30" name="keywords" class="qsbox" placeholder="搜索相关数据...">
                        </div>
                        <div class="sDiv2">
                            <input type="button" onclick="ajax_get_table('search-form2',1)"  class="btn" value="搜索">
                        </div>
                    </div>
                </form>
            </div>
            <div class="hDiv">
                <div class="hDivBox" id="ajax_return">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th axis="col0">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </th>
                            <th align="left" abbr="order_sn" axis="col3" class="">
                                <div style="width: 140px;" class="ta_l">订单编号</div>
                            </th>
                            <th align="left" abbr="consignee" axis="col4" class="">
                                <div style="width: 130px;" class="ta_l">收货人</div>
                            </th>
                            <th align="center" abbr="article_show" axis="col5" class="">
                                <div style="width: 60px;" class="ta_c">总金额</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 60px;" class="ta_c">应付金额</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 60px;" class="ta_c">订单状态</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 60px;" class="ta_c">支付状态</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 60px;" class="ta_c">发货状态</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 100px;" class="ta_c">支付方式</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 60px;" class="ta_c">配送方式</div>
                            </th>
                            <th align="center" abbr="article_time" axis="col6" class="">
                                <div style="width: 120px;" class="ta_c">下单时间</div>
                            </th>
                            <th align="left" axis="col1" class="handle">
                                <div style="width: 150px;" class="ta_l">开票</div>
                            </th>
                            <th align="left" axis="col1" class="handle">
                                <div style="width: 150px;" class="ta_l">操作</div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="tDiv">
                <div class="tDiv2">
                    <div class="fbutton">
                        <a href="javascript:exportReport()">
                            <div class="add" title="选定行数据导出excel文件,如果不选中行，将导出列表所有数据">
                                <span><i class="fa fa-plus"></i>导出数据</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bDiv">
                <div id="flexigrid">
                    <table>
                        <tbody>
                            <?php foreach ($arrData as $list): ?>  
                            <tr>
                                <td class="sign">
                                    <div style="width: 24px;"><i class="ico-check"></i></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 137px;" class="ta_c"><?=$list['order_sn']?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 128px;" class="ta_c"><?php echo $list['consignee'].':'.$list['mobile']?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 58px;" class="ta_c"><?=$list['total_amount']?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 58px;" class="ta_c"><?=$list['order_amount']?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 58px;" class="ta_c"><?=Yii::$app->params['ORDER_STATUS'][$list['order_status']]?></div>
                                </td>
                                <?php
                                $paystatus = Yii::$app->params['PAY_STATUS'][$list['pay_status']];
                                $color = "";
                                if($paystatus == "已支付"){$color = "green";}else{$color = "red";}
                                ?>
                                <td align="center" class="">
                                    <div style="width: 58px;color: <?=$color?>;" class="ta_c"><?=$paystatus?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 58px;" class="ta_c"><?=Yii::$app->params['SHIPPING_STATUS'][$list['shipping_status']]?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 98px;" class="ta_c"><?=Yii::$app->params['PAY_NAME'][$list['pay_name']]?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 58px;" class="ta_c"><?=$list['shipping_name']?></div>
                                </td>
                                <td align="center" class="">
                                    <div style="width: 118px;" class="ta_c"><?=date('Y-m-d H:i:s',$list['add_time'])?></div>
                                </td>
                                <td align="center" class="handle">
                                    <div class="ta_l" style="width: 148px;">
                                        <a href="javascript:window.parent.window.f_addTab('order_info','查看订单详情','?r=admin/order/order_info&id=<?=$list['order_id']?>')" class="btn green"><i class="fa fa-list-alt"></i>查看</a>
                                    </div>
                                </td>
                                <td style="width: 100%;"><div>&nbsp;</div></td>
                            </tr>
                            <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="pDiv">
                <?php echo $pageShow;?>
            </div>
        </div>
    </div>

</body>


