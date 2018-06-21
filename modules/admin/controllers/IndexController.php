<?php
namespace app\modules\admin\controllers;
use Yii;
class IndexController extends BaseController {

    public function actionIndex() {
        $this->layout = false;
        $session = Yii::$app->session;
        if($session->get('username')){
            logyiix("../log2.txt");
            return $this->render("index");
        }else{
            return $this->error("请先登陆",2);
        }
    }

    public function actionWelcome(){
        $this->layout = false;
        $session = Yii::$app->session;
        if($session->get('username')){
            logyiix("../log2.txt");
            return $this->render("welcome");
        }else{
            return $this->error("请先登陆",2);
        }
    }

}

