<?php
namespace app\modules\mobile\controllers;
use yii\web\Controller;
use app\modules\mobile\models\M;
use app\ext\Sms;
use Yii;
class LoginController extends Controller{
    public $layout = false;
    public function actionIndex(){
        if( $this->request->isPost){
            $username = $this->request->post("user");
            $exp = "/^(13|15|18|17)\d{9}$/";
            $int = preg_match($exp,$username,$arr);
            $userpass = $this->request->post("pass");
            if($int == 1){
                $arrpwd = M::findsql("shop_user","userpass",["tell"=>$username]);
            }else{
                $arrpwd = M::findsql("shop_user","userpass",["username"=>$username]);
            }
            if(!empty($arrpwd)){
                $pwd = $arrpwd[0]['userpass'];
                if (Yii::$app->getSecurity()->validatePassword($userpass, $pwd)) {
                    if($int == 1) {
                        $user = M::findsqlone("shop_user","username",["tell"=>$username]);
                        setcookie("username", $user['username'], time() + 3600);
                    }else{
                        setcookie("username", $username, time() + 3600);
                    }
                    return $this->success("?m=m/index/index",2);
                } else {
                    return $this->error("账号密码错误",2);
                }
            }else{
                return $this->error("没有此账号",2);
            }
        }else{
            return $this->render("index");
        }
    }
    public function actionForgetpwd(){
        return $this->render("forgetpwd");
    }
    public function actionRegister(){
        if($this->request->isPost){
            $registerType = $this->request->post("registerType");
            if($registerType == "accountRegBox"){//用户注册
                $data['username'] =$this->request->post("user");
                $data['userpass'] =Yii::$app->getSecurity()->generatePasswordHash($this->request->post("pass"));
                $data['tell'] =$this->request->post("tell");
            }else{//手机注册
                $data['username'] =$this->request->post("ptell");
                $data['userpass'] =Yii::$app->getSecurity()->generatePasswordHash($this->request->post("ppass"));
                $data['tell'] =$this->request->post("ptell");
            };
            $data['userID'] =Mer_shuffle("sdt_",20);
            $data['birthdate'] =date("Y-m-d");
            $bool = $this->db->createCommand()->insert("shop_user",$data)->execute();
            return $this->statusUrl($bool,"?m=m/login/index","注册失败",2);
        }else{
            setcookie("key1",0,time()+60);
            setcookie("key2",0,time()+60);
            setcookie("key3",0,time()+60);
            return $this->render("register");
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
    public function actionAjaxuser(){
        $this->enableCsrfValidation = false;
        $user = $this->request->post("user");
        $userData = M::findsqlone("shop_user","username",['username'=>$user]);
        if(!empty($userData)){
            Yii::$app->response->data = ['code'=>1];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }else{
            Yii::$app->response->data = ['code'=>0];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
    public function actionAjaxtell(){
        $this->enableCsrfValidation = false;
        $tell = $this->request->post("tell");
        $userData = M::findsqlone("shop_user","username",['tell'=>$tell]);
        if(!empty($userData)){
            Yii::$app->response->data = ['code'=>1];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }else{
            Yii::$app->response->data = ['code'=>0];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
    public function actionAjaxsmscode(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $code = $request->post('code');
        $phone = $request->post('phone');
        $codeData = M::findsql("shop_sms","*",['tell'=>$phone,'smscode'=>$code]);
        if(!empty($codeData)){
            Yii::$app->response->data = ['status'=>0,'error'=>'验证通过'];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }else{
            Yii::$app->response->data = ['status'=>1,'error'=>'验证失败，请重新验证'];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }

    }
}