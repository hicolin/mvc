<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-08
 * Time: 16:21
 */
require_once '/model/cart.php';
class CartController{
    /**
     * 添加购物车
     */
    public function add(){
        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['price'] = $_POST['price'];
        $data = array_map('addslashes',$data);
        $data = array_map('trim',$data);
        $result = Cart::add($data);
        if($result){
            show(1,"加入购物车成功");
        }
        show(0,"加入购物车失败，请重新添加");
    }

    /**
     * 购物车页面展示
     */
    public function display(){
        $data = Cart::getCart();
        require_once "/view/shopping_list.html";
    }

    public function del(){
        $id = intval($_GET['id']);
        $result = Cart::del($id);
        if(!$result){
            echo "<script>alert('删除失败，请重新删除')</script>";
        }
        header("Location: /index.php/CartController/display");
    }
}