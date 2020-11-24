<?php
header('content-type:text/html;charset=utf-8');
error_reporting(E_ALL &~E_NOTICE);

define("ROOT", __DIR__);
define("STATIC_PATH", "/github/mvc");

require_once ROOT . '/lib/common.func.php';
require_once ROOT . '/lib/mysql.inc.php';

$pathinfo = substr($_SERVER['PATH_INFO'],1);
$array = explode('/',$pathinfo);
list($controller, $action) = $array;

if($controller == ''){
    $controller = 'IndexController';
}
if($action == ''){
    $action = 'index';
}


//包含相关的控制文件
require_once ROOT . '/controller/' . $controller . '.php';

//实例化控制器(路由过程)
$class = new $controller();
//调用方法
$class->$action();






