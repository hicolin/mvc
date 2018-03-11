<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-07
 * Time: 08:39
 */

class Product{
    /**
     * 课程添加
     * @param $data
     * @return bool|mixed
     */
    public static function add($data){
        global $mysql;
        if($data['name']=='' || strlen($data['name'])>12){
            show(0,'课程名称不能为空且字数不能大于12');
        }
        if($data['price']=='' || !is_numeric($data['price']) || !$data['price']>0){
            show(0,'课程价格不能为空且必须为大于零的数字');
        }
        if($data['type']==''){
            show(0,'课程所属方向不能为空');
        }
        if($data['content']=='' || strlen($data['content'])>30){
            show(0,'课程名称不能为空且字数不能大于30');
        }
        if($data['level']==''){
            show(0,'课程级别不能为空');
        }
        $sql = "INSERT INTO course(name,price,type,content,level) VALUES('{$data["name"]}','{$data["price"]}','{$data["type"]}','{$data["content"]}','{$data["level"]}')";
        if($result=$mysql->query($sql)){
            return $mysql->insert_id;
        }
        return false;
    }

    /**
     * 获取课程数据
     * @return array
     */
    public static function getCourse($res){
        global $mysql;
        //分页
        $per_page = 12;
        $p = isset($res['p']) ? $res['p'] : 1;
        $sql = "SELECT count(1) AS num FROM course";
        if(isset($res['type'])){
            $sql = "SELECT count(1) AS num FROM course WHERE type='{$res["type"]}'";
        }
        $result = $mysql->query($sql);
        $row = $result->fetch_assoc();
        $total_nums = $row['num'];
        $total_pages = ceil($total_nums/12);
        $limit = "LIMIT ".($p-1)*$per_page.",{$per_page}";

        $sql ="SELECT id,name,price,type,content,level FROM course  ORDER BY id DESC ".$limit;
        if(isset($res['type'])){
            $sql ="SELECT id,name,price,type,content,level FROM course WHERE type='{$res["type"]}' ORDER BY id DESC ".$limit;
        }
        $result = $mysql->query($sql);
        $i = 0;
        $data = array();
        while($row = $result->fetch_assoc()){
            foreach($row as $key=>$value){
                $data[$i][$key] = $value;
            }
            $i++;
        }
        return array($data,$total_pages);
    }

}