<?php
$session = Yii::$app->session;
?>
<dl class="cf fl subTabBig">
    <dt class="fl subTabBigLink"><a href="javascript:void(0);"><h3>商品</h3></a></dt>
    <dd class="sub-menu fl">
        <ul>
            <li class="subTabLit"><a class="subTabLitLink" id="goodslist" href="javascript:f_addTab('goodsList','商品列表','?r=admin/mzsm/select')">商品列表</a></li>
            <?php if($session->get('username') != "test"):?>
            <li class="subTabLit"><a class="subTabLitLink" href="javascript:f_addTab('goodsClassify','商品分类','?r=admin/goods/classify')">商品分类</a></li>
            <?php endif;?>
            <li class="subTabLit"><a class="subTabLitLink" href="javascript:f_addTab('good_spec','商品规格','?r=admin/goods/good_spec')">商品规格</a></li>
            <li class="subTabLit"><a class="subTabLitLink" href="javascript:f_addTab('good_brand','品牌列表','?r=admin/goods/good_brand')">品牌列表</a></li>
            <li class="subTabLit"><a class="subTabLitLink" href="javascript:f_addTab('good_attr','商品属性','?r=admin/goods/good_attr')">商品属性</a></li>
            <li class="subTabLit"><a class="subTabLitLink" href="javascript:f_addTab('comment','评论列表','#')">评论列表</a></li>
        </ul>
    </dd>
</dl>