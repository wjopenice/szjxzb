<?php
namespace app\modules\pay\controllers;

use Yii;

class NotifyipsController extends NotifyController {

    /**
    *通知方法
    */
    public function actionIndex(){

        //打开日志log
        $logFile = fopen(dirname(__FILE__)."/notifyIps.txt", "a+");
        fwrite($logFile, "IPS------------\r\n");
        fwrite($logFile, json_encode($_REQUEST)."\r\n");
        
        /*$_REQUEST['paymentResult'] = "<Ips><GateWayRsp><head><ReferenceID>0001</ReferenceID><RspCode>000000</RspCode><RspMsg><![CDATA[\u4ea4\u6613\u6210\u529f\uff01]]></RspMsg><ReqDate>20180518141637</ReqDate><RspDate>20180518141703</RspDate><Signature>79079f97145c84bacf1508a2bb73ea24</Signature></head><body><MerBillNo>PF_20180518141636ObIK</MerBillNo><CurrencyType>156</CurrencyType><Amount>0.01</Amount><Date>20180518</Date><Status>Y</Status><IpsBillNo>BO20180518141637035881</IpsBillNo><IpsTradeNo>20180518141637056654</IpsTradeNo><BankBillNo>720180518102746392</BankBillNo><RetEncodeType>17</RetEncodeType><ResultType>0</ResultType><IpsBillTime>20180518141703</IpsBillTime></body></GateWayRsp></Ips>";*/

        if(!empty($paymentResult = $_REQUEST['paymentResult'])){

            $payment = $this->xmlToArray($paymentResult);
            fwrite($logFile, "IPS参数 head-->\r\n");
            foreach ($payment['GateWayRsp']['head'] as $k=>$v){
                fwrite($logFile, $k."=".$v."\r\n");
            }
            fwrite($logFile, "\r\nIPS参数 body-->\r\n");
            foreach ($payment['GateWayRsp']['body'] as $k=>$v){
                fwrite($logFile, $k."=".$v."\r\n");
            }
            fwrite($logFile, "\r\n");
            $strSignature = $payment['GateWayRsp']['head']['Signature'];
            $strRspCode = $payment['GateWayRsp']['head']['RspCode'];
            
            if($strRspCode == "000000")
            {
                //订单号
                $order_info['trade_no'] = $payment['GateWayRsp']['body']['IpsBillNo'];
                $order_info['out_trade_no'] = $payment['GateWayRsp']['body']['MerBillNo'];
                $order_info['status'] = $payment['GateWayRsp']['body']['Status'];
                $order_info['amount'] = $payment['GateWayRsp']['body']['Amount'];
                $strStatus = $payment['GateWayRsp']['body']['Status'];//订单状态
                
                if ($strStatus == "Y") {
                    fwrite($logFile, "[".$order_info['out_trade_no']."]--->支付成功\r\n");

                    $strBody = $this->subStrXml("<body>","</body>",$paymentResult);
                    //第三方参数
                    $pay_data = $this->getPay($order_info['out_trade_no']);
                    fwrite($logFile, "支付参数-->".json_encode($pay_data)."\r\n");
                    $MerCode = $pay_data['pay_appid'];
                    $Key = $pay_data['pay_appkey'];
                    //验签
                    if($this->md5Verify($strBody,$strSignature,$MerCode,$Key)){
                        //$pay_where = substr($order_info['out_trade_no'],0,2);
                        $result = $this->set_promoteDeposit($order_info);      
                        fwrite($logFile, "回调修改订单结果-->".$result."\r\n");

                        $db = Yii::$app->db;
                        //回调次数
                        fwrite($logFile, $order_info['out_trade_no']."准备给商户返回结果-->\r\n");
                        $where =  "pay_order_number='".$order_info['out_trade_no']."'";
                        $db->createCommand("UPDATE tab_promote_deposit set notify_nums=notify_nums+1 WHERE ".$where)->execute();
                        
                        //将返回结果返回到商户的回调地址上边
                        $notify = $db->createCommand("SELECT notify_nums FROM tab_promote_deposit WHERE ".$where)->queryOne();
                        $notify_nums = $notify['notify_nums'];

                        if($notify_nums <= 3){
                            fwrite($logFile, "给商户返回结果-->\r\n");
                            $re = $this->request($order_info);
                            fwrite($logFile, "商户返回：".$re."\r\n\r\n");
                            if($re == 'success'){
                                fclose($logFile);
                                exit('ipscheckok');
                            }
                        }else{
                            fwrite($logFile, "商户的回调次数：".$notify_nums."\r\n\r\n");
                            fclose($logFile);
                            exit('ipscheckok');
                        }
                    }else{
                        fwrite($logFile, "扫码支付返回报文验签失败"."\r\n\r\n");
                        fclose($logFile);
                    }
                }else{
                    fwrite($logFile, "[".$order_info['out_trade_no']."]--->交易状态：".$strStatus."\r\n");
                    fclose($logFile);
                }
            }else{
                fwrite($logFile, "请求异常：rspCode：".$strRspCode."\r\n\r\n");fclose($logFile);
            }
            
        }else{
            fwrite($logFile, "参数为空\r\n\r\n");fclose($logFile);
        }
    }


    /**
     * php截取<body>和</body>之間字符串
     * @param string $begin 开始字符串
     * @param string $end 结束字符串
     * @param string $str 需要截取的字符串
     * @return string
     */
    function subStrXml($begin,$end,$str){
        $b= (strpos($str,$begin));
        $c= (strpos($str,$end));

        return substr($str,$b,$c-$b + strlen($end));
    }

    /**
     * 将XML转为数组
     */
    function xmlToArray($xml){     //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        $array = json_decode(json_encode($xmlstring),true);
        return $array;
    }


    /**
	 * 验证签名
	 * @param $prestr 需要签名的字符串
	 * @param $sign 签名结果
	 * @param $merCode 商戶號
	 * @param $key 私钥
	 * return 签名结果
	 */
	function md5Verify($prestr, $sign,$merCode, $key) {
	    $prestr = $prestr .$merCode. $key;
	    $mysgin = md5($prestr);
	     
	    if($mysgin == $sign) {
	        return true;
	    }
	    else {
	        return false;
	    }
	}


}