<?php
namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\web\UploadedFile;
use app\ext\Dbi; 
use app\ext\Modeli;
use app\ext\Page;
use Yii;

class GoodsController extends Controller{
    public $layout = false;
    public $enableCsrfValidation = false;

    //商品列表
    public function actionList(){
        $pageSize = 20;
        $db = Yii::$app->db;
        $where = '';
        //分类
        if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id']){
            $where .= ' where g.cat_id='.$_REQUEST['cat_id'];
        }
        //上下架
        if(isset($_REQUEST['is_on_sale']) && $_REQUEST['is_on_sale']){
            if($where){
                $where .= ' and g.is_on_sale='.($_REQUEST['is_on_sale']-1);
            }else{
                $where .= ' where g.is_on_sale='.($_REQUEST['is_on_sale']-1);
            }
            
        }
        //新品 推荐
        if(isset($_REQUEST['intro']) && $_REQUEST['intro']){
            if($where){
                $where .= ' and g.'.$_REQUEST['intro'].'=1';
            }else{
                $where .= ' where g.'.$_REQUEST['intro'].'=1';
            }
            
        }
        //关键词
        if(isset($_REQUEST['key_word']) && $_REQUEST['key_word']){
            if($where){
                $where .= ' and g.keywords like "%'.$_REQUEST['key_word'].'%"';
            }else{
                $where .= ' where g.keywords like "%'.$_REQUEST['key_word'].'%"';
            }
            
        }
        //调取数据库操作类
        $model = new Modeli();
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("SELECT COUNT(*) FROM shop_goods as g".$where)->queryScalar(); 
        //初始化分页类
        $page->init(intval($count),$pageSize);
        //分页sql语句
        $sql = "select g.goods_id,g.goods_name,g.goods_sn,g.shop_price,t.name,g.store_count,g.is_on_sale,g.is_hot,g.is_new,g.sort,g.is_recommend
            from shop_goods as g 
            inner join shop_goods_category as t
            on t.id = g.cat_id".$where." ORDER BY g.goods_id DESC ".$page->limit;

        //执行分页SQL语句
        $arrData = $model->action($sql);
        //分页
        $pageShow = $page->show();
        //分类
        $typeList = $db->createCommand("select * from shop_goods_category where level = 3")->queryAll();

