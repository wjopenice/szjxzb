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
    <title>修改属性</title>
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
    <?= Html::jsFile("{$url}/Js/common/dict/pinyin_dict_withtone.js")?>
    <?= Html::jsFile("{$url}/Js/common/pinyinUtil.js")?>
    <?= Html::jsFile("{$url}/Js/mzsm/addproperty.js")?>
    <style>
        .flexigrid .fbutton{margin:20px 0 0 50px;border-right: none;}
    </style>
</head>
<body>
    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>属性修改</h3>
                    <h5>商城商品属性修改</h5>
                </div>
            </div>
        </div>
        <!--  操作提示  -->
        <div id="explanation" class="explanation">
            <div id="checkZoom" class="title">
                <i class="fa pressIcon"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span title="收起提示" id="explanationZoom"></span>
            </div>
        </div>
        <!--  表单  -->
        <form action="?r=admin/mzsm/addproperty" method="post">

            <div class="flexigrid">
                <div class="fbutton addPropertyBtn">
                    <div class="add" title="添加属性">
                        <span>添加属性</span>
                    </div>
                </div>
                <div class="addPropertyBox cf hide">
                    <strong class="fl">属性名：</strong>
                    <input class="fl proInput" type="text" placeholder="请填写属性名">
                    <a href="javascript:void(0)" class="confirmBtn fl">确定</a>
                    <a href="javascript:void(0)" class="cancelBtn fl">取消</a>
                </div>
            </div>
            <ul class="propertyUpdate cf">
                <li class="cf">
                    <div class="proName">产品名称：</div>
                    <div class="propertyRight">
                        <select name="goods_id" class="fl" style="min-width: 310px;">
                            <?php foreach ($attr as $key=>$value): ?>
                            <option value="<?=$value['goods_id']?>"><?=$value['goods_name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </li>
                <li class="cf">
                    <div class="proName">保修期：</div>
                    <div class="propertyRight"><input type="text" name="warranty_period" value="24个月" placeholder="请填写保修期"><span class="delPro hide">删除</span></div>
                </li>
                <li class="cf">
                    <div class="proName">品牌：</div>
                    <div class="propertyRight"><input type="text"  name="brands" value="Philips/飞利浦" placeholder="请填写品牌名称"><span class="delPro hide">删除</span></div>
                </li>
                <li class="cf">
                    <div class="proName">型号：</div>
                    <div class="propertyRight"><input type="text"  name="model" value="AC6608" placeholder="请填写型号名称"><span class="delPro hide">删除</span></div>
                </li>
                <li class="cf">
                    <div class="proName">生产企业：</div>
                    <div class="propertyRight"><input type="text" name="manufacturer" value="飞利浦（中国）投资有限公司" placeholder="请填写生产企业"><span class="delPro hide">删除</span></div>
                </li>
                <li class="cf">
                    <div class="proName">货号：</div>
                    <div class="propertyRight"><input type="text" name="item_number" value="AC6608" placeholder="请填写货号"><span class="delPro hide">删除</span></div>
                </li>
                <li class="cf">
                    <div class="proName">主要材质：</div>
                    <div class="propertyRight"><input type="text" name="main_material" value="白金" placeholder="请填写材质"><span class="delPro hide">删除</span></div>
                </li>
                <li class="cf">
                    <div class="proName">功能：</div>
                    <div class="propertyRight"><input type="text" name="features" value="定时 除花粉 除甲醛 除烟除尘" placeholder="请填写功能"><span class="delPro hide">删除</span></div>
                </li>
            </ul>
            <div class="ncap-form-default">
                <div class="bot"><input type="submit" class="addSubmitBtn" value="确认提交"></div>
            </div>
        </form>
    </div>
</body>

