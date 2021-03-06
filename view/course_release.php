<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?= STATIC_PATH ?>/static/css/list.css">
    <link rel="stylesheet" href="<?= STATIC_PATH ?>/static/css/style.css">
    <script src='http://cdn.bootcss.com/jquery/2.2.4/jquery.js'></script>
    <script src="<?= STATIC_PATH ?>/static/js/layer/layer.js"></script>
</head>
<body>
<!-- 头部 -->
<header class="header">
    <div class="logo"></div>
    <a href="course_release.php" class="nav__item nav__course">添加课程</a>
    <a href="<?= STATIC_PATH ?>/index.php/ProductController/display" class="nav__item nav__item_icon_new">课程列表</i></a>
    <a href="<?= STATIC_PATH ?>/index.php/CartController/display" class="nav__item">购物车</a>
</header>
<div id="main">
    <div class="wrap">
    </div>
    <div class="container">
        <form id="course-form" method="post">
        <fieldset>
            <legend>发布课程:</legend><div class="control-group">
            <div class="control-group">
                <label class="control-label">课程名称</label>
                <div class="controls">
                    <input type="text" name="name" class="span4" required  id="name" placeholder="字数不能大于12" onblur="name_check(this.value)"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">课程价格</label>
                <div class="controls">
                    <input type="text" name="price" class="span4" required  id="price" onblur="price_check(this.value)" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >所属方向</label>
                <div class="controls">
                    <select name="type">
                        <option>Php</option>
                        <option>Java</option>
                        <option>Html/css</option>
                        <option>Python</option>
                        <option>Android</option>
                        <option>Ios</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >课程简介</label>
                <div class="controls">
                    <textarea name="content" rows="10" class="span8" required id="intro"  placeholder="字数不能大于25" onblur="abstract_check(this.value)"></textarea>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" >课程级别</label>
                <div class="controls">
                    <select name="level">
                        <option>初级</option>
                        <option>中级</option>
                        <option>高级</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-primary" type="button" name="pubMsg" onclick="form_submit()">添加课程</button>
                    <a href="/index.php/ProductController/display"><button class="btn" type="button" contenteditable="true">课程列表</button></a>
                </div>
            </div>
            </div>
        </fieldset>
        </form>
    </div>
</div>
<script>
    /**
     * 课程名称检查
      * @param value
     * @returns {boolean}
     */
    function name_check(value){
    if(value == ''){
        layer.alert("课程名称不能为空",{icon:2});
        return false;
    }
    var len = value.length;
    if(len > 12){
        layer.alert("字数不能大于12",{icon:2});
    }
}
    /**
     * 课程简介检查
      * @param value
     * @returns {boolean}
     */
    function abstract_check(value){
    if(value == ''){
        layer.alert("课程简介不能为空",{icon:2});
    }
    var len = value.length;
    if(len > 30){
        layer.alert("字数不能大于30",{icon:2});
    }
}

    /**
     * 课程简介检查
     * @param value
     * @returns {boolean}
     */
    function price_check(value){
        if(value == ''){
            layer.alert("课程价格不能为空",{icon:2});
            return false;
        }
        if(isNaN(value)){
            layer.alert("课程价格必须为数字",{icon:2});
            return false;
        }
    }
    /**
     * 表单提交
     * @returns {boolean}
     */
    function form_submit(){
        var data = $('#course-form').serializeArray();
        $.post('/index.php/ProductController/add',{data:data},function(result){
            if(result.status == 0){
                layer.alert(result.message,{icon:2})
            }else if(result.status == 1){
                layer.alert(result.message,{icon:1},function(index){
                    location.href = '/index.php/ProductController/display';
                    layer.close(index);
                })
            }
        },'json')
    }
</script>
</body>
</html>