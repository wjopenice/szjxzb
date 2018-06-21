<?php
namespace app\modules\admin\controllers;

use Yii;
use app\ext\Modeli;
use app\ext\Page;
use yii\web\Controller;

class SettingController extends Controller{
    public $layout = false;
    public function actionShop_setting(){
        return $this->render("shop_setting");
    }
    //快递公司
    public function actionExpress_company(){
    	$pageSize = 20;
        $db = Yii::$app->db;
        $where = '';
        //物流编号
        if(isset($_REQUEST['shipping_code']) && $_REQUEST['shipping_code']){
            $where .= ' where shipping_code='.$_REQUEST['shipping_code'];
        }
        //公司名称
        if(isset($_REQUEST['shipping_name']) && $_REQUEST['shipping_name']){
            if($where){
                $where .= ' and shipping_name like "%'.$_REQUEST['shipping_name'].'%"';
            }else{
                $where .= ' where shipping_name like "%'.$_REQUEST['shipping_name'].'%"';
            }
            
        }
        //调取数据库操作类
        $model = new Modeli();
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("SELECT COUNT(*) FROM shop_shipping".$where)->queryScalar(); 
        //初始化分页类
        $page->init(intval($count),$pageSize);
        //分页sql语句
        $sql = "select * from shop_shipping ".$where." ORDER BY shipping_id DESC ".$page->limit;

        //执行分页SQL语句
        $arrData = $model->action($sql);
        //分页
        $pageShow = $page->show();

        return $this->render('express_company',array('arrData'=>$arrData,'pageShow'=>$pageShow,'total'=>$count));

    }

    public function actionSql(){
        $db = Yii::$app->db;
        //数据库表
        $tableName = $db->createCommand("show tables")->queryAll();
        $total_length = 0;
        //组装数据
        foreach ($tableName as $key=>$value){
            //获取数据库名
            $dbname = Yii::$app->params['dbname'];
            //获取表的状态
            $dbkey = "Tables_in_".$dbname;
            $statusSql = " show table status from ".$dbname." like '".$value[$dbkey]."'";
            $status = $db->createCommand($statusSql)->queryOne();
            //获取记录条数
            $tableName[$key]['count'] = $status['Rows'];
            //获取创建时间
            $tableName[$key]['create_time'] = $status['Create_time'];
            //获取字符集编码
            $tableName[$key]['charset'] =strstr($status['Collation'],'_',true);
            //获取引擎
            $tableName[$key]['engine'] = $status['Engine'];
            //获取表的已用数据量
            $tableName[$key]['Data_length'] = $status['Data_length']/(1024*1024);
            //获取表的最大容量
            //$tableName[$key]['Max_data_length'] = $status['Max_data_length']/(1024*1024)."MB";
            //获取表的索引占比空间
            $tableName[$key]['Index_length'] = $status['Index_length']/(1024*1024);
            //总内存
            $total_length +=  $tableName[$key]['Data_length']+$tableName[$key]['Index_length'];
        }
        //总表数量
        $total = count($tableName);

        //读取备份文件
        $path = "./data/";
        $dirname = opendir($path);
        if($dirname){
            $dirstr = "";
            while ($res = readdir($dirname)){
                if($res != "." && $res != ".." ){
                    $dirstr .= $res."<br>";
                }
            }
        }
        closedir($dirname);
        $dirstr = substr($dirstr,0,-4);

        return $this->render("sql",compact("tableName","dbkey","total","total_length","dirstr"));
    }

    public function actionDump_sql(){
        $table = Yii::$app->request->get("table");
        $type = Yii::$app->request->get("type");
        if($type == 'all'){
            $tableData = str_replace(","," ",$table);
            mysqldumpall($tableData);
        }else{
            mysqldump($table);
        }
    }

    public function actionRecord(){
        //读取备份文件
        $path = "./data/";
        $dirname = opendir($path);
        if($dirname){
            $dirstr = "";
            while ($res = readdir($dirname)){
                if($res != "." && $res != ".." ){
                    $dirstr .= $res."<br>";
                }
            }
        }
        closedir($dirname);
        $dirstr = substr($dirstr,0,-4);
        $sqlArr = explode("<br>",$dirstr);
        return $this->render("record",compact("sqlArr"));
    }

    public function actionSqldel(){
           $tableName = Yii::$app->request->get("tablename");
           $path = "./data/";
           $fileName = $path.$tableName;
           if(file_exists($fileName)){
              $bool = unlink($fileName);
              return $this->statusUrl($bool,"?r=admin/setting/record","删除备份数据失败",2);
           }
    }

}