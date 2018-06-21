<?php
namespace app\modules\pay\controllers;


class H5payController extends PayController {

    public function actionIndex() {

    	$data = $_REQUEST;
        $resqn = date('Ymd').date ( 'His' );
        $data = [
           'account' => '64735951',
           'resqn' => $resqn,
           'pay_amount' => 0.01,
           'pay_way' => '4',
           'body' => '平台账号测试',
           'notify_url' => 'http://www.shop.com/index.php?r=pay/notifyips/index',
        ];
        $logFile = fopen(dirname(__FILE__)."/pay.txt", "a+");
        fwrite($logFile, "wap支付------------\r\n");
        fwrite($logFile, json_encode($data)."\r\n");
        fclose($logFile);
        //检验
        $msgArr = $this->parameter($data);

        if(isset($msgArr['status']) && $msgArr['status'] != 1){
        	exit(json_encode($msgArr));
        }else{
        	//通道
        	$pay_data = $this->channel($data['pay_way']);
            
        	if(isset($pay_data['status']) && $pay_data['status'] != 1){
        		exit(json_encode($pay_data));
        	}else{
        		$data['pay_type'] = $pay_data['pay_type'];
                $data['pay_id'] = $pay_data['id'];//通道id
        		$data['pay_ip'] = isset($data['pay_ip']) && $data['pay_ip'] ? $data['pay_ip'] :getIp();

        		$good = $this->getGoods($data['pay_amount']);
                $data['goods_id'] = $good['goods_id'];//关联商品
                $data['goods_name'] = $good['goods_name'];
                //订单金额加随机数
                if(!is_float($data['pay_amount'])){
                    $rand = round(mt_rand()/mt_getrandmax(),2); 
                    $data['pay_amount'] = $data['pay_amount'] + $rand;
                }

                $id = $this->addDeposit($msgArr['id'],$data);
                //$id = 1;
                if($id){
                    switch ($data['pay_type']) {
                        case 1:
                            $this->ipsPay($data,$pay_data);
                            break;

                    }
                }else{
                    exit(json_encode(array("status"=>'0002',"msg"=>"充值记录添加失败")));
                }
                
        	}

        }
        
    }


    /**
     *环讯充值接口请求
     *@author whh
     */
    public function ipsPay($data,$pay_data){

        if($data['pay_way'] == 4){
            $GatewayType = 13;
        }
        
        if( strpos($pay_data['pay_number'],',') !== false ){
            //多个账号
            $accountArr = explode(',', $pay_data['pay_number']);
            if(count($accountArr) >= 10){
                //手上 按分
                $mim =  substr(date("i"), 1, 1 );
                $account = $accountArr[$mim];
            }else{
                //堡庆   按秒 
                $seconds =  substr(date("s"), 0, 1 );
                $account = $accountArr[$seconds];
            }
        }else{
            //单个账号
            $account = $pay_data['pay_number'];
        }
        
        $payData = [
            "MsgId"=> "0001", //消息编号
            "ReqDate"=>date("YmdHis"),//商户请求时间
            "MerBillNo"=>$data['resqn'],//订单号
            "GatewayType"=>$GatewayType,//注意：可以手动写死 10微信 11支付宝 12 手Q
            "MerType"=>'0',  //0：标准商户 1：平台商户
            "SubMerCode"=>'1',  //当商户类型为1：平台商户时，必填
            "Date"=>date("Ymd"),//订单日期
            "CurrencyType"=>'156', //默认人民币156
            "Amount"=>$data['pay_amount'],//订单金额
            "Lang"=>"GB", //语言 GB中文
            "SpbillCreateIp"=>$_SERVER["REMOTE_ADDR"],//终端机IP  必须传正确的用户端IP
            "SceneInfo"=>"{\"h5_info\":{\"type\":\"Wap\",\"mer_app_id\":\"www.szjxzb.cn\",\"mer_app_name\":\"金轩珠宝\"}}",
            "Attach"=>'',
            "RetEncodeType"=>'17',//选择加密方式17为md5加密
            "ServerUrl"=>"http://" . $_SERVER['HTTP_HOST'] . "/pay.php?pay=pay/notifyips/index", 
            "BillEXP"=>'2',//订单有效期默认为2小时
            "GoodsName"=> $data['goods_name'],
            "Version" => "v1.0.0",
            "MerCode" => $pay_data['pay_appid'],
            "MerName" => $pay_data['pay_title'],
            "account" => $account,
            'Key' => $pay_data['pay_appkey'],
        ];
        $logFile = fopen(dirname(__FILE__)."/pay.txt", "a+");
        fwrite($logFile, "IpsH5支付------------\r\n");
        fwrite($logFile, json_encode($payData)."\r\n");
        
        $html_text = $this->buildRequest($payData);
        fwrite($logFile, "IpsH5返回------------>".$html_text."\r\n");
        fclose($logFile);

        $arr = $this->xmlToArray($html_text);
        header("Location: http://www.baidu.com");exit;
        /*if($arr['GateWayRsp']['head']['RspCode'] === '000000'){
            $json_data = array(
                'status' => $arr['GateWayRsp']['head']['RspCode'],
                'payinfo' => $arr['GateWayRsp']['body']['PayUrl'],

            );
            exit(json_encode($json_data));
        }else{
            exit(json_encode(array("status"=>'40010',"msg"=>"请求接口失败")));
        }*/
    }

