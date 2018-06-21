<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "商品详情";
$this->keywords = "商品详情";
$this->description = "商品详情";
?>
<?= Html::cssFile("{$url}/Css/goodsDetail/index.css"); ?>
    <div class="container">
        <!--  导航栏  -->
        <div class="commonNavBar">
            <a class="subBar" href="?r=home/index/index">首页</a> &gt;
            <a class="subBar" href="?r=home/shop_classify/<?=$navData?>&type=<?=$navData?>"><?=$crumbsData?></a> &gt;
            <a class="subBar"><?=$data['goods_name']?></a>
        </div>
        <!--   商品介绍部分   -->
        <div class="goodsBox cf">
            <div class="goodsLeft fl">
                <div class="goodsBig ">
                    <?= Html::img($data['image_url1'],["alt"=>"",'class'=>'urlx']); ?>
                </div>
                <div class="goodsLittleBox cf">
                    <?= Html::img($data['image_url1'],["class"=>"fl subLittleBox active","alt"=>""]); ?>
                    <?= Html::img($data['image_url2'],["class"=>"fl subLittleBox ","alt"=>""]); ?>
                    <?= Html::img($data['image_url3'],["class"=>"fl subLittleBox ","alt"=>""]); ?>
                    <?= Html::img($data['image_url4'],["class"=>"fl subLittleBox ","alt"=>""]); ?>
                </div>
            </div>
            <div class="goodsRight fl">
                <div class="goodsName shopXcart"><?=$data['goods_name']?></div>
                <div class="goodsExplain"><?=$data['keywords']?></div>
                <div class="goodGreyBox">
                    <div class="goodsGreyTop cf">
                        <div class="cf subGoodsGrey fl"><p class="goodsTit fl">价格</p><p class="fl col_red nowPrice">￥<span class="goodsPrice PriceX"><?=$data['shop_price']?></span></p><p class="fl lastPrice">￥<span><?=$data['market_price']?></span></p></div>
                        <div class="cf subGoodsGrey fl"><p class="goodsTit fl">促销</p><p class="fl col_red">全场7重折 新品冰点价</p></div>
                        <div class="cf subGoodsGrey fl"><p class="goodsTit fl">积分</p><p class="fl col_black">购买获得<?=floor($data['shop_price']/100)?>积分</p></div>
                        <div class="cf subGoodsGrey fl"><p class="goodsTit fl">快递</p><p class="fl col_black"><?php if($data['is_free_shipping'] == 1){ echo '包邮'; }else{ echo '自费';} ?></p></div>
                    </div>
                    <div class="goodsGreyBottom cf">
                        <div class="cf subGoodsGrey fl"><p class="goodsTit fl">服务</p><p class="fl"><span>▪ 30天无忧退换货</span>&nbsp;&nbsp;&nbsp;<span>▪ 48小时快速退款</span></p></div>
                        <div class="cf subGoodsGrey fl"><p class="goodsTit fl">&nbsp;</p><p class="fl"><span>▪ 手店桶自营品牌</span>&nbsp;&nbsp;&nbsp;<span>▪ 国内部分地区无法配送</span></p></div>
                    </div>
                </div>
                <div id="specContent">
                    <div>
                        <div class="specBox cf">
                            <div class="fl specTit">规格</div>
                            <div class="cf fl specCon" id="specBox">
                                <!--<p class="subSpec fl active">ff</p>-->
                            </div>
                        </div>
                        <div class="specBox cf colorBox">
                            <div class="fl specTit">颜色</div>
                            <div class="cf fl specCon" id="colorBox">
                                <!--<p class="subSpec fl">hh</p>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="numBox cf">
                    <div class="numTit fl">数量</div>
                    <div class="goodsNumBox fl">
                        <div class="cart_num cf">
                            <div class="cart_min"></div>
                            <input class="cart_text_box" id="number" type="number" value="1" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}">
                            <div class="cart_add"></div>
                        </div>
                    </div>
                    <span class="stockBox">库存：<span class="stockNum"><?=$data['store_count']?></span></span>
                </div>
                <div class="operateBox cf">
                    <a id="shopping" class="btn_buy fl" href="javascript:void(0)">立即购买</a>
                    <a id="shoppingcat" class="btn_addCart fl" href="javascript:void(0)">加入购物车</a>
                    <?php if(!empty($mycollectionData)): ?>
                        <a id="mycollection" class="btn_fav fl" name="click1" href="javascript:void(0)" style="color:#F8981D;border: 1px solid #F8981D;">
                            <i style="background: url('<?=$url?>/Image/common/fav/fav_org.png' ) no-repeat center center"></i>收藏
                        </a>
                    <?php else: ?>
                        <a id="mycollection" class="btn_fav fl" name="click2" href="javascript:void(0)"><i></i>收藏</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <!--   大家都在看   -->
        <div class="allLookBox cf">
            <div class="tit fl"><span>大家都在看</span></div>
            <div class="con fl slide-box pr">
                <ul class="slide-content cf">
                    <?php foreach ($click_count as $key=>$list):?>
                    <li class="fl subGoodsBox">
                        <?= Html::img($list['image_url1'],["class"=>"goodsBoxImg","alt"=>$list['goods_name'],'onclick'=>"location.href='?r=home/index/goodsdetail&id={$list['goods_id']}&type=".navDataEx($list['mzsm_cat_id'])."'"]); ?>
                        <p class="goodsBoxName ofh"><?=$list['goods_name']?></p>
                        <p class="goodsBoxPrice">￥<span><?=$list['shop_price']?></span></p>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="slide-btns">
                    <div class="prev"></div>
                    <div class="next"></div>
                </div>
            </div>
        </div>
        <!--   商品详情部分   -->
        <div class="detailBox cf">
            <div class="detailLeft fl">
                <div class="detailTab cf">
                    <a class="subDetailTab active" href="javascript:void(0)">详情</a>
