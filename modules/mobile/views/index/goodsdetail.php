<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/mobile/Static");
if(!empty($_COOKIE['username'])) {
    $len = cartlen($_COOKIE['username']);
}else{
    $len = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>商品详情</title>
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/sm-extend.min.css">
    <link rel="stylesheet" href="<?=$url?>/Css/common/base.css">
    <link rel="stylesheet" href="<?=$url?>/Css/goodsDetail/index.css">
</head>
<body class="mHome">

    <!--  加载层   -->
    <div id="loader">
        <div class="loaderInner">
            <img src="<?=$url?>/Image/common/logo/logo1.png" alt="">
        </div>
    </div>

    <!--  页面    -->
    <div class="page-group">

        <!--  商品详情   -->
        <div class="goodsDetailBoxWrap bg_white">
            <div class="goodsImg">
                <div class="swiper-container" data-space-between='10'>
                    <div class="swiper-wrapper slide-banner_uc">
                        <div class="swiper-slide"><a href="" class="external"><img alt="" src="<?=$urlData['image_url1']?>"></a></div>
                        <div class="swiper-slide"><a href="" class="external"><img alt="" src="<?=$urlData['image_url2']?>"></a></div>
                        <div class="swiper-slide"><a href="" class="external"><img alt="" src="<?=$urlData['image_url3']?>"></a></div>
                        <div class="swiper-slide"><a href="" class="external"><img alt="" src="<?=$urlData['image_url4']?>"></a></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <!--<div class="goodsImgPageBox fr"><span class="imgIndexNum"></span><span> / </span><span class="imgTotalNum"></span></div>-->
            </div>

            <div class="goodsInfo">
                <div class="goodsPriceBox">
                    <p class="priceNow">￥<span class="PriceX"><?=$arrData['shop_price']?></span></p>
                    <div class="sale cf">
                        <span class="fl priceLast">￥<?=$arrData['market_price']?></span>
                        <span class="fr">已售 <span><?=$arrData['sales_sum']?></span></span>
                    </div>
                </div>
                <div class="goodsNameBox">
                    <div class="goodsNameContent cf">
                        <div class="goodsName fl shopXcart"><?=$arrData['goods_name']?></div>
                        <span class="goodsExplain" hidden><?=$arrData['keywords']?></span>
                        <div class="favourite fr"></div>
                    </div>
                    <div class="goodsIntroduce">本商城向您保证所销售商品均为正品行货，本商城自营商品自带机打发票，与商品一起寄送。凭质保证书及本商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由本商城联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。本商城还为您提供具有竞争力的商品价格和运费政策，请您放心购买！</div>
                </div>
                <div class="goodsPostBox cf">
                    <div class="subGoodsPost">
                        <span class="fl">邮费：<span>包邮</span></span>
                        <span class="fr">由商城直接发货</span>
                    </div>
                    <div class="subGoodsPost cf">
                        <p class="fl promisePost"><i></i><span>正品保证</span></p>
                        <p class="fl promisePost"><i></i><span>7天包退</span></p>
                        <p class="fl promisePost"><i></i><span>闪电发货</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!--  购买口碑   -->
<!--        <div class="shopPraise bg_white">-->
<!--            <div class="goodsTit">购买口碑</div>-->
<!--            <div class="scoreBox">-->
<!--                <div class="getScore fl cf">-->
<!--                    <i class="fl star"><span style="width: 80%;"></span></i>-->
<!--                    <span class="fl">4.89</span>-->
<!--                </div>-->
<!--                <div class="scorePeopleNum fr">1430名用户参与评分</div>-->
<!--            </div>-->
<!--            <div class="subPraise copy">-->
<!--                <div class="headBox cf">-->
<!--                    <img src="--><?//=$url?><!--/Image/common/headImg/headImg.png" class="headImg fl" alt="">-->
<!--                    <span class="headName fl">香*****菜</span>-->
<!--                </div>-->
<!--                <div class="praiseBox">很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦很不错啦，喜欢啦</div>-->
<!--                <div class="praiseTime">04月02日</div>-->
<!--            </div>-->
<!--            <a href="../../View/goodsDetail/shopPraise.html" class="seeMore">查看更多 》</a>-->
<!--        </div>-->

        <!--  商品详情  商品属性 用户答疑   -->
        <div class="goodsDetailBoxWrap bg_white cf " id="goodsDetailBox">
            <div class="goodsDetailTit cf fl">
                <p class="subGoodsDetailTit fl active"><a href="javascript:void(0)">商品详情</a></p>
                <p class="subGoodsDetailTit fl"><a href="javascript:void(0)">商品属性</a></p>
                <p class="subGoodsDetailTit fl"><a href="javascript:void(0)">用户答疑</a></p>
            </div>
            <div class="goodsDetailContent cf fl">
                <div class="subGoodsDetailCon fl">
                    <img src="<?=$urlData['image_url5']?>" alt="">
                    <img src="<?=$urlData['image_url6']?>" alt="">
                    <img src="<?=$urlData['image_url7']?>" alt="">
                    <img src="<?=$urlData['image_url8']?>" alt="">
                    <img src="<?=$urlData['image_url9']?>" alt="">
                    <img src="<?=$urlData['image_url10']?>" alt="">
                </div>
                <div class="subGoodsDetailCon fl hide cf">
                    <p class="subGoodProperty cf"><span class="propertyName">商品名称：</span><span class="propertyCon"><?=$arrData['goods_name']?></span></p>
                </div>
                <div class="subGoodsDetailCon fl hide">
                    <p class="subGoodProperty cf"><span class="propertyName">质保期：</span><span class="propertyCon">一年</span></p>
                    <p class="subGoodProperty cf"><span class="propertyName">售前/后服务电话：</span><span class="propertyCon">4000-825-999</span></p>
                    <p class="subGoodProperty cf"><span class="propertyName">品牌官方网站：</span><span class="propertyCon">http://www.cnuti.com</span></p>
                    <p class="longGoodProperty cf">
                        上架时间本商城向您保证所售商品均为正品行货，本商城自营商品自带机打发票，与商品一起寄送。凭质保证书及本商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由本商城联系修保，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。本商城还为您提供具有竞争力的商品价格和运费政策，请您放心购买！
                        注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！
                    </p>
                </div>
            </div>
        </div>

        <!--  固定导航栏   -->
        <div class="cartFixBar cf">
            <a class="addCartNum fl" href="?m=m/sc/order"><i><em class="cartNumEm" id="cartNumEm"><?=$len?></em></i></a>
            <a class="addCartBtn fl open-popup" href="javascript:void(0)">加入购物车</a>
            <a class="buyBtn fl open-popup" href="?m=m/sc/order">立即购买</a>
        </div>

    </div>

    <!--  选择商品属性  -->
    <div class="popup popup-services">
        <div class="choseProperty">
            <div class="propertyBoxTop cf">
                <img src="<?=$urlData['image_url1']?>" class="propertyImg fl urlx" alt="">
                <div class="propertyNameBox cf fl">
                    <p class="fl propertyName"><?=$arrData['goods_name']?></p>
                    <p class="fl"><span class="priceNow">￥<?=$arrData['shop_price']?></span><span class="pricePast">￥<?=$arrData['market_price']?></span></p>
                </div>
                <i class="closeBtn close-popup fr"></i>
            </div>
            <div class="propertyParticular cf">
                <p class="propertyTit fl">规格</p>
                <div id="propertyTitA"></div>
            </div>
            <div class="propertyPost" style="padding-top: 5px;">
                <p class="propertyTit fl">颜色</p>
                <div id="propertyTit"></div>
            </div>
            <div class="choseNumBox cf">
                <p class="fl choseNumTit">选择数量</p>
                <div class="cart_num cf fr">
                    <input class="cart_min pull-left" type="button" value="-" disabled="disabled">
                    <input class="cart_text_box" id="quantity" type="number" value="1" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}">
                    <input class="cart_add pull-right" type="button" value="+">
                </div>
            </div>
        </div>
        <div class="confirmBtn" id="shoppingcat">确定</div>
    </div>

