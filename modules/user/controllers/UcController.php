<?php
namespace app\modules\user\controllers;
use app\modules\user\models\Uc;
use app\modules\user\models\User_collection;
use Yii;
use yii\web\Controller;
use yii\web\Cookie;

class UcController extends Controller{
    public $layout = "inc_uc.php";
    public function actionAccountsecurity(){
        return $this->render("accountsecurity");
    }
    public function actionLoginpassword(){
        return $this->render("loginpassword");
    }
    public function actionModifypassword(){
        return $this->render("modifypassword");
    }
    public function actionBindtelephone(){
        return $this->render("bindtelephone");
    }
    public function actionMypoints(){
        return $this->render("mypoints");
    }
    public function actionIntegraldetail(){
        return $this->render("integraldetail");
    }
    public function actionIndex(){
        $user = $_COOKIE['username'];
        $collectionArr = Uc::findsql("shop_user_collection","*",['username'=>$user]);
        $orderArr = Uc::findsql("shop_order","*",['consignee'=>$user,"pay_status"=>1],6,"order_id desc");
        return $this->render("index",compact("collectionArr","orderArr"));
     }
     public function actionMessage(){
         return $this->render("message");
     }
     public function actionMycollection(){

         $db = Yii::$app->db;
         $user = $_COOKIE['username'];
         $sql = "select * from shop_user_collection where username='{$user}'";
         $arrData = $db->createCommand($sql)->queryAll();

         return $this->render("mycollection",compact("arrData"));
     }

     public function actionDelmycoll(){
         $request = Yii::$app->request;
         $db = Yii::$app->db;
         $id = $request->get("id");
         $user = $_COOKIE['username'];
         $bool = $db->createCommand()->delete("shop_user_collection","goods_id = {$id} and username='{$user}'")->execute();
         if($bool){
             Yii::$app->response->data = ['code'=>0];
             Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         }else{
             Yii::$app->response->data = ['code'=>1];
             Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         }
     }
     public function actionMytracks(){
         return $this->render("mytracks");
     }
     public function actionAccountinfo(){
         if($_COOKIE['username']){
             $username = $_COOKIE['username'];
             $db = Yii::$app->db;
             $sql = "select * from shop_user where username='{$username}'";
             $arrData = $db->createCommand($sql)->queryOne();
             return $this->render("accountinfo",compact("arrData"));
         }else{
             echo "<script>alert('请先登录！');window.location.href='?r=home/login/login';</script>";
         }
     }
     public function actionUserinfo(){
         $request = Yii::$app->request;
         $db = Yii::$app->db;
         $tell = $request->post("tell");
         $nickname = $request->post("nickname");
         $birthdate = $request->post("birthdate");
         $sex = $request->post('sex');
         $username = $request->post('username');
         $sql = "update shop_user set tell={$tell},nickname='{$nickname}',sex='{$sex}',birthdate='{$birthdate}' where username='{$username}'";
         $bool = $db->createCommand($sql)->execute();
         if($bool){
             return $this->success("?r=user/uc/index",2);
         }else{
             return $this->error("保存失败",2);
         }
     }
     public function actionAddressmanagement(){
         $username = $_COOKIE['username'];
         $request = Yii::$app->request;
         $db = Yii::$app->db;
         if($request->isPost){
             $username = $request->post("username");
             $address = $request->post("address");
             $tell = $request->post("tell");
             $addr_a = $request->post('addr_a');
             $addr_c = $request->post('addr_c');
             $addr_p = $request->post('addr_p');
             $cityaddrX = $request->post('cityaddr').$request->post("address");
             $type = $request->post("type") ?? "2";
             if($type == "1"){//默认地址
                 $sqlAddrUpdate = "update shop_addr set type='2' where username='{$username}' ";
                 $db->createCommand($sqlAddrUpdate)->execute();
             }
             $sqlAddrInsert = "insert into shop_addr values(null,'{$username}','{$address}',{$tell},'{$type}','{$addr_a}','{$addr_c}','{$addr_p}','{$cityaddrX}')";
             $bool = $db->createCommand($sqlAddrInsert)->execute();
             if(!$bool){
                 return $this->error("添加失败",3);
             }else{
                 return $this->success("?r=user/uc/index",2);
             }
         }else{
             $sql = "select * from shop_province";
             $arrData = $db->createCommand($sql)->queryAll();
             $sqlAddr = "select * from shop_addr where username='{$username}' order by id desc";
             $arrDataAddr = $db->createCommand($sqlAddr)->queryAll();
             return $this->render("addressmanagement",compact("arrData","arrDataAddr"));
         }
     }

