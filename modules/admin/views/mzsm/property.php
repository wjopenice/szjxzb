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
        <form action="?r=admin/mzsm/property" method="post">
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
                <input type="hidden" name="goods_id" value="<?=$id?>" >
                <li class="cf">
                    <div class="proName">产品名称：</div>
                    <div class="propertyRight"><input type="text" name="" value="<?=$name?>" readonly ></div>
                </li>
            </ul>
            <div class="ncap-form-default">
                <div class="bot"><input type="submit" name="btn" class="addSubmitBtn" value="确认提交"></div>
            </div>
        </form>
    </div>
<script>
    $(function(){

        //点击添加属性
        $(document).on("click",".addPropertyBtn",function(){
            $(".addPropertyBox").show();
        });

        //点击取消按钮
        $(document).on("click",'.cancelBtn',function(){
            $(".proInput").val("");
            $(".addPropertyBox").hide();
        });

        //点击确定按钮
        $(document).on("click",'.confirmBtn',function(){
            var propertyVal = $(".proInput").val();
            var pingIndex = pinyinUtil.getFirstLetter(propertyVal).toLowerCase();

            if(!propertyVal){
                alert("请填写属性值");
                return false;
            }

            $(".propertyUpdate").append('<li class="cf">' +
                '<div class="proName">'+propertyVal+'：</div>' +
                '<div class="propertyRight"><input type="text" name="'+propertyVal+'" data-chineseNmae="'+pingIndex+'" value="" placeholder="请填写'+propertyVal+'"><span class="delPro hide">删除</span></div>' +
                '</li>') ;
            $(".proInput").val("");
            $(".addPropertyBox").hide();
        });

        htmlSplit();

        //点击删除
        $(document).on("click",'.delPro',function(){
            $(this).parents("li").remove();
        });

        //鼠标移入删除显示隐藏
        $(".propertyUpdate li").hover(function(){
            $(this).find(".delPro").show();
        },function(){
            $(this).find(".delPro").hide();
        });


    });

    function htmlSplit(){

//        var jsonObj = {"goods_name":"童装男童潮流时尚嘻哈范",
//            "warranty_period":"24个月",
//            "brands":"Philips/飞利浦",
//            "model":"AC6",
//            "manufacturer":"飞利浦（中国）投资有限公司",
//            "item_number":"AC6608",
//            "main_material":"白金","features":"定时 除花粉 除甲醛 除烟除尘"};
        var jsonObj = <?=$str?>;
        var jsonName = "";
        var html = [];
        if(!jsonObj){
            return false;
        }
        for(var i in jsonObj){
            switch(i){
                case "goods_name":
                    jsonName = "产品名称";
                    break;
                case "warranty_period":
                    jsonName = "保修期";
                    break;
                case "brands":
                    jsonName = "品牌";
                    break;
                case "model":
                    jsonName = "型号";
                    break;
                case "manufacturer":
                    jsonName = "生产企业";
                    break;
                case "item_number":
                    jsonName = "货号";
                    break;
                case "main_material":
                    jsonName = "主要材质";
                    break;
                case "features":
                    jsonName = "功能";
                    break;
                default:jsonName = i;break;
            }

            html.push('<li>' +
                '<div class="proName">'+jsonName+'：</div>' +
                '<div class="propertyRight"><input type="text" name="'+i+'" value="'+jsonObj[i]+'" placeholder="请填写'+jsonName+'"><span class="delPro hide">删除</span></div>' +
                '</li>');
        }
        $(".propertyUpdate").append(html);

    }
</script>
</body>

