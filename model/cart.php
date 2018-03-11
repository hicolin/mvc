<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-08
 * Time: 16:40
 */
class Cart{
    /**
     * 添加购物车
     * @param $data
     * @return bool|mixed
     */
    public static function add($data){
        global $mysql;
        $sql = "INSERT INTO cart (course_id,course_name,course_price) VALUES ('{$data["id"]}','{$data["name"]}','{$data['price']}')";
        if($result = $mysql->query($sql)){
            return $mysql->insert_id;
        };
        return false;
    }

    /**
     * 获取购物车数据
     * @return array
     */
    public static function getCart(){
        global $mysql;
        $sql = "SELECT cart_id,course_id,course_name,course_price FROM cart ORDER BY cart_id DESC";
        $result = $mysql->query($sql);
        $i = 0;
        $data = array();
        while($row = $result->fetch_assoc()){
            foreach($row as $key=>$value){
                $data[$i][$key] = $value;
            }
            $i++;
        }
        return $data;
    }

    /**
     * 根据购物车id，删除购物车数据
     * @param $id
     * @return bool
     */
    public static function del($id){
        global $mysql;
        if(!isset($id)){
            return false;
        }
        $sql = "DELETE FROM cart WHERE cart_id={$id}";
        if($result = $mysql->query($sql)){
            return true;
        }
        return false;
    }

    /**
     * 根据购物车id，删除多个购物车数据
     * @param $str_id
     * @return bool
     */
    public static function multi_del($str_id){
        global $mysql;
        if(!$str_id){
            return false;
        }
        $str_id = rtrim($str_id,',');
        $sql = "DELETE FROM cart where course_id IN (".$str_id.")";
        $result = $mysql->query($sql);
        if($result){
            return true;
        }
        return false;
    }
}