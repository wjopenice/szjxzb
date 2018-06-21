<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\ext\Modeli;
use app\ext\Page;
use yii\web\UploadedFile;
use Yii;

class MzsmController extends Controller{

    public $layout = false;
    public $enableCsrfValidation = false;
    public function actionSelect(){
        $db = Yii::$app->db;
        $where = '';
        //分类
        if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id']){
            $where .= ' where g.mzsm_cat_id='.$_REQUEST['cat_id'];
        }
        //上下架
        if(isset($_REQUEST['is_on_sale']) && $_REQUEST['is_on_sale']){
            if($where){
                $where .= ' and g.is_on_sale='.($_REQUEST['is_on_sale']-1);
            }else{
                $where .= ' where g.is_on_sale='.($_REQUEST['is_on_sale']-1);
            }
        }
        //新品 推荐
        if(isset($_REQUEST['intro']) && $_REQUEST['intro']){
            if($where){
                $where .= ' and g.'.$_REQUEST['intro'].'=1';
            }else{
                $where .= ' where g.'.$_REQUEST['intro'].'=1';
            }
        }
        //关键词
        if(isset($_REQUEST['key_word']) && $_REQUEST['key_word']){
            if($where){
                $where .= ' and g.keywords like "%'.$_REQUEST['key_word'].'%"';
            }else{
                $where .= ' where g.keywords like "%'.$_REQUEST['key_word'].'%"';
            }
        }
        $page = new Page();
        $count = $db->createCommand("select count(*) from mzsm_goods as g".$where)->queryScalar();
        $page->init(intval($count),14);
        $sql = "select *  from mzsm_goods as g  inner join mzsm_cat as t on t.id = g.mzsm_cat_id".$where." ORDER BY g.goods_id DESC ".$page->limit;
        $arrData = $db->createCommand($sql)->queryAll();
        $pageShow = $page->show();
        //分类
        $typeList = $db->createCommand("select * from mzsm_cat where level = 1")->queryAll();
        return $this->render("select",compact("arrData","pageShow","typeList"));
    }

    public function actionIndex(){
//        $db = Yii::$app->db;
//        $db->createCommand()->insert("mzsm_img",['goods_id'=>145])->execute();

    }

    public function actionAdd(){

        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $inputData = $request->post();
        unset($inputData['btn']);

        $data['goods_sn'] = Mer_shuffle("mzsm",21);
        $data['on_time'] = date("Y-m-d H:i:s",time()+0);
        $data['last_update'] = date("Y-m-d H:i:s",time()+0);
        $data['give_integral'] = floor($request->post("shop_price") /100) ;

        $goods = array_merge($inputData,$data);

        $boolData = $db->createCommand()->insert("mzsm_goods",$goods)->execute();

        if($boolData){
            //添加默认商品图片
            $goodData = $db->createCommand("select * from mzsm_goods where goods_sn = '{$data['goods_sn']}'")->queryOne();
            $db->createCommand()->insert("mzsm_img",['goods_id'=>$goodData['goods_id']])->execute();
            //添加默认规格参数
            $db->createCommand()->insert("mzsm_spec",['goods_id'=>$goodData['goods_id']])->execute();
            //添加默认属性参数
            $db->createCommand()->insert("mzsm_attr",['goods_id'=>$goodData['goods_id']])->execute();
            return $this->success("?r=admin/mzsm/select",2);
        }else{
            return $this->error("添加商品失败",2);
        }
    }

    public function actionAddpic(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $id = $request->post("goods_id");
        $file = UploadedFile::getInstancesByName("file");
        $year = date("Y",time()+0);
        $time = date("m-d",time()+0);
        //文件的绝对路径
        $path =  "/public/upload/goods/".$year."/".$time."/";
        $dir = dirname(dirname(dirname(dirname(__FILE__)))).$path;
        if(!file_exists($dir)){
            mkdir($dir,0777,true);
        }
        $data = [];
//        foreach ($file as $key=> $fl) {
//            //$file_name = preg_replace("/[\s\－]+/","",iconv("utf-8","gb2312",$fl->name));
//            $file_name = mb_splitchar(preg_replace("/[\s\－]+/","",iconv("utf-8","gb2312",$fl->name)));
//            $fileName  =  $dir.$file_name;
//            $status = $fl->saveAs($fileName,true);
//            $data[]  = $path.$file_name;
//        }
        //文件上传
        for ($i=0;$i<count($file);$i++){
            $file_name = mb_splitchar(preg_replace("/[\s\－]+/","",iconv("utf-8","utf-8",$file[$i]->name)));
            $fileName  =  $dir.$file_name;
            $status = $file[$i]->saveAs($fileName,true);
            $data[]  = $path.$file_name;
        }
        //存数据库
        if($status){
            $count = count($data);
            $sql = "";
            switch ($count){
                case 0:$sql .= "goods_id=".$id; break;
                default:
                    $fileX = $_FILES['file'];
                    $editsql = "";
                    foreach ($fileX as $key=>$value){
                        foreach ($value as $k=>$v){
                            $file_name1 = mb_splitchar(preg_replace("/[\s\－]+/","",iconv("utf-8","utf-8",$v)));
                            $fileName1  =  $path.$file_name1;
                            if(!empty($v)){
                                $editsql .= "image_url".($k+1)."='".$fileName1."',";
                            }
                        }
                        break;
                    }
                    $sql .= substr($editsql,0,-1);
                    break;
            };
            $picsql = "update mzsm_img set {$sql} where goods_id = ".$id;
            $bool = $db->createCommand($picsql)->execute();
            if($bool){
                return $this->success("?r=admin/mzsm/select",2);
            }else{
                return $this->error("图片修改失败",2);
            }
        }else{
            return $this->error("图片上传失败",2);
        }


    }

    public function actionPic(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $id = $request->get("id");
        $arrData = $db->createCommand("select * from mzsm_img where goods_id = ".$id)->queryOne();
        return $this->render("pic",compact('arrData'));
    }

    public function actionInsert(){

        $db = Yii::$app->db;
        $catData = $db->createCommand("select id,name from mzsm_cat where level = 1")->queryAll();
        $brandData = $db->createCommand("select id,name from mzsm_brand order by id desc")->queryAll();
        $typeData = $db->createCommand("select id,name from mzsm_type order by id desc")->queryAll();
        return $this->render("insert",compact("catData","brandData","typeData"));

    }

    public function actionEdit(){

        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $inputData = $request->post();
        $id = $inputData['goods_id'];
        unset($inputData['btn']);
        unset($inputData['goods_id']);
        $data['last_update'] = date("Y-m-d H:i:s",time()+0);
        $goods = array_merge($inputData,$data);

        $boolData =  $db->createCommand()->update("mzsm_goods",$goods,"goods_id=".$id)->execute();
        if($boolData){
            return $this->success("?r=admin/mzsm/select",2);
        }else{
            return $this->error("修改商品失败",2);
        }

    }

    public function actionUpdate(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;

        $catData = $db->createCommand("select id,name from mzsm_cat where level = 1")->queryAll();
        $brandData = $db->createCommand("select id,name from mzsm_brand order by id desc")->queryAll();
        $typeData = $db->createCommand("select id,name from mzsm_type order by id desc")->queryAll();

        $arrData = $db->createCommand("select * from mzsm_goods where goods_id = ".$request->get("id") )->queryOne();

        return $this->render("update",compact("catData","brandData","typeData","arrData"));

    }

    public function actionDelete(){
        return $this->render("delete");
    }

    public function actionSpec(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        if($request->isPost){

            $postData = $request->post();
            $goodid = $postData['goods_id'];

            $jsonData1 = json_encode(['spec1'=> $postData['spec1'],'spec1x'=>$postData['spec1x']],320);
            $jsonData2 = json_encode(['spec2'=> $postData['spec2'],'spec2x'=>$postData['spec2x']],320);
            $jsonData3 = json_encode(['spec3'=> $postData['spec3'],'spec3x'=>$postData['spec3x']],320);
            $jsonData4 = json_encode(['spec4'=> $postData['spec4'],'spec4x'=>$postData['spec4x']],320);
            $jsonData5 = json_encode(['spec5'=> $postData['spec5'],'spec5x'=>$postData['spec5x']],320);
            $jsonData6 = json_encode(['spec6'=> $postData['spec6'],'spec6x'=>$postData['spec6x']],320);
            $jsonData7 = json_encode(['spec7'=> $postData['spec7'],'spec7x'=>$postData['spec7x']],320);
            $jsonData8 = json_encode(['spec8'=> $postData['spec8'],'spec8x'=>$postData['spec8x']],320);

            $sql = "update mzsm_spec set spec1='{$jsonData1}',spec2='{$jsonData2}',spec3='{$jsonData3}',spec4='{$jsonData4}',spec5='{$jsonData5}',spec6='{$jsonData6}',spec7='{$jsonData7}',spec8='{$jsonData8}' where goods_id={$goodid}";

            $bool = $db->createCommand($sql)->execute();
            if($bool){
                return $this->success("?r=admin/mzsm/select",2);
            }else{
                return $this->error("修改规格失败",2);
            }

        }else{
            $name = $request->get('name');
            $id = $request->get("id");

            $sql = "select * from mzsm_spec where goods_id = {$id}";
            $arrData = $db->createCommand($sql)->queryOne();

            $data['x1'] = json_decode($arrData['spec1'],true);
            $data['x2'] = json_decode($arrData['spec2'],true);
            $data['x3'] = json_decode($arrData['spec3'],true);
            $data['x4'] = json_decode($arrData['spec4'],true);
            $data['x5'] = json_decode($arrData['spec5'],true);
            $data['x6'] = json_decode($arrData['spec6'],true);
            $data['x7'] = json_decode($arrData['spec7'],true);
            $data['x8'] = json_decode($arrData['spec8'],true);

            return $this->render("spec",compact('name','id','data'));
        }
    }

    public function actionAddspec(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        if($request->isPost){

            $postData = $request->post();
            $goodid = $postData['goodis'];
            unset($postData['_csrf']);
            unset($postData['btn']);

            $jsonData1 = json_encode(['spec1'=> $postData['spec1'],'spec1x'=>$postData['spec1x']],320);
            $jsonData2 = json_encode(['spec2'=> $postData['spec2'],'spec2x'=>$postData['spec2x']],320);
            $jsonData3 = json_encode(['spec3'=> $postData['spec3'],'spec3x'=>$postData['spec3x']],320);
            $jsonData4 = json_encode(['spec4'=> $postData['spec4'],'spec4x'=>$postData['spec4x']],320);
            $jsonData5 = json_encode(['spec5'=> $postData['spec5'],'spec5x'=>$postData['spec5x']],320);
            $jsonData6 = json_encode(['spec6'=> $postData['spec6'],'spec6x'=>$postData['spec6x']],320);
            $jsonData7 = json_encode(['spec7'=> $postData['spec7'],'spec7x'=>$postData['spec7x']],320);
            $jsonData8 = json_encode(['spec8'=> $postData['spec8'],'spec8x'=>$postData['spec8x']],320);

            $sql = "insert into mzsm_spec values(null,{$goodid},'{$jsonData1}','{$jsonData2}','{$jsonData3}','{$jsonData4}','{$jsonData5}','{$jsonData6}','{$jsonData7}','{$jsonData8}')";
            $bool = $db->createCommand($sql)->execute();
            if($bool){
                return $this->success("?r=admin/mzsm/select",2);
            }else{
                return $this->error("添加规格失败",2);
            }
        }else{
            $sqlspec = "select goods_id from mzsm_spec";
            $specData = $db->createCommand($sqlspec)->queryAll();
            $strData = "";
            foreach ($specData as $k=>$v){
               $strData .= implode(",",$v).",";
            }
            $strSql = substr($strData,0,-1);
            $sql = "select * from mzsm_goods where goods_id not in ({$strSql})";
            $spec = $db->createCommand($sql)->queryAll();
            return $this->render("addspec",compact('spec'));
        }

    }

    public function actionProperty(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        if($request->isPost){
           $data = $request->post();
           $id = $data['goods_id'];
           unset($data['btn']);
           unset($data['goods_id']);
           $jsonData = json_encode($data,320);
           $sql = "update mzsm_attr set attr='".$jsonData."' where goods_id = ".$id;
           $bool = $db->createCommand($sql)->execute();
           return $this->statusUrl($bool,"?r=admin/mzsm/select","修改属性失败");
        }else{
            $name = $request->get('name');
            $id = $request->get("id");
            $sql = "select * from mzsm_attr where goods_id = ".$id;
            $arrData = $db->createCommand($sql)->queryOne();

            if(!empty($arrData['attr'])){
                $str = $arrData['attr'];
            }else{
                $str = "{}";
            }
            return $this->render("property",compact('name','id','arrData',"str"));
        }
    }

    public function actionAddproperty(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        if($request->isPost){
            $data = $request->post();
            $goodid = $data['goods_id'];
            unset($data['btn']);
            $attrData =  json_encode($data,320);
            $sql = "insert into mzsm_attr values(null,{$goodid},'{$attrData}')";
            $bool = $db->createCommand($sql)->execute();
            if($bool){
                return $this->success("?r=admin/mzsm/select",2);
            }else{
                return $this->error("添加属性失败",2);
            }
        }else{
            $sqlattr = "select goods_id from mzsm_attr";
            $attrData = $db->createCommand($sqlattr)->queryAll();
            if(!empty($attrData)){
                $strData = "";
                foreach ($attrData as $k=>$v){
                    $strData .= implode(",",$v).",";
                }
                $strSql = substr($strData,0,-1);
                $sql = "select goods_id,goods_name from mzsm_goods where goods_id not in ({$strSql})";
            }else{
                $sql = "select goods_id,goods_name from mzsm_goods";
            }
            $attr = $db->createCommand($sql)->queryAll();
            return $this->render("addproperty",compact("attr"));
        }
    }
}