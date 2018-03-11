<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-02-11
 * Time: 15:18
 */
require_once '/model/order.php';
require_once '/model/cart.php';
class OrderController{
    /**
     * 订单添加，购物车清空
     */
    public function add(){
        $data['str_id'] = addslashes($_POST['str_id']);
        $data['final_price'] = addslashes($_POST['final_price']);
        $result = Order::add($data);
        if(!$result){
            show(0,"提交失败，请重新提交");
        }
        $result = Cart::multi_del($data['str_id']);
        if($result){
            show(1,"订单提交成功");
        }
        show(0,"提交失败，请重新提交");
    }
}