<!--                    <a class="subDetailTab" href="javascript:void(0)">评价（<span>123</span>）</a>-->
                </div>
                <div class="detailCon">
                    <div class="subDetailCon">
                        <div class="specifications">
                            <div id="parameterTitle"><span>品牌名称：</span><span><?=$data['goods_name']?></span></div>
                            <div class="parameter">产品参数：</div>
                            <ul class="cf parameterUl"></ul>
                        </div>
                        <?= Html::img($data['image_url5'],["alt"=>""]); ?>
                        <?= Html::img($data['image_url6'],["alt"=>""]); ?>
                        <?= Html::img($data['image_url7'],["alt"=>""]); ?>
                        <?= Html::img($data['image_url8'],["alt"=>""]); ?>
                        <?= Html::img($data['image_url9'],["alt"=>""]); ?>
                        <?= Html::img($data['image_url10'],["alt"=>""]); ?>
                    </div>
                    <div class="subDetailCon commentDetailCon hide">
                        <div class="commentBox cf">
                            <div class="goodComment fl">
                                <p>好评率</p>
                                <p class="commentRate">50%</p>
                                <i class="starBox"><em style="width: 50%;"></em></i>
                            </div>
                            <div class="allComment fl">
                                <p>大家都在说</p>
                                <ul class="eachCommentUl cf">
                                    <li class="subEachComment active">全部（<span>123</span>）</li>
                                    <li class="subEachComment">有图（<span>12</span>）</li>
                                    <li class="subEachComment">送人合适（<span>12</span>）</li>
                                    <li class="subEachComment">送人合适（<span>12</span>）</li>
                                    <li class="subEachComment">包装上心（<span>123</span>）</li>
                                    <li class="subEachComment">宝贝不错（<span>123</span>）</li>
                                    <li class="subEachComment">送人合适（<span>123</span>）</li>
                                    <li class="subEachComment">包装上心（<span>123</span>）</li>
                                    <li class="subEachComment">宝贝不错（<span>123</span>）</li>
                                </ul>
                            </div>
                        </div>
                        <div class="allCommentBox cf">
                            <div class="subCommentBox fl cf copy" data-num="5">
                                <div class="headBox fl">
                                    <?= Html::img("{$url}/Image/goodsDetail/headImg.png",["class"=>"headImg","alt"=>""]); ?>
                                    <p class="headName ofh">香**菜香**菜</p>
                                </div>
                                <div class="commentCon fl cf">
                                    <i class="starBox"><em style="width: 90%;"></em></i>
                                    <p class="spec">规格：四叶草套链</p>
                                    <div class="commentWhat cf">
                                        <p>包装好看的都不忍心拆，虽然是自留但是觉得很适合送人啊！！外盒和里盒都有小菠萝的图案，太可爱了</p>
                                        <?= Html::img($data['image_url1'],["class"=>"commentImg fl","alt"=>""]); ?>
                                        <?= Html::img($data['image_url2'],["class"=>"commentImg fl","alt"=>""]); ?>
                                        <?= Html::img($data['image_url3'],["class"=>"commentImg fl","alt"=>""]); ?>
                                        <?= Html::img($data['image_url4'],["class"=>"commentImg fl","alt"=>""]); ?>
                                    </div>
                                    <p class="commentTime">2018-04-12 13:25</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detailRight fl cf">
                <div class="tit fl">24小时热销榜</div>
                <div class="con fl">
                    <ul class="cf">
                        <?php foreach ($is_hot as $key1=>$list):?>
                            <li class="fl subGoodsBox copy">
                                <?= Html::img($list['image_url1'],["class"=>"goodsBoxImg","alt"=>"",'onclick'=>"location.href='?r=home/index/goodsdetail&id={$list['goods_id']}&type=".navDataEx($list['mzsm_cat_id'])."' "]); ?>
                                <p class="goodsBoxName ofh"><?=$list['goods_name']?></p>
                                <p class="goodsBoxPrice">￥<span><?=$list['shop_price']?></span></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
