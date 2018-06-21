<?php
/**
 * Created by PhpStorm.
 * User: openice
 * Date: 2018/4/26
 * Time: 16:12
 */
use yii\web\Controller;
error_reporting(0);
//原print_r改变
function p($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

//原var_dump改变
function dump($data){
    switch (true){
        case is_string($data) || is_int($data) || is_float($data): echo $data ; break; exit;
        case is_array($data) || is_object($data) : echo "<pre>";print_r($data);echo "</pre>"; break;exit;
        case is_bool($data) || is_null($data) : var_dump($data) ; break;exit;
        default: var_dump($data) ;break;exit;
    }
    exit;
}

//导航选中颜色
function navDataEx($id){
    //面包屑
    $crumbs = [
        "1"=>"高贵黄金","2"=>"奢华钻石","3"=>"智能电器",
        "4"=>"家居家纺","5"=>"箱包鞋类","6"=>"衣裳服饰"
    ];
    //导航
    $nav = [
        "高贵黄金"=>"fashionclothe","箱包鞋类"=>"multipurpose","家居家纺"=>"lightmakeup",
        "奢华钻石"=>"boundless","衣裳服饰"=>"anexplosive","智能电器"=>"gorgeous"
    ];

    //面包屑数据
    $crumbsData =$crumbs[$id];
    //导航数据
    $navData = $nav[$crumbsData];
    return $navData;
}

//写一个数据类型的检测
function dataType($data){
    if(is_string($data)){
        echo "这是字符串";
    }else if(is_int($data)){
        echo "这是整型";
    }else if(is_object($data)){
        echo "这是对象";
    }else if(is_float($data)){
        echo "这是浮点类型";
    }else if(is_bool($data)){
        echo "这是布尔类型";
    }else if(is_null($data)){
        echo "这是NULL";
    }else if(is_array($data)){
        echo "这是数组";
    }else{
        echo "这是资源类型";
    }
    exit;
}

//删除文件
function file_delete($filename=null,$mktime=null){
    if(file_exists($filename)){
        $t1 = fileatime($filename);//获取上一次访问时间
        $t2 = time(); //获取本次访问时间
        $t3 = $t2-$t1;//时间差
        $t4 = $mktime;// 过期时间秒
        if($t3 >= $t4){//过期
            unlink($filename); //删除文件
        }
    }else{
        die($filename." not file code：404");
    }
}

//强化readfile函数安全
function Exreadfile($fileName = null,$tags=true){
    if($tags){
        ob_start();//打开输出缓冲
        readfile($fileName);  //写数据到输出缓冲
        $strData = ob_get_flush();//提前输出缓冲数据和关闭
        ob_clean();//清空输出缓冲里面的内容
        return htmlspecialchars($strData);
    }else{
        ob_start();//打开输出缓冲
        readfile($fileName);  //写数据到输出缓冲
        $strData = ob_get_flush();//提前输出缓冲数据和关闭
        ob_clean();//清空输出缓冲里面的内容
        return $strData;
    }
}

//点击率
function file_addclick($fileName = null){
    $L = filesize($fileName)+1;
    $fileRes1 = fopen($fileName,"r");
    $str = fread($fileRes1,$L);
    $str+=1;
    $fileRes2 = fopen($fileName,"w+");
    fwrite($fileRes2,$str);
    rewind($fileRes2);
    return fread($fileRes2,$L);
}

//PHP生成日历
function datetime(){
    $y = isset($_GET['y'])?$_GET['y']:date("Y"); //当前年
    $m = isset($_GET['m'])?$_GET['m']:date("m"); //当前月
    $d = isset($_GET['d'])?$_GET['d']:date("d"); //当前日
    $days = date("t",mktime(0,0,0,$m,$d,$y));//获取当月的天数
    $statweek = date("w",mktime(0,0,0,$m,1,$y));//获取当月的第一天是星期几
    $str = "";
    $str .="<table border='1' align='center'>";
    $str .="<caption>当前为{$y}年{$m}月</caption>";
    $str .="<tr><th>星期天</th><th>星期一</th><th>星期二</th><th>星期三</th><th>星期四</th><th>星期五</th><th>星期六</th></tr>";
    $str .="<tr>";
    for($i=0;$i<$statweek;$i++){
        $str .="<td>&nbsp;</td>";
    }
    for($j=1;$j<=$days;$j++){
        $i++;
        if($j == $d){
            $str .="<td bgcolor='cyan'>{$j}</td>";
        }else{
            $str .="<td>{$j}</td>";
        }
        if($i % 7 == 0){
            $str .="</tr><tr>";
        }
    }
    while($i % 7 !== 0){
        $str .="<td>&nbsp;</td>";
        $i++;
    }
    $str .="</tr>";
    $str .="</table>";
    return $str;
}

//转静态化
function static_page($url,$descname){
    set_time_limit(0);
    //实现HTML静态化
    $data = base64_encode(file_get_contents($url));
    file_put_contents($descname,$data);  //W+
    $strData = base64_decode(file_get_contents($descname));
    return $strData;
}

//文件下载
function download($file){
    $mime = mime_content_type($file);
    $size = filesize($file);
    // 下载文件mime类型
    header('Content-type: '.$mime);
    // 下载文件保存
    header("Content-Disposition: attachment; filename=".$file);
    //下载文件大小显示
    header("Content-Length:".$size);
    //读取下载文件
    readfile($file);
}

//根据城市ID获取城市名
function ConvertCityName($cityid){
    $tablename = "";
    if(substr($cityid,-4) == "0000") {
        $tablename .= "province";
    }else if( (substr($cityid,-2) == "00") && (substr($cityid,-4) != "0000") ){
        $tablename .= "city";
    }else{
        $tablename .= "area";
    }
    $db = Yii::$app->db;
    $citysql = "select {$tablename} from shop_{$tablename} where {$tablename}ID='{$cityid}'";
    $cityData = $db->createCommand($citysql)->queryOne();
    return  $cityData[$tablename];
}

//根据商品ID获取商品图片地址
function getGoodsurl($goodid){
    $db = Yii::$app->db;
    $urlsql = "select image_url1 from mzsm_img where goods_id={$goodid}";
    $urlData = $db->createCommand($urlsql)->queryOne();
    return  $urlData['image_url1'];
}


//数据库备份
function mysqldump($tableName){
    $username = Yii::$app->params['user'];//你的MYSQL用户名
    $password = Yii::$app->params['pass'];;//密码
    $hostname = Yii::$app->params['host'];;//MYSQL服务器地址
    $dbname   = Yii::$app->params['dbname'];;//数据库名
    $port   = Yii::$app->params['port'];;//数据库端口
    $dumpfname = $tableName . "_" . date("YmdHi").".sql";
    $path = dirname(dirname(__FILE__))."/data/".$dumpfname;
    $command = "mysqldump -P{$port} -h{$hostname} -u{$username} -p{$password} {$dbname} {$tableName} > {$path}";
    system($command,$retval);
    exit;
}

//数据库备份
function mysqldumpall($tableName){
    $username = Yii::$app->params['user'];//你的MYSQL用户名
    $password = Yii::$app->params['pass'];;//密码
    $hostname = Yii::$app->params['host'];;//MYSQL服务器地址
    $dbname   = Yii::$app->params['dbname'];;//数据库名
    $port   = Yii::$app->params['port'];;//数据库端口
    $dumpfname =  "localhost_" . date("YmdHi").".sql";
    $path = dirname(dirname(__FILE__))."/data/".$dumpfname;
    $command = "mysqldump -P{$port} -h{$hostname} -u{$username} -p{$password} {$dbname} {$tableName} > {$path}";
    system($command,$retval);
    $zipfname = "localhost_" . date("YmdHi").".zip";
    $zippath = dirname(dirname(__FILE__))."/data/".$zipfname;
    $zip = new \ZipArchive();
    if($zip->open($zippath,ZIPARCHIVE::CREATE))
    {
        $zip->addFile($path,$path);
        $zip->close();
    }
    if (file_exists($zippath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($zippath));
        flush();
        readfile($zippath);
        exit;
    }
}

//获取CURD请求类型
function Get_method(){
    $method = $_SERVER['REQUEST_METHOD'];
    return $method;
}
//获取CURD请求数据
function Resp_curl(){
    parse_str(file_get_contents('php://input'), $data);
    $data = array_merge($_GET, $_POST, $data);
    return $data;
}
//建立CURD请求模式
function Rest_curl($url,$type='GET',$data="",$bool=false,array $headers=["content-type: application/x-www-form-urlencoded;charset=UTF-8"]){
    //post 新增  get查询  put修改  delete删除
    $curl= curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_URL,$url);
    if($bool == true){
        curl_setopt($curl, CURLOPT_HEADER, $bool);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    switch ($type){
        case "GET":"";break;
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:"";break;
    }
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,false);
    if(curl_exec($curl) === false){
        return "error code:".curl_getinfo($curl, CURLINFO_HTTP_CODE).',error message:'.curl_error($curl);
    }
    $strData = curl_exec($curl);
    curl_close($curl);
    return $strData;
}

