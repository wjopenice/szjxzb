<?php
namespace app\modules\home\controllers;

use app\modules\user\models\Uc;
use yii\helpers\Url;
use yii\web\Controller;
use Yii;
use app\ext\Sms;

class LoginController extends Controller{
    public $layout = "inc_login.php";
    public function actionLogin(){
        $request = Yii::$app->request;
        if($request->isPost){
            $db = Yii::$app->db;
            $username = $request->post("username");
            $exp = "/^(13|15|18|17)\d{9}$/";
            $int = preg_match($exp,$username,$arr);
            $userpass = $request->post("userpass");
            if($int == 1){
                $sqluser = "select userpass from shop_user where tell = :u";
            }else{
                $sqluser = "select userpass from shop_user where username = :u";
            }
            $arrpwd = $db->createCommand($sqluser,[":u"=>$username])->queryAll();
            if(!empty($arrpwd)){
                $pwd = $arrpwd[0]['userpass'];
                if (Yii::$app->getSecurity()->validatePassword($userpass, $pwd)) {
                    if($int == 1) {
                        $sql = "select username from shop_user where tell= {$username}";
                        $user = $db->createCommand($sql)->queryOne();
                        setcookie("username", $user['username'], time() + 3600);
                    }else{
                        setcookie("username", $username, time() + 3600);
                    }
                    return $this->success("?r=home/index/index",2);
                } else {
                    return $this->error("账号密码错误",2);
                }
            }else{
                return $this->error("没有此账号",2);
            }
        }else{
            return $this->render("login");
        }
    }
    public function actionLoginout(){
        setcookie("username","",time()-1);
        header("Location:?r=home/login/login");
    }
    public function actionRegister(){
        $request = Yii::$app->request;
        if($request->isPost){
            $db = Yii::$app->db;
            $tell = $request->post("tell");
            $pwd = $request->post("password");
            if((!empty($pwd)) && ($_COOKIE['u'] == 1)){
                $password = Yii::$app->getSecurity()->generatePasswordHash($pwd);
                $userID = Mer_shuffle("sdt_",20);
                $username = $tell;
                $sql = "insert into shop_user (username,userpass,tell,userID,birthdate) values(:u,:p,:t,'{$userID}',CURDATE())";
                $bool = $db->createCommand($sql,[':u'=>$username,':p'=>$password,':t'=>$tell])->execute();
                if($bool){
                    return $this->success("?r=home/login/login",2);
                }else{
                    return $this->error("注册失败",2);
                }
            }else{
                return $this->error("注册失败,密码为空或者没有验证确认密码",2);
            }
        }else{
            return $this->render("register");
        }

    }
    public function actionAccountregister(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        if($request->isPost){
            $username = $request->post("username");
            $userpass = Yii::$app->getSecurity()->generatePasswordHash($request->post("userpass"));
            $tell = $request->post("tell");
            $userID = Mer_shuffle("sdt_",20);
            $sql = "insert into shop_user (username,userpass,tell,userID,birthdate) values(:u,:p,:t,'{$userID}',CURDATE())";
            $bool = $db->createCommand($sql,[':u'=>$username,':p'=>$userpass,':t'=>$tell])->execute();
            if($bool){
                return $this->success("?r=home/login/login",2);
            }else{
                return $this->error("注册失败",2);
            }
        }else{
            return $this->render("accountRegister");
        }
    }
    public function actionAjaxlogin(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $data = $request->get("d");
        if($request->get("type") == 1){
            $sql = "select * from shop_user where username = :username ";
            $arrData = $db->createCommand($sql,[':username'=>$data])->queryColumn();
            if(!empty($arrData)){
                Yii::$app->response->data = ["code"=>"1"];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }else{
                Yii::$app->response->data = ["code"=>"2"];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }
        }else{
            $sql = "select * from shop_user where tell = :tell ";
            $arrData = $db->createCommand($sql,[':tell'=>$data])->queryColumn();
            if(!empty($arrData)){
                Yii::$app->response->data = ["code"=>"1"];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }else{
                Yii::$app->response->data = ["code"=>"2"];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }
        }
    }
    public function actionForgetpwd(){
        $str = "";
        $str .= $this->render("../layouts/inc_header");
        $str .= $this->render("forgetPwd");
        $str .= $this->render("../layouts/inc_footer");
        return $str;
    }
    public function actionAjaxsms(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        if($request->isPost){
            $username = $request->post('username');
            //手机号已被绑定验证
            $sql = "select tell from shop_user where tell=:tell ";
            $arrData = $db->createCommand($sql,[':tell'=>$username])->queryAll();
            if(!empty($arrData)){
                Yii::$app->response->data = ['status'=>0,'error'=>"手机号已被其他账号绑定"];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }else{
                Yii::$app->response->data = ['status'=>1];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }
        }
    }
    public function actionAjaxsms2(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        if($request->isPost){
            $username = $request->post('d');
            //手机号已被绑定验证
            $sql = "select tell from shop_user where tell=:tell ";
            $arrData = $db->createCommand($sql,[':tell'=>$username])->queryAll();
            if(!empty($arrData)){
                Yii::$app->response->data = ['status'=>0,'error'=>"手机号已被其他账号绑定"];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }else{
                Yii::$app->response->data = ['status'=>1];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }
        }
    }
    public function actionTelsvcode($delay=10,$flag=true){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $phone = $request->post("phone");
        /// 产生手机安全码并发送到手机且存到session
        $rand = rand(100000,999999);
        $xigu = new Sms();
        $result = $xigu->send_verify($phone,$rand);
        // 存储短信发送记录信息
        $result['create_time'] = time();
        $result['pid']=0;
        $error = "";
        switch ($result['Code']){
            case "isv.BUSINESS_LIMIT_CONTROL" : $status = 5; $error .='同一手机号，每分钟1条，每小时7条，一天50条上线';break;
            case "OK" :$status = 1; $error .='验证码已发送，请查收';break;
            case "isv.MOBILE_NUMBER_ILLEGAL" : $status = 4; $error .='使用合法的手机号码';break;
            default : $status = 0; $error .='验证码发送失败';break;
        }
        file_put_contents("sms.txt",$result['Code']);
        if($result['Code'] == "OK"){
            $sql = "INSERT INTO shop_sms VALUES (null, '{$phone}', NOW(), '{$result['Code']}', {$rand})";
            $arrData = $db->createCommand($sql)->execute();
            if($arrData){
                $telsvcode['code']=$rand;
                $telsvcode['phone']=$phone;
                $telsvcode['time']=$result['create_time'];
                $telsvcode['delay']=$delay;
                $_SESSION['telsvcode'] = $telsvcode;
            }else{
                $status = 2; $error .='写入数据库失败';
            }
        }
        Yii::$app->response->data = ['status'=>$status,'error'=>$error];
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }
    public function actionAjaxsmscode(){
       $request = Yii::$app->request;
       $db = Yii::$app->db;
       if($request->post('code')){
           $code = $request->post('code');
           $phone = $request->post('phone');
           $sql = "select * from shop_sms where tell={$phone} and smscode={$code}";
           $codeData = $db->createCommand($sql)->queryAll();
           if(!empty($codeData)){
               Yii::$app->response->data = ['status'=>0,'error'=>'验证通过'];
               Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           }else{
               Yii::$app->response->data = ['status'=>1,'error'=>'验证失败，请重新验证'];
               Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
           }
       }else{
           Yii::$app->response->data = ['status'=>2,'error'=>'验证码为空'];
           Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
       }
    }
    public function actionAjaxsmscode2(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        if($request->post('code')){
            $code = $request->post('code');
            $phone = $request->post('phone');
            $sql = "select * from shop_sms where tell={$phone} and smscode={$code}";
            $codeData = $db->createCommand($sql)->queryAll();
            if(!empty($codeData)){
                Yii::$app->response->data = ['status'=>1,'error'=>'验证失败，请重新验证'];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }else{
                Yii::$app->response->data = ['status'=>0,'error'=>'验证通过'];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }
        }else{
            Yii::$app->response->data = ['status'=>2,'error'=>'验证码为空'];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
    public function actionAjaxtell(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $tell = $request->post("tell");
        $sql = "select tell from shop_user where tell = :tell and username = '{$_COOKIE['username']}'";
        $arrData = $db->createCommand($sql,[':tell'=>$tell])->queryOne();
        if(!empty($arrData)){
            Yii::$app->response->data = ['code'=>1];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }else{
            Yii::$app->response->data = ['code'=>0];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
    public function actionAjaxuserid(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $userid = $request->post("userid");
        $sql = "select tell from shop_user where userid = :uid and username = '{$_COOKIE['username']}'";
        $arrData = $db->createCommand($sql,[':uid'=>$userid])->queryOne();
        if(!empty($arrData)){
            Yii::$app->response->data = ['code'=>1];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }else{
            Yii::$app->response->data = ['code'=>0];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
    public function actionAjaxpass(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $userpass = Yii::$app->getSecurity()->generatePasswordHash($request->post("userid"));
        $sql = "update shop_user set userpass = '{$userpass}' where username='{$_COOKIE['username']}'";
        $arrData = $db->createCommand($sql)->execute();
        if($arrData){
            Yii::$app->response->data = ['code'=>1];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }else{
            Yii::$app->response->data = ['code'=>0];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
    public function actionUserverify(){
        $user = $this->request->get('user');
        $tellData = Uc::findsqlone("shop_user","*",["tell"=>$user]);
        $userData = Uc::findsqlone("shop_user","*",["username"=>$user]);
        if(empty($tellData) && empty($userData) ){
            Yii::$app->response->data = ['code'=>0];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }else{
            $tell = $userData['tell'];
            setcookie("username",$user,time()+60);
            Yii::$app->response->data = ['code'=>1,'tell'=>$tell];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
}