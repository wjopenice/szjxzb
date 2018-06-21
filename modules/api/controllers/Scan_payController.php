<?php
namespace app\modules\api\controllers;

use Yii;
use app\modules\api\models\A;

class Scan_payController extends BaseController {

    public $layout = false;
    public function actionIndex(){
         //获取请求参数
         $data = $_REQUEST;
         //记录请求参数信息
         recordlog("../log/pay.txt",json_encode($data));
         //检验参数
         $result = $this->parameter($data);
         //参数是否通过
         if(isset($result['status'])  && $result['status'] != 1){
              exit(json_encode($result));
         }else{
             //支付数据
             $pay_data = $this->select_channel($data['pay_way']);
             //检测通道
             if(isset($pay_data['status']) && $pay_data['status'] != 1){
                 exit(json_encode($pay_data));
             }else{
                 //组装数据
                 $data['pay_type'] = $pay_data['pay_type'];
                 $data['pay_id'] = $pay_data['id'];
                 $data['pay_ip'] = isset($data['pay_ip']) && $data['pay_ip'] ? $data['pay_ip'] :getIp();
                 $good = $this->get_Goods($data['pay_amount']);
                 $data['goods_id'] = $good['goods_id'];
                 $data['goods_name'] = mb_substr($good['goods_name'],0,20);
                 $data['pay_amount'] = $this->amount_random_points($data['pay_amount']);
                 //写入数据
                 $bool = $this->add_deposit($result['id'],$data);
                 if($bool){
                     //选择第三方支付平台通道
                     switch ($data['pay_type']) {
                         case 1:$this->ipsPay($data,$pay_data);break;
                     }
                 }else{
                     exit(json_encode(array("status"=>'0002',"msg"=>"充值记录添加失败")));
                 }
             }
         }
    }
    //环迅支付
    public function ipsPay($data,$pay_data){
        //获得账户号
        if( strpos($pay_data['pay_number'],',') !== false ){
            //多个账号
            $accountArr = explode(',', $pay_data['pay_number']);
            if(count($accountArr) >= 10){
                //手上 按分
                $mim =  substr(date("i"), 1, 1 );
                $Account = $accountArr[$mim];
            }else{
                //堡庆   按秒
                $seconds =  substr(date("s"), 0, 1 );
                $Account = $accountArr[$seconds];
            }
        }else{
            //单个账号
            $Account = $pay_data['pay_number'];
        }
        //选择支付方式
        $GatewayType = 10;
        switch ($data['pay_type']){
            case 1:$GatewayType = 10;break;
            case 2:$GatewayType = 11;break;
        }
        //初始化数据
        $payData = [
            "Version" => "v1.0.0", //版本号
            "MerCode"=>$pay_data['pay_appid'], //商户号
            "MerName"=>$pay_data['pay_title'], //商户名称
            "Account"=>$Account, //商户账号
            "MsgId"=>"0001", //消息id
            "ReqDate"=>date("YmdHis",time()+0),  //商户请求时间
            "Key"=>$pay_data['pay_appkey'],  //秘钥
            "MerBillNo"=>$data['resqn'],//商户订单号
            "GatewayType"=>$GatewayType,  //支付方式
            "MerType"=>"0", //0：标准商户 1：平台商户
            "SubMerCode"=>"1",  //当商户类型为1：平台商户时，必填
            "Date"=>date("Ymd"),//订单日期
            "CurrencyType"=>"156",//人民币
            "Amount"=>$data['pay_amount'], //订单金额12.00
            "Lang"=>"GB",//语言
            "SpbillCreateIp"=>$_SERVER["REMOTE_ADDR"],//终端机IP  必须传正确的用户端IP
            "Attach"=>"",
            "RetEncodeType"=>"17",//选择加密方式17为md5加密
            "ServerUrl"=>"http://" . $_SERVER['HTTP_HOST'] . "/api.php?a=api/callbackips/index",//回调地址
            "BillEXP"=>2,//订单有效期,默认为2小时
            "GoodsName"=>$data['goods_name'] //商品名称
        ];
        //请求IPS接口
        $html_text = $this->buildRequest($payData);
        //处理IPS响应数据
        $arrData = $this->xmlToArray($html_text);
        if($arrData['GateWayRsp']['head']['RspCode'] === '000000'){
            $json_data = [
                'resqn' => $data['resqn'],
                'payinfo' => $arrData['GateWayRsp']['body']['QrCode'],
                'trxid' => '',
                'body' => $data['body'] ? $data['body'] : "充值",
                'trxstatus' => $arrData['GateWayRsp']['head']['RspCode'] == '000000' ? '0000' : '10001',
                'sign' => isset($data['sign']) ? $data['sign'] : ''
            ];
            exit(json_encode($json_data));
        }else{
              exit(json_encode(array("status"=>'40010',"msg"=>"请求接口失败")));
        }
    }
    //请求IPS接口
    public function buildRequest($payData){
        try{
            libxml_disable_entity_loader(false);
            $para = $this->BuildXmlReq($payData);
            $wsdl = "https://thumbpay.e-years.com/psfp-webscan/services/scan?wsdl";
            $client=new \SoapClient($wsdl);
            //用$client->__getFunctions()得到两个方法
            //string scanPay(string $scanPayReq)' (length=34)
            //string barCodeScanPay(string $barCodeScanPay)' (length=45)
            $sReqXml = $client->scanPay($para);
            return $sReqXml;
        }catch (\Exception $e){
            echo "扫码支付请求异常:" . $e;
        }
        return null;
    }
    //生成XML结构数据
    public function BuildXmlReq($payData){
        $XmlContent = "<?xml version='1.0' encoding='UTF-8'?>";
        $XmlContent .= "<Ips>";
        $XmlContent .= "<GateWayReq>";
        $XmlContent .= $this->XmlHeader($payData);
        $XmlContent .= $this->XmlBody($payData);
        $XmlContent .= "</GateWayReq>";
        $XmlContent .= "</Ips>";
        return $XmlContent;
    }
    public function XmlHeader($payData){
        $signature = md5($this->XmlBody($payData).$payData['MerCode'].$payData['Key']);
        $XmlContent = "<head>";
            $XmlContent .= "<Version>{$payData['Version']}</Version>";
            $XmlContent .= "<MerCode>{$payData['MerCode']}</MerCode>";
            $XmlContent .= "<MerName>{$payData['MerName']}</MerName>";
            $XmlContent .= "<Account>{$payData['Account']}</Account>";
            $XmlContent .= "<MsgId>{$payData['MsgId']}</MsgId>";
            $XmlContent .= "<ReqDate>{$payData['ReqDate']}</ReqDate>";
            $XmlContent .= "<Signature>{$signature}</Signature>";
        $XmlContent .= "</head>";
        return $XmlContent;
    }
    public function XmlBody($payData){
        $XmlContent = "<body>";
            $XmlContent .= "<MerBillNo>{$payData['MerBillNo']}</MerBillNo>";
            $XmlContent .= "<GatewayType>{$payData['GatewayType']}</GatewayType>";
            $XmlContent .= "<MerType>{$payData['MerType']}</MerType>";
            $XmlContent .= "<SubMerCode>{$payData['SubMerCode']}</SubMerCode>";
            $XmlContent .= "<Date>{$payData['Date']}</Date>";
            $XmlContent .= "<CurrencyType>{$payData['CurrencyType']}</CurrencyType>";
            $XmlContent .= "<Amount>{$payData['Amount']}</Amount>";
            $XmlContent .= "<Lang>{$payData['Lang']}</Lang>";
            $XmlContent .= "<SpbillCreateIp>{$payData['SpbillCreateIp']}</SpbillCreateIp>";
            $XmlContent .= "<Attach>{$payData['Attach']}</Attach>";
            $XmlContent .= "<RetEncodeType>{$payData['RetEncodeType']}</RetEncodeType>";
            $XmlContent .= "<ServerUrl>{$payData['ServerUrl']}</ServerUrl>";
            $XmlContent .= "<BillEXP>{$payData['BillEXP']}</BillEXP>";
            $XmlContent .= "<GoodsName>{$payData['GoodsName']}</GoodsName>";
        $XmlContent .= "</body>";
        return $XmlContent;
    }
    //处理响应XML数据
    public function xmlToArray($html_text){
        libxml_disable_entity_loader(true);
        $xmlstring = simplexml_load_string($html_text,'SimpleXMLElement', LIBXML_NOCDATA);
        $array = json_decode(json_encode($xmlstring),true);
        return $array;
    }

