<?php
namespace app\modules\api\controllers;

use app\modules\api\models\A;
use yii\rest\Controller;
use Yii;

class BaseController extends Controller {
     //参数校验
     protected function parameter($data){
         //$data = [
            //'account' => 'ZB1520821677',
            //'resqn' => $resqn,
            //'pay_amount' => 0.02,
            //'pay_way' => '1',
            //'body' => '平台账号测试',
            //'notify_url' => 'http://www.shop.com/index.php?r=pay/notifyips/index',
        //];
         if(count($data) == 0){
            return  ["status"=>"4006","msg"=>"参数为空"];
            exit;
         }
         $account = $data['account'];
         if(!empty($account)){
             return  ["status"=>"4007","msg"=>"商户号为空"];
             exit;
         }
         $promote = A::findsqlone("tab_promote","*",['account'=>$account]);
         if(!empty($promote)){
             return  ["status"=>"4008","msg"=>"商户号不存在"];
             exit;
         }
         if($promote['status'] != 1){
             return  ["status"=>"4009","msg"=>"商户已经被禁用"];
             exit;
         }
         if(!empty($data['notify_url'])){
             return  ["status"=>"4010","msg"=>"回调地址为空"];
             exit;
         }
         if(!empty($data['resqn'])){
             return  ["status"=>"4011","msg"=>"订单号为空"];
             exit;
         }
         if(!empty($data['pay_amount'])){
             return  ["status"=>"4012","msg"=>"缺少交易金额"];
             exit;
         }
         if(!empty($data['pay_way'])){
             return  ["status"=>"4013","msg"=>"缺少通道方式"];
             exit;
         }
         if(!empty($data['body'])){
             return  ["status"=>"4014","msg"=>"缺少商品名称"];
             exit;
         }
         $order = A::findsqlone("tab_promote_deposit","*",['pay_order_number'=>$data['resqn']]);
         if($order){
             return  ["status"=>"4015","msg"=>"订单号重复"];
             exit;
         }

         //黑名单
         if($data['pay_ip'] && $data['pay_ip'] != '127.0.0.1' && $data['pay_ip'] != '0.0.0.0'){
             //是否已加入黑名单
             $find = A::findsqlone("tab_hands_blacklist","*",['ip'=>$data['pay_ip']]);
             if($find && $find['status'] == 0){
                 return array("status"=>'40020',"msg"=>"IP已拉入黑名单");
                 exit;
             }
             //检测提交的IP
             $ip_data = A::findsqllo("tab_promote_deposit","*",["and","pay_ip = '{$data['pay_ip']}'","create_time >= ".time()-60],3);
             if(count($ip_data) >= 3){
                 $i = 0;
                 foreach($ip_data as $key=>$val){
                     if($val['pay_status'] == 0){
                         $i += 1 ;
                     }
                 }
                 //当IP有连续三笔订单未支付时，写入黑名单
                 if($i >= 3){
                     $add_data = [
                         'ip' => $data['pay_ip'],
                         'create_time' => time()
                     ];
                     $db = Yii::$app->db;
                     $db->createCommand()->insert('tab_hands_blacklist', $add_data)->execute();
                     return array("status"=>'40021',"msg"=>"IP已拉入黑名单");
                     exit;
                 }
             }

         }

         //sign校验
         if($promote['paykey']){
             $sh_data = [
                 'resqn'   => $data['resqn'],
                 'account' => $data['account'],
                 'pay_amount' => $data['pay_amount'],
                 'pay_way' => $data['pay_way'],
                 'notify_url' => $data['notify_url']
             ];
             $sign = $this->SignArray($sh_data,$promote['paykey']);
             if($sign != $data['sign']){
                 return ["status"=>'40016',"msg"=>"验签失败"];
                 exit;
             }
         }else{
             return ["status"=>'40017',"msg"=>"APPKEY为空"];
             exit;
         }
         return $promote;
     }
     //选择通道
     protected function select_channel($pay_way = 1){
         switch ($pay_way){
             case 1: $type_pay = "alipay_status";break;  //阿里扫码
             case 2: $type_pay = "wetch_status";break;  //微信扫码
             case 3: $type_pay = "h5_alipay_status";break; //h5阿里
             case 4: $type_pay = "h5_wetch_status";break;//h5微信
             default:$type_pay = "wetch_status";break;
         }
         $pay_data = A::findsql("tab_pay_interface","*",['status'=>1,$type_pay=>1]);
         if(!empty($pay_data)){
             $len = count($pay_data) - 1;
             $i = rand(0,$len);
             return $pay_data[$i];
         }else{
             return ["status"=>'40018',"msg"=>"暂未开通"];
             exit;
         }
     }
     protected function get_Goods($pay_amount){
         $min=0;
         $max=0;
         $start = 0;
         $len = strlen($pay_amount);
         $trim_str = substr($pay_amount,0,1);
         if($len >= 5){
             $trim_str_two = substr($pay_amount,1,1);
             if($trim_str_two >= 5){
                 $start = $trim_str*10000+5000;
             }else{
                 $start = $trim_str*10000;
             }
         }
         switch ($pay_amount){
             case $pay_amount>=0 && $pay_amount<=9: $min=0;$max=9;break;
             case $pay_amount>=10 && $pay_amount<=49: $min=10;$max=49; break;
             case $pay_amount>=50 && $pay_amount<=99: $min=50;$max=99;break;
             case $pay_amount>=100 && $pay_amount<=999: $min= $trim_str*100; $max= $min + 99;break;
             case $pay_amount>=1000 && $pay_amount<=9999: $min= $trim_str*1000; $max= $min + 999;break;
             case $pay_amount>=10000 && $pay_amount<=50000: $min= $start; $max= $min+4999;break;
         }
         $good = A::findsqlone("mzsm_goods","*",["between","shop_price",$min,$max]);
         if($good){
             return $good;
         }else{
             return array("status"=>'40019',"msg"=>"未匹配到商品");
             exit;
         }
     }
    //给支付金额加随机数
    protected function amount_random_points($pay_amount)
    {
        if(is_numeric($pay_amount)){
            //是数字
            if(preg_match("/^[0-9]+(.[0]{1,2})?$/",$pay_amount)){
                $rand = round(mt_rand()/mt_getrandmax(),2);
                $pay_amount = $pay_amount + $rand;
            }
        } else if(is_string($pay_amount)) {
            //是字符串
            if(substr($pay_amount, strpos($pay_amount,'.')+1) == "00"){
                $rand = round(mt_rand()/mt_getrandmax(),2);
                $pay_amount = $pay_amount + $rand;
            }
        }
        return $pay_amount;
    }
    protected function add_deposit($promote_id,$data){
         $deposit_data = array(
             'order_number' => "",
             'pay_order_number' => $data['resqn'],
             'promote_id' => $promote_id,
             'pay_amount' => $data['pay_amount'],
             'pay_status' => 0,
             'pay_way' => $data['pay_way'],
             'pay_source' => $data['pay_id'],
             'pay_ip' => $data['pay_ip'],
             'goods_id' => $data['goods_id'],
             'create_time' => time(),
             'notify_url' => $data['notify_url'],
             'pay_type' => $data['pay_type'],
         );
         $db = Yii::$app->db;
         return $db->createCommand()->insert("tab_promote_deposit",$deposit_data)->execute();
     }
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


}

