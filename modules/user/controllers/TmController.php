<?php
namespace app\modules\user\controllers;

use app\modules\user\models\Uc;
use yii\web\Controller;
use Yii;

class TmController extends Controller{

    public $layout = "inc_uc.php";

    public function actionOrder(){
        $user = $_COOKIE['username'];
        $orderArr[0] = Uc::findsql("shop_order","*",['consignee'=>$user,"pay_status"=>1],100,"order_id desc");
        $orderArr[1] = Uc::findsql("shop_order","*",['consignee'=>$user,"pay_status"=>0],100,"order_id desc");
        return $this->render("order",compact("orderArr"));
    }
    public function actionOrderdetail(){
        $order_id = $this->request->get("order_id");
        $orderArr = Uc::findsqlone("shop_order","*",['order_id'=>$order_id]);;
        return $this->render("orderdetail",compact("orderArr"));
    }

    public function actionCoupon(){
        return $this->render("coupon");
    }

    public function actionRedpacket(){
        return $this->render("redpacket");
    }





}