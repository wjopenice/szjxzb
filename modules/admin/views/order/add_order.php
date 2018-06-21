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
    <title>添加分类</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/ajaxupload.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
    <?= Html::jsFile("{$url}/Js/order/add_order.js")?>
</head>
<body>

    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>添加订单</h3>
                    <h5>管理员在后台添加一个新的订单</h5>
                </div>
            </div>
        </div>
        <!--  表单内容   -->
        <form class="form-horizontal" action="" id="order-add" method="post">
            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label><em></em>用户名</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" name="user_name" id="user_name" class="input-txt" placeholder="用户昵称搜索" >
                        <select name="user_id" id="user_id">
                            <option value="0">选择用户</option>
                        </select>
                        <a href="javascript:void(0);" onclick="search_user();" class="ncap-btn ncap-btn-green" ><i class="fa fa-search"></i>搜索</a>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="consignee"><em>*</em>收货人</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" name="consignee" id="consignee" class="input-txt" placeholder="收货人名字">
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="consignee"><em>*</em>手机</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" name="mobile" id="mobile" class="input-txt" placeholder="收货人联系电话">
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="consignee"><em>*</em>地址</label>
                    </dt>
                    <dd class="opt">
                        <select onchange="get_city(this)" id="province" name="province"  title="请选择所在省份">
                            <option value="">选择省份</option>
                            <option value="" ></option>
                        </select>
                        <select onchange="get_area(this)" id="city" name="city" title="请选择所在城市">
                            <option value="">选择城市</option>
                            <option value=""></option>
                        </select>
                        <select id="district" name="district" title="请选择所在区县">
                            <option value="">选择区域</option>
                            <option value=""></option>
                        </select>
                        <input type="text" name="address" id="address" class="input-txt"   placeholder="详细地址">
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="consignee"><em>*</em>邮编</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" name="zipcode" id="zipcode" class="input-txt" placeholder="收货地址邮编">
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="invoice_title">发票抬头</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" name="invoice_title" value="" class="input-txt"  placeholder="发票抬头">
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="invoice_title">纳税人编号</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" name="taxpayer" value="" class="input-txt"  placeholder="纳税人识别号">
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="invoice_title">添加商品</label>
                    </dt>
                    <dd class="opt">
                        <a href="javascript:void(0);" onclick="selectGoods()" class="ncap-btn ncap-btn-green" ><i class="fa fa-search"></i>添加商品</a>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="invoice_title"><em>*</em>商品列表</label>
                    </dt>
                    <dd class="opt">
                        <div class="ncap-order-details hide" id="goods_list_div" >
                            <div class="hDivBox" id="ajax_return" >
                                <div class="form-group">
                                    <div class="col-xs-10" id="goods_td" >
                                        <table class="table table-bordered"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">管理员备注</dt>
                    <dd class="opt">
                        <textarea class="tarea" style="width:440px; height:150px;" name="admin_note" id="admin_note">管理员添加订单</textarea>
                        <span class="err"></span>
                        <p class="notic"></p>
                    </dd>
                </dl>
                <div class="bot"><a href="JavaScript:void(0);" onClick="checkSubmit()" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
            </div>
        </form>

</body>