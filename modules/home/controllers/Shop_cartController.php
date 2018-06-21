<?php
namespace app\modules\home\controllers;
use app\ext\Image;
use PHPUnit\Util\Log\JSON;
use yii\web\Controller;
use Yii;
use phpqrcode\QRcode;
class Shop_cartController extends Controller
{
    public $layout = "inc.php";
    public function actionIndex(){
        if(!empty($_COOKIE['username'])){
            //购物车数据
            $cartData = cartdata($_COOKIE['username']);
            $cartData = cartinct($cartData);
            //推荐产品
            $db = Yii::$app->db;
            $click_count = $db->createCommand($this->layAllSql." order by g.click_count desc limit 0,9")->queryAll();
            return $this->render("index",compact('cartData','click_count'));
        }else{
            echo "<script>alert('请先登录');window.location.href='?r=home/login/login';</script>";
        }
    }
    public function actionDel(){
         $request = Yii::$app->request;
         $user = $_COOKIE['username'];
         $goodid = $request->get('goodid');
         //购物车数据
         $data = cartdata($_COOKIE['username']);
         $cartData = cartinct($data);
         foreach ($cartData as $k=>$v){
             if($v['goodid']  == $goodid){
                 unset($cartData[$k]);
             }
         }
         $jsonData = "";
         foreach ($cartData as $k1=>$v1){
             $jsonData .= json_encode($cartData[$k1],320).",";
         }
         edityiicart($user,$jsonData);
         header("Location:?r=home/shop_cart/index");
    }
    public function actionSign(){
        $account = '64735951';
        $notify_url = 'http://www.szjxzb.cn/api.php?a=api/scan_pay/paycallback';
        $key = "18nvoj301gidltg7f508fh39hd69rpk8";
        $data['account'] = $account;
        $data['resqn'] = $_REQUEST['resqn']; //$this->request->re("resqn");
        $data['pay_amount'] = $_REQUEST['pay_amount'];//$this->request->post("pay_amount");
        $data['pay_way'] = $_REQUEST['pay_way'];//$this->request->post("pay_way");
        $data['body'] = $_REQUEST['body'];//$this->request->post("body");
//        $data['pay_amount'] = "0.01";
//        $data['body'] = "测试产品";
        $data['notify_url'] = $notify_url;
        $data['sign'] = sign($data,$key);
        $url = "http://www.szjxzb.cn/pay.php?pay=pay/scanpay/index";
        $buff = "";
        foreach ($data as $k => $v)
        {
            if($v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }
        $buff = trim($buff, "&");
        $strData = $this->request($url,$buff);
        $status = json_decode($strData,true);
//        $status = [
//            "resqn"=>"shop_20180612173915",
//            "payinfo"=>"weixin://wxpay/bizpayurl?pr=bEp3MTs",
//            "trxid"=>"",
//            "body"=>"睡衣女春秋季纯棉",
//            "trxstatus"=>"0000",
//            "sign"=> "5400a7849a4532732a71d5bca95c7b39"
//        ];
        if(!empty($status['payinfo'])){
            $phpqrcode = $status['payinfo'];
            include_once  ("./vendor/phpqrcode/phpqrcode.php");
            recordlog("../log/paylog.txt","支付链接------------>".$phpqrcode);
            header("Expires:-1");
            header("Cache-Control:no_cache");
            header("Pragma:no-cache");
            header("Content-type: image/png");
            QRcode::png($phpqrcode, false, "H", 15, 2);
            exit;
        }else{
            p($status);
            exit;
        }
    }

    protected function request($url,$params){
        $ch = curl_init();
        $this_header = array("content-type: application/x-www-form-urlencoded;charset=UTF-8");
        curl_setopt($ch,CURLOPT_HTTPHEADER,$this_header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);//如果不加验证,就设false,商户自行处理
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        $output = curl_exec($ch);
        curl_close($ch);
        return  $output;
    }
    public function actionPay(){
        $request = Yii::$app->request;
        $payData = $request->get('payData');
        if($payData){
            $db = Yii::$app->db;

            $payArrData = json_decode($payData,true);
            $payaddress = urldecode($payArrData['address']);

            $sql = "select * from shop_addr where username='{$payArrData['consignee']}' and cityaddr='{$payaddress}'";
            $addrData = $db->createCommand($sql)->queryOne();

            $order['order_id'] = null;
            $order['order_sn'] = date('Ymd').date ( 'His' ).StrX_shuffle();
            $order['user_id'] = 0;
            $order['order_status'] = 0;
            $order['shipping_status'] = 0;
            $order['pay_status'] = 0;
            $order['consignee'] = $payArrData['consignee'];
            $order['country'] = "中国";
            $order['province'] = $addrData['addr_p'];
            $order['city'] = $addrData['addr_c'];
            $order['district'] = $addrData['addr_a'];
            $order['address'] = $addrData['address'];
            $order['mobile'] = $payArrData['mobile'];
            $order['shipping_name'] = "门店自取";
            $order['pay_code'] = "";
            $order['pay_name'] = "2";
            $order['invoice_title'] = "";
            $order['taxpayer'] = "";
            $order['goods_price'] = $payArrData['shouldPayBox'];
            $order['order_amount'] = $payArrData['shouldPayBox'];
            $order['total_amount'] = $payArrData['shouldPayBox'];
            $order['add_time'] = time();
            $order['pay_time'] = 0;
            $order['transaction_id'] = "";
            $order['user_note'] = "";
            $order['ordergoods'] = json_encode($payArrData['order'],320) ;
            $bool = $db->createCommand()->insert("shop_order",$order)->execute();
            if($bool){
                $payData = $request->get('actionX');
                if($payData == "cart"){
                    //删除购物车操作
                    $user = $_COOKIE['username'];
                    $data = cartdata($_COOKIE['username']);
                    $cartData = cartinct($data);
                    $orderData = $payArrData['order'];
                    foreach ($cartData as $k=>$v){
                        foreach ($orderData as $key=>$value){
                            if($value['goodid']  == $v['goodid']){
                                unset($cartData[$k]);
                                break;
                            }
                        }
                    }
                    $jsonData = "";
                    foreach ($cartData as $k1=>$v1){
                        $jsonData .= json_encode($cartData[$k1],320).",";
                    }
                    edityiicart($user,$jsonData);
                }
                Yii::$app->response->data =  ['code'=>1,"msg"=>"下单成功",'order_sn'=>$order['order_sn']];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }else{
                Yii::$app->response->data =  ['code'=>2,"msg"=>"下单失败"];
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            }
        }else{
            Yii::$app->response->data = ['code'=>0,"msg"=>"数据为空"];
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
    public function actionPaydata(){
        $order_sn = Yii::$app->request->get("order_sn");
        $order = Yii::$app->db->createCommand("select * from shop_order where order_sn = '{$order_sn}'")->queryOne();
        $good = json_decode($order['ordergoods'],true)[0] ;
        return $this->render("pay",compact("order","good"));
    }
    public function actionOrder(){
        if(!empty($_COOKIE['username'])){
            $username = $_COOKIE['username'];
            //城市
            $db = Yii::$app->db;
            $arrData = $db->createCommand("select * from shop_province")->queryAll();
            //url数据检测
            $request = Yii::$app->request;
            $action = $request->get("action");
            if($action == "cart"){
                //购物车数据
                //$cartData = cartdata($username);
                //$cartData = cartinct($cartData);
                parse_str($_SERVER['QUERY_STRING']);
                $cartData = json_decode($cartDataX,true) ;
            }else{
                //立即购买数据
                parse_str($_SERVER['QUERY_STRING']);
                $cartData = [
                    [
                        "goodid" => $id,
                        "user" => $_COOKIE['username'],
                        "goodurl"=>$image_url1,
                        "goodname"=>$goods_name,
                        "keywords"=>$keywords,
                        "goodprice"=>$shop_price,
                        "goodnum"=>$number
                    ]
                ];
            }
            //已有地址
            $sqlAddr = "select * from shop_addr where username='{$username}' order by id desc";
            $arrDataAddr = $db->createCommand($sqlAddr)->queryAll();
            //默认地址
            $sqlDef = "select * from shop_addr where username='{$username}' and type = '1' ";
            $arrDataDef = $db->createCommand($sqlDef)->queryOne();

            return $this->render("order",compact("arrData","cartData","arrDataAddr","arrDataDef"));
        }else{
            echo "<script>alert('请先登录');window.location.href='?r=home/login/login';</script>";
        }
    }
    public function actionCheckoutsuccess(){
        return $this->render("checkoutSuccess");
    }
    public function actionCart(){
        $request = Yii::$app->request;
        $user = $request->get("u");
        $data = $request->get("d");
        logyiicart($user,$data);
    }
    public function actionEditdefaultaddr(){
        $id = Yii::$app->request->get("id");
        $sql = "update shop_addr set type='2';update shop_addr set type='1' where id={$id}; ";
        Yii::$app->db->createCommand($sql)->execute();
    }
    public function actionAddrdel(){

        $id = Yii::$app->request->get("id");
        Yii::$app->db->createCommand()->delete("shop_addr","id = ".$id)->execute();
    }
    public function actionAddressedit(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $chcktype =  $request->get("chcktype");
        $data = $request->post();
        $id = $request->post("id");
        unset($data['id']);
        unset($data['_csrf']);
        unset($data['btn']);
        $data['cityaddr'] = $request->post('cityaddr').$request->post("address");
        $errmsg = "";
        if($chcktype == 2){
            //修改
            $type2 = $request->post("type");
            if($type2 == 1){//默认地址
                $db->createCommand()->update("shop_addr",['type'=>'2'],"username = '".$data['username']."'")->execute();
            }
            $bool = $db->createCommand()->update("shop_addr",$data,"id = ".$id)->execute();
            $errmsg .= "编辑";
        }else{
            //添加
            $bool = $db->createCommand()->insert("shop_addr",$data)->execute();
            $errmsg .= "添加";
        }

        return $this->statusUrl($bool,"?r=home/shop_cart/order&type=index",$errmsg."失败",2);

    }


}
