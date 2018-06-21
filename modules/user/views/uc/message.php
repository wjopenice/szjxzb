<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "消息通知";
$this->keywords = "消息通知";
$this->description = "消息通知";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/message.css"); ?>
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
                <div class="rightContentTitle">
                    <a class="active" href="javascript:;"><span class="messageLine dib">我的资产</span></a>
                    <a href="javascript:;"><span class="messageLine dib">通知消息</span></a>
                    <a href="javascript:;"><span class="messageLine dib">物流助手</span></a>
                    <a href="javascript:;">互动消息</a>
                </div>
                <div class="messageContent">

                    <!-- 我的资产 -->
                    <div class="messageContentList myAssets cur">
                        <ul class="myAssetsUl">
                            <li class="copy" data-num="4">
                                <div class="myAssetsTime"><span>优惠券即将过期</span><span class="myAssetsDate">2018-04-12 10:40:00</span></div>
                                <div class="voucher"><span>你有3张<span>（共计29元）</span>优惠券将于04.11到期，请即使使用。</span><a href="javascript:;" class="myAssetsDetail">查看详情&gt;&gt;</a></div>
                            </li>
                        </ul>
                        <div class="unMyAssets hide">
                            <i class="unMyAssetsIcon"></i>
                            <p class="unMyAssetsText">暂无此类消息</p>
                        </div>
                    </div>

                    <!-- 通知消息 -->
                    <div class="messageContentList noticeMessage">
                        <ul class="noticeMessageUl">
                            <li class="copy" data-num="4">
                                <div class="noticeMessageTime"><span class="survey">【有奖调研】聊聊您的居家购物生活</span><span class="noticeMessageDate">2018-04-12 10:40:00</span></div>
                                <div class="noticeMessageExplain"><span class="noticeMessageText">想要更了解您的居家态度与购物需求，参与调研有机会赢取¥30元话费（3月28日截止）</span><a href="javascript:;" class="noticeMessageDetail">查看详情&gt;&gt;</a></div>
                            </li>
                        </ul>
                        <div class="unMyAssets hide">
                            <i class="unInteractionIcon"></i>
                            <p class="unMyAssetsText">暂无此类消息</p>
                        </div>
                    </div>

                    <!-- 物流助手 -->
                    <div class="messageContentList logistics">
                        <ul class="logisticsUl">
                            <li class="copy" data-num="4">
                                <div class="logisticsTime"><span class="deliver">订单33179178已发货</span><span class="logisticsDate">2018-04-12 10:40:00</span></div>
                                <div class="logisticsExplain cf">
                                    <?= Html::img("{$url}/Image/personalCenter/shop.png",["class"=>"fl","width"=>"155","height"=>"155","alt"=>""]); ?>
                                    <div class="logisticsName fl">
                                        <p>产品名称</p>
                                        <p>共1种商品</p>
                                        <p>包裹1<span>（顺丰快递）</span></p>
                                        <p><a href="javascript:;" class="logisticsDetail">查看详情&gt;&gt;</a></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="unMyAssets hide">
                            <i class="unLogisticsIcon"></i>
                            <p class="unMyAssetsText">暂无此类消息</p>
                        </div>
                    </div>

                    <!-- 互动消息 -->
                    <div class="messageContentList interaction">
                        <ul>
                            <li></li>
                        </ul>
                        <div class="unMyAssets">
                            <i class="unInteractionIcon"></i>
                            <p class="unMyAssetsText">暂无此类消息</p>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/personalCenter/message.js"); ?>