    //下单请求
    public function buildRequest($payData) {
        try {
            libxml_disable_entity_loader(false);
            $para = $this->BuildXmlReq($payData);

            //发送的请求的报文
            $wsdl = "https://thumbpay.e-years.com/psfp-webscan/services/scan?wsdl";
            $client=new \SoapClient($wsdl);
            $sReqXml = $client->scanPay($para);
            return $sReqXml;
        } catch (Exception $e) {
            echo "扫码支付请求异常:" . $e;
        }
        return null;
    }

    //生成XML请求模板
    public function BuildXmlReq($PayData){
        $XmlContent = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
        $XmlContent .= "<Ips>";
        $XmlContent .= "<GateWayReq>";
        $XmlContent .= $this->XmlHeader($PayData);
        $XmlContent .= $this->XmlBody($PayData);
        $XmlContent .= "</GateWayReq>";
        $XmlContent .= "</Ips>";
        return $XmlContent;
    }
    //XML头信息
    public function XmlHeader($PayData){
        $signature = md5($this->XmlBody($PayData).$PayData['MerCode'].$PayData['Key']);

        $XmlContent = "";
        $XmlContent .= "<head>";
        $XmlContent .= "<Version>".$PayData['Version']."</Version>";
        $XmlContent .= "<MerCode>".$PayData['MerCode']."</MerCode>";
        $XmlContent .= "<MerName>".$PayData['MerName']."</MerName>";
        $XmlContent .= "<Account>".$PayData['account']."</Account>";
        $XmlContent .= "<MsgId>{$PayData['MsgId']}</MsgId>";
        $XmlContent .= "<ReqDate>{$PayData['ReqDate']}</ReqDate>";
        $XmlContent .= "<Signature>{$signature}</Signature>";
        $XmlContent .= "</head>";
        return $XmlContent;
    }
    //XML主体信息
    public function XmlBody($PayData){
         $XmlContent = "";
         $XmlContent .= "<body>";
         $XmlContent .= "<MerBillNo>{$PayData['MerBillNo']}</MerBillNo>";
         $XmlContent .= "<GatewayType>{$PayData['GatewayType']}</GatewayType>";
         $XmlContent .= "<Date>{$PayData['Date']}</Date>";
         $XmlContent .= "<CurrencyType>{$PayData['CurrencyType']}</CurrencyType>";
         $XmlContent .= "<Amount>{$PayData['Amount']}</Amount>";
         $XmlContent .= "<Lang>{$PayData['Lang']}</Lang>";
         $XmlContent .= "<SpbillCreateIp>{$PayData['SpbillCreateIp']}</SpbillCreateIp>";
         $XmlContent .= "<Attach>{$PayData['Attach']}</Attach>";
         $XmlContent .= "<RetEncodeType>{$PayData['RetEncodeType']}</RetEncodeType>";
         $XmlContent .= "<ServerUrl>{$PayData['ServerUrl']}</ServerUrl>";
         $XmlContent .= "<BillEXP>{$PayData['BillEXP']}</BillEXP>";
         $XmlContent .= "<GoodsName>{$PayData['GoodsName']}</GoodsName>";
         $XmlContent .= "<MerType>{$PayData['MerType']}</MerType>";
         $XmlContent .= "<SubMerCode>{$PayData['SubMerCode']}</SubMerCode>";
         $XmlContent .= "</body>";
         return $XmlContent;
    }

    //环迅数据解析
    function xmlToArray($xml){     
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        $array = json_decode(json_encode($xmlstring),true);
        return $array;
    }

}

