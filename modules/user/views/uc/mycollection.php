<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "我的收藏";
$this->keywords = "我的收藏";
$this->description = "我的收藏";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/myCollection.css"); ?>
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
                        <span class="fl">我的收藏（<e id="spancout"><?=count($arrData)?></e>）</span>
                    </div>
                    <div class="shopUl">
                        <ul class="cf">
                            <?php foreach ($arrData as $key=>$value): ?>
                            <li class="fl pr copy">
                                <i class="del"></i>
                                <a href="?r=home/index/goodsdetail&id=<?=$value['goods_id']?>">
                                    <img class="dib" src="<?=$value['url']?>" width="201" height="211" alt="">
                                    <div class="shopExplain"><p class="shopName"><?=$value['goods_name']?></p><p class="money">¥<?=$value['shop_price']?></p></div>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="notLi hide">
                            <i></i>
                            <span>您还没有任何收藏呢</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/personalCenter/myCollection.js"); ?>
<?= Html::jsFile("{$url}/Js/layer/layer.js"); ?>
<script>
    $(function(){
        $(document).on("click",'.del',function(){
            var id = $(this).next("a").attr("href").split("=")[2];
            var count = $("#spancout").html()-1;
            var that = $(this);
            $.get("?r=user/uc/delmycoll",{id:id},function (msg) {
                 if(msg.code == 0){
                     that.parent().remove();
                     $("#spancout").html(count);
                 }else{
                     layer.msg('删除失败', {icon: 5});
                 }
            },"json");
        });
    });
</script>
