<?php
namespace app\modules\mobile\controllers;
use app\modules\mobile\models\M;
use yii\web\Controller;
class IndexController extends Controller{
    public $layout = "m_main";
    public function actionIndex(){
        $arrBanner = M::findsqllo("shop_banner","*",["type"=>'m'],9);
        $arrNav = M::findsql("mzsm_cat","mobile_name,image",["level"=>1]);
        $arrrRecommend[0] = M::findjoinsql("mzsm_goods AS g","inner join","mzsm_img AS i","i.goods_id = g.goods_id","g.goods_id,g.goods_name,g.shop_price,i.image_url1,g.mzsm_cat_id",['g.is_recommend'=>1],4,0);
        $arrrRecommend[1] = M::findjoinsql("mzsm_goods AS g","inner join","mzsm_img AS i","i.goods_id = g.goods_id","g.goods_id,g.goods_name,g.shop_price,i.image_url1,g.mzsm_cat_id",['g.is_recommend'=>1],4,5);
        $arrHot = M::findjoinsql("mzsm_goods AS g","inner join","mzsm_img AS i","i.goods_id = g.goods_id","*",[],4,0,"g.is_hot desc");
        $arrClick = M::findjoinsql("mzsm_goods AS g","inner join","mzsm_img AS i","i.goods_id = g.goods_id","*",[],4,0,"g.click_count desc");
        return $this->render("index",compact("arrBanner","arrNav","arrrRecommend","arrHot","arrClick"));
    }
    public function actionSearch(){
        $this->layout = false;
        $search = preg_replace("/[%_]+/","",ltrim($this->request->post("search")));
        if(empty($search)){
            $search = "黄金";
        }
        $arrData = M::findjoinsql("mzsm_goods AS g","inner join","mzsm_img AS i","i.goods_id = g.goods_id","*",["like","g.goods_name",$search]);
        $arrNav = M::findsql("mzsm_cat","mobile_name,image",["level"=>1]);
        return $this->render("search",compact("arrData","arrNav","search"));
    }
    public function actionGoodsdetail(){
        $this->layout = false;
        $goodsid = $this->request->get("id");
        $arrData = M::findsqlone("mzsm_goods","*",['goods_id'=>$goodsid]);
        $urlData = M::findsqlone("mzsm_img","*",['goods_id'=>$goodsid]);
        //规格
        $specData = M::findsqlone("mzsm_spec","spec1,spec2,spec3,spec4,spec5,spec6,spec7,spec8",['goods_id'=>$goodsid]);
        if(!empty($specData)){
            $spec = [];
            $keyx = [];

            foreach ($specData as $ske=>$sv){
                $jsondata = json_decode($sv,true);

                $keyx[] = $ske;
                for($i=0;$i<count($keyx);$i++){
                    if($jsondata[$keyx[$i]] != null){
                        $spec[] = [ $jsondata[$keyx[$i]] => $jsondata[$keyx[$i]."x"] ];
                    }
                }
            }
            $spec = json_encode($spec,320);
        }else{
            $spec = [];
        }
        //属性
        $attrData = M::findsqlone("mzsm_attr","attr",['goods_id'=>$goodsid]);
        if(!empty($attrData)){
            $attr = $attrData['attr'];
        }else{
            $attr = [];
        }
        return $this->render("goodsdetail",compact("arrData","urlData","spec","attr"));
    }
}