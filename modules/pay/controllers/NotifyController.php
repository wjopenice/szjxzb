<?php
namespace app\modules\pay\controllers;

use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\web\Response;
use yii\filters\Cors;
use Yii;


class NotifyController extends Controller {

    //选择通道
    protected function getPay($pay_order_number = ''){
        $db = Yii::$app->db;

        $where = "pay_order_number='".$pay_order_number."'";
        $source = $db->createCommand("SELECT pay_source FROM tab_promote_deposit WHERE ".$where)->queryOne();
        
        if($source){
            $pay_data = $db->createCommand("SELECT * FROM tab_pay_interface WHERE id = ".$source['pay_source'])->queryOne();
            return $pay_data;    
        }
        return array();
        

    }


    protected function set_promoteDeposit($data){
        $db = Yii::$app->db;

        $where =  "pay_order_number='".$data['out_trade_no']."'";
        $d = $db->createCommand("SELECT * FROM tab_promote_deposit WHERE ".$where)->queryOne();
        if(empty($d)){
            return false;
        }
        if($d['pay_status'] == 0){
            $data_save['pay_status'] = 1;
            $data_save['order_number'] = $data['trade_no'];
            $where .= " and id=".$d['id'];//
            $r = $db->createCommand()->update("tab_promote_deposit",$data_save,$where)->execute();

            if($r){
                $pro_where = "id=".$d['promote_id'];
                $db->createCommand("UPDATE tab_promote set alipay_limit=alipay_limit-".$d['pay_amount']." WHERE ".$pro_where)->execute();
                $db->createCommand("UPDATE tab_promote set balance_coin=balance_coin+".$d['pay_amount']." WHERE ".$pro_where)->execute();

            }
            return $r;
        }
    }

    /**
     * 回调给商户
     */
    protected function request($params){
        //打开日志log
        $logFile = fopen(dirname(__FILE__)."/glob.txt", "a+");
        fwrite($logFile, "\r\n\r\n");
        fwrite($logFile, "[".$params["out_trade_no"]."]--->查询回调订单\r\n");

        $db = Yii::$app->db;
        $depositInfo = $db->createCommand("SELECT * FROM tab_promote_deposit WHERE pay_order_number = '" . $params['out_trade_no']."'")->queryOne();
        $notify_url = $depositInfo['notify_url'];
        $id = $depositInfo['promote_id'];

        $promoteInfo = $db->createCommand("SELECT * FROM tab_promote WHERE id=".$id)->queryOne();
        $key = $promoteInfo['paykey'];
        $account = $promoteInfo['account'];

        $customer = array(
            'status' => $params["status"] == 'Y' ? 200 : 201,
            'account' => $account,
            'resqn' => $params["out_trade_no"],
            'trade_no' => $params['trade_no'],
            'pay_amount' => $params['amount'],
            'remark' => 'rechage',
        );
        $customer['mer_sign'] = $this->SignArray($customer,$key);
        fwrite($logFile, "[".$notify_url."]--->查询回调URL \r\n");
        if($notify_url) {
            fwrite($logFile, "[".$notify_url."]--->查询回调参数-->".json_encode($customer). "\r\n");
            $customer = $this->ToUrlParams($customer);
            $re = $this->request_curl($notify_url,$customer);
            fwrite($logFile, "[".$notify_url."]--->查询回调返回-->".$re. "\r\n");
        }
        fclose($logFile);
        return $re;

    }

    /**
     * 将参数数组签名
     */
    private function SignArray(array $array,$appkey){
        $array['key'] = $appkey;// 将key放到数组中一起进行排序和组装
        ksort($array);
        $blankStr = $this->ToUrlParams($array);
        $sign = md5($blankStr);
        return $sign;
    }

    private function ToUrlParams(array $array)
    {
        $buff = "";
        foreach ($array as $k => $v)
        {
            if($v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff;
    }

    /**
     * 发送post请求
     * @param string $url 请求地址
     * @param array $post_data post键值对数据
     * @return string
     */
    private function send_post($url, $post_data){

        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        return $result;
    }

    //发送请求操作仅供参考,不为最佳实践
    protected function request_curl($url,$params){
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
    
}

