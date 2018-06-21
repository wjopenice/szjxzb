<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "账号信息";
$this->keywords = "账号信息";
$this->description = "账号信息";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/accountInfo.css"); ?>
    <div class="container">
        <!-- 面包屑 -->
        <div class="crumbs">
            <span>首页</span> &gt; <span class="secondLevel">个人中心</span>
        </div>

        <!-- content -->
        <div class="content cf">
            <!-- 左侧边导航 -->
            <?=$this->render('../layouts/uc_left_nav.php')?>
            <form action="?r=user/uc/userinfo" method="post">
                <input type='hidden' name='_csrf' value="<?= Yii::$app->request->csrfToken ?>" />
            <!-- 右侧内容 -->
            <div class="rightContent fl">

                <div class="infoTitle">
                    <span>基本资料</span>
                </div>
                <ul class="infoContent">

                    <!-- 用户头像 -->
                    <li class="headPortrait">
                        <span class="leftText dib">用户头像</span>
                        <?php if(!empty($arrData['userpic'])):?>
                            <?= Html::img("{$url}/Image/personalCenter/personalIcon.png",["class"=>"dib","width"=>"66","height"=>"66","alt"=>""]); ?>
                        <?php else:?>
                            <?= Html::img("{$url}/Image/personalCenter/personalIcon.png",["class"=>"dib","width"=>"66","height"=>"66","alt"=>""]); ?>
                        <?php endif;?>
                    </li>

                    <!-- 用户ID -->
                    <li class="userId">
                        <span class="leftText dib">用户ID</span>
                        <span class="idNum"><?=$arrData['userid']?></span>
                    </li>

                    <!-- 账号 -->
                    <li class="account">
                        <span class="leftText dib">账&emsp;&emsp;号</span>
                        <input type="hidden" name="username" value="<?=$arrData['username']?>" />
                        <span class="accountText"><?=$arrData['username']?></span>
                    </li>

                    <!-- 昵称 -->
                    <li class="nickname">
                        <span class="leftText dib">昵&emsp;&emsp;称</span>
                        <input class="nicknameInput" type="text" name="nickname" maxlength="20" value="<?=$arrData['nickname']?>">
                    </li>

                    <!-- 性别 -->
                    <li class="sex">
                        <span class="leftText dib">性&emsp;&emsp;别</span>
                        <div class="dib sexIcon" id="sexIcon">
                            <div  class="dib male <?php if($arrData['sex'] == '男'){echo 'active';}?> "><span></span><input type="radio"  name="sex"  value="男" <?php if($arrData['sex'] == '男'){echo 'checked';}?> >男</div>
                            <div  class="dib male <?php if($arrData['sex'] == '女'){echo 'active';}?>"><span></span><input type="radio" name="sex" value="女" <?php if($arrData['sex'] == '女'){echo 'checked';}?> >女</div>
                            <div  class="dib male <?php if($arrData['sex'] == '保密'){echo 'active';}?>"><span></span><input type="radio"  name="sex" value="保密" <?php if($arrData['sex'] == '保密'){echo 'checked';}?> >保密</div>
                        </div>
                    </li>

                    <!-- 手机号码 -->
                    <li class="phoneNum">
                        <span class="leftText dib">手机号码</span>
                        <input type="text" readonly name="tell" class="nicknameInput" value="<?=$arrData['tell']?>">
                        <a class="bindNum" href="?r=user/uc/bindtelephone&type=accountsecurity">更换手机号</a>
                    </li>

                    <!-- 出生日期 -->
                    <li class="birth">
                        <span class="leftText dib">出生日期</span>
                        <input type="text" class="demo-input" placeholder="请选择日期" name="birthdate" id="test1" value="<?=$arrData['birthdate']?>">
                    </li>
                </ul>
                <input type="submit" name="btn" class="preservation" value="保存" style="border: 0;" />
            </div>
            </form>
        </div>
    </div>

<script>
$(function () {
    $("#sexIcon div").click(function () {
        $(this).find("input").attr("checked","checked");
        $(this).siblings().find("input").removeAttr("checked");
    });
});    
</script>

<?= Html::jsFile("{$url}/Js/personalCenter/laydate/laydate.js"); ?>
<?= Html::jsFile("{$url}/Js/personalCenter/accountInfo.js"); ?>
<?= Html::script("laydate.render({elem:'#test1'});")?>
