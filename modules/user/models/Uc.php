<?php
namespace app\modules\user\models;

use yii\db\ActiveRecord;

class Uc extends ActiveRecord{
    private $sql;
    /*
     * @param string  $table 表名
     * @param string  $select  显示字段名
     * @param array  $where   限制条件
     * @param int  $limit   限制长度
     * @param string  $order   限制排序
     * return array
     */
    public static function findsql($table,$select="*",$where=[],$limit=6,$order="id desc"){
        $result = ActiveRecord::find()->select($select)->from($table)->where($where)->limit($limit)->orderBy($order)->asArray()->all();
        return $result;
    }
    public static function findsqlone($table,$select="*",$where=[]){
        $result = ActiveRecord::find()->select($select)->from($table)->where($where)->asArray()->one();
        return $result;
    }
    /*
     * @param string  $table 主表名
     * @param string  $jointype  连接类型
     * @param string  $jointable  副表名
     * @param string|array  $joinon  连接条件
     * @param string  $select  显示字段名
     * @param array  $where   限制条件
     * @param int  $limit   限制长度
     * @param string  $order   限制排序
     * return array
     */
    public static function findjoinsql($table, $jointype, $jointable, $joinon,$select="*",$where=[],$limit=6,$order="id desc"){
        $result = ActiveRecord::find()->select($select)->from($table)->join($jointype, $jointable, $joinon)->where($where)->limit($limit)->orderBy($order)->asArray()->all();
        return $result;
    }
    //实现三个表或者三个表以上联合查询请使用以下方法
    //parentjoin、childrenjoin、wherejoin、getSqljoin、delSqljoin【只是生成SQL语句不做执行】，【执行SQL请用db类】
    public function parentjoin($select, $table){
        $this->sql .= " SELECT {$select} FROM {$table}";
        return $this;
    }

    public function childrenjoin($jointype, $jointable, $joinon){
        $this->sql .= " {$jointype} {$jointable} ON {$joinon} ";
        return $this;
    }
    public function wherejoin($where,$limit="",$order=""){
        if(!empty($limit)){
            $this->sql .= !empty($order) ? " WHERE {$where} LIMIT {$limit} ORDER BY {$order} ":" WHERE {$where} LIMIT {$limit} ";
        }else{
            $this->sql .= !empty($order) ? " WHERE {$where} ORDER BY {$order} ":" WHERE {$where} ";
        }
        return $this;
    }
    public function getSqljoin(){
        return $this->sql;
    }
    public function delSqljoin(){
        $this->sql = "";
    }

}