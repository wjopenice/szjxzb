<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\ext\Modeli;
use app\ext\Page;

class MemberController extends Controller{
    public $layout = false;

    public function actionMember_list(){
        $pageSize = 20;
        $db = Yii::$app->db;
        $where = '';
        //分类
        if(isset($_REQUEST['tell']) && $_REQUEST['tell']){
            $where .= ' where tell='.$_REQUEST['tell'];
        }
        //调取数据库操作类
        $model = new Modeli();
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("SELECT COUNT(*) FROM shop_user ".$where)->queryScalar(); 
        //初始化分页类
        $page->init(intval($count),$pageSize);
        //分页sql语句
        $sql = "select * from shop_user ".$where." ORDER BY id DESC ".$page->limit;

        //执行分页SQL语句
        $arrData = $model->action($sql);
        //分页
        $pageShow = $page->show();

        return $this->render("member_list",array('arrData'=>$arrData,'pageShow'=>$pageShow,'total'=>$count));
    }

    public function actionMember_grade(){
        return $this->render("member_grade");
    }
    public function actionRecharge_record(){
        return $this->render("recharge_record");
    }
    public function actionApplication_cash(){
        return $this->render("application_cash");
    }
    public function actionRemittance_record(){
        return $this->render("remittance_record");
    }
    public function actionMember_sign(){
        return $this->render("member_sign");
    }
    public function actionEdit_grade(){
        return $this->render("edit_grade");
    }


    /**
     *  删除会员
     * @param type $id
     */
    public function actionDelmember()
    {
        $id = $_REQUEST['id'];
        if(!$id){
            return json_encode(array('status'=>1,'msg'=>'请选中删除的会员'));
        }

        $db = Yii::$app->db;
        $delRes = $db->createCommand("DELETE FROM shop_user WHERE id =".$id)->execute();

        if($delRes){
            //添加日志
            update_admin_log(Yii::$app->session->get('id'),array('log_info'=>'会员删除','log_ip'=>$_SERVER['REMOTE_ADDR'],'log_url'=>'admin/member/delmember'));
            return json_encode(array('status'=>0,'msg'=>'删除成功'));
        } else{
            return json_encode(array('status'=>1,'msg'=>'删除失败'));
        }  
        
   
    }
}