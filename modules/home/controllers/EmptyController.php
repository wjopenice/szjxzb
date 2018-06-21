<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/26
 * Time: 13:51
 */
namespace app\modules\home\controllers;
use yii\web\Controller;
class EmptyController extends Controller
{
    public $layout = "inc_error";
    public function actionError(){
        return $this->render("error");
    }
}
