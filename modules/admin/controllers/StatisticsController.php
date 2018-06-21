<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;

class StatisticsController extends Controller{

    public $layout = false;
    public function actionSales_profile(){
        return $this->render("sales_profile");
    }
    public function actionSales_rankings(){
        return $this->render("sales_rankings");
    }
    public function actionMembership_rankings(){
        return $this->render("membership_rankings");
    }
    public function actionSales_details(){
        return $this->render("sales_details");
    }
    public function actionMembership_statistics(){
        return $this->render("membership_statistics");
    }
    public function actionOperate_overview(){
        return $this->render("operate_overview");
    }
    public function actionPlatform_expenditure(){
        return $this->render("platform_expenditure");
    }
}