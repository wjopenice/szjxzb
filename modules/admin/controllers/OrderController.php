<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\ext\Modeli;
use app\ext\Page;
use Yii;

class OrderController extends Controller{

    public $layout = false;

    //订单列表
    public function actionOrder_list(){
        $pageSize = 20;
        $db = Yii::$app->db;
        $where = '';
        //订单状态
        if(isset($_REQUEST['order_status']) && $_REQUEST['order_status']){
            $where .= ' where order_status='.$_REQUEST['order_status'];
        }
        //支付状态
        if(isset($_REQUEST['pay_status']) && $_REQUEST['pay_status']){
            if($where){
                $where .= ' and pay_status='.$_REQUEST['pay_status'];
            }else{
                $where .= ' where pay_status='.$_REQUEST['pay_status'];
            }
            
        }
        //支付方式
        if(isset($_REQUEST['pay_code']) && $_REQUEST['pay_code']){
            if($where){
                $where .= ' and pay_code='.$_REQUEST['pay_code'];
            }else{
                $where .= ' where pay_code='.$_REQUEST['pay_code'];
            }
            
        }
        //发货状态
        if(isset($_REQUEST['shipping_status']) && $_REQUEST['shipping_status']){
            if($where){
                $where .= ' and shipping_status='.$_REQUEST['shipping_status'];
            }else{
                $where .= ' where shipping_status='.$_REQUEST['shipping_status'];
            }
            
        }
        //模糊查询
        if(isset($_REQUEST['keywords']) && $_REQUEST['keywords']){
            if($where){
                $where .= ' and '.$_REQUEST['keytype'].' like "%'.$_REQUEST['keywords'].'%"';
            }else{
                $where .= ' where '.$_REQUEST['keytype'].' like "%'.$_REQUEST['keywords'].'%"';
            }
            
        }
        //下单时间
        if(isset($_REQUEST['start_time']) && $_REQUEST['start_time'] && $_REQUEST['end_time']){
            if($where){
                $where .= ' and add_time between "'.$_REQUEST['start_time'].'" and "'.$_REQUEST['end_time'].'"';
            }else{
                $where .= ' where add_time between "'.$_REQUEST['start_time'].'" and "'.$_REQUEST['end_time'].'"';
            }
        }

        //调取数据库操作类
        $model = new Modeli();
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("SELECT COUNT(*) FROM shop_order".$where)->queryScalar(); 
        //初始化分页类
        $page->init(intval($count),$pageSize);
        //分页sql语句
        $sql = "select * from shop_order ".$where." ORDER BY order_id DESC ".$page->limit;

        //执行分页SQL语句
        $arrData = $model->action($sql);
        //分页
        $pageShow = $page->show();

        return $this->render('order_list',array('arrData'=>$arrData,'pageShow'=>$pageShow,'total'=>$count));

    }
    public function actionVirtual_order(){
        return $this->render("virtual_order");
    }

    //发货单列表
    public function actionInvoice(){

        $pageSize = 20;
        $db = Yii::$app->db;

        //发货状态
        $status = isset($_REQUEST['shipping_status']) && $_REQUEST['shipping_status'] ? $_REQUEST['shipping_status'] :0;
        $where = ' where shipping_status='.$status;
        //$where = ' where pay_status IN ("") shipping_status='.$status;

        //模糊查询
        if(isset($_REQUEST['order_sn']) && $_REQUEST['order_sn']){
            $where .= ' and order_sn like "%'.$_REQUEST['order_sn'].'%"'; 
        }
        if(isset($_REQUEST['consignee']) && $_REQUEST['consignee']){
            $where .= ' and consignee like "%'.$_REQUEST['consignee'].'%"';
        }

        //调取数据库操作类
        $model = new Modeli();
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("SELECT COUNT(*) FROM shop_order".$where)->queryScalar(); 
        //初始化分页类
        $page->init(intval($count),$pageSize);
        //分页sql语句
        $sql = "select * from shop_order ".$where." ORDER BY order_id DESC ".$page->limit;

        //执行分页SQL语句
        $arrData = $model->action($sql);
        //分页
        $pageShow = $page->show();
        //分类
        $typeList = $db->createCommand("select * from shop_goods_category where level = 3")->queryAll();

        return $this->render("invoice",array('arrData'=>$arrData,'pageShow'=>$pageShow,'total'=>$count));
    }

    public function actionRefund_list(){
        return $this->render("refund_list");
    }
    public function actionExchange_goods(){
        return $this->render("exchange_goods");
    }
    public function actionAdd_order(){
        return $this->render("add_order");
    }
    public function actionOrder_log(){
        return $this->render("order_log");
    }
    public function actionInvoice_management(){
        return $this->render("invoice_management");
    }

    //订单详情
    public function actionOrder_info(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;

        $infoData = $db->createCommand("select * from shop_order where order_id = ".$request->get("id") )->queryOne();

        $ordergoods = json_decode($infoData['ordergoods'],true);

        return $this->render("order_info",compact("infoData",'ordergoods'));
    }

    public function actionOrder_delivery(){
        return $this->render("order_delivery");
    }
    public function actionOrder_distribution(){
        return $this->render("order_distribution");
    }
    public function actionDetails_refunds(){
        return $this->render("details_refunds");
    }
    public function actionReturn_details(){
        return $this->render("return_details");
    }
    public function actionEditprice(){
        return $this->render("editprice");
    }


}