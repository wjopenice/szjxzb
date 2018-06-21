<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "我的积分-积分明细";
$this->keywords = "我的积分-积分明细";
$this->description = "我的积分-积分明细";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/integralDetail.css"); ?>
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
                <div class="integralDetailTitle cf">
                    <div class="fl"><span>积分明细</span><span class="integralDetailText">(共0条记录)</span></div>
                    <div class="fr"><i class="explainIcon"></i><span class="explainIconText">积分明细说明</span></div>
                </div>

                <!-- 积分列表 -->
                <div class="integralDetailContent">
                    <div class="detailTitle cf">
                        <span class="detailDate fl">日期</span>
                        <span class="detailSource fl">来源</span>
                        <span class="detailIntegral fl">积分</span>
                    </div>
                    <div class="integralList">
                        <ul>
                            <li class="cf copy" data-num="6">
                                <span class="detailDate detailDateLi fl">2018-04-16 14:33:50</span>
                                <div class="detailSource detailSourceLi fl">
                                    <img class="dib" src="" width="53" height="55" alt="">
                                    <div class="detailSourceText dib">
                                        <span class="detailSourceName dib">Paris名媛睡袍</span>
                                        <p class="detailSourceVal"><span class="detailSourceNum dib">79积分</span><span class="detailSourceMoney">￥9.99</span></p>
                                    </div>
                                </div>
                                <div class="detailIntegral detailIntegralLi fl"><span>+</span><span class="detailIntegralNum">3</span></div>
                            </li>
                        </ul>
                        <div class="notAvailable hide">暂无记录</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/personalCenter/integralDetail.js"); ?>