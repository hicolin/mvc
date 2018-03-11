<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 09:37
 */
//数据库配置参数
$mysql_config = array(
    'host' => 'hdm397036328.my3w.com',
    'user' => 'hdm397036328',
    'password' => 'cclhao787347840hao',
    'dbName' => 'hdm397036328_db',
    'charset' => 'utf8',
    'port' => 3306
);
//数据库连接
$mysql = new mysqli($mysql_config['localhost'],$mysql_config['user'],$mysql_config['password'],$mysql_config['dbName'],$mysql_config['port']);
if($mysql->connect_error){
    die("数据库连接失败".$mysql->connect_error);
}
$mysql->query('set names '.$mysql_config['charset']);