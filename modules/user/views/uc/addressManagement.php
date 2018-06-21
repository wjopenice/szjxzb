<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "地址管理";
$this->keywords = "地址管理";
$this->description = "地址管理";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/addressManagement.css"); ?>
    <div class="container">
        <!-- 面包屑 -->
        <div class="crumbs">
            <span>首页</span> &gt; <span class="secondLevel">个人中心</span>
        </div>

        <!-- content -->
        <div class="content cf">
            <!-- 左侧边导航 -->
            <?=$this->render('../layouts/uc_left_nav.php')?>

            <!-- 右侧内容 -->
            <div class="rightContent fl">
                <div class="addressTitle cf">
                    <span class="fl">已保存收货地址</span>
                    <a class="addBtn fr" href="javascript:;">+新建地址</a>
                </div>
                <div class="addressContent">
                    <div class="addressContentTitle cf">
                        <span class="fl consignee">收货人</span>
                        <span class="fl receivingAddress">地址</span>
                        <span class="fl contact">联系方式</span>
                        <span class="fl operation">操作</span>
                    </div>
                    <ul class="addressUl">
                        <?php foreach ($arrDataAddr as $key=>$value):?>
                        <li class="cf">
                            <p class="fl consignee"><?=$value['username']?></p>
                            <p class="fl receivingAddress"><?=$value['cityaddr']?></p>
                            <p class="fl contact tel"><?=$value['tell']?></p>
                            <p class="fl operation">
                                <a class="editBtn" id="editBtn" href="javascript:void(0);" url="<?=$value['id']?>">编辑</a>
                                <a class="delBtn" href="javascript:void(0);" url="<?=$value['id']?>">删除</a>
                            </p>
                            <?php if($value['type'] == "1"):?>
                                <p class="fl default"><span class="set defaultAddress" url="<?=$value['id']?>">默认地址</span></p>
                            <?php else: ?>
                                <p class="fl default"><span class="set" url="<?=$value['id']?>">设为默认地址</span></p>
                            <?php endif;?>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- 新建地址 -->
    <div class="getCouponAlert hide">
        <form action="?r=user/uc/addressmanagement&type=addressmanagement" method="post">
            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
            <div class="alertTitle cf"><span class="fl">新建地址</span><i class="closeBtn close fr"></i></div>
            <div class="subForm cf">
                <div class="formName fl"><span class="star">*</span>所在地区 ：</div>
                <div class="subFormCon fl cf">
                    <select class="provinceBox fl" id="province" name="addr_p" onchange="sendData(this.value,'province')">
                        <option value="">请选择</option>
                        <?php foreach ($arrData as $key=>$value): ?>
                        <option value="<?=$value['provinceID']?>"><?= $value['province'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select class="cityBox fl" id="city" name="addr_c" onchange="sendData(this.value,'city')"></select>
                    <select class="districtBox fl" id="area" name="addr_a" onchange="sendData(this.value,'area')"></select>
                </div>
                <input type="hidden" id="cityaddr" name="cityaddr" value="" />
            </div>
            <div class="subForm cf">
                <div class="formName fl"><span class="star">*</span>详细地址 ：</div>
                <div class="subFormCon fl">
                    <textarea class="detailAddress" name="address" placeholder="详细地址、街道、门牌号等" id="address"></textarea>
                </div>
            </div>



            <div class="receivingTelephone cf">
                <div class="receiving cf fl">
                    <div class="formName fl"><span class="star">*</span>收货人 ：</div>
                    <div class="subFormCon fl">
                        <input class="receiver" type="text" name="username" />
                    </div>
                </div>
                <div class="cf fl">
                    <div class="formName fl"><span class="star">*</span>手机号码 ：</div>
                    <div class="subFormCon fl">
                        <input class="phoneNum"  type="text" name="tell" />
                    </div>
                </div>
            </div>
            <div class="sureBtn subForm cf">
                <div class="cf fl">
                    <div class="formName fl"></div>
                    <div class="activeDefault fl">
                        <input type="checkbox" name="type" value="2" class="activeDefaultIcon" />
                        <span class="defaultText">设为默认</span>
                    </div>
                </div>
                <div class="btn fl">
                    <input type="submit" name="btn" class="sure" value="确定" />
                    <input type="button" name="btn" class="cancel close" value="取消" />
                </div>
            </div>
        </form>
    </div>

    <!-- 修改地址 -->
    <div class="getEditAlert hide">
        <form action="?r=user/uc/addressedit&type=2" method="post">
            <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
            <div class="alertTitle cf"><span class="fl">修改地址</span></div>
            <div class="subForm cf">
                <div class="formName fl"><span class="star">*</span>所在地区 ：</div>
                <div class="subFormCon fl cf">
                    <select class="provinceBox fl" id="province2" name="addr_p" onchange="sendData2(this.value,'province')">
                        <?php foreach ($arrData as $key=>$value): ?>
                            <option value="<?=$value['provinceID']?>"><?= $value['province'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select class="cityBox fl" id="city2" name="addr_c" onchange="sendData2(this.value,'city')"></select>
                    <select class="districtBox fl" id="area2" name="addr_a" onchange="sendData2(this.value,'area')"></select>
                </div>
                <input type="hidden" id="cityaddr2" name="cityaddr" value="" />
            </div>
            <div class="subForm cf">
                <div class="formName fl"><span class="star">*</span>详细地址 ：</div>
                <div class="subFormCon fl">
                    <textarea class="detailAddress" name="address" placeholder="详细地址、街道、门牌号等" id="address2"></textarea>
                </div>
            </div>

            <div class="receivingTelephone cf">
                <div class="receiving cf fl">
                    <div class="formName fl"><span class="star">*</span>收货人 ：</div>
                    <div class="subFormCon fl">
                        <input class="receiver" type="text" name="username" id="username" />
                    </div>
                </div>
                <div class="cf fl">
                    <div class="formName fl"><span class="star">*</span>手机号码 ：</div>
                    <div class="subFormCon fl">
                        <input class="phoneNum"  type="text" name="tell" id="tell" />
                    </div>
                </div>
            </div>
            <div class="sureBtn subForm cf">
                <div class="cf fl">
                    <div class="formName fl"></div>
                    <div class="activeDefault fl">
                        <input type="checkbox" name="type" value="2" class="activeDefaultIcon" id="activeDefaultIcon"  />
                        <span class="defaultText">设为默认</span>
                    </div>
                </div>
                <div class="btn fl">
                    <input type="hidden" name="editid" id="editid" value="" />
                    <input type="submit" name="btn" class="sure" value="确定" />
                    <input type="button" name="btn" class="cancel close" value="取消" />
                </div>
            </div>
        </form>
    </div>

    <!-- 删除地址 -->
    <div class="getDelAlert hide">
        <div class="alertTitle cf"><span class="fl">要删除此地址吗？</span><i class="closeBtn close fr"></i></div>

        <div class="delDetail" id="delDetail">
            <p><span class="delName dib">收件人：</span><span class="delText">中宝小帅</span></p>
            <p><span class="delName dib">联系电话：</span><span class="delText tel">17688830262</span></p>
            <p><span class="delName dib">收件地址：</span><span class="delText">广东省深圳市罗湖区水田二街3号宝琳国金大厦4楼D区</span></p>
        </div>

        <div class="sureBtn subFormDelBtn subForm" id="subFormDelBtn">
            <a class="sure" href="?&type=2">确定</a>
            <a class="cancel close" href="javascript:;">取消</a>
        </div>
    </div>
    <script>

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
        }
        var sendData2 = function (d,t) {

            $.post("?r=user/uc/ajax_urban_linkage",{data:d,type:t,_csrf:"<?= Yii::$app->request->csrfToken ?>"},function (msg) {
                if(t == 'province'){
                    $("#city2").empty();
                    $("#area2").empty();
                    $("#cityaddr2").val("");
                    $("#address2").val("");
                    $("<option value=''>请选择</option>").appendTo($('#city'));
                    for(var i = 0;i < msg.length; i++){
                        $("<option value='"+msg[i].cityID+"'>"+msg[i].city+"</option>").appendTo($('#city2'));
                    }
                }else if(t == 'city'){
                    $("#area2").empty();
                    $("#cityaddr2").val("");
                    $("#address2").val("");
                    $("<option value=''>请选择</option>").appendTo($('#area'));
                    for(var i = 0;i < msg.length; i++){
                        $("<option value='"+msg[i].areaID+"'>"+msg[i].area+"</option>").appendTo($('#area2'));
                    }
                }else{
                    $("#cityaddr2").val("");
                    $("#address2").val("");
                    var cityaddr = decodeURI(getCookie("address"));
                    $("#cityaddr2").val(cityaddr);
                }
            },"json");
        }

        $(function () {

            $(".set").click(function () {
                $(".set").text("设为默认地址").removeClass("defaultAddress");
                $(this).text("默认地址").addClass("defaultAddress");
                var id = $(this).attr("url");
                $.get("?r=user/uc/defaultaddress",{id:id},function (msg) {},"json");
            });

            $("#editBtn").click(function () {
                $.get("?r=user/uc/addressedit&type=1",{id:$(this).attr("url")},function (msg){
                    var province2 = msg.province;
                    var city2 = msg.city;
                    var area2 = msg.area;
                    var address = msg.address;
                    var id = msg.id;
                    var usernmae = msg.username;
                    var tell = msg.tell;
                    var type = msg.type;
                    $("#province2 option[value='"+msg.addr_p+"']").attr("selected","selected");
                    $("<option value='"+msg.addr_c+"'>"+city2+"</option>").appendTo($("#city2"));
                    $("<option value='"+msg.addr_a+"'>"+area2+"</option>").appendTo($("#area2"));
                    $("#address2").val(address);
                    $("#username").val(usernmae);
                    $("#tell").val(tell);
                    $("#editid").val(id);
                    if(type == 1){
                        $("#activeDefaultIcon").attr("class","activeDefaultIcon activeIcon");
                    }else{
                        $("#activeDefaultIcon").attr("class","activeDefaultIcon");
                    }
                },"json");
            });
        });
    </script>
<?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
<?= Html::jsFile("{$url}/Js/personalCenter/addressManagement.js"); ?>
<?= Html::jsFile("{$url}/Js/common/js_cookie.js")?>
