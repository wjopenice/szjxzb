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
    <title>发货单</title>
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
    <!--  标题栏   -->
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>发货单列表</h3>
                <h5>已发货订单列表</h5>
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
            <li>点击查看操作将显示订单（包括订单物品）的详细信息</li>
            <li>已发货订单列表</li>
        </ul>
    </div>
    <!--  表格     -->
    <div class="flexigrid">
        <div class="mDiv cf">
            <div class="ftitle fl">
                <h3>发货单列表</h3><h5>(共<?=$total?>条记录)</h5>
            </div>
            <a class="fl" href="javascript:void(0)"><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
            <form class="navbar-form form-inline fr" method="post" id="search-form">
                <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                <div class="sDiv">
                    <div class="sDiv2">
                        <input size="30" placeholder="收货人" value="" name="consignee" class="qsbox" type="text">
                    </div>
                    <div class="sDiv2">
                        <input size="30" placeholder="订单编号" value="" name="order_sn" class="qsbox" type="text">
                    </div>
                    <div class="sDiv2">
                        <select class="form-control" id="shipping_status" name="shipping_status" style="border: none;width:100px;margin-right:5px;margin-left:5px;height: 26px;">
                            <option value="0">待发货</option>
                            <option value="1">已发货</option>
                        </select>
                    </div>
                    <div class="sDiv2">
                        <input class="btn" value="搜索" type="button" onclick="ajax_get_table('search-form',1)">
                    </div>
                </div>
            </form>
        </div>
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0" style="width: 100%;">
                    <thead>
                    <tr class="cf">
                        <th class="sign fl" axis="col6" onclick="checkAllSign(this)">
                            <div style="width: 26px;"><i class="ico-check"></i></div>
                        </th>
                        <th align="center" abbr="article_title" axis="col6" class="fl">
                            <div style=" width:150px;" class="ta_c">订单编号</div>
                        </th>
                        <th align="center" abbr="ac_id" axis="col4" class="fl">
                            <div style=" width: 130px;" class="ta_c">下单时间</div>
                        </th>
                        <th align="center" abbr="ac_img" axis="col10" class="fl">
                            <div style=" width: 100px;" class="ta_c">收货人</div>
                        </th>
                        <th align="center" abbr="article_show" axis="col6" class="fl">
                            <div style="width: 120px;" class="ta_c">联系电话</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="fl">
                            <div style="width: 100px;" class="ta_c">所选物流</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col6" class="fl">
                            <div style="width: 80px;" class="ta_c">物流费用</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col10" class="fl">
                            <div style="width: 140px;" class="ta_c">支付时间</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col10" class="fl">
                            <div style="width: 80px;" class="ta_c">订单总价</div>
                        </th>
                        <th align="center" abbr="article_time" axis="col10" class="fl">
                            <div style="width: 180px;" class="ta_c">操作</div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="tDiv">
            <div class="tDiv2">
                <div class="fbutton">
                    <a href="javascript:void(0)">
                        <div class="add" title="批量发货">
                            <i class="fa fa-plus"></i>
                            <span>批量发货</span>
                        </div>
                    </a>
                </div>
                <div class="fbutton">
                    <a href="javascript:void(0)">
                        <div class="add" title="批量打印配货单">
                            <i class="fa fa-plus"></i>
                            <span>批量打印配货单</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="bDiv">
            <div id="flexigrid">
                <table>
                    <?php foreach ($arrData as $list): ?>  
                    <tr class="cf">
                        <td class="sign fl" axis="col6">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </td>
                        <td align="center" axis="col6" >
                            <div class="ta_c" style="width: 148px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><?=$list['order_sn']?></div>
                        </td>
                        <td align="center" axis="col6" >
                            <div class="ta_c" style="width: 128px;"><?=date('Y-m-d H:i:s',$list['add_time'])?></div>
                        </td>
                        <td align="center" axis="col10">
                            <div class="ta_c" style="width: 98px;"><?=$list['consignee']?></div>
                        </td>
                        <td align="center" axis="col6" >
                            <div class="ta_c" style="width: 118px;"><?=$list['mobile']?></div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 98px;"><?=$list['shipping_name']?></div>
                        </td>
                        <td align="center" axis="col6">
                            <div class="ta_c" style="width: 78px;"><?=$list['shipping_price']?></div>
                        </td>
                        <td align="center" axis="col10">
                            <div class="ta_c" style="width: 138px;"><?=date('Y-m-d H:i:s',$list['pay_time'])?></div>
                        </td>
                        <td align="center" axis="col10" >
                            <div class="ta_c" style="width: 78px;"><?=$list['order_amount']?></div>
                        </td>
                        <td align="center" axis="col10" >
                            <div class="ta_c" style="width: 178px;">
                                <a class="btn green delivery" href="javascript:window.parent.window.f_addTab('order_delivery','去发货','?r=admin/order/order_delivery')" data-toggle="tooltip" title="处理发货">
                                    <i class="fa fa-send-o"></i>去发货
                                </a>
                                <!-- 已发货 -->
                                <a class="btn green info" style="display: none;" href="javascript:window.parent.window.f_addTab('order_info','详情','?r=admin/order/order_info&id=<?=$list['order_id']?>')" data-toggle="tooltip" title="查看详情">
                                    <i class="fa fa-list-alt"></i>详情
                                </a>
                                <a class="btn green bution" style="display: none;" href="" data-toggle="tooltip" title="打印快递单">
                                    <i class="fa fa-print"></i>快递单
                                </a>
                                <!-- 已发货 -->
                                <a class="btn green" href="javascript:window.parent.window.f_addTab('order_distribution','配货单','?r=admin/order/order_distribution')" data-toggle="tooltip" title="打印配货单"><i class="fa fa-print"></i>配货单</a>
                            </div>
                        </td>
                        <td style="width: 100%;"><div>&nbsp;</div></td>
                    </tr>
                    <?php endforeach; ?> 
                </table>
            </div>
        </div>
        <div class="pDiv">
            <?php echo $pageShow;?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // 点击刷新数据
        $('.fa-refresh').click(function(){
            location.href = location.href;
        });
    });

    //ajax 抓取页面
    function ajax_get_table(form, page) {

        cur_page = page; //当前页面 保存为全局变量
        var selectData = $('#' + form).serialize();
        var v = '' ;

        $.ajax({
            type: "POST",
            url: "/index.php?r=admin/order/invoice",//+tab,
            data: selectData,// 你的formid
            success: function (data) {
                var formData = selectData.split("&");
                for (k in formData){
                    v = formData[k].split("=");
                    formData[v[0]] = v[1];
                }

                console.log(formData);
                $(".page").remove();
                $("body").append(data);
                if(formData.shipping_status != 0){
                    $(".delivery").css('display','none'); 
                    $(".info").css('display','block'); 
                    $(".bution").css('display','block'); 
                }
                $("#shipping_status option[value='"+formData.shipping_status+"']").prop("selected","selected");
                $("input[name=consignee]").val(decodeURI(formData.consignee));
                $("input[name=order_sn]").val(decodeURI(formData.order_sn));
            }
        });
    }

</script>
</body>
</html>