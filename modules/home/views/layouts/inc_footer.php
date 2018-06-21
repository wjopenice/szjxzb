<?php
use yii\helpers\Html;
?>
<?php
$arr = [
    "帮助中心"=>[
        "javascript:void(0)"=>"用户登录与密码找回",
        "javascript:void(1)"=>"用户注册协议",
        "javascript:void(2)"=>"购买指南",
        "javascript:void(3)"=>"支付方式",
        "javascript:void(4)"=>"配送与说明",
        "javascript:void(5)"=>"用户注销",
    ],
    "售后服务"=>[
        "javascript:void(0)"=>"7日无理由退货",
        "javascript:void(1)"=>"质量问题15日内换货",
        "javascript:void(2)"=>"保修条款",
        "javascript:void(3)"=>"售后服务运费规则",
    ],
    "联系我们"=>[
        "javascript:void(0)"=>"400-6822-360",
        "javascript:void(1)"=>"周一至周日 9:00-18:00",
        "javascript:void(2)"=>"400-0111-366",
        "javascript:void(3)"=>"周一至周日 9:00-21:00",
        "javascript:void(4)"=>"（仅收市话费）",
    ],
];
$strHtml = "";
foreach ($arr as $key=>$value){
    $strHtml .= Html::beginTag("div",['class'=>'subFootCon fl']);
    $strHtml .= Html::tag("p",$key);
    foreach ($value as $k=>$v){
        $strHtml .= Html::a($v,$k);
    }
    $strHtml .= Html::endTag("div");
}
?>

<?=Html::beginTag("div",['class'=>"qualityBox"])?>
<?=Html::beginTag("div",['class'=>"container cf"])?>
<?=Html::beginTag("div",['class'=>"subQuality fl cf"])?><?=Html::tag("i","",['class'=>'real'])?><?=Html::tag("p","正品保证",['class'=>'fl'])?><?=Html::endTag("div")?>
<?=Html::beginTag("div",['class'=>"subQuality fl cf"])?><?=Html::tag("i","",['class'=>'seven'])?><?=Html::tag("p","7天包退",['class'=>'fl'])?><?=Html::endTag("div")?>
<?=Html::beginTag("div",['class'=>"subQuality fl cf quickBox"])?><?=Html::tag("i","",['class'=>'quick'])?><?=Html::tag("p","闪电发货",['class'=>'fl'])?><?=Html::endTag("div")?>
<?=Html::endTag("div")?>
<?=Html::endTag("div")?>

<?= Html::beginTag("div",['class'=>'footConBox'])?>
    <?= Html::beginTag("div",['class'=>'container cf'])?>
       <?=$strHtml?>
    <?= Html::endTag("div")?>
<?= Html::endTag("div")?>


<?=Html::tag("div","金轩商城 &COPY;2018-2019 深圳金轩珠宝有限公司 粤ICP备18062441号-1",['class'=>'footCopy'])?>

<!--<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"slide":{"type":"slide","bdImg":"0","bdPos":"right","bdTop":"177.5"},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"商城分享：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>-->
