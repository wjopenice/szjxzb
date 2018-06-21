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
    <title>快递公司</title>
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
</head>
<body>
    <div class="page">
        <!--  标题栏   -->
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>快递公司管理</h3>
                    <h5>快递公司列表与管理</h5>
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
                <li>快递公司管理，由总平台设置管理.</li>
                <li>快递打印模板编辑快递公司可进行设置，设置必须上传快递单据背景图..</li>
                <li>如果物流配置启用的是快递鸟，物流公司编码也要改为快递鸟官方物流公司编码.</li>
            </ul>
        </div>
        <!--  表格  -->
        <div class="flexigrid">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>快递公司列表</h3>
                    <h5>(共<span><?=$total?></span>条记录)</h5>
                </div>
                <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
                <form class="navbar-form form-inline fr" id="search-form" method="get">
                    <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
                    <div class="sDiv">
                        <div class="sDiv2">
                            <input size="30" name="shipping_name" value="" class="qsbox" placeholder="快递公司名称" type="text">
                        </div>
                        <div class="sDiv2">
                            <input type="text" size="30" name="shipping_code" value="" class="qsbox" placeholder="物流编号">
                            <input type="button" onclick="ajax_get_table('search-form',1)" class="btn" value="搜索" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th class="sign" axis="col0">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </th>
                            <th align="left"  axis="col3" class="">
                                <div style="width: 150px;" class="ta_l">物流公司名称</div>
                            </th>
                            <th align="left" axis="col4" class="">
                                <div style="width: 100px;" class="ta_l">快递公司编码</div>
                            </th>
                            <th align="center" axis="col5" class="">
                                <div style="width: 80px;" class="ta_c">开启状态</div>
                            </th>
                            <th align="left" axis="col1" class="handle">
                                <div style="width: 250px;" class="ta_c">操作</div>
                            </th>
                            <th style="width:100%" axis="col7"><div></div></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="tDiv">
                <div class="tDiv2">
                    <div class="fbutton">
                        <a href="javascript:void(0)">
                            <div class="add" title="新增快递公司">
                                <span><i class="fa fa-plus"></i>新增快递公司</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bDiv" style="height: auto;">
                <div id="flexigrid">
                    <table>
                        <tbody>
                            <?php foreach ($arrData as $list): ?>  
                            <tr>
                                <td class="sign">
                                    <div style="width: 24px;"><i class="ico-check"></i></div>
                                </td>
                                <td align="left" class="">
                                    <div style="width: 150px;" class="ta_l"><?=$list['shipping_name']?></div>
                                </td>
                                <td align="left" class="">
                                    <div style="width: 100px;" class="ta_c"><?=$list['shipping_code']?></div>
                                </td>
                                <td align="left" class="">
                                    <div style="width: 80px;" class="ta_c">
                                        <?php if($list['is_open']){?>
                                            <span class="yes" onClick="changeTableVal('shipping','shipping_id','<?=$list['shipping_id']?>','is_open',this)" ><i class="fa fa-check-circle"></i>是</span>
                                        <?php }else{?>
                                            <span class="no" onClick="changeTableVal('shipping','shipping_id','<?=$list['shipping_id']?>','is_open',this)" ><i class="fa fa-ban"></i>否</span>
                                        <?php }?>
                                    </div>
                                </td>
                                <td align="center" class="handle">
                                    <div style="width: 250px; max-width:170px;" class="ta_c">
                                        <a class="btn blue" href=""><i class="fa fa-search"></i>编辑</a>
                                        <a class="btn red deleteShipping" data-shipping-id="<?=$list['shipping_id']?>"><i class="fa fa-trash-o"></i>删除</a>
                                    </div>
                                </td>
                                <td align="" class="" style="width: 100%;"><div>&nbsp;</div></td>
                            </tr>
                            <?php endforeach; ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<script>

    //ajax 抓取页面
    function ajax_get_table(form, page) {

        cur_page = page; //当前页面 保存为全局变量
        var selectData = $('#' + form).serialize();
        var v = '' ;

        $.ajax({
            type: "POST",
            url: "/index.php?r=admin/setting/express_company",//+tab,
            data: selectData,// 你的formid
            success: function (data) {
                var formData = selectData.split("&");
                for (k in formData){
                    v = formData[k].split("=");
                    formData[v[0]] = v[1];
                }

                $(".page").remove();
                $("body").append(data);
                $("input[name=shipping_code]").val(decodeURI(formData.shipping_code));
                $("input[name=shipping_name]").val(decodeURI(formData.shipping_name));
            }
        });
    }

</script>
</body>
</html>