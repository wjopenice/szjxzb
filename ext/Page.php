<?php
namespace app\ext;
class Page
{
    //分页类
    //总条数 = result->num
    //总页数 = ceil（总条数 /单页数）
    //单页数 = 3
    //当前页 =
    //起始位置 = （当前页-1）*单页数
    public $total;
    public $showPage;
    public $totalPage;
    public $page;
    public $start;
    public $limit;

    public function init($total,$showPage){
         $this->total = $total;
         $this->showPage = $showPage;
         $this->totalPage = ceil($this->total/$this->showPage);
         $this->page = empty($_GET['page']) ? 1 : $_GET['page'];
         $this->start = ($this->page -1) * $this->showPage;
         $this->limit = " limit {$this->start},{$this->showPage}";
    }

    public function show($searchData = ""){
        $url = substr(strstr($_SERVER['REQUEST_URI'],"&",true),1);
        if(!empty($url)){
            $url = substr(strstr($_SERVER['REQUEST_URI'],"&",true),1);
        }else{
            $url = substr($_SERVER['REQUEST_URI'],1);
        }
        $str = "";
        $str .= "<style>.pagination a{border: solid 1px #5f5f5f;color: #3b6391 ;  display: inline-block; text-decoration: none; padding: 5px 10px; }li{float: left;}</style>";
        $str .=  "<div class='pagination  pagination-large'> ";
        $str .=  "<ul style='list-style: none;'>";
        $str .= "<li><a href='{$url}&page=1".$searchData."' class='btn' style='border-radius: 5px 0px 0px 5px;'>首页</a></li>";
        $str .= "<li><a href='{$url}&page=".$this->prevPage($this->page).$searchData."'  class='btn'>上一页</a></li>";

        $start = ($this->page > 5)?($this->page - 5):1;
        $end = ( ($this->page + 4) >  $this->totalPage)?$this->totalPage:$this->page+4;
        for($j=$start;$j<=$end;$j++){
            if($j == $this->page){
                $str .= "<li><a href='{$url}&page=".$j.$searchData."' style=' background:#5f5f5f; color: white;' class='btn'>".$j."</a></li>";
            }else{
                $str .= "<li><a href='{$url}&page=".$j.$searchData."' class='btn'>".$j."</a></li>";
            }
        }
        $str .= "<li><a href='{$url}&page=".$this->nextPage($this->page,$this->totalPage).$searchData."'  class='btn'>下一页</a></li>";
        $str .= "<li><a href='{$url}&page=".$this->totalPage.$searchData."'  class='btn' style='border-radius: 0px 5px 5px 0px;'>尾页</a></li>";
        $str .="  </ul>";
        $str .=" </div>";
         return $str;
    }

    public function prevPage($page){
        if($page <= 1){
            return  $x = 1;
        }else{
            return  $x = $page - 1;
        }
    }
    public function nextPage($page,$max){
        if($page >= $max){
            return  $x = $max;
        }else{
            return  $x = $page + 1;
        }
    }
}