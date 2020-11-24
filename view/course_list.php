<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= STATIC_PATH ?>/static/css/list.css">
    <!--引入jquery.js文件-->
    <script src='http://cdn.bootcss.com/jquery/2.2.4/jquery.js'></script>
    <script src="<?= STATIC_PATH ?>/static/js/layer/layer.js"></script>
    <!--引入插件.js文件-->
    <script src='http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <!--引入插件.css文件-->
    <link  href='http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css' type='text/css' rel='stylesheet' />
</head>
<body>
<!-- 头部 -->
	<header class="header">
		<div class="logo"></div>
        <div class="nav">
            <a href="<?= STATIC_PATH ?>/view/course_release.php" class="nav__item ">添加课程</a>
            <a href="<?= STATIC_PATH ?>/index.php/ProductController/display" class="nav__item nav__item_icon_new ">课程列表</i></a>
            <a href="<?= STATIC_PATH ?>/index.php/CartController/display" class="nav__item">购物车</a>
        </div>
	</header>
<div id="main">
    <div class="wrap">
        <!-- 节点筛选 -->
        <div class="course-content">
            <div class="course-nav-box">
                <span class="hd">方向 ： </span>
                <div class="bd">
                    <ul>
                        <li class="course-nav-item">
                            <a href="javascript:;" onclick="type_jump(this.innerHTML)">Php</a>
                        </li>
                        <li class="course-nav-item" id="test">
                            <a href="javascript:;" onclick="type_jump(this.innerHTML)">Java</a>
                        </li>
                        <li class="course-nav-item">
                            <a href="javascript:;" onclick="type_jump(this.innerHTML)">Html/css</a>
                        </li>
                        <li class="course-nav-item">
                            <a href="javascript:;" onclick="type_jump(this.innerHTML)">Python</a>
                        </li>
                        <li class="course-nav-item">
                            <a href="javascript:;" onclick="type_jump(this.innerHTML)">Android</a>
                        </li>
                        <li class="course-nav-item">
                            <a href="javascript:;" onclick="type_jump(this.innerHTML)">Ios</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $('.course-nav-item').each(function(){
                var search = "?type=";
                search += $(this).find('a').html();
                if(location.search.indexOf(search) >= 0){
                    $(this).addClass('active');
                    $(this).sibling().removeClass('active');
                }
            })
        });
        function type_jump(value){
            location.href = "/index.php/ProductController/display?type="+value;
        }
    </script>

    <div class="container">
        <!-- 课程列表 -->
        <div class="course-list">
                <?php foreach ($data as $row): ?>
                    <div class="course-card-container">
                        <a href="javascript:;">
                            <div class="course-card">
                                <div class="course-card-top">
                                    <span><?php echo $row['type']?></span>
                                </div>
                                <div class="course-card-content">
                                    <h3><?php echo $row['name']?></h3>
                                    <p><?php echo $row['content']?></p>
                                    <div class="course-card-bottom">
                                        <span><?php echo $row['level']?></span>
                                        <span onclick='add_cart("<?php echo $row['id']?>","<?php echo $row['name']?>","<?php echo $row['price']?>")' data-id ="<?php echo $row['id']?>"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="course-card-bk">
                                <img src="/static/img/bk1.jpg" alt="">
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
        </div>
        <nav class='text-center'>
            <?php echo show_page($total_pages) ?>
        </nav>
    </div>
    <script>
        function add_cart(id,name,price){
            $.ajax({
                url:"/index.php/CartController/add",
                data:{id:id,name:name,price:price},
                type:"POST",
                dataType:"json",
                success:function(result){
                    if(result.status == 1){
                        layer.alert(result.message,{icon:1});
                    }else if(result.status == 0){
                        layer.alert(result.message,{icon:2});
                    }
                }
            })
        }
    </script>
</div>
</body>
</html>