    public function actionPaycallback(){
        $logFile = fopen(dirname(__FILE__)."/log1.txt", "w+");
        $data = json_encode($_REQUEST,320);
        fwrite($logFile,$data);
        fclose($logFile);
    }

    public function actionPaydata(){
        $file = dirname(__FILE__)."/log1.txt";
        $data = file_get_contents($file);
        $resqn = Yii::$app->request->post("resqn");
        $pay_way = Yii::$app->request->post("pay_way");
        if(!empty($data)){
//            {
//                "a":"api/scan_pay/paycallback",
//                "status":"200",
//                "account":"64735951",
//                "resqn":"20180615132507dxvnmm",
//                "trade_no":"BO20180615132514053284",
//                "pay_amount":"0.01",
//                "remark":"rechage",
//                "mer_sign":"ef8d7b8dddd1699beafc4a2a034baead"
//            }
            $payData =  json_decode($data,true);
            $payresqn = $payData['resqn'];
            $paystatus = $payData['status'];
            if($paystatus == "200" && $payresqn == $resqn){
                $db = Yii::$app->db;
                $setpay = [
                    "pay_status"=>1,
                    "pay_name"=>$pay_way
                ];
                $bool = $db->createCommand()->update("shop_order",$setpay,"order_sn = '{$resqn}'")->execute();
                if($bool){
                    Yii::$app->response->data = ['code'=>1,"msg"=>"ok"];
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                }else{
                    Yii::$app->response->data = ['code'=>0,"msg"=>"error"];
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                }
            }
        }
    }

}

