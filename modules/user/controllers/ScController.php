<?php
namespace app\modules\user\controllers;

use yii\web\Controller;
use Yii;

class ScController extends Controller{
    public $layout = "inc_uc.php";
    public function actionRecord(){
        return $this->render("record");
    }
}