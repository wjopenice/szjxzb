<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\ext\Modeli;
use app\ext\Page;

class LogController extends Controller{

    public $layout = false;

    //库存日志
    public function actionStocklog(){
        $pageSize = 20;
        $db = Yii::$app->db;

        $where = '';
        //入库 出库
        if(isset($_REQUEST['mtype']) && $_REQUEST['mtype']){
            if($_REQUEST['mtype'] == 1){
                $where = ' where stock > 0';
            }
            if($_REQUEST['mtype'] == -1){
                $where = ' where stock < 0';
            }
            
        }
        //商品名称
        if(isset($_REQUEST['goods_name']) && $_REQUEST['goods_name']){
            if($where){
                $where .= ' and goods_name like "%'.$_REQUEST['goods_name'].'%"';
            }else{
                $where .= ' where goods_name like "%'.$_REQUEST['goods_name'].'%"';
            }
            
        }

        //调取数据库操作类
        $model = new Modeli();
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("SELECT COUNT(*) FROM shop_stock_log ".$where)->queryScalar(); 
        //初始化分页类
        $page->init(intval($count),$pageSize);
        //分页sql语句
        $sql = "select * from shop_stock_log ".$where." ORDER BY id DESC ".$page->limit;

        //执行分页SQL语句
        $arrData = $model->action($sql);
        //分页
        $pageShow = $page->show();

        return $this->render('stocklog',array('arrData'=>$arrData,'pageShow'=>$pageShow,'total'=>$count));

    }


    public function actionOrderlog(){
        $pageSize = 20;
        $db = Yii::$app->db;

        $where = '';
        //管理员
        if(isset($_REQUEST['admin_id']) && $_REQUEST['admin_id']){
            $where .= ' where action_user='.$_REQUEST['admin_id'];
        }
        //订单
        if(isset($_REQUEST['order_sn']) && $_REQUEST['order_sn']){
            //搜索订单号
            $order_id_arr = $db->createCommand("SELECT * FROM shop_order where like '%".$_REQUEST['order_sn']."%'")->queryAll();
            $order_ids = implode(',',$order_id_arr);
            
            if($where){
                $where .= " and order_id IN (".$order_ids.")";
            }else{
                $where .= " where order_id IN (".$order_ids.")";
            }
            
        }

        //调取数据库操作类
        $model = new Modeli();
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("SELECT COUNT(*) FROM shop_order_log ".$where)->queryScalar(); 
        //初始化分页类
        $page->init(intval($count),$pageSize);
        //分页sql语句
        $sql = "select * from shop_order_log ".$where." ORDER BY log_id DESC ".$page->limit;

        //执行分页SQL语句
        $arrData = $model->action($sql);
        //分页
        $pageShow = $page->show();
        //管理员
        $adminList = $db->createCommand("select * from shop_admin")->queryAll();
        
        return $this->render('orderlog',array('arrData'=>$arrData,'pageShow'=>$pageShow,'total'=>$count,'adminList'=>$adminList));

    }


    public function actionAdminlog(){
        $pageSize = 20;
        $db = Yii::$app->db;
        $where = '';
        //管理员
        if(isset($_REQUEST['admin_id']) && $_REQUEST['admin_id']){
            $where .= ' where l.admin_id='.$_REQUEST['admin_id'];
        }
        //IP
        if(isset($_REQUEST['log_ip']) && $_REQUEST['log_ip']){
            if($where){
                $where .= " and l.log_ip='".$_REQUEST['log_ip']."'";
            }else{
                $where .= " where l.log_ip='".$_REQUEST['log_ip']."'";
            }
            
        }
        //调取数据库操作类
        $model = new Modeli();
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("SELECT COUNT(*) FROM shop_admin_log as l".$where)->queryScalar(); 
        //初始化分页类
        $page->init(intval($count),$pageSize);
        //分页sql语句
        $sql = "select l.*,a.username from shop_admin_log as l inner join shop_admin as a on a.id = l.admin_id".$where." ORDER BY l.log_id DESC ".$page->limit;

        //执行分页SQL语句
        $arrData = $model->action($sql);
        //分页
        $pageShow = $page->show();
        //管理员
        $adminList = $db->createCommand("select * from shop_admin")->queryAll();

        return $this->render('adminlog',array('arrData'=>$arrData,'pageShow'=>$pageShow,'adminList'=>$adminList));

    }

}