        return $this->render('list',array('arrData'=>$arrData,'pageShow'=>$pageShow,'typeList'=>$typeList));

    }


    //添加商品
    public function actionAdd(){
        $request = Yii::$app->request;
        $session = Yii::$app->session;
        $db = Yii::$app->db;
        if($request->isPost){
            //添加商品
            $data = $request->post();
            if(!$data['cat_id_3']){
                return $this->error("请选择分类",2);
            }
            $data['cat_id'] = $data['cat_id_3'];
            unset($data['cat_id_3']);unset($data['file']);
            if(!$data['goods_sn']){
                $data['goods_sn'] = "ZB".date("YmdHis");  
            }
            $data['last_update'] = time();
            //$res = array('code'=>2,'msg'=>'数据错误','data'=>$data);
            //return json_encode($res);
            $id = $db->createCommand()->insert('shop_goods', $data)->execute(); 
            if($id){
                //添加库存操作
                update_stock_log(Yii::$app->session->get('id'),$data['store_count'],array('goods_id'=>$id,'goods_name'=>$data['goods_name']));
                return $this->success("?r=admin/goods/list",2);
            }else{
                return $this->error("添加失败 请重试",2);
            }
            

        }else{
            $sql = "SELECT * FROM shop_goods_category where parent_id = 0";
            $cate_arr = $db->createCommand($sql)->queryAll();

            return $this->render("add",array('cate_arr'=>$cate_arr));
        }

    }

    public function actionEdit(){
        return $this->render("edit");
    }


    /**
     *  获取选中的下拉框
     * @param type $cat_id
     */
    public function actionParentcate()
    {
        $cat_id = $_REQUEST['cate_id'];
        if(!$cat_id){
            return json_encode(array());
        }
        $db = Yii::$app->db;
        //查一级分类
        $where = "parent_id = ".$cat_id;

        $sql = "SELECT * FROM shop_goods_category where ".$where;
        $cat_arr = $db->createCommand($sql)->queryAll();
        
        return json_encode($cat_arr);
   
    }

    /**
     *  删除商品
     * @param type $ids
     */
    public function actionDelgoods()
    {
        $ids = $_REQUEST['ids'];
        if(!$ids){
            return json_encode(array('status'=>1,'msg'=>'请选中删除的商品'));
        }
        $db = Yii::$app->db;

        //删除商品
        if(strpos($ids,',')){
            $sql = "DELETE FROM shop_goods WHERE goods_id IN (".$ids.")";
        }else{
            $sql = "DELETE FROM shop_goods WHERE goods_id =".$ids;
        }
        $delRes = $db->createCommand($sql)->execute();

        if($delRes){
            return json_encode(array('status'=>0,'msg'=>'删除成功'));
        } else{
            return json_encode(array('status'=>1,'msg'=>'删除失败'));
        }  
        
   
    }

    //更改状态
    public function actionUpstatus()
    {
        $table = $_REQUEST['table'];
        $id_name = $_REQUEST['id_name'];
        $id_value = $_REQUEST['id_value'];
        $field = $_REQUEST['field'];
        $val = $_REQUEST['val'];
        if(!$table){
            return json_encode(array('status'=>1,'msg'=>'请选中操作'));
        }
        $table = 'shop_'.$table;
        $db = Yii::$app->db;

        //更改商品
        $sql = "UPDATE ".$table." SET ".$field." = '".$val."' WHERE ".$id_name." = ".$id_value;
        $res = $db->createCommand($sql)->execute();
        //$res = $db->createCommand()->update($table, array($field=>$val),$id_name."=:id",array(':id'=>$id_value));

        if($res){
            return json_encode(array('status'=>0,'msg'=>'修改成功'));
        } else{
            return json_encode(array('status'=>1,'msg'=>'修改失败'));
        }  
        
   
    }

    public function actionClassify(){

        $db = Yii::$app->db;
        global $goods_category, $goods_category2;   

        $goods_category = $db->createCommand("SELECT * FROM shop_goods_category ORDER BY parent_id , sort_order ASC")->queryAll();
        $goods_category = convert_arr_key($goods_category, 'id');
        //数据处理
        foreach ($goods_category AS $key => $value)
        {
            if($value['level'] == 1){
                $this->get_cat_tree($value['id']);                                
            }
        }

        return $this->render('classify',array('arrData'=>$goods_category2));

    }

    //商品分类列表
   /* public function actionClassify(){

        $db = Yii::$app->db;
        $arrData = $db->createCommand("SELECT * FROM shop_goods_category")->queryAll();
        //递归
        $newDate =$this->diGui($arrData,0);

        return $this->render('classify',array('arrData'=>$newDate));
    }*/

    //商品分类添加
    public function actionAddclassify(){

        $request = Yii::$app->request;
        $session = Yii::$app->session;
        $db = Yii::$app->db;
        if($request->isPost){
            //添加商品
            $data = $request->post();
            unset($data['file']);

            $data['level'] = 1; //1级分类
            $path = "0";
            if($data['parent_id']){
                $data['level'] = 2;
                $path = $path.'_'.$data['parent_id'];
            }
            if($data['parent_id_2']){
               $data['parent_id'] = $data['parent_id_2']; 
               $data['level'] = 3;
               $path = $path.'_'.$data['parent_id_2'];
            }
            unset($data['parent_id_2']);

            $res = $db->createCommand()->insert('shop_goods_category', $data)->execute(); 
            if($res){
                //修改path
                $id = $db->getLastInsertID();
                $path = $path.'_'.$id;
                $sql = "UPDATE shop_goods_category SET parent_id_path = '".$path."' WHERE id = ".$id;
                $db->createCommand($sql)->execute();

                return $this->success("?r=admin/goods/classify",2);
            }else{
                return $this->error("添加失败 请重试",2);
            }
            

        }else{
            $sql = "SELECT * FROM shop_goods_category where parent_id = 0";
            $cate_arr = $db->createCommand($sql)->queryAll();

            $parent_id_1 = isset($_REQUEST['parent_id']) ? $_REQUEST['parent_id'] : 0;
            //$parent_id_2 = 0;
            if($parent_id_1){
                $parent_info = $db->createCommand("SELECT * FROM shop_goods_category where id = ".$parent_id_1)->queryOne();
                if($parent_info['level'] == 2){
                    //$parent_id_2 = $parent_id_1;
                    $parent_id_1 = $parent_info['parent_id'];
                }
                
            }
            return $this->render("addclassify",array('cate_arr'=>$cate_arr,'parent_id_1'=>$parent_id_1));
        }
    }

    //递归
    function diGui($data, $pId)
    {
        $tree = '';
        foreach($data as $k => $v)
        {
          if($v['parent_id'] == $pId)
          {        //父亲找到儿子
           $v['child'] = $this->diGui($data, $v['id']);
           $tree[] = $v;
          }
        }
        return $tree;
    }

    /**
     * 获取指定id下的 所有分类      
     * @global type $goods_category 所有商品分类
     * @param type $id 分类id
     * @return 返回数组 $goods_category2
     */
    public function get_cat_tree($id)
    {
        global $goods_category, $goods_category2;          
        $goods_category2[$id] = $goods_category[$id];    
        foreach ($goods_category AS $key => $value){
             if($value['parent_id'] == $id)
             {                 
                $this->get_cat_tree($value['id']);  
                $goods_category2[$id]['have_son'] = 1; // 还有下级
             }
        }               
    }

    //图片上传
    public function actionUpload(){
        $this->layout = false;
        $request = Yii::$app->request;

        $file = UploadedFile::getInstanceByName("file");
        $year = date("Y",time()+0);
        $time = date("m-d",time()+0);
        //文件的绝对路径
        $fileDir = "/public/upload/goods/".$year."/".$time."/";
        $dir = dirname(dirname(dirname(dirname(__FILE__)))).$fileDir;
        if(!file_exists($dir)){
            mkdir($dir,0777,true);
        }
        $fileName  =  $dir.preg_replace("/[\s\－]+/","",iconv("utf-8","gb2312",$file->name));
        $fileSize = $file->size;
        $fileError = $file->error;
        $fileTmpName = $file->tempName;
        $fileType = $file->type;
        //保存文件函数，将图片保存到本地
        $status = $file->saveAs($fileName,true);
        //进行判断,保存本地失败
        return json_encode(array('status'=>$status,'fileName'=>$fileDir.preg_replace("/[\s\－]+/","",iconv("utf-8","gb2312",$file->name))));

    }

    public function actionGood_spec(){
        $db = Yii::$app->db;
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("select count(*) as total from mzsm_spec")->queryScalar();
        //初始化分页类
        $page->init(intval($count),5);
        //分页sql语句
        $sql = "select * from mzsm_spec".$page->limit;
        //执行分页SQL语句
        $arrData = $db->createCommand($sql)->queryAll();
        //分页
        $pageShow = $page->show();
        return $this->render("good_spec",compact("arrData","pageShow"));
    }
    public function actionGood_attr(){

        $db = Yii::$app->db;
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("select count(*) as total from mzsm_attr")->queryScalar();
        //初始化分页类
        $page->init(intval($count),5);
        //分页sql语句
        $sql = "select * from mzsm_attr".$page->limit;
        //执行分页SQL语句
        $arrData = $db->createCommand($sql)->queryAll();
        //分页
        $pageShow = $page->show();
        return $this->render("good_attr",compact("arrData","pageShow"));
    }

    public function actionGood_attr_del(){
        $id = Yii::$app->request->get("id");
        $bool = Yii::$app->db->createCommand()->delete("mzsm_attr","id=".$id)->execute();
        return $this->statusUrl($bool,"?r=admin/goods/good_attr","删除属性失败");
    }

    public function actionGood_brand(){
        $db = Yii::$app->db;
        //调取分页操作类
        $page = new Page();
        //执行SQL语句
        $count = $db->createCommand("select count(*) as total from mzsm_brand ")->queryScalar();
        //初始化分页类
        $page->init(intval($count),3);
        //分页sql语句
        $sql = "select * from mzsm_brand order by id desc".$page->limit;
        //执行分页SQL语句
        $arrData = $db->createCommand($sql)->queryAll();
        //分页
        $pageShow = $page->show();
        return $this->render("good_brand",compact("arrData","pageShow"));
    }
    public function actionAddbrand(){
         $request = Yii::$app->request;
         $db = Yii::$app->db;
         if($request->isPost){
            $data = $request->post();
            unset($data['btn']);
            $file = UploadedFile::getInstanceByName("file");
            $year = date("Y",time()+0);
            $time = date("m-d",time()+0);
            $path =  "/public/upload/brand/".$year."/".$time."/";
            $dir = dirname(dirname(dirname(dirname(__FILE__)))).$path;
            if(!file_exists($dir)){mkdir($dir,0777,true);}
            $file_name = mb_splitchar(preg_replace("/[\s\－]+/","",iconv("utf-8","utf-8",$file->name)));
            $fileName  =  $dir.$file_name;
            $status = $file->saveAs($fileName,true);
            if($status){
                $data['logo'] =$path.$file_name;
                $bool = $db->createCommand()->insert("mzsm_brand",$data)->execute();
                return $this->statusUrl($bool,"?r=admin/goods/good_brand",'添加品牌失败');
            }else{
                return $this->error("图片上传失败",2);
            }
         }else{
             return $this->render("addbrand");
         }
    }
    public function actionEditbrand(){
        $request = Yii::$app->request;
        $db = Yii::$app->db;
        $id = $request->get("id");
        if($request->isPost){
            $data = $request->post();
            unset($data['btn']);
            $file = UploadedFile::getInstanceByName("file");

            if(empty($file)){
                $bool = $db->createCommand()->update("mzsm_brand",$data,"id=".$id)->execute();
                return $this->statusUrl($bool,"?r=admin/goods/good_brand",'修改品牌失败');
            }else{

                $year = date("Y",time()+0);
                $time = date("m-d",time()+0);
                $path =  "/public/upload/brand/".$year."/".$time."/";
                $dir = dirname(dirname(dirname(dirname(__FILE__)))).$path;
                if(!file_exists($dir)){mkdir($dir,0777,true);}
                $file_name = mb_splitchar(preg_replace("/[\s\－]+/","",iconv("utf-8","utf-8",$file->name)));

                $fileName  =  $dir.$file_name;
                $status = $file->saveAs($fileName,true);

                if($status){

                    $data['logo'] =$path.$file_name;
                    $bool = $db->createCommand()->update("mzsm_brand",$data,"id=".$id)->execute();
                    return $this->statusUrl($bool,"?r=admin/goods/good_brand",'修改品牌失败');
                }else{
                    return $this->error("图片上传失败",2);
                }
            }
        }else{
            $arrData = $db->createCommand("select * from mzsm_brand where id={$id}")->queryOne();
            return $this->render("editbrand",compact("arrData"));
        }
    }

}