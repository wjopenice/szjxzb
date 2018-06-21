<?php
namespace app\modules\api\controllers;

class CallbackipsController extends BaseController{
    //回调处理
    public function actionIndex(){
        $_REQUEST['paymentResult'] = "<Ips>
                                            <GateWayRsp>
                                                <head>
                                                    <ReferenceID>0001</ReferenceID>
                                                    <RspCode>000000</RspCode>
                                                    <RspMsg><![CDATA[\u4ea4\u6613\u6210\u529f\uff01]]></RspMsg>
                                                    <ReqDate>20180518141637</ReqDate>
                                                    <RspDate>20180518141703</RspDate>
                                                    <Signature>79079f97145c84bacf1508a2bb73ea24</Signature>
                                                </head>
                                                <body>
                                                    <MerBillNo>PF_20180518141636ObIK</MerBillNo>
                                                    <CurrencyType>156</CurrencyType>
                                                    <Amount>0.01</Amount>
                                                    <Date>20180518</Date>
                                                    <Status>Y</Status>
                                                    <IpsBillNo>BO20180518141637035881</IpsBillNo>
                                                    <IpsTradeNo>20180518141637056654</IpsTradeNo>
                                                    <BankBillNo>720180518102746392</BankBillNo>
                                                    <RetEncodeType>17</RetEncodeType>
                                                    <ResultType>0</ResultType>
                                                    <IpsBillTime>20180518141703</IpsBillTime>
                                                </body>
                                            </GateWayRsp>
                                        </Ips>";
        if(!empty($paymentResult = $_REQUEST['paymentResult'])){
            $paymentData = $this->xmlToArray($paymentResult);


        }else{
            recordlog("../log/notifyIps.txt", "参数为空");
        }

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
}