<script src="<?=$url?>/Js/common/zepto.min.js"></script>
<script src="<?=$url?>/Js/common/touch.js"></script>
<script src="<?=$url?>/Js/common/sm.min.js"></script>
<script src="<?=$url?>/Js/common/sm-extend.min.js"></script>
<script src="<?=$url?>/Js/common/public.js"></script>
<script src="<?=$url?>/Js/goodsDetail/index.js"></script>

<script>

    $(function () {

    //购物车
        $("#shoppingcat").click(function () {
            var user = '<?=$_COOKIE['username']?>';
            var id = <?=$_GET['id']?>;
            var num = parseInt($(".cart_text_box").val());
            var price = parseInt($(".PriceX").html());
            var name = $(".shopXcart").html();
            var url = $(".urlx").attr("src");
            var keywords = $(".goodsExplain").html();
            var cartmsg = {
                'goodid':id,
                'user':user,
                'goodname':name,
                'keywords':keywords,
                'goodnum':num,
                'goodprice':price,
                'goodurl':url
            };
            if(user == ""){
                $.alert("您还没有登录，请先登录",function(){
                    window.location.href='?r=home/login/login';
                });
            }else{
                if($("#propertyTit a").hasClass("active")){
                    var cartid = parseInt($("#cartNumEm").html())+1;
                    $("#cartNumEm").html(cartid);
                    $.get("?m=m/sc/cart",{u:user,d:JSON.stringify(cartmsg)},function (msg) {
                        $.toast('加入购物车成功');
                    },"text");
                }else{
                    $.alert("请选择规格和颜色");
                }

            }
            $("#shoppingcat").on("click",function(){
                $(this).addClass("close-popup");
            });
        });

    //规格
    var jsonapi1 =  '<?=$spec?>' ;
    var jsonapi = eval("["+jsonapi1.slice(1,-1)+"]");
    for(var d in jsonapi){
        var dataobj = jsonapi[d];
        for(var s in dataobj){
            var str1 = '';
            var str2 = '';
            var dataobjs = dataobj[s];
            var index=d;
            if(index == 0){
                str1 = '<a class="propertyChose specBtn active" data-num='+ index +'>'+ s +'</a>';
                str2 = "<div class='spec_"+index+"' style='display:block;'>";
            }else{
                str1 = '<a class="propertyChose specBtn " data-num='+ index +'>'+ s +'</a>';
                str2 = "<div class='spec_"+index+"' style='display:none;'>";
            }
            for(var k in dataobjs){
                str2 += '<a class="propertyChose specVal" data-val='+ index +'>'+ dataobjs[k] +'</a>';
            }
            str2 += "</div>";
            $('#propertyTitA').append(str1);
            $('#propertyTit').append(str2);
        }
    }
    //spec点击切换
    $(".specBtn").click(function () {
        var index = $(this).index();
        $("div[class=spec_"+index+"]").css("display","block").siblings().css("display","none");
    });
    //属性
    var listdata1 = '<?=$attr?>' ;
    var listdata = JSON.parse(listdata1);
    var jsonName = '';
    for(var s in listdata) {
        switch (s) {
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
            default:
                jsonName = s;
                break;
        }
        var str3 = '';
        str3 = '<p class="subGoodProperty cf"><span class="propertyName">' + jsonName + '：</span><span class="propertyCon">' + listdata[s] + '</span></p>';
        $('.subGoodsDetailCon').append(str3);
    }
});
</script>

</body>
</html>