function StrX_shuffle($str=null){
    $a1 = range("a","z");
    shuffle($a1);
    $a2 = range("a","z");
    shuffle($a2);
    $a3 = range("a","z");
    shuffle($a3);
    $a4 = range("a","z");
    shuffle($a4);
    $a5 = range("a","z");
    shuffle($a5);
    $a6 = range("a","z");
    shuffle($a6);
    $strData = $str.$a1[0].$a2[0].$a3[0].$a4[0].$a5[0].$a6[0];
    return $strData;
}

//随机字符串
function Mer_shuffle($string,$maxlen = 20){
    $int_arr = range(0,9);
    $str_arr = range("a","z");
    $str1 = mb_splitchar($string);
    $new_arr = array_merge($int_arr,$str_arr);
    shuffle($new_arr);
    $strData = $str1.date("YmdHi",time()).implode($new_arr);
    $new_str = substr($strData,0,$maxlen);
    //file_put_contents("./c.html",$new_str);
    return $new_str;
}
//订单生成
function build_order_no(){
    return date('Ymd').substr(implode(array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
}
//获取单个汉字拼音首字母。注意:此处不要纠结。汉字拼音是没有以U和V开头的
function getfirstchar($s0){
    $fchar = ord($s0{0});
    if($fchar >= ord("A") and $fchar <= ord("z") )return strtoupper($s0{0});
    $s1 = iconv("UTF-8","gb2312", $s0);
    $s2 = iconv("gb2312","UTF-8", $s1);
    if($s2 == $s0){$s = $s1;}else{$s = $s0;}
    $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
    if($asc >= -20319 and $asc <= -20284) return "A";
    if($asc >= -20283 and $asc <= -19776) return "B";
    if($asc >= -19775 and $asc <= -19219) return "C";
    if($asc >= -19218 and $asc <= -18711) return "D";
    if($asc >= -18710 and $asc <= -18527) return "E";
    if($asc >= -18526 and $asc <= -18240) return "F";
    if($asc >= -18239 and $asc <= -17923) return "G";
    if($asc >= -17922 and $asc <= -17418) return "H";
    if($asc >= -17922 and $asc <= -17418) return "I";
    if($asc >= -17417 and $asc <= -16475) return "J";
    if($asc >= -16474 and $asc <= -16213) return "K";
    if($asc >= -16212 and $asc <= -15641) return "L";
    if($asc >= -15640 and $asc <= -15166) return "M";
    if($asc >= -15165 and $asc <= -14923) return "N";
    if($asc >= -14922 and $asc <= -14915) return "O";
    if($asc >= -14914 and $asc <= -14631) return "P";
    if($asc >= -14630 and $asc <= -14150) return "Q";
    if($asc >= -14149 and $asc <= -14091) return "R";
    if($asc >= -14090 and $asc <= -13319) return "S";
    if($asc >= -13318 and $asc <= -12839) return "T";
    if($asc >= -12838 and $asc <= -12557) return "W";
    if($asc >= -12556 and $asc <= -11848) return "X";
    if($asc >= -11847 and $asc <= -11056) return "Y";
    if($asc >= -11055 and $asc <= -10247) return "Z";
    return NULL;
}
//获取整条字符串汉字拼音首字母
function mb_splitchar($str){
    $strX = "";
    for($i=0;$i<mb_strlen($str);$i++){
        $strData = mb_substr($str,$i,1);
        if(ord($strData) > 160){
            $strX .= getfirstchar($strData);
        }else{
            $strX .= $strData;
        }
    }
    return $strX;
}

//获取ip
function getIp() {

    $arr_ip_header = array(
        'HTTP_CDN_SRC_IP',
        'HTTP_PROXY_CLIENT_IP',
        'HTTP_WL_PROXY_CLIENT_IP',
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'REMOTE_ADDR',
    );
    $client_ip = 'unknown';
    foreach ($arr_ip_header as $key)
    {
        if (!empty($_SERVER[$key]) && strtolower($_SERVER[$key]) != 'unknown')
        {
            $client_ip = $_SERVER[$key];
            break;
        }
    }
    return $client_ip;
}
//获取具体错误信息
function getE($num="") {
    switch($num) {
        case -1:  $error = '用户名长度必须在6-30个字符以内！'; break;
        case -2:  $error = '用户名被禁止注册！'; break;
        case -3:  $error = '用户名被占用！'; break;
        case -4:  $error = '密码长度不合法'; break;
        case -5:  $error = '邮箱格式不正确！'; break;
        case -6:  $error = '邮箱长度必须在1-32个字符之间！'; break;
        case -7:  $error = '邮箱被禁止注册！'; break;
        case -8:  $error = '邮箱被占用！'; break;
        case -9:  $error = '手机格式不正确！'; break;
        case -10: $error = '手机被禁止注册！'; break;
        case -11: $error = '手机号被占用！'; break;
        case -12: $error = '手机号码必须由11位数字组成';break;

        case -13: $error = '手机号已被其他账号绑定';break;

        case -20: $error = '请填写正确的姓名';break;
        case -21: $error = '用户名必须由字母、数字或下划线组成,以字母开头';break;
        case -22: $error = '用户名必须由6~30位数字、字母或下划线组成';break;
        case -31: $error = '密码错误';break;
        case -32: $error = '用户不存在或被禁用';break;
        case -41: $error = '身份证无效';break;
        default:  $error = '未知错误';
    }
    return $error;
}

//记录用户手机操作日志
function logyiip($filename,$data){
    $log = dirname(__FILE__)."/".$filename;
    $logfile = fopen($log,"a+");
    $logstr = $data."\n";
    fwrite($logfile,$logstr);
    fclose($logfile);
}

function recordlog($filename,$data,$mode="a+"){
    $log = dirname(__FILE__)."/".$filename;
    $logFile = fopen($log,$mode);
    fwrite($logFile,$data."\n");
    fclose($logFile);
}

//记录浏览商城顾客日志
function logyiix($filename){
    session_start();
    $log = dirname(__FILE__)."/".$filename;
    $logfile = fopen($log,"a+");
    $time = date("Y-m-d H:i:s",time()+0);
    $ip = $_SERVER["REMOTE_ADDR"];
    $logstr = "";
    if(isset($_COOKIE['username']) && !isset($_SESSION['username'])){
        $logstr .=  " 访问时间：{$time} 访问地址：{$ip} 前端用户：{$_COOKIE['username']} \r\n";
    }else if(isset($_SESSION['username']) && !isset($_COOKIE['username'])){
        $logstr .=  " 访问时间：{$time} 访问地址：{$ip} 后台用户：{$_SESSION['username']} \r\n";
    }else if(isset($_SESSION['username']) && isset($_COOKIE['username'])){
        $logstr .=  " 访问时间：{$time} 访问地址：{$ip} 前台用户：{$_COOKIE['username']}  后台用户：{$_SESSION['username']} \r\n";
    }else{
        $logstr .=  " 访问时间：{$time} 访问地址：{$ip} \r\n";
    }
    fwrite($logfile,$logstr);
    fclose($logfile);
}


//记录用户购物车日志
//* @param string $filename  用户名
//* @param json_string $data  数据
//* @return void
function logyiicart($user,$data){
    $path = dirname(dirname(__FILE__))."/cart/".$user.".cart";
    if(!is_file($path)){
        file_put_contents($path,"");//创建文件
    }
    $strData =strlen(Exreadfile($path,false));
    if($strData == 1){
        $logfile = fopen($path,"w+");
    }else{
        $logfile = fopen($path,"a+");
    }
    $logstr = $data.",";
    fwrite($logfile,$logstr);
    fclose($logfile);
}

//修改用户购物车日志
//* @param string $filename  用户名
//* @param json_string $data  数据
//* @return void
function edityiicart($user,$data){
    $log = dirname(dirname(__FILE__))."/cart/".$user.".cart";
    $logfile = fopen($log,"w+");
    $logstr = $data;
    fwrite($logfile,$logstr);
    fclose($logfile);
}

//获取购物车长度
//* @param string $user  用户名
//* @return int
function cartlen($user){
    $path = dirname(dirname(__FILE__))."/cart/".$user.".cart";
    if(is_file($path)){
        $fileData = Exreadfile($path,false);
        $strData = "[".substr($fileData,0,-1)."]" ;
        $arrData = json_decode($strData);
        $data = count($arrData);
    }else{
        $data = 0;
    }
    return $data;
}


//获取购物车数据
//* @param string $user  用户名
//* @return array
function cartdata($user){
    $path = dirname(dirname(__FILE__))."/cart/".$user.".cart";
    if(is_file($path)){
        $fileData = Exreadfile($path,false);
        $strData = "[".substr($fileData,0,-1)."]" ;
        $arrData = json_decode($strData,true);
    }else{
        $arrData = [];
    }
    return $arrData;
}

//重复商品数量累加
//* @param array $data
//* @return array
function cartinct($data){
    $repeat =[];
    $result = [];
    foreach ($data as $key => $value) {
        $has = false;
        foreach ($result as $k=>$val) {
            if($val['goodid'] == $value['goodid']){
                $repeat[$k] ++;
                $has = true;
                break;
            }
        }
        if(!$has){$result[] = $value;}
    }
    if($repeat){
        foreach ($repeat as $key => $value) {
            $result[$key]['goodnum'] += $value;
        }
    }
    return $result;
}

/**
 * @param $arr
 * @param $key_name
 * @return array
 * 将数据库中查出的列表以指定的 id 作为数组的键名 
 */
function convert_arr_key($arr, $key_name)
{
    $arr2 = array();
    foreach($arr as $key => $val){
        $arr2[$val[$key_name]] = $val;        
    }
    return $arr2;
}

/**
* 商品库存操作日志
* @param int $muid 操作 用户ID
* @param int $stock 更改库存数 正加库存 -减库存
* @param array $goods 库存商品
* @param string $order_sn 订单编号
*/
function update_stock_log($muid, $stock = 1, $goods, $order_sn = '')
{
    $data['ctime'] = time();
    $data['stock'] = $stock;
    $data['muid'] = $muid;
    $data['goods_id'] = $goods['goods_id'];
    $data['goods_name'] = $goods['goods_name'];
    $data['goods_spec'] = empty($goods['spec_key_name']) ? $goods['key_name'] : $goods['spec_key_name'];
    $data['order_sn'] = $order_sn;

    $db = Yii::$app->db;
    $db->createCommand()->insert('shop_stock_log', $data)->execute(); 
}


/**
* 管理员操作日志
* @param int $admin_id 操作 用户ID
* @param array $logInfo log信息
*/
function update_admin_log($admin_id, $logInfo = array())
{   
    $data['admin_id'] = $admin_id;
    $data['log_info'] = $logInfo['log_info'];
    $data['log_ip'] = $logInfo['log_ip'];
    $data['log_url'] = $logInfo['log_url'];
    $data['log_time'] = time();

    $db = Yii::$app->db;
    $db->createCommand()->insert('shop_admin_log', $data)->execute(); 
}

/*
 * 验签sign
 */
function sign($data,$key){
    $sh_data = [
        'resqn'   => $data['resqn'],
        'account' => $data['account'],
        'pay_amount' => $data['pay_amount'],
        'pay_way' => $data['pay_way'],
        'notify_url' =>  $data['notify_url'],
        'key' => $key,
    ];
    ksort($sh_data);
    $buff = "";
    foreach ($sh_data as $k => $v)
    {
        if($v != "" && !is_array($v)){
            $buff .= $k . "=" . $v . "&";
        }
    }
    $buff = trim($buff, "&");
    $signdata = md5($buff);
    return $signdata;
}

//下面三个是自定义框架使用
//spl_autoload_register(function($className = null){
//    //检测这个文件是否存在
//    $fileName = $className.".class.php";
//    if(file_exists($fileName)){
//        include_once $fileName;
//    }else{
//        die($fileName." not file code：404");
//    }
//});
//
//function view($mod,$dir,$file,array &$data=null){
//    include_once "./".$mod."/view/".$dir."/".$file.".php";
//}
//
//function viewS($mod,$dir,$file,array $data=null){
//    if(!empty($data)){
//        extract($data);
//        include_once "./".$mod."/view/".$dir."/".$file.".php";
//    }else{
//        include_once "./".$mod."/view/".$dir."/".$file.".php";
//    }
//}