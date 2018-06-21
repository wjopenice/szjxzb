<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "订单";
$this->keywords = "订单";
$this->description = "订单";
$total = 0;
if(!empty($arrDataAddr) && !empty($arrDataDef)){
    $hide = ["hide","hide","show"];
}else if(!empty($arrDataAddr) && empty($arrDataDef)){
    $hide = ["hide","show","hide"];
}else{
    $hide = ["show","hide","hide"];
}
?>
<?= Html::cssFile("{$url}/Css/order/index.css"); ?>
<div class="container">
    <!--   收货信息填写    -->
    <div id="receiveInfo" data-type="receiveInfo" class="receiveInfo <?=$hide[0]?>">
        <div class="tit"><span>收货信息</span></div>
        <div class="con cf">
            <form action="?r=home/shop_cart/addressedit&chcktype=2" method="post">
                <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                <div class="receiveForm cf fl">
                    <div class="subForm cf fl">
                        <div class="formName fl">所在地区 ：</div>
                        <div class="subFormCon fl cf">

                            <select class="provinceBox fl" id="province" name="addr_p" onchange="sendData(this.value,'province')">
                                <?php foreach ($arrData as $key=>$value): ?>
                                    <option value="<?=$value['provinceID']?>"><?= $value['province'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="cityBox fl" id="city" name="addr_c" onchange="sendData(this.value,'city')"></select>
                            <select class="districtBox fl" id="area" name="addr_a" onchange="sendData(this.value,'area')"></select>
                            <input type="hidden" id="cityaddr" name="cityaddr" value="" />
                        </div>
                    </div>
                    <div class="subForm cf fl">
                        <div class="formName fl">详细地址 ：</div>
                        <div class="subFormCon fl">
                            <textarea class="detailAddress" name="address" placeholder="详细地址、街道、门牌号等" id="address"></textarea>
                        </div>
                    </div>
                    <div class="subForm cf fl">
                        <div class="formName fl">收货人 ：</div>
                        <div class="subFormCon fl">
                            <input class="receiver" type="text" name="username" id="username" value="">
                        </div>
                    </div>
                    <div class="subForm cf fl">
                        <div class="formName fl">手机号码 ：</div>
                        <div class="subFormCon fl">
                            <input class="phoneNum" type="text" id="tell" name="tell" value="">
                        </div>
                    </div>
                </div>
                <div class="setDefault fl cf">
                    <div class="setBox fl cf">
                        <input type="hidden" name="type" id="activeDefaultIconX" value=""   />
                        <input type="checkbox" class="check fl" id="activeDefaultIcon"    />
                        <p class="fl">设置为默认地址</p>
                    </div>
                    <input type="hidden" name="id" id="editid" value="" />
                    <input id="savebtn" type="submit" formaction="" class="saveBtn fl" name="btn" value="保存" style="border: 0;" />
                    <a class="cancelBtn fl" href="javascript:void(0)" onclick="address_cancel()">取消</a>
                </div>
            </form>
        </div>
    </div>
    <!--   管理收货地址    -->
    <div id="manageReceiveBox" data-type="manageReceiveBox" class="cf manageReceiveBox <?=$hide[1]?>">
        <ul class="receiverUl cf">
            <?php foreach ($arrDataAddr as $dk=>$dv): ?>
            <li class="subReceiver fl copy"  data-urlid="<?=$dv['id']?>" onclick="address_default(this.dataset.urlid)">
                <div class="receiverInfo">
                    <p class="cf"><span class="fl"><?=$dv['username']?></span><span class="fr"><?=$dv['tell']?></span></p>
                    <p class="receiverAddress ofh" title="<?=$dv['cityaddr']?>"><?=$dv['cityaddr']?></p>
                </div>
                <div class="receiverOp">
                    <p class="fl cf defaultBox">
                       <!-- <i class="check fl" data-urlid="<?/*=$dv['id']*/?>" onclick="address_default(this.dataset.urlid)"></i><span class="fl" >默认地址</span>-->
                        <a class="editReceiver fr cf editAddressBtn" href="javascript:void(0)" data-urlid="<?=$dv['id']?>"><i></i>编辑</a>
                    </p>
                    <p class="fr cf">
                        <a class="delReceiver fr cf" href="javascript:void(0)" data-urlid="<?=$dv['id']?>"><i></i>删除</a>
                    </p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <a class="btnAddAddress fl" href="javascript:void(0)" onclick="address_add(this.parentNode.dataset.type)">+增加地址</a>
        <a class="btnAddButton fr" href="?r=user/uc/addressmanagement&type=addressmanagement" onclick="">去地址管理中心</a>
    </div>
    <!--   收货信息增修    -->
    <div id="receiveBox" data-type="receiveBox"  class="receiveBox <?=$hide[2]?>">
        <div class="tit"><span>收货信息</span></div>
        <div class="con">
            <div class="addressUpdateBox cf">
                <p class="fl cf">
                    <i class="addressIcon fl"></i>
                </p>
                <a class="fr btnChangeAddress" href="javascript:void(0)" onclick="address_switch()">地址切换</a>
            </div>
            <p class="subRInfo"><span class="receiptInfo">收货人：</span><span class="receiptNum"><?=$arrDataDef['username']?></span></p>
            <p class="subRInfo"><span class="subContInfo">联系方式：</span><span class="subContNum"><?=$arrDataDef['tell']?></span></p>
            <p class="subRInfo"><span class="addressInfo">收货地址：</span><span class="addressNum"><?=$arrDataDef['cityaddr']?></span></p>
        </div>
    </div>

    <!--   商品信息    -->
    <div class="goodsInfoBoxWrap">
        <table>
            <thead>
            <tr>
                <td class="goodsInfoName">商品信息</td>
                <td class="unitPrice">单价</td>
                <td class="goodsNum">数量</td>
                <td class="subGoodsTotal">小计</td>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($cartData as $ck=>$cv): ?>
            <input class="goodid" type="hidden" name="goodsid" value="<?=$cv['goodid']?>">
            <tr>
                <td class="goodsInfoDiv cf">
                    <img class="fl" src="<?=$cv['goodurl']?>" alt="">
                    <p class="fl name"><?=$cv['goodname']?></p>
                    <p class="fl instr"><?=$cv['keywords']?></p>
                </td>
                <td class="unitPrice">￥<span class="unitPrice1"><?=$cv['goodprice']?></span></td>
                <td class="goodsNum goodsIndex"><?=$cv['goodnum']?></td>
                <td class="subGoodsTotal GoodsMoneyTotal">￥<span class="GoodsMoneyTotal1"><?=$cv['goodprice']*$cv['goodnum']?></span></td>
            </tr>
            <?php
                $total += $cv['goodprice']*$cv['goodnum'];
            endforeach; ?>
            </tbody>
        </table>
<!--        <div class="countTotal cf">-->
<!--            <p class="fr">商品合计：￥15000.00</p>-->
<!--        </div>-->
<!--        <div class="countTotal cf">-->
<!--            <p class="fl couponTit">使用优惠券（1张）</p>-->
<!--            <p class="fr couponMoneyBox">- ￥<span>500.00</span></p>-->
<!--        </div>-->
        <div class="payBox cf">
            <div class="inner fr cf">
                <a class="fr btnPay" href="javascript:;">付款</a>
                <div class="payFinallyBox fr">
                    <p>运费：￥<span>0.00</span></p>
                    <p>应付总额：<span class="shouldPayBox">￥<span class="shouldPayBox1"><?=$total?></span></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
<?= Html::jsFile("{$url}/Js/order/index.js"); ?>
<?= Html::jsFile("{$url}/Js/common/js_cookie.js"); ?>
<?= Html::jsFile("{$url}/Js/layer/layer.js"); ?>
<script>
    var typeX;

    $(".editAddressBtn").unbind("click").bind("click",function(e){
        address_edit($(this).data("urlid"),$(this).parents("#manageReceiveBox").data("type"));
        e.stopPropagation();
    });

    $(".delReceiver").unbind("click").bind("click",function(e){
        var uid = $(this).data("urlid");
        var that = $(this);
        $.get("?r=home/shop_cart/addrdel",{id:uid},function (msg) {
            that.parent().parent().parent().remove();
        },"text");
        e.stopPropagation();
    });

    var sendData = function (d,t) {
        $.post("?r=user/uc/ajax_urban_linkage",{data:d,type:t,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
            if(t == 'province'){
                $("#city").empty();
                $("#area").empty();
                $("#cityaddr").val("");
                $("#address").val("");
                $("<option value=''>请选择</option>").appendTo($('#city'));
                for(var i = 0;i < msg.length; i++){
                    $("<option value='"+msg[i].cityID+"'>"+msg[i].city+"</option>").appendTo($('#city'));
                }
            }else if(t == 'city'){
                $("#area").empty();
                $("#cityaddr").val("");
                $("#address").val("");
                $("<option value=''>请选择</option>").appendTo($('#area'));
                for(var i = 0;i < msg.length; i++){
                    $("<option value='"+msg[i].areaID+"'>"+msg[i].area+"</option>").appendTo($('#area'));
                }
            }else{
                $("#cityaddr").val("");
                $("#address").val("");
                var cityaddr = decodeURI(getCookie("address"));
                $("#cityaddr").val(cityaddr);
            }
        },"json");
    };
    var address_switch = function () {
        $("#receiveInfo").hide();
        $("#manageReceiveBox").show();
        $("#receiveBox").hide();
    };
    function address_add(type) {
        $("#receiveInfo").show();
        $("#manageReceiveBox").hide();
        $("#receiveBox").hide();
        typeX = type;
        $("#savebtn").attr("formaction","?r=home/shop_cart/addressedit&chcktype=1");
        $("#province option[value='110000']").attr("selected","selected");
        $("#city").empty();
        $("#area").empty();
        $("#address").val("");
        $("#username").val(getCookie("username"));
        $("#tell").val("");
        $("#editid").val(null);
        $("#activeDefaultIcon").attr("class","check fl");
        $("#activeDefaultIconX").val(2);
    };
    function address_edit(id,type,event) {

        $("#receiveInfo").show();
        $("#manageReceiveBox").hide();
        $("#receiveBox").hide();
        typeX = type;
        $.get("?r=user/uc/addressedit&type=1",{id:id},function (msg){
            var province2 = msg.province;
            var city2 = msg.city;
            var area2 = msg.area;
            var address = msg.address;
            var id = msg.id;
            var usernmae = msg.username;
            var tell = msg.tell;
            var type = msg.type;
            $("#savebtn").attr("formaction","?r=home/shop_cart/addressedit&chcktype=2");
            $("#province option[value='"+msg.addr_p+"']").attr("selected","selected");
            $("<option value='"+msg.addr_c+"'>"+city2+"</option>").appendTo($("#city"));
            $("<option value='"+msg.addr_a+"'>"+area2+"</option>").appendTo($("#area"));
            $("#address").val(address);
            $("#username").val(usernmae);
            $("#tell").val(tell);
            $("#editid").val(id);
            if(type == 1){
                $("#activeDefaultIcon").attr("class","check fl active");
                $("#activeDefaultIconX").val(1);
            }else{
                $("#activeDefaultIcon").attr("class","check fl");
                $("#activeDefaultIconX").val(2);
            }
        },"json");
    }
    function address_cancel() {
        if(typeX == "manageReceiveBox"){
            $("#receiveInfo").hide();
            $("#receiveBox").hide();
            $("#manageReceiveBox").show();
        }else if(typeX == "receiveBox"){
            $("#receiveInfo").hide();
            $("#manageReceiveBox").hide();
            $("#receiveBox").show();
        }else{
            $("#receiveInfo").show();
            $("#manageReceiveBox").hide();
            $("#receiveBox").hide();
        }
    }
    var address_default = function (uid) {
        $.get("?r=home/shop_cart/editdefaultaddr",{id:uid},function (msg) {
            window.location.href = window.location;
        },"text");
    };
    //设置默认
    $(document).on("click",'.check',function(){
        if($(this).hasClass('active')){
            $("#activeDefaultIconX").val("2");
        }else{
            $("#activeDefaultIconX").val("1");
        }
    });
    //点击付款下一步判断
    $(document).on("click",".btnPay",function(){
        //判断地址是否选中
        if ($(".receiveBox").hasClass("show")){
            //判断商品数量
            var jsonObj = {};
            jsonObj['order'] = [];
            for(var i=0;i<$(".name").length;i++){
                jsonObj['order'][i] = {
                    goodid : $(".goodid").eq(i).val(),
                    name : $(".name").eq(i).text(),
                    unitPrice : $(".unitPrice1").eq(i).text(),
                    goodsNum : $(".goodsIndex").eq(i).text(),
                    subGoodsTotal : $(".GoodsMoneyTotal1").eq(i).text()
                };
            }
            var addressNum = encodeURI($(".addressNum").text());
            jsonObj['shouldPayBox'] = $(".shouldPayBox1").text();
            jsonObj['consignee'] = $(".receiptNum").text();
            jsonObj['mobile'] = $(".subContNum").text();
            jsonObj['address'] = addressNum;
            var jsonx = JSON.stringify(jsonObj);
            $.get("?r=home/shop_cart/pay",{payData:jsonx,actionX:'<?=$_GET['action']?>'},function (msg) {
                if(msg.code == 1){
                    window.location.href = "?r=home/shop_cart/paydata&order_sn="+msg.order_sn;
                }else{
                    layer.alert('下单失败', {icon: 6});
                }
            },"json");
        }else {
            alert("请选择收货地址！");
        }




    });
</script>
