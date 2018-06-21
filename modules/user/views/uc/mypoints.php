<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "我的积分";
$this->keywords = "我的积分";
$this->description = "我的积分";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/myPoints.css"); ?>
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
                <div class="giftTitle cf">
                    <div class="available fl"><span>可用积分：</span><span class="value">60</span></div>
                    <div class="detailed fr"><a href="?r=user/uc/integraldetail&type=mypoints">积分明细</a><a href="?r=user/hc/index">帮助中心</a></div>
                </div>

                <!-- 积分兑换好礼 -->
                <div class="exchange">
                    <div class="infoTitle">
                        <span>积分兑换好礼</span>
                    </div>
                    <ul class="shopUl cf">
                        <li class="fl">
                            <a href="javascript:;">
                                <?= Html::img("{$url}/Image/personalCenter/myPoints/giftShop.png",["class"=>"dib","width"=>"201","height"=>"211","alt"=>""]); ?>
                                <div class="shopExplain"><p class="shopName">Paris名媛睡袍</p><p class="money">¥239</p></div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/personalCenter/myPoints.js"); ?>