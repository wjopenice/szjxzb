<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "红包";
$this->keywords = "红包";
$this->description = "红包";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/about.css"); ?>
    <div class="container">
        <!-- 面包屑 -->
        <div class="crumbs">
            <span>首页</span> &gt; <span class="secondLevel">我的红包</span>
        </div>
        <!-- content -->
        <div class="content cf">

            <!-- 左侧边导航 -->
            <?=$this->render('../layouts/uc_left_nav.php')?>

            <!-- 右侧内容 -->
            <div class="rightContent fl">
                <p class="questionBox cf"><span class="fl">关于红包</span><i></i></p>
                <div class="useTabBox cf">
                    <a class="subUseTab active" href="javascript:void(0)">可使用</a>
                    <a class="subUseTab" href="javascript:void(0)">已使用</a>
                    <a class="subUseTab" href="javascript:void(0)">已失效</a>
                </div>
                <div class="useConBox">
                    <div class="subUseCon cf">
                        <div class="fl redPacket cf">
                            <p class="packetPriceBox">￥<span class="price">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                        <div class="fl redPacket cf">
                            <p class="packetPriceBox">￥<span class="price">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                        <div class="fl redPacket cf">
                            <p class="packetPriceBox">￥<span class="price">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                        <div class="fl redPacket cf">
                            <p class="packetPriceBox">￥<span class="price">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                    </div>
                    <div class="subUseCon cf hide">
                        <div class="fl redPacket cf">
                            <p class="packetPriceBox">￥<span class="price lineThrough">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                        <div class="fl redPacket cf">
                            <p class="packetPriceBox">￥<span class="price lineThrough">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                        <div class="fl redPacket cf">
                            <p class="packetPriceBox">￥<span class="price lineThrough">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                    </div>
                    <div class="subUseCon cf hide">
                        <div class="fl greyPacket cf">
                            <p class="packetPriceBox">￥<span class="price">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                        <div class="fl greyPacket cf">
                            <p class="packetPriceBox">￥<span class="price">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                        <div class="fl greyPacket cf">
                            <p class="packetPriceBox">￥<span class="price">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                        <div class="fl greyPacket cf">
                            <p class="packetPriceBox">￥<span class="price">50</span></p>
                            <p class="packetName">新人红包</p>
                            <p class="packetLimit">有效期至：<span>2018-4-13</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/personalCenter/about.js"); ?>
