<?php
namespace app\ext;
use \PDO;
use Yii;
class Modeli extends Dbi
{
    public $pdo;
    public function __construct()
    {
        $this->dsn = Yii::$app->params['type'].":dbname=".Yii::$app->params['dbname'].";host=".Yii::$app->params['host'].";charset=".Yii::$app->params['charset'].";port=".Yii::$app->params['port'];
        //实例化MYSQLI库
        $this->pdo = new PDO($this->dsn,Yii::$app->params['user'],Yii::$app->params['pass']);

    }
    public function  deleteSql($tbname = null,$where=null){
        $sql = "DELETE FROM ".Yii::$app->params['prefix'].$tbname." WHERE {$where}";
        return  $sql;
    }
    public function insertSql($tbname = null,array $data=[]){
       $strData = implode("','",$data);
       $sql = "INSERT INTO ".Yii::$app->params['prefix'].$tbname." VALUES ('{$strData}')";
       return  $sql;
    }
    public function updateSql($tbname=null,array $data=[],$where=null){
        $strData = "";
        foreach ($data as $key=>$value){
            $strData .= $key."='".$value."',";
        }
        $sql = "UPDATE ".Yii::$app->params['prefix'].$tbname." SET ".substr($strData,0,-1)." WHERE {$where} ";
        return  $sql;
    }
    public function  action($sql){
         if(stripos($sql,"SELECT") !==  false){
              $result = $this->pdo->query($sql);
              $data = $result->fetchAll($this->pdo::FETCH_ASSOC);
              return $data;
         }else{
              $bool = $this->pdo->exec($sql);
              return $bool;
         }
    }
}