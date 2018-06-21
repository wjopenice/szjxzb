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
    <title>添加分类</title>
    <?= Html::cssFile("{$url}/Js/common/ligerUI/skins/Aqua/css/ligerui-tab.css")?>
    <?= Html::cssFile("{$url}/Css/common/public.css")?>
    <?= Html::cssFile("{$url}/Css/common/font-awesome.min.css")?>
    <?= Html::cssFile("{$url}/Css/common/page.css")?>
    <?= Html::jsFile("{$url}/Js/common/jquery.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/core/base.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerAccordion.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerLayout.js")?>
    <?= Html::jsFile("{$url}/Js/common/ligerUI/js/plugins/ligerTab.js")?>
    <?= Html::jsFile("{$url}/Js/common/ajaxupload.js")?>
    <?= Html::jsFile("{$url}/Js/common/public.js")?>
    <?= Html::jsFile("{$url}/Js/goods/addClassify.js")?>
</head>
<body>
    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>商品分类-添加修改分类</h3>
                    <h5>添加或编辑商品分类</h5>
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
                <li>商品分类最多分为三级.</li>
                <li>添加或者修改分类时，应注意选择对应的上级.</li>
                <li><strong>关于分类图标替换：</strong></li>
                <li>1.WEB(PC)端的图标直接找到分类图替换即可，图标路径：template/pc/rainbow/static/images/ico-tphsop-index.png</li>
                <li>2.WAP,APP端的图标在下列编辑框“分类展示图片”上传即可（<strong>特别注意：改图标有且仅是第三级分类才有效）</strong></li>
            </ul>
        </div>
        <!--   表单   -->
        <form action="?r=admin/goods/addclassify" method="post" class="form-horizontal" id="category_form">
            <div class="ncap-form-default">
                <dl class="row">
                    <dt class="tit">
                        <label><em>*</em>分类名称</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" required placeholder="名称" class="input-txt" name="name" value="">
                        <span class="err" id="err_name"></span>
                        <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label><em>*</em>手机分类名称</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" required placeholder="手机分类名称" class="input-txt" name="mobile_name" value="">
                        <span class="err" id="err_mobile_name"></span>
                        <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit" colspan="2">
                        <label class="">上级分类</label>
                    </dt>
                    <dd class="opt">
                        <div id="gcategory">
                            <select name="parent_id" id="parent_id" class="class-select validl">
                                <option value="0" selected="selected">顶级分类</option>
                                <?php foreach ($cate_arr as $cate): ?>   
                                    <option value="<?=$cate['id']?>" <?php if($parent_id_1 == $cate['id']){?>selected<?php }?> ><?=$cate['name']?></option>
                                <?php endforeach; ?> 
                            </select>
                            <select id="parent_id_2" name="parent_id_2" class="class-select validl">
                                <option value="0">二级分类</option>
                            </select>
                        </div>
                        <p class="notic">如果选择上级分类，那么新增的分类则为被选择上级分类的子分类</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label><em>*</em>导航显示</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label id="category1" for="goods_category1" class="cb-enable">是</label>
                            <label id="category0" for="goods_category0" class="cb-disable selected">否</label>
                            <input id="goods_category1" class="goods_category" name="is_show" value="1" type="radio">
                            <input id="goods_category0" class="goods_category" name="is_show" value="0" type="radio" checked="checked">
                        </div>
                        <p class="notic">是否在导航栏显示</p>
                    </dd>
                </dl>

                <dl class="row">
                    <dt class="tit" colspan="2">
                        <label class="">分类分组</label>
                    </dt>
                    <dd class="opt">
                        <div>
                            <select name="cat_group" id="cat_group" class="form-control">
                                <option value="0" selected='selected'>0</option>
                                <option value='1'>1</option>"
                                <option value='2'>2</option>"
                                <option value='3'>3</option>"
                                <option value='4'>4</option>"
                                <option value='5'>5</option>"
                                <option value='6'>6</option>"
                                <option value='7'>7</option>"
                                <option value='8'>8</option>"
                                <option value='9'>9</option>"
                                <option value='10'>10</option>"
                                <option value='11'>11</option>"
                                <option value='12'>12</option>"
                                <option value='13'>13</option>"
                                <option value='14'>14</option>"
                                <option value='15'>15</option>"
                                <option value='16'>16</option>"
                                <option value='17'>17</option>"
                                <option value='18'>18</option>"
                                <option value='19'>19</option>"
                                <option value='20'>20</option>"
                            </select>
                        </div>
                        <p class="notic">有时候左侧菜单栏同一行显示多个分类, 所以给他们一个分组</p>
                    </dd>
                </dl>

                <dl class="row">
                    <dt class="tit">
                        <label>分类展示图片</label>
                    </dt>
                    <dd class="opt">
                        <div class="input-file-show">
                            <span class="show">
                                <a id="img_a" target="_blank" class="nyroModal" rel="gal" href="javascript:void(0)">
                                    <i id="img_i" class="fa fa-picture-o"></i>
                                </a>
                            </span>
                            <span class="type-file-box" id="changeBox">
                                <input type="hidden" id="imagetext" name="image" value="" class="type-file-text">
                                <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                                <input class="type-file-file" type="file" name="file" size="30" hidefocus="true" nc_type="change_site_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                            </span>
                        </div>
                        <span class="err"></span>
                        <p class="notic"><strong style="color:orange;">此分类图片用于手机端显示, 并有且仅是第三级分类上传的图片才有效</strong></p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label for="t_sort">排序</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" class="t_mane" name="sort_order" id="t_sort" value="0">
                        <span class="err" id="err_sort_order"></span>
                        <p class="notic">根据排序进行由小到大排列显示。</p>
                    </dd>
                </dl>
            </div>
            <div class="ncap-form-default">
                <div class="bot">
                    <input type="submit" class="addSubmitBtn" value="确认提交" onClick="">
                </div>
            </div>
        </form>
    </div>
</body>
</html>