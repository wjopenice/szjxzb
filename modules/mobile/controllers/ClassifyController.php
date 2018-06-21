<?php
namespace app\modules\mobile\controllers;
use app\modules\mobile\models\M;
use yii\web\Controller;
use Yii;
class ClassifyController extends Controller{
    public $layout = "m_main";
    public function actionIndex(){
        $arrNav = M::findsqllo("mzsm_cat","id,mobile_name",["level"=>1],6,0,"id asc");
        $nav = Yii::$app->request->get("nav");
        $arrBanner = M::findsqlone("shop_banner","url",['name'=>$nav]);
        $arrData = M::findjoinsql("mzsm_goods as g","inner join","mzsm_img as i","i.goods_id = g.goods_id","g.goods_id,g.goods_name,i.image_url1",["g.mzsm_cat_id"=>$nav],"5,10");
        return $this->render("index",compact("arrNav","arrBanner","arrData"));
    }
    public function actionDel(){
        echo "m-del";
    }
}