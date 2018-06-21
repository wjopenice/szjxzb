<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "售后记录";
$this->keywords = "售后记录";
$this->description = "售后记录";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/record.css"); ?>

    <div class="container">
        <!-- 面包屑 -->
        <div class="crumbs cf">
            <div class="fl"><span>首页</span> &gt; <span class="secondLevel">个人中心</span></div>
            <div class="orderSearch fr"><input class="orderInput" placeholder="请输入订单号" type="text"><i class="searchBtn dib"></i></div>
        </div>

        <!-- content -->
        <div class="content cf">
            <!-- 左侧边导航 -->
            <?=$this->render('../layouts/uc_left_nav.php')?>

            <!-- 右侧内容 -->
            <div class="rightContent fl">
                <div class="recordTap cf">
                    <span class="recordTapLi fl on">退货</span>
                    <span class="recordTapLi fl">全部</span>
                    <span class="recordTapLi fl">换货</span>
                </div>

                <!-- 售后记录商品列表 -->
                <div class="recordList">

                    <!-- 退货 -->
                    <div class="recordListContent cur">
                        <div class="recordListTap">
                            <span class="shopName fl">宝贝</span>
                            <span class="shopMoney fl">退款金额</span>
                            <span class="shopDate fl">申请时间</span>
                            <span class="shopType fl">服务类型</span>
                            <span class="shopState fl">退款状态</span>
                            <span class="operation fl">操作</span>
                        </div>
                        <ul class="recordUl">
                            <li class="cf">
                                <div class="shopName cf fl">
                                    <img class="shopImg fl" src="" width="102" height="100" alt="">
                                    <div class="shopExplain fl">
                                        <p class="name">迪奥（Dior）</p>
                                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                                    </div>
                                </div>
                                <div class="shopMoney recordLiMoney fl">￥279</div>
                                <div class="shopDate recordLiDate fl">
                                    <p>2018-4-16</p>
                                    <p>15:46</p>
                                </div>
                                <div class="shopMoney recordLiType fl">退款退货</div>
                                <div class="shopDate recordLiState fl">
                                    <p>先垫付完成</p>
                                    <p class="recordLiSuccess">退款成功</p>
                                </div>
                                <div class="operation recordLiOperation fl"><a class="recordLiLook" href="javascript:;">查看详情</a></div>
                            </li>
                            <li class="cf">
                                <div class="shopName cf fl">
                                    <img class="shopImg fl" src="" width="102" height="100" alt="">
                                    <div class="shopExplain fl">
                                        <p class="name">迪奥（Dior）</p>
                                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                                    </div>
                                </div>
                                <div class="shopMoney recordLiMoney fl">￥279</div>
                                <div class="shopDate recordLiDate fl">
                                    <p>2018-4-16</p>
                                    <p>15:46</p>
                                </div>
                                <div class="shopMoney recordLiType fl">退款退货</div>
                                <div class="shopDate recordLiState fl">
                                    <p>先垫付完成</p>
                                    <p class="recordLiSuccess">退款成功</p>
                                </div>
                                <div class="operation recordLiOperation fl"><a class="recordLiLook" href="javascript:;">查看详情</a></div>
                            </li>
                            <li class="cf">
                                <div class="shopName cf fl">
                                    <img class="shopImg fl" src="" width="102" height="100" alt="">
                                    <div class="shopExplain fl">
                                        <p class="name">迪奥（Dior）</p>
                                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                                    </div>
                                </div>
                                <div class="shopMoney recordLiMoney fl">￥279</div>
                                <div class="shopDate recordLiDate fl">
                                    <p>2018-4-16</p>
                                    <p>15:46</p>
                                </div>
                                <div class="shopMoney recordLiType fl">退款退货</div>
                                <div class="shopDate recordLiState recordLiExamine fl">
                                    <p>审核中</p>
                                </div>
                                <div class="operation recordLiOperation fl"><a class="recordLiLook" href="javascript:;">查看详情</a></div>
                            </li>
                        </ul>
                        <div class="more">更多&gt;&gt;</div>
                    </div>

                    <!-- 全部 -->
                    <div class="recordListContent">
                        <div class="recordListTap">
                            <span class="shopName fl">宝贝</span>
                            <span class="shopMoney fl">退款金额</span>
                            <span class="shopDate fl">申请时间</span>
                            <span class="shopType fl">服务类型</span>
                            <span class="shopState fl">退款状态</span>
                            <span class="operation fl">操作</span>
                        </div>
                        <ul class="recordUl">
                            <li class="cf">
                                <div class="shopName cf fl">
                                    <img class="shopImg fl" src="" width="102" height="100" alt="">
                                    <div class="shopExplain fl">
                                        <p class="name">迪奥（Dior）</p>
                                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                                    </div>
                                </div>
                                <div class="shopMoney recordLiMoney fl">￥279</div>
                                <div class="shopDate recordLiDate fl">
                                    <p>2018-4-16</p>
                                    <p>15:46</p>
                                </div>
                                <div class="shopMoney recordLiType fl">退款退货</div>
                                <div class="shopDate recordLiState fl">
                                    <p>先垫付完成</p>
                                    <p class="recordLiSuccess">退款成功</p>
                                </div>
                                <div class="operation recordLiOperation fl"><a class="recordLiLook" href="javascript:;">查看详情</a></div>
                            </li>
                            <li class="cf">
                                <div class="shopName cf fl">
                                    <img class="shopImg fl" src="" width="102" height="100" alt="">
                                    <div class="shopExplain fl">
                                        <p class="name">迪奥（Dior）</p>
                                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                                    </div>
                                </div>
                                <div class="shopMoney recordLiMoney fl">￥279</div>
                                <div class="shopDate recordLiDate fl">
                                    <p>2018-4-16</p>
                                    <p>15:46</p>
                                </div>
                                <div class="shopMoney recordLiType fl">换货</div>
                                <div class="shopDate recordLiState fl">
                                    <p>先垫付完成</p>
                                    <p class="recordLiSuccess">换货完毕</p>
                                </div>
                                <div class="operation recordLiOperation fl"><a class="recordLiLook" href="javascript:;">查看详情</a></div>
                            </li>
                            <li class="cf">
                                <div class="shopName cf fl">
                                    <img class="shopImg fl" src="" width="102" height="100" alt="">
                                    <div class="shopExplain fl">
                                        <p class="name">迪奥（Dior）</p>
                                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                                    </div>
                                </div>
                                <div class="shopMoney recordLiMoney fl">￥279</div>
                                <div class="shopDate recordLiDate fl">
                                    <p>2018-4-16</p>
                                    <p>15:46</p>
                                </div>
                                <div class="shopMoney recordLiType fl">退款退货</div>
                                <div class="shopDate recordLiState recordLiExamine fl">
                                    <p>审核中</p>
                                </div>
                                <div class="operation recordLiOperation fl"><a class="recordLiLook" href="javascript:;">查看详情</a></div>
                            </li>
                        </ul>
                        <div class="more">更多&gt;&gt;</div>
                    </div>

                    <!-- 换货 -->
                    <div class="recordListContent">
                        <div class="recordListTap">
                            <span class="shopName fl">宝贝</span>
                            <span class="shopMoney fl">退款金额</span>
                            <span class="shopDate fl">申请时间</span>
                            <span class="shopType fl">服务类型</span>
                            <span class="shopState fl">退款状态</span>
                            <span class="operation fl">操作</span>
                        </div>
                        <ul class="recordUl">
                            <li class="cf">
                                <div class="shopName cf fl">
                                    <img class="shopImg fl" src="" width="102" height="100" alt="">
                                    <div class="shopExplain fl">
                                        <p class="name">迪奥（Dior）</p>
                                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                                    </div>
                                </div>
                                <div class="shopMoney recordLiMoney fl">￥279</div>
                                <div class="shopDate recordLiDate fl">
                                    <p>2018-4-16</p>
                                    <p>15:46</p>
                                </div>
                                <div class="shopMoney recordLiType fl">换货</div>
                                <div class="shopDate recordLiState fl">
                                    <p>先垫付完成</p>
                                    <p class="recordLiSuccess">换货完毕</p>
                                </div>
                                <div class="operation recordLiOperation fl"><a class="recordLiLook" href="javascript:;">查看详情</a></div>
                            </li>
                            <li class="cf">
                                <div class="shopName cf fl">
                                    <img class="shopImg fl" src="" width="102" height="100" alt="">
                                    <div class="shopExplain fl">
                                        <p class="name">迪奥（Dior）</p>
                                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                                    </div>
                                </div>
                                <div class="shopMoney recordLiMoney fl">￥279</div>
                                <div class="shopDate recordLiDate fl">
                                    <p>2018-4-16</p>
                                    <p>15:46</p>
                                </div>
                                <div class="shopMoney recordLiType fl">换货</div>
                                <div class="shopDate recordLiState recordLiExamine fl">
                                    <p>审核中</p>
                                </div>
                                <div class="operation recordLiOperation fl"><a class="recordLiLook" href="javascript:;">查看详情</a></div>
                            </li>
                        </ul>
                        <div class="more">更多&gt;&gt;</div>
                    </div>

                    <!-- 暂无商品 -->
                    <div class="notShop hide">
                        <i class="notShopIcon dib"></i>
                        <p class="notShopText">暂无相关订单记录</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- 查看详情弹窗 -->
    <div class="getCouponAlert hide">
        <div class="refundSpeed fl">
            <ul class="reSpeedBar cf">
                <li class="apply applyActive fl pr">
                    <i class="dib"></i>
                    <p>卖家申请换货</p>
                    <b></b>
                </li>
                <li class="handle fl pr">
                    <i class="dib"></i>
                    <p>卖家处理换货</p>
                    <b></b>
                </li>
                <li class="refundable fl pr">
                    <i class="dib"></i>
                    <p>买家换货</p>
                    <b></b>
                </li>
                <li class="complete fl pr">
                    <i class="dib"></i>
                    <p>换货完毕</p>
                    <b></b>
                </li>
            </ul>
            <div class="reSpeedText">
                <div class="reSpeedBox">换货审核成功</div>
                <div class="reSpeedBox cf"><span class="fl">换货原因：</span><span class="sellerText fl">型号拍错</span></div>
                <div class="reSpeedBox"><span>申请时间：</span><span>2018-4-18 16:24:11</span></div>
                <div class="reSpeedBox"><span>总金额：</span><span>￥270.00</span><span class="difference">（差价：￥0.00）无需垫付</span></div>
            </div>
            <!-- 换货 -->
            <div class="reSpeedPic cf hide">
                <div class="reSpeedPicName fl">
                    <img class="reSpeedPicImg" src="" width="102" height="100" alt="">
                    <div class="reSpeedPicExplain">
                        <p class="name">迪奥（Dior）</p>
                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                    </div>
                </div>
                <div class="exchangeIcon fl"><i class="dib"></i></div>
                <div class="reSpeedPicName fl">
                    <img class="reSpeedPicImg" src="" width="102" height="100" alt="">
                    <div class="reSpeedPicExplain">
                        <p class="name">迪奥（Dior）</p>
                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                    </div>
                </div>
            </div>
            <!-- 退款返回 -->
            <div class="reMoney">
                <span>退回中国银行</span>
                <span>尾号"***442612":￥297.00</span>
            </div>
        </div>
        <div class="refundDetail fl">
            <div class="refundDetailRight">退款详情</div>
            <div class="refundDetailList">
                <div class="shopName cf">
                    <img class="shopImg refundDetailImg fl" src="" width="102" height="100" alt="">
                    <div class="shopExplain reDelExplain fl">
                        <p class="name">迪奥（Dior）</p>
                        <p class="explain">魅惑润唇膏烈艳蓝金</p>
                        <p class="other"><span class="otherNum">999</span><span class="otherWeight">3.5g</span></p>
                    </div>
                </div>
                <div class="seller cf"><span class="fl">卖&emsp;&emsp;家：</span><span class="sellerText fl">手电桶</span></div>
                <div class="seller cf"><span class="fl">联系电话：</span><span class="sellerText fl">17688830262</span></div>
                <div class="seller cf"><span class="fl">订单编号：</span><span class="sellerText fl">11111111211211</span></div>
                <div class="seller cf"><span class="fl">成交时间：</span><span class="sellerText fl">2018-4-18 16:24:11</span></div>
                <div class="seller cf"><span class="fl">单&emsp;&emsp;价：</span><span class="fl">￥270.00</span><span class="fl">*1</span><span class="fl">（数量）</span></div>
                <div class="seller cf"><span class="fl">邮&emsp;&emsp;费：</span><span class="sellerText fl">￥0.00</span></div>
                <div class="seller cf"><span class="fl">退款编号：</span><span class="sellerText fl">15454121541</span></div>
                <div class="seller cf"><span class="fl">原&emsp;&emsp;因：</span><span class="sellerText fl">型号拍错</span></div>
                <div class="seller cf"><span class="fl">货物状态：</span><span class="sellerText fl">处理中</span></div>
            </div>

        </div>
    </div>
<?= Html::jsFile("{$url}/Js/common/jquery.ext.js"); ?>
<?= Html::jsFile("{$url}/Js/personalCenter/record.js"); ?>
