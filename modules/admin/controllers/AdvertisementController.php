<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

class AdvertisementController extends Controller{

    public $layout = false;

    public function actionIndex(){

        $db = Yii::$app->db;
        $sql = "select * from shop_banner";
        $arrData = $db->createCommand($sql)->queryAll();

        return $this->render("index",compact("arrData"));
    }

    public function actionAdd(){
        $request = Yii::$app->request;
        if($request->isPost){
            $db = Yii::$app->db;
            $file = UploadedFile::getInstanceByName("file");
            $path = "/public/upload/banner/";
            $file_name = preg_replace("/[\s\－]+/","",iconv("utf-8","gb2312",$file->name));
            $dir = dirname(dirname(dirname(dirname(__FILE__)))).$path;
            $fileName  =  $dir.$file_name;
            if(!file_exists($dir)){
                mkdir($dir,0777,true);
            }

            //保存文件函数，将图片保存到本地
            $status = $file->saveAs($fileName,true);
            //进行判断,保存本地失败
            if($status){
                $data['id'] = null;
                $data['url'] = $path.$file_name;
                $data['name'] = $request->post("name");
                $bool = $db->createCommand()->insert("shop_banner",$data)->execute();
                if($bool){
                    return $this->success("?r=admin/advertisement/index",2);
                }else{
                    return $this->error("添加失败",2);
                }
            }else{
                return $this->error("上传图片失败",2);
            }
        }else{
            return $this->render("add");
        }
    }

    public function actionEdit(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        if($request->isPost){
            $file = UploadedFile::getInstanceByName("file");
            $id = $request->post("id");
            $data['name'] = $request->post("name");
            if(!empty($file)){
                $path = "/public/upload/banner/";
                $file_name = preg_replace("/[\s\－]+/","",iconv("utf-8","gb2312",$file->name));
                $dir = dirname(dirname(dirname(dirname(__FILE__)))).$path;
                $fileName  =  $dir.$file_name;
                if(!file_exists($dir)){mkdir($dir,0777,true);}
                $status = $file->saveAs($fileName,true);
                if($status){
                    $data['url'] = $path.$file_name;
                    $bool = $db->createCommand()->update("shop_banner",$data,"id=".$id)->execute();
                    return $this->statusUrl($bool,"?r=admin/advertisement/index","修改失败",2);
                }else{
                    return $this->error("上传图片失败",2);
                }
            }else{
                $bool = $db->createCommand()->update("shop_banner",$data,"id=".$id)->execute();
                return $this->statusUrl($bool,"?r=admin/advertisement/index","修改失败",2);
            }
        }else{
            $sql = "select * from shop_banner where id=".$request->get('id');
            $arrData = $db->createCommand($sql)->queryOne();
            return $this->render("edit",compact('arrData'));
        }
    }

    public function actionDel(){

    }

}