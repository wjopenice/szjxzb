<?php
namespace app\modules\home\controllers;

use yii\web\Controller;
use Yii;

class Shop_classifyController extends Controller{
    public $layout = "inc.php";
    //高贵黄金
    public function actionFashionclothe(){
        $db = Yii::$app->db;
        $sql = $this->layoutSql." where g.mzsm_cat_id = 1";
        $banner = $db->createCommand("select * from shop_banner where id = 9")->queryOne();
        $arrData = $db->createCommand($sql)->queryAll();
        return $this->render("fashionClothe",compact("arrData","banner"));
    }
    //奢华钻石
    public function actionBoundless(){
        $db = Yii::$app->db;
        $sql = $this->layoutSql." where g.mzsm_cat_id = 2";
        $banner = $db->createCommand("select * from shop_banner where id = 5")->queryOne();
        $arrData = $db->createCommand($sql)->queryAll();
        return $this->render("boundless",compact("arrData","banner"));
    }
    //智能电器
    public function actionGorgeous(){
        $db = Yii::$app->db;
        $sql = $this->layoutSql." where g.mzsm_cat_id =3";
        $banner = $db->createCommand("select * from shop_banner where id = 1")->queryOne();
        $arrData = $db->createCommand($sql)->queryAll();
        return $this->render("gorgeous",compact("arrData","banner"));
    }
    //家居家纺
    public function actionLightmakeup(){
        $db = Yii::$app->db;
        $sql = $this->layoutSql." where g.mzsm_cat_id = 4";
        $banner = $db->createCommand("select * from shop_banner where id = 8")->queryOne();
        $arrData = $db->createCommand($sql)->queryAll();
        return $this->render("lightMakeup",compact("arrData","banner"));
    }
    //箱包鞋类
    public function actionMultipurpose(){
        $db = Yii::$app->db;
        $sql = $this->layoutSql." where g.mzsm_cat_id = 5";
        $banner = $db->createCommand("select * from shop_banner where id = 4")->queryOne();
        $arrData = $db->createCommand($sql)->queryAll();
        return $this->render("multipurpose",compact("arrData","banner"));
    }
    //衣裳服饰
    public function actionAnexplosive(){
        $db = Yii::$app->db;
        $sql = $this->layoutSql." where g.mzsm_cat_id = 6";
        $banner = $db->createCommand("select * from shop_banner where id = 2")->queryOne();
        $arrData = $db->createCommand($sql)->queryAll();
        return $this->render("anExplosive",compact("arrData","banner"));
    }
}