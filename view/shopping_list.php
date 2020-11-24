<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
    <link rel="stylesheet" href="<?= STATIC_PATH ?>/static/css/shopcar.css">
    <script src='http://cdn.bootcss.com/jquery/2.2.4/jquery.js'></script>
    <script src="<?= STATIC_PATH ?>/static/js/layer/layer.js"></script>
</head>
<body>
<!-- header区域 -->
<header class="header">
    <div class="logo"></div>
    <div class="nav">
        <a href="<?= STATIC_PATH ?>/view/course_release.php" class="nav__item ">添加课程</a>
        <a href="<?= STATIC_PATH ?>/index.php/ProductController/display" class="nav__item nav__item_icon_new ">课程列表</i></a>
        <a href="<?= STATIC_PATH ?>/index.php/CartController/display" class="nav__item nav__course">购物车</a>
    </div>
    <div class="profile">
    </div>
    <!--<div class="search">
        <input type="text" class="search_input">
        <a href="" class="search_submit"></a>
    </div>-->
</header>
<!-- banner区域 -->
<div class="banner">
    <div>我的购物车</div>
</div>
<!-- goods区域 -->
<div  style="max-width: 1104px;margin: -80px auto;box-shadow: 0 0px 8px rgba(7, 17, 27, 0.2);" id="cartBody">
    <div class="cart-panel">
        <div class="hd">
            <ul class="order-title">
                <li class="product">商品名称</li>
                <li class="total-price">总价</li>
                <li class="unit-price">单价</li>
                <li class="number">数量</li>
                <li class="operate">操作</li>
            </ul>
        </div>
        <div class="bd">
            <!-- 商品列表 -->
            <?php
            foreach($data as $row){
                ?>
            <ul class="order-list">
                <li><input type="checkbox" class="check" checked onclick="return false;"></li>
                <li class="img-box">
                    <a href="http://www.imooc.com">
                        <img src="/static/img/g1.jpg" alt="">
                    </a>
                </li>
                <li class="product">
                    <a href="http://www.imooc.com">
                        <span><?php echo $row['course_name']?></span>
                        <input type="hidden" value="<?php echo $row['course_id']?>">
                    </a>
                </li>
                <li class="total-price">
                    <div class="input-num">
                        ¥<input   class="num" type="" value="<?php echo $row['course_price']?>" name="money">
                    </div>
                </li>
                <li class="unit-price">
                    <span class="price-sign">¥</span>
                    <span class="price-num"><?php echo $row['course_price']?></span>
                </li>
                <li class="number">
                    <div class="input-num">
                        <a class="minus">-</a>
                        <input type="text" value="1" class="num" name="num">
                        <a class="plus">+</a>
                    </div>
                </li>
                <li class="operate"><a href="/index.php/CartController/del?id=<?php echo $row['cart_id']?>">删除</a></li>
            </ul>
            <?php
            }
            if(empty($data)){
            ?>
            <h1 style="text-align: center;margin: 30px auto">购物车空的哦 *_*</h1>
            <?php
            }
            ?>
        </div>
    </div>
    <script>
        /**
         * 商品数量加一
         */
        $(".plus").on('click',function(){
            var num = parseInt($(this).prev().val());
            num = num + 1;
            $(this).prev().val(num);

            var price = $(this).parent().parent().prev().find('.price-num').text();
            price = parseFloat(price);
            var total_price = parseInt($(this).prev().val()) * price;
            $(this).parent().parent().siblings('.total-price').find('.num').val(total_price);

            sum_money()
        });

        /**
         * 商品数量减一
         */
        $(".minus").on('click',function(){
            var num = parseInt($(this).next().val());
            if(num == 1){
                layer.alert("最小值为1",{icon:2});
                return false;
            }
            num = num - 1;
            $(this).next().val(num);

            var price = $(this).parent().parent().prev().find('.price-num').text();
            price = parseFloat(price);
            var total_price = parseInt($(this).next().val()) * price;
            $(this).parent().parent().siblings('.total-price').find('.num').val(total_price);

            sum_money();
        });

    </script>
    <!-- 结算栏 -->
    <div class="pay-bar">
        <div class="pay-info">
            <div class="price">
                <span class="price-sign">¥</span>
                <span class="price-num pay-money"></span>
            </div>
            <span>应付金额：</span>
        </div>
        <button style="margin-right: -50px" onclick="order_jump()">提交订单</button>
    </div>
    <script>
        /**
         * 页面加载完毕后，计算总金额
         */
        $(document).ready(function(){
           sum_money();
        });

        /**
         * 计算订单总金额
         */
        function sum_money(){
            var final_price = 0;
            $('.total-price .num').each(function () {
                final_price += parseFloat($(this).val());
            });
            $('.pay-info .price').children('.price-num').text(final_price);
        }

        /**
         * 订单提交
         */
        function order_jump(){
            var final_price = $('.pay-info .price').children('.price-num').text();
            var str_id = '';
            $('.product input').each(function(){
                str_id += ($(this).val()+',');
            });
            $.ajax({
                url:"/index.php/OrderController/add",
                data:{final_price:final_price,str_id:str_id},
                type:"POST",
                dataType:"json",
                success:function(result){
                    if(result.status == 1){
                        layer.alert(result.message,{icon:1},function(){
                            location.href = "/index.php/ProductController/display";
                        });
                    }else if(result.status == 0){
                        layer.alert(result.message,{icon:2});
                    }
                }
            });
        }
    </script>
</div>
</body>
</html>
