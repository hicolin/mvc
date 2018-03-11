<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-01-31
 * Time: 10:27
 */

/**
 * 后台向前台返回数据方法
 * @param $status
 * @param $message
 * @param $data
 */
function show($status,$message,$data=array()){
    $result = array(
        'status' => $status,
        'message' => $message,
        'data' => $data
    );
    exit(json_encode($result));
}

/**
 * 分页函数
 * @param $totalPage ：总页数
 * @return string ：分页条
 */
function show_page($totalPage){
    $url = $_SERVER['PHP_SELF']."?";
    if(isset($_GET['type'])){
        $url = $_SERVER['PHP_SELF']."?type=".$_GET['type']."&";
    }
    $page = isset($_GET['p']) ? $_GET['p'] : 1;
    $page = intval($page);
    $totalPage = intval($totalPage);
    $page = $page<=0 ? 1 : $page;
    $prePage = $page - 1 < 1 ? 1 : $page - 1;
    $nextPage = $page + 1 > $totalPage ? $totalPage : $page + 1;
    $str = "<div align='center' style='color: rgb(7,183,3);margin: 25px auto'>";
    $str .= "第<span style='color: red'>{$page}</span>页/共<span style='color: red'>{$totalPage}</span>页";
    $str .= str_repeat('&nbsp;',3);
    $str .= "<a href='{$url}p=1' style='text-decoration: none;color: rgb(7,183,3)'><span style='border: 1px solid rgb(7,183,3);padding: 5px;margin-right: 10px' onmouseover='this.style.borderColor= &apos;rgb(244, 1, 110)&apos;;this.style.color=&apos;rgb(244, 1, 110)&apos;' onmouseout='this.style.borderColor= &apos;rgb(7,183,3)&apos;;this.style.color=&apos;rgb(7,183,3)&apos;'>首 页</span></a>";
    $str .= "<a href='{$url}p={$prePage}' style='text-decoration: none;color: rgb(7,183,3)'><span style='border: 1px solid rgb(7,183,3);padding: 5px;margin-right: 10px' onmouseover='this.style.borderColor= &apos;rgb(244, 1, 110)&apos;;this.style.color=&apos;rgb(244, 1, 110)&apos;' onmouseout='this.style.borderColor= &apos;rgb(7,183,3)&apos;;this.style.color=&apos;rgb(7,183,3)&apos;' >上一页</span></a>";
    $str .= "<a href='{$url}p={$nextPage}' style='text-decoration: none;color: rgb(7,183,3)'><span style='border: 1px solid rgb(7,183,3);padding: 5px;margin-right: 10px' onmouseover='this.style.borderColor= &apos;rgb(244, 1, 110)&apos;;this.style.color=&apos;rgb(244, 1, 110)&apos;' onmouseout='this.style.borderColor= &apos;rgb(7,183,3)&apos;;this.style.color=&apos;rgb(7,183,3)&apos;' >下一页</span></a>";
    $str .= "<a href='{$url}p={$totalPage}' style='text-decoration: none;color: rgb(7,183,3)'><span style='border: 1px solid rgb(7,183,3);padding: 5px;margin-right: 10px' onmouseover='this.style.borderColor= &apos;rgb(244, 1, 110)&apos;;this.style.color=&apos;rgb(244, 1, 110)&apos;' onmouseout='this.style.borderColor= &apos;rgb(7,183,3)&apos;;this.style.color=&apos;rgb(7,183,3)&apos;'>尾 页</span></a>";
    $str .= " 跳到 <select onchange='location.href=&apos;{$url}p=&apos;+this.value'>";
    for($i=1;$i <= $totalPage;$i++){
        if($i==$page){
            $str .= "<option selected='selected'><a href='{$url}p={$i}'>{$i}</a></option>";
        }else{
            $str .= "<option><a href='{$url}p={$i}'>{$i}</a></option>";
        }
    }
    $str .= "</select> 页";
    $str .= "</div>";
    return $str;
}