<?php
namespace app\modules\home\controllers;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;
use app\ext\Modeli;
use app\ext\Page;
error_reporting(0);
class IndexController extends Controller {
    public $layout = "inc.php";
    public function actionIndex() {
        logyiix("../log/log1.txt");
        $model = new Modeli();
        $page = new Page();
        $sql = "select count(*) as total from mzsm_goods where is_recommend = 1";
        $showPage = 4;
        $recommend = $model->action($sql);
        $page->init($recommend[0]['total'],$showPage);
        $total = $page->totalPage;
        $int = floor($total/3);
        //推荐
        $sqlPage1 = $this->layoutSql." where g.is_recommend = 1 limit ".rand(0,$int).",{$showPage} ;";
        $recommendpage1 = $model->action($sqlPage1);
        $sqlPage2 = $this->layoutSql." where g.is_recommend = 1 limit ".rand($int+1,floor( ($total/($int*2))*10 )).",{$showPage} ;";
        $recommendpage2 = $model->action($sqlPage2);
        $sqlPage3 = $this->layoutSql." where g.is_recommend = 1 limit ".rand(floor( ($total/($int*2))*10 )+1,$total).",{$showPage} ;";
        $recommendpage3 = $model->action($sqlPage3);
        $recommendpage = [$recommendpage1,$recommendpage2,$recommendpage3];
        //非推荐
        $sqlData = $this->layoutSql;
        $arrData = $model->action($sqlData);
        //banner
        $sqlBanner ="select id,name,url from shop_banner where type='pc' order by id desc";
        $arrBanner = $model->action($sqlBanner);
        return $this->render("index",compact('recommendpage','arrData',"arrBanner"));
    }
    public function actionSearch(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $search = preg_replace("/[%_]+/","",ltrim($request->get('search')));
        $searchSql = "select name from mzsm_cat where level = 1";
        $cat = $db->createCommand($searchSql)->queryAll();
        if( $search == "" ){
            $arrData = [];
        }else{
            $sql = $this->laySelectSql." where t.name = :search ";
            $arrData = $db->createCommand($sql,[":search"=>$search])->queryAll();
            if(empty($arrData)){
                $sql = $this->laySelectSql." where g.goods_name like concat('%', :search ,'%') ";
                $arrData = $db->createCommand($sql,[":search"=>$search])->queryAll();
            }
        }
        return $this->render("search",compact("arrData",'cat'));
    }
    public function actionGoodsdetail(){
        $request = Yii::$app->request;
        $id = $request->get("id");
        if(!empty($id)){
            $db = Yii::$app->db;
            //单个商品
            $data = $db->createCommand($this->layAllSql." where g.goods_id = {$id}")->queryOne();
            //面包屑数据
            $crumbsData = $this->crumbs[$data['mzsm_cat_id']];
            //导航数据
            $navData = $this->nav[$crumbsData];
            //热搜
            $click_count = $db->createCommand($this->layAllSql." order by g.click_count desc limit 0,9")->queryAll();
            //热卖
            $is_hot = $db->createCommand($this->layAllSql." order by g.is_hot desc limit 0,5")->queryAll();
            //收藏
            if(!empty($_COOKIE['username'])){
                $mycollectionSql = "select * from shop_user_collection where goods_id={$id} and username='{$_COOKIE['username']}'";
                $mycollectionData = $db->createCommand($mycollectionSql)->queryOne();
            }else{
                $mycollectionData = "";
            }
            //规格
            $specData = $db->createCommand("select spec1,spec2,spec3,spec4,spec5,spec6,spec7,spec8 from mzsm_spec where goods_id = {$id}")->queryOne();
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
            $attrData = $db->createCommand("select attr from mzsm_attr where goods_id = {$id}")->queryOne();
            if(!empty($attrData)){
                $attr = $attrData['attr'];
            }else{
                $attr = [];
            }
            return $this->render("goodsDetail",compact("data","click_count","is_hot","crumbsData","navData",'mycollectionData','spec','attr'));
        }else{
            header("Location:?r=home/index/index");
        }
    }
    public function actionMycollection(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $id = $request->get("id");
        $user = $request->get("u");
        $type = $request->get("t");
        if($type == 'click2'){
            $sql = $this->layoutSql." where g.goods_id = ".$id;
            $arrData = $db->createCommand($sql)->queryOne();
            $addsql = "insert into shop_user_collection values(null,'{$user}',{$id},'{$arrData['goods_name']}','{$arrData['shop_price']}','{$arrData['image_url1']}')";
            $bool = $db->createCommand($addsql)->execute();
            if($bool){
                Yii::$app->response->data = ['code'=>0];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }
        }else{
            $bool = $db->createCommand()->delete("shop_user_collection","goods_id={$id} and username='{$user}'")->execute();
            if($bool){
                Yii::$app->response->data = ['code'=>0];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }
        }

    }

}

