<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "我的足迹";
$this->keywords = "我的足迹";
$this->description = "我的足迹";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/myTracks.css"); ?>

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
            <!-- 积分兑换好礼 -->
            <div class="exchange">
                <div class="infoTitle cf">
                    <span class="fl">我的足迹（9）</span>
                    <div class="batch fr"><i class="delIcon"></i><span class="delText">批量删除</span></div>
                    <div class="complete fr hide">完成</div>
                </div>
                <div class="shopUl">
                    <div class="contentList">
                        <div class="toDay">
                            <div class="toDayTitle cf"><span class="toDayVal fl">今天</span><span class="toDayNum fl">2018.4.12</span><b class="toDayLine fl"></b></div>
                            <ul class="cf">
                                <li class="fl pr copy" data-num="4">
                                    <i class="del hide"></i>
                                    <a href="javascript:;">
                                        <img class="dib" src="" width="201" height="211" alt="">
                                        <div class="shopExplain"><p class="shopName">Paris名媛睡袍</p><p class="money">¥239</p></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="toDay">
                            <div class="toDayTitle cf"><span class="toDayVal fl">昨天</span><span class="toDayNum fl">2018.4.11</span><b class="toDayLine fl"></b></div>
                            <ul class="cf">
                                <li class="fl pr copy" data-num="4">
                                    <i class="del hide"></i>
                                    <a href="javascript:;">
                                        <img class="dib" src="" width="201" height="211" alt="">
                                        <div class="shopExplain"><p class="shopName">Paris名媛睡袍</p><p class="money">¥239</p></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="notLi hide">
                        <i></i>
                        <span>您还没有任何足迹呢</span>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<?= Html::jsFile("{$url}/Js/personalCenter/myTracks.js"); ?>
