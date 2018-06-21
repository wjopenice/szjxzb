<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "购物车";
$this->keywords = "购物车";
$this->description = "购物车";
?>
<?= Html::cssFile("{$url}/Css/shopCart/index.css"); ?>
<div class="container">
    <!--  购物车为空   -->
    <div class="noCart hide">
        <div class="inner">
            <i class="noCartIcon"></i>
            <p class="noCartInfo">购物车空空如也</p>
            <a class="noCartBtn" href="javascript:void(0)">快来选购吧</a>
        </div>
    </div>
    <!--  购物车不为空   -->
    <div class="cartCon">
        <div class="cartOperation cf">
            <div class="checkDiv"><i class="check active"></i><span class="fl">全选</span></div>
            <div class="goodsInfoDiv">商品信息</div>
            <div class="unitPriceDiv">单价</div>
            <div class="numDiv">数量</div>
            <div class="totalDiv">小计</div>
            <div class="operateDiv">操作</div>
        </div>

        <div class="cartInfoBox">
            <?php foreach ($cartData as $key=>$value):?>
            <div class="subCart cf" data-isExpire="1">
                <input type="hidden" class="goodId" name="goodid" value="<?=$value['goodid']?>">
                <div class="checkDiv"><i class="check1 check active"></i></div>
                <div class="goodsInfoDiv cf">
                    <?= Html::img($value['goodurl'],["class"=>"fl goodurl","alt"=>""]); ?>
                    <p class="fl name"><?=$value['goodname']?></p>
                    <p class="fl instr"><?=$value['keywords']?></p>
                </div>
                <div class="unitPriceDiv">￥<span class="unitPriceMoney"><?=$value['goodprice']?></span></div>
                <div class="numDiv">
                    <div class="cart_num cf">
                        <div class="cart_min"></div>
                        <input class="cart_text_box" type="number" value="<?=$value['goodnum']?>" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}">
                        <div class="cart_add"></div>
                    </div>
                </div>
                <div class="totalDiv">￥<span class="eachTotalMoney"><?=$value['goodprice']*$value['goodnum']?></span></div>
                <div class="operateDiv cf">
                    <a class="addFavBtn" href="javascript:void(0)">移入收藏夹</a>
                    <a class="delBtn" href="?r=home/shop_cart/del&goodid=<?=$value['goodid']?>">删除</a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>



        <div class="cartOrder cf">
            <div class="fl cf operationBox"><i class="check active fl"></i><span class="fl">已选（<span class="choseNum">0</span>）</span></div>
            <a class="fl batchDel" href="javascript:void(0)">批量删除</a>
            <a class="fl clearGoods" href="javascript:void(0)">清空时效商品</a>
            <a class="fr orderBtn" href="javascript:;">下单</a>
            <p class="fr shouldPay hide">应付总额：<span class="col_red">￥<span class="factPayMoney"></span></span></p>
            <p class="fr couponPay hide">
                优惠券：
                <select name="" id="">
                    <option value=""></option>
                </select>
                <span class="col_red">￥<span class="couponPayMoney">0</span></span>
            </p>
            <p class="fr lastPay">商品合计：￥<span class="moneyTotal"></span></p>
        </div>
    </div>
    <!--  猜你喜欢  -->
    <div class="lovelyBox">
        <div class="tit">猜你喜欢</div>
        <div class="lovelyGoods slide-box">
            <ul class="slide-content cf">

                <?php foreach ($click_count as $key=>$list):?>
                    <li class="fl subGoodsBox copy">
                        <div class="goodsBoxImgWrap">
                        <?= Html::img($list['image_url1'],["class"=>"goodsBoxImg","alt"=>$list['goods_name'],'onclick'=>"location.href='?r=home/index/goodsdetail&id={$list['goods_id']}&type=".navDataEx($list['mzsm_cat_id'])."' "]); ?>
                        </div>
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
</div>

<script>
    $(document).on("click",".orderBtn",function(){
        if($(".subCart").length > 0){
            var jsonObj = {};
            $.each($(".subCart .check1.active").parents(".subCart"),function(j,obj){
                jsonObj[j] = {
                    goodid : $(obj).find(".goodId").val(),
                    goodurl : $(obj).find(".goodurl").attr("src"),
                    goodname: $(obj).find(".name").text(),
                    keywords: $(obj).find(".instr").text(),
                    goodprice : $(obj).find(".unitPriceMoney").text(),
                    goodnum : $(obj).find(".cart_text_box").val()
                };
            });
            var jsonstr = JSON.stringify(jsonObj);
            window.location.href = '?r=home/shop_cart/order&type=index&action=cart&cartDataX='+jsonstr;
        }else{
            alert("请选择购买商品！")
        }

    });


</script>
<?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
<?= Html::jsFile("{$url}/Js/shopCart/index.js"); ?>

