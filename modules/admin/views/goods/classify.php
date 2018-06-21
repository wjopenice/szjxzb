<?php
use yii\helpers\Html;
use yii\helpers\Url;
$session = Yii::$app->session;
$url = Url::to("@web/web/admin/Static");
?>

<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>商品分类</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
    <?= Html::jsFile("{$url}/Js/goods/classify.js")?>
</head>
<body>

    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>商品分类管理</h3>
                    <h5>网站文章分类添加与管理</h5>
                </div>
            </div>
        </div>
        <!--  操作提示  -->
        <div id="explanation" class="explanation">
            <div id="checkZoom" class="title">
                <i class="fa pressIcon"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span title="收起提示" id="explanationZoom"></span>
            </div>
            <ul>
                <li>温馨提示：顶级分类（一级大类）设为推荐时才会在首页楼层中显示</li>
                <li><a href="javascript:;">对分类作任何更改后，都需要到 设置 -> 清理缓存 清理商品分类，新的设置才会生效</a></li>
                <li>最多只能分类到三级</li>
                <li class="recommend">"是否推荐"->设置为推荐之后, 该分类会在首页楼层显示</li>
            </ul>
        </div>
        <!--  表格     -->
        <form method="post">
            <input type="hidden" value="ok" name="form_submit">
            <div class="flexigrid">
                <div class="mDiv">
                    <div class="ftitle">
                        <h3>商品分类列表</h3>
                        <h5></h5>
                    </div>
                </div>
                <div class="hDiv">
                    <div class="hDivBox">
                        <table cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th align="center" axis="col0" class="sign">
                                        <div class="ta_c" style="width: 24px;"><i class="ico-check"></i></div>
                                    </th>
                                    <th align="center" axis="col1" class="handle"><div class="ta_c" style="width: 212px;">操作</div></th> 
                                    <th align="center" axis="col2"><div class="ta_c" style="width: 212px;">分类id</div></th>
                                    <th align="center" axis="col3"><div class="ta_c" style="width: 200px;">分类名称</div></th>
                                    <th align="center" axis="col4"><div class="ta_c" style="width: 200px;">手机显示名称</div></th>
                                    <th align="center" axis="col5"><div class="ta_c" style="width: 80px;">是否推荐</div></th>
                                    <th align="center" axis="col6"><div class="ta_c" style="width: 80px;">是否显示</div></th>
                                    <th align="center" axis="col8"><div class="ta_c" style="width: 60px;">分组</div></th>
                                    <th align="center" axis="col9"><div class="ta_c" style="width: 60px;">排序</div></th>
                                    <th axis="col10"><div></div></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="tDiv">
                    <div class="tDiv2">
                        <div class="fbutton">
                            <a id="addclassify" href="javascript:window.parent.window.f_addTab('add','添加分类','?r=admin/goods/addclassify')">
                                <div title="新增分类" class="add">
                                    <span><i class="fa fa-plus"></i>新增分类</span>
                                </div>
                            </a>
                        </div>
                        <div class="fbutton">
                            <div class="add" title="收缩分类">
                                <span onclick="tree_open(this);"><i class="fa fa-angle-double-up"></i>收缩分类</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bDiv" id="flexigrid"  data-url="">
                    <table cellspacing="0" cellpadding="0" border="0" id="article_cat_table" class="flex-table autoht">
                        <tbody id="treet1">
                            <?php foreach ($arrData as $list): ?>  
                            <tr data-level="<?=$list['level']?>" parent_id_path ="<?=$list['parent_id_path']?>" class="parent_id_<?=$list['parent_id']?>">
                                <td class="sign">
                                    <div class="ta_c" style="width: 24px;">
                                        <img src="<?=$url?>/Image/common/tv-collapsable-last.gif" fieldid="2" status="open" id="icon_<?=$list['level']?>_<?=$list['id']?>" onClick="treeClicked(this,<?=$list['id']?>)">
                                    </div>
                                </td>
                                <td class="handle setBoxWrap">
                                    <div>
                                        <span class="btn" style="margin-left: <?php echo ($list['level'] * 3); ?>rem;"><em><i class="fa fa-cog"></i>设置<i class="arrow"></i></em>
                                            <!-- <ul>
                                                <li><a href="">编辑分类信息</a></li>
                                                <?php if($list['level'] <= 2){?>
                                                    <li><a href="javascript:window.parent.window.f_addTab('add','添加分类','?r=admin/goods/addclassify&parent_id=<?=$list['id']?>')">新增下级分类</a></li>
                                                <?php }?>
                                                <li><a href="javascript:;" onclick="publicHandle(<?=$list['id']?>)">删除当前分类</a></li>
                                            </ul> -->
                                        </span>
                                    </div>
                                </td>
                                <td class="sort">
                                    <div class="ta_c" style="width: 60px;"><?=$list['id']?></div>
                                </td>
                                <td class="name">
                                    <div class="ta_c" style="width: 200px;">
                                        <input type="text" value="<?=$list['name']?>" onblur="changeTableVal('goods_category','id','<?=$list['id']?>','name',this)" style="text-align: left; width:180px;">
                                    </div>
                                </td>
                                <td class="name">
                                    <div class="ta_c" style="width: 200px;">
                                        <input type="text" value="<?=$list['mobile_name']?>" onblur="changeTableVal('goods_category','id','<?=$list['id']?>','mobile_name',this)" style="text-align: left; width:180px;">
                                    </div>
                                </td>
                                <td align="center" class="">
                                    <div class="ta_c" style="width: 80px;">
                                        <?php if($list['is_hot']){?>
                                            <span class="yes" onClick="changeTableVal('goods_category','id','<?=$list['id']?>','is_hot',this)" ><i class="fa fa-check-circle"></i>是</span>
                                        <?php }else{?>
                                            <span class="no" onClick="changeTableVal('goods_category','id','<?=$list['id']?>','is_hot',this)" ><i class="fa fa-ban"></i>否</span>
                                        <?php }?>
                                    </div>
                                </td>
                                <td align="center" class="">
                                    <div class="ta_c" style="width: 80px;">
                                        <?php if($list['is_show']){?>
                                            <span class="yes" onClick="changeTableVal('goods_category','id','<?=$list['id']?>','is_show',this)" ><i class="fa fa-check-circle"></i>是</span>
                                        <?php }else{?>
                                            <span class="no" onClick="changeTableVal('goods_category','id','<?=$list['id']?>','is_show',this)" ><i class="fa fa-ban"></i>否</span>
                                        <?php }?>
                                    </div>
                                </td>
                                <td class="sort">
                                    <div class="ta_c" style="width: 60px;">
                                        <input type="text" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onblur="changeTableVal('goods_category','id','','cat_group',this)" size="4" value="<?=$list['cat_group']?>" >
                                    </div>
                                </td>
                                <td class="sort">
                                    <div class="ta_c" style="width: 60px;">
                                        <input type="text" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onblur="changeTableVal('goods_category','id','','sort_order',this)" size="4" value="<?=$list['sort_order']?>" >
                                    </div>
                                </td>
                                <td style="width: 100%;">
                                    <div>&nbsp;</div>
                                </td>
                            </tr>
                            <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>

</body>
</html>