<?= Html::jsFile("{$url}/Js/goodsDetail/index.js"); ?>
<?= Html::jsFile("{$url}/Js/common/js_cookie.js"); ?>
<?= Html::jsFile("{$url}/Js/layer/layer.js"); ?>
<script>
$(function () {
    $("#shopping").click(function () {
        var user = '<?=$_COOKIE['username']?>';
        var id = <?=$_GET['id']?>;
        if(user == ""){
            alert('您还没有登录，请先登录');
            window.location.href='?r=home/login/login';
        }else{
            if($("#colorBox p").hasClass("active")){
                var number = $("#number").val();
                window.location.href='?r=home/shop_cart/order&type=index&id='+id+"&action=shopping&image_url1=<?=$data['image_url1']?>&goods_name=<?=$data['goods_name']?>&keywords=<?=$data['keywords']?>&shop_price=<?=$data['shop_price']?>&number="+number;
            }else{
                alert("请选择颜色。");
            }

        }
    });
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
            alert('您还没有登录，请先登录');
            window.location.href='?r=home/login/login';
        }else{
            if($("#colorBox p").hasClass("active")){
                var cartid = parseInt($("#shop_cart_span").html())+1;
                $("#shop_cart_span").html(cartid);
                $.get("?r=home/shop_cart/cart",{u:user,d:JSON.stringify(cartmsg)},function (msg) {
                    layer.alert('加入购物车成功', {icon: 6});
                },"text");
            }else{
                alert("请选择规格和颜色。");
            }

        }
    });
    $("#mycollection").click(function () {

       var tag = $(this).attr("name");
       var user = '<?=$_COOKIE['username']?>';
       var id = <?=$_GET['id']?>;

       if(tag == 'click2'){
           if(user == ""){
               alert('您还没有登录，请先登录');
               window.location.href='?r=home/login/login';
           }else{
               $.get("?r=home/index/mycollection",{u:user,id:id,t:tag},function (msg) {
                   if(msg.code == 0){
                       $("#mycollection").css({color: "#F8981D",border: "1px solid #F8981D"});
                       $("#mycollection").find("i").attr("style","background: url('<?=$url?>/Image/common/fav/fav_org.png' ) no-repeat center center");
                       $("#mycollection").attr("name",'click1');
                   }
               },"json");
           }
       }else{
           $.get("?r=home/index/mycollection",{u:user,id:id,t:tag},function (msg) {
               if(msg.code == 0) {
                   $("#mycollection").css({color: "#999", border: "1px solid #CCC"});
                   $("#mycollection").find("i").attr("style", "background: url('<?=$url?>/Image/common/fav/fav_grey.png' ) no-repeat center center");
                   $("#mycollection").attr("name", 'click2');
               }
           },"json");
       }
   });
   //规格
    var jsonapi1 =  '<?=$spec?>' ;
    var jsonapi = eval("["+jsonapi1.slice(1,-1)+"]");
    //var jsonapi = [{"【黄金现货】四叶草套链约1.5g":["橙色"]},{"【黄金现货】四叶草套链约1.8g":["黄色","彩色","绿色","绿色","绿色","绿色"]},{"【黄金现货】四叶草套链约2.1g":["橙色","靛色","绿色","绿色","绿色"]}];
    for(var d in jsonapi){
        var dataobj = jsonapi[d];
        for(var s in dataobj){
            var str1 = '';
            var str2 = '';
            var dataobjs = dataobj[s];
            var index=d;
            if(index == 0){
                str1 = '<p class="subSpec fl specBtn active" data-num='+ index +'>'+ s +'</p>';
                str2 = "<div class='spec_"+index+"' style='display:block;'>";
            }else{
                str1 = '<p class="subSpec fl specBtn" data-num='+ index +'>'+ s +'</p>';
                str2 = "<div class='spec_"+index+"' style='display:none;'>";
            }
            for(var k in dataobjs){
                str2 += '<p class="subSpec fl specVal " data-val='+ index +'>'+ dataobjs[k] +'</p>';
            }
            str2 += "</div>";
            $('#colorBox').append(str2);
            $('#specBox').append(str1);
        }
    }
    //spec点击切换
    $(".specBtn").click(function () {
        var index = $(this).index();
        $("div[class=spec_"+index+"]").css("display","block").siblings().css("display","none");
    });

    //var listdata = {"goods_name":"童装男童潮流时尚嘻哈范","warranty_period":"24个月","brands":"Philips/飞利浦","model":"AC6","manufacturer":"飞利浦（中国）投资有限公司","item_number":"AC6608","main_material":"白金","features":"定时 除花粉 除甲醛 除烟除尘",'自定义属性':"自定义内容"}
    var listdata1 = '<?=$attr?>' ;
    var listdata = JSON.parse(listdata1);

    var jsonName = '';
    for(var s in listdata){
        switch(s)
        {
            case "goods_name": jsonName = "产品名称"; break;
            case "warranty_period":jsonName = "保修期";break;
            case "brands":jsonName = "品牌";break;
            case "model":jsonName = "型号";break;
            case "manufacturer":jsonName = "生产企业";break;
            case "item_number":jsonName = "货号";break;
            case "main_material":jsonName = "主要材质";break;
            case "features":jsonName = "功能";break;
            default:jsonName = s;break;
        }
        var str1 = '';
        str1 = '<li class="fl"><span>'+ jsonName +'：</span><span>'+ listdata[s] +'</span></li>';

        $('.parameterUl').append(str1);
    }
});
</script>    
