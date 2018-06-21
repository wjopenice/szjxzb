<?php
namespace app\modules\pay\controllers;

use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\web\Response;
use yii\filters\Cors;
use Yii;


class PayController extends Controller {

    //参数校验
    protected function parameter($data){
        
        if(count($data) == 0){
            return array("status"=>'4006',"msg"=>"参数为空");
            exit;
        }
        $db = Yii::$app->db;
        $account = $data['account'];
        if(!$account){
            return array("status"=>'4007',"msg"=>"商户号为空");
            exit;
        }

        $promote = $db->createCommand("select * from tab_promote where account = '".$account."'")->queryOne();
        if(!$promote){
            return array("status"=>'4008',"msg"=>"商户不存在");
            exit;
        }
        if($promote['status'] != 1){
            return array("status"=>'40012',"msg"=>"商户已被禁用!!!!");
            exit;
        }
        if(!$data['notify_url']){
            return array("status"=>'40011',"msg"=>"回调地址为空");
            exit;
        }
        $order = $db->createCommand("select * from tab_promote_deposit where pay_order_number = '".$data['resqn']."'")->queryOne();
        if($order){
            return array("status"=>'4009',"msg"=>"订单号重复");
            exit;
        }
        if(!$data['pay_amount']){
            return array("status"=>'40015',"msg"=>"支付金额为空");
            exit;
        }
        if(!$data['pay_way']){
            return array("status"=>'40017',"msg"=>"支付方式为空");
            exit;
        }
        //黑名单
        if($data['pay_ip'] && $data['pay_ip'] != '127.0.0.1'){
            //是否已加入黑名单
            $find = $db->createCommand("select * from tab_hands_blacklist where ip = '".$data['pay_ip']."'")->queryOne();
            if($find && $find['status'] == 0){
                return array("status"=>'40019',"msg"=>"IP已拉入黑名单");
                exit;
            }
            //检测提交的IP
            $query = "SELECT * FROM tab_promote_deposit WHERE pay_ip = '".$data['pay_ip']."' and create_time >= ".(time()-60)." ORDER BY id DESC limit 3";
            $ip_data = $db->createCommand($query)->queryAll();

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
                    $db->createCommand()->insert('tab_hands_blacklist', $add_data)->execute(); 
                    return array("status"=>'40019',"msg"=>"IP已拉入黑名单");
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
                return array("status"=>'40013',"msg"=>"验签失败");
                exit;
            }
        }else{
            return array("status"=>'40014',"msg"=>"APPKEY为空");
            exit;
        }
        

        return $promote;
    }


    //选择通道
    protected function channel($pay_way = 1){
        //通道切换
        $where = "status=1 and wetch_status=1";
        switch ($pay_way) {
            case 1:
                # 支付宝扫码
                $where = "status=1 and alipay_status=1";
                break;
            case 2:
                # 微信扫码
                $where = "status=1 and wetch_status=1";
                break;
            case 3:
                # wap支付宝
                $where = "status=1 and h5_alipay_status=1";
                break;
            case 4:
                # wap微信
                $where = "status=1 and h5_wetch_status=1";
                break;
        }

        $db = Yii::$app->db;
        $pay_data = $db->createCommand("SELECT * FROM tab_pay_interface WHERE ".$where)->queryAll();

        if($pay_data){
            $max = count($pay_data) - 1;
            $i = rand(0,$max);
            return $pay_data[$i];
        }else{
            return array("status"=>'40018',"msg"=>"暂未开通");
            exit;
        }

    }

    //取商品
    protected function getGoods($pay_amount){
        $min=0;
        $max=0;
        $trim_str = substr($pay_amount,0,1);
        $len = strlen($pay_amount);
        switch ($len){
            case $pay_amount>=0 && $pay_amount<=9: $min=0;$max=9;break;
            case $pay_amount>=10 && $pay_amount<=49: $min=10;$max=49; break;
            case $pay_amount>=50 && $pay_amount<=99: $min=50;$max=99;break;
            case $pay_amount>=100 && $pay_amount<=999: $min= $trim_str*100; $max= $min + 99;break;
            case $pay_amount>=1000 && $pay_amount<=9999: $min= $trim_str*1000; $max= $min + 999;break;
            case $pay_amount>=10000 && $pay_amount<=50000: $min= $trim_str*10000; $max= $min + 5000;break;
        }
        $db = Yii::$app->db;
        $good = $db->createCommand("SELECT * FROM mzsm_goods WHERE shop_price >= ".$min." and shop_price <=".$max)->queryOne();
        if($good){
            return $good;
        }else{
            return array("status"=>'40019',"msg"=>"未匹配到商品");
            exit;
        }
    }

    //给支付金额加随机数
    protected function amountRand($pay_amount)
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

    //添加订单记录
    protected function addDeposit($promote_id,$data){
        $deposit_data = array(
            'order_number' => "",
            'pay_order_number' => $data['resqn'],
            'promote_id' => $promote_id,
            'promote_account' => $data['account'],
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
        return $db->createCommand()->insert('tab_promote_deposit', $deposit_data)->execute(); 
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

}


