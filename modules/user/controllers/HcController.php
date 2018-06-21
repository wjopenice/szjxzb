<?php
namespace app\modules\user\controllers;

use yii\web\Controller;
use Yii;

class HcController extends Controller{
    public $layout = "inc_uc.php";
    public function actionIndex(){
        return $this->render("index");
    }
    public function actionPolicy(){
        return $this->render("policy");
    }
    public function actionRule(){
        return $this->render("rule");
    }
    public function actionDistribution(){
        return $this->render("distribution");
    }
    public function actionCoupon(){
        return $this->render("coupon");
    }
    public function actionCooperation(){
        return $this->render("cooperation");
    }
    public function actionAgreement(){
        return $this->render("agreement");
    }
    public function actionCustomerservice(){
        return $this->render("customerservice");
    }
}