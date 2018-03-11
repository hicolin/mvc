<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-11
 * Time: 15:19
 */
class Order{
    /**
     * 增加订单
     * @param $data
     * @return bool
     */
    public static function add($data){
        global $mysql;
        $sql = "INSERT INTO orders (course_id,total_price) VALUES ('{$data['str_id']}',{$data['final_price']})";
        if($result = $mysql->query($sql)){
            return true;
        }
        return false;
    }
}