<?php
namespace app\modules\admin\controllers;
use app\ext\Image;
use Yii;
class LoginController extends BaseController{
    public function actionIndex(){
        $request = Yii::$app->request;
        $session = Yii::$app->session;
        $db = Yii::$app->db;
        if($request->isPost){
            if($_COOKIE['code'] == 1){
                $username = $request->post("username");
                $password = $request->post("userpass");
                $sql = "select * from shop_admin where username=:u";
                $userdata =$db->createCommand($sql,[':u'=>$username])->queryAll();
                if(!empty($userdata)){
                    $passdata = $userdata[0]['password'];
                    if(Yii::$app->getSecurity()->validatePassword($password, $passdata)){
                        $sqllog = "update shop_admin set add_time=NOW(),last_ip='{$_SERVER['REMOTE_ADDR']}' where username='{$username}'";
                        $db->createCommand($sqllog)->execute();
                        $session->set('username', $username);
                        $session->set('id', $userdata[0]['id']);
                        //登陆日志
                        update_admin_log($userdata[0]['id'],array('log_info'=>'后台登录','log_ip'=>$_SERVER['REMOTE_ADDR'],'log_url'=>'admin/login/index'));
                        return $this->success("?r=admin/index/index",2);
                    }else{
                        return $this->error("账号密码错误",2);
                    }
                }else{
                    return $this->error("没有此账号",2);
                }
            }else{
                return $this->error("验证码没有通过",2);
            }
        }else{
            $this->layout = false;
            return $this->render("index");
        }
    }
    public function actionVerify(){
        header("content-type:image/png");
        Image::code(100,36,15,15,20,25,"./web/fonts/MSYHBD.TTC");
    }
    public function actionLoginout(){
        $session = Yii::$app->session;
        $session->remove("username");
        header("Location:?r=admin/login/index");
    }
    public function actionAjaxverify(){
        $request = Yii::$app->request;
        $session = Yii::$app->session;
        $data =  strtolower($request->get('data'));
        $yzm = $session->get("yzm");
        if($data === $yzm){
            setcookie("code",1,time()+60);
            Yii::$app->response->data = ['code'=>'success'];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }else{
            setcookie("code",0,time()+60);
            Yii::$app->response->data = ['code'=>"error"];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
}