<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-01-31
 * Time: 15:31
 */
require_once ROOT . '/model/product.php';

class ProductController{
    /**
     * 课程添加
     */
    public function add(){
        if($_POST){
            $data = array();
          foreach($_POST['data'] as $key=>$value){
              $data[$value['name']] = $value['value'];
          }
            $data = array_map('addslashes',$data);
            $data = array_map('trim',$data);
            $result = Product::add($data);
            if($result){
                show(1,'添加成功');
            }
            show(0,'写入数据库失败，请重新添加');
        }
    }

    /**
     * 课程列表的展示
     */
    public function display(){

        $res = array();
        if(isset($_GET['p'])){
            $res['p'] = intval($_GET['p']);
        }
        if(isset($_GET['type'])){
            $res['type'] = trim(addslashes($_GET['type']));
        }
        list($data,$total_pages) = Product::getCourse($res);
        require_once ROOT . '/view/course_list.php';
    }


}