<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url = Url::to("@web/web/home/Static");
$this->title = "账号安全";
$this->keywords = "账号安全";
$this->description = "账号安全";
?>
<?= Html::cssFile("{$url}/Css/personalCenter/common.css"); ?>
<?= Html::cssFile("{$url}/Css/personalCenter/accountSecurity.css"); ?>
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
            <div class="rightContent cf fl">
                <div class="current cf fl"><span class="currentText dib fl">您当前的账号</span><span class="currentNum dib fl"><?=$_COOKIE['username']?></span></div>
                <div class="current cf fl">
                    <span class="currentText dib fl">
                        <i class="bindIcon"></i>
                        <span class="bindText">登录密码</span>
                    </span>
                    <span class="currentExplain dib fl">建议您定期更换密码，设置安全性高的密码可以使账号更安全</span>
                    <a class="modifyBtn fr" href="?r=user/uc/loginpassword&type=accountsecurity">修改</a>
                </div>
                <div class="current cf fl">
                    <span class="currentText dib fl">
                        <i class="bindNum"></i>
                        <span class="bindText">绑定手机</span>
                    </span>
                    <span class="currentExplain dib fl">绑定手机后，您可享受丰富的手机服务以及重要信息更改时的身份验证</span>
                    <a class="modifyBtn fr" href="?r=user/uc/bindtelephone&type=accountsecurity">绑定</a>
                </div>
                <div class="current cf fl">
                    <span class="currentText dib fl">
                        <i class="bindNum"></i>
                        <span class="bindText">支付密码</span>
                    </span>
                    <span class="currentExplain dib fl">支付密码启用后，将作为您账号资产使用时的身份证明</span>
                    <a class="modifyBtn fr" href="?r=user/uc/modifypassword&type=accountsecurity">立即设置</a>
                </div>
            </div>
        </div>
    </div>
<?= Html::jsFile("{$url}/Js/personalCenter/accountSecurity.js"); ?>