     public function actionAddressedit(){
         $request = Yii::$app->request;
         $username = $_COOKIE['username'];
         $db = Yii::$app->db;
         $type = $request->get("type");
         $id = $request->get("id");
         if($type == 2){
             $username = $request->post("username");
             $address = $request->post("address");
             $tell = $request->post("tell");
             $addr_a = $request->post('addr_a');
             $addr_c = $request->post('addr_c');
             $addr_p = $request->post('addr_p');
             $cityaddr = $request->post('cityaddr').$request->post("address");
             $id = $request->post("editid");
             $type2 = $request->post("type") ?? "2";
             if($type2 == "1"){//默认地址
                 $sqlAddrUpdate = "update shop_addr set type='2' where username='{$username}' ";
                 $db->createCommand($sqlAddrUpdate)->execute();
             }
             $sqlAddrInsert = "update shop_addr set username='{$username}',address='{$address}',tell={$tell},type='{$type}',addr_a='{$addr_a}',addr_c='{$addr_c}',addr_p='{$addr_p}',cityaddr='{$cityaddr}' where id={$id} and username='{$username}'";
             $bool = $db->createCommand($sqlAddrInsert)->execute();
             if(!$bool){
                 return $this->error("修改失败",3);
             }else{
                 return $this->success("?r=user/uc/index",2);
             }
         }else{
             $sqlAddr = "select S.id,S.username,S.address,S.tell,S.type,S.addr_a,S.addr_c,S.addr_p,A.area,C.city,P.province,S.cityaddr
                  from shop_addr as S
                  inner join shop_area as A on S.addr_a = A.areaID
                  inner join shop_city as C on S.addr_c = C.cityID
                  inner join shop_province as P on S.addr_p = P.provinceID
                  where S.id = {$id} and S.username='{$username}'
             ";
             $arrDataAddr = $db->createCommand($sqlAddr)->queryOne();
             Yii::$app->response->data = $arrDataAddr;
             Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         }
     }

     public function actionDefaultaddress(){
         $request = Yii::$app->request;
         $id = $request->get("id");
         $db = Yii::$app->db;
         $sql = "update shop_addr set type='2';update shop_addr set type='1' where id={$id} ";
         $db->createCommand($sql)->execute();
     }

     public function actionAddressdel(){
         $request = Yii::$app->request;
         $username = $_COOKIE['username'];
         $db = Yii::$app->db;
         $type = $request->get("type");
         if($type == 2){
             $id = $request->get("id");
             $db = Yii::$app->db;
             $sql = "delete from shop_addr where username='{$username}' and id={$id}";
             $bool = $db->createCommand($sql)->execute();
             if(!$bool){
                 return $this->error("添加失败",3);
             }else{
                 return $this->success("?r=user/uc/addressmanagement",3);
             }
         }else{
             $id = $request->get("id");
             $sqlAddr = "select * from shop_addr where username='{$username}' and id='{$id}'";
             $arrDataAddr = $db->createCommand($sqlAddr)->queryOne();
             Yii::$app->response->data = $arrDataAddr;
             Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
         }

     }
     public function actionAjax_urban_linkage(){
         $request = Yii::$app->request;
         if($request->isPost){
             $db = Yii::$app->db;
             $data = $request->post('data');
             $type = $request->post('type');
             if($type == 'province'){
                 $sql = "select cityID,city from shop_city where father='{$data}' ";
                 $arrData = $db->createCommand($sql)->queryAll();
                 Yii::$app->response->data = $arrData;
                 Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
             }else if($type == 'city'){
                 $sql = "select areaID,area from shop_area where father='{$data}' ";
                 $arrData = $db->createCommand($sql)->queryAll();
                 Yii::$app->response->data = $arrData;
                 Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
             }else{
                 $sql = "select P.province,C.city,A.area
                       from shop_area as A
                       inner join shop_city as C on A.father = C.cityID
                       inner join shop_province as P on C.father = P.provinceID
                       where A.areaID = '{$data}'";
                 $arrData = $db->createCommand($sql)->queryOne();
                 $strData = implode($arrData);
                 setcookie("address",urlencode($strData),time()+3600);
             }
         }else{
             return $this->error("请求失败",3);
         }
     }

}