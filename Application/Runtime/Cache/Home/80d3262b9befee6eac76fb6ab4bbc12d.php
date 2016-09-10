<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css"href="/Public/home/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/home/css/base.css">
    <script type="text/javascript" charset="utf-8" src="/Public/home/js/jquery.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>

<!-- 页头 登录注册 -->
    <div id="top-nav">
        <?php if($user != ''): ?><div class="login">
                <a href="/index.php/Home/users/main"><?php echo ($user['username']); ?> 的帐号</a>
                <a href="/index.php/Home/MyTickets">我的电影票</a>
                <a href="/index.php/Home/users/logout">退出</a>
            </div>
        <?php else: ?>
            <div class="reglog">
                <a href="/index.php/Home/users/login">登录</a>&nbsp&nbsp&nbsp
                <a href="/index.php/Home/users/regedit">注册</a>
            </div><?php endif; ?>
    </div>
    <div id="header">

    <!-- logo和搜索 -->
        <div class="logoSerach">

    <!-- logo图片 -->
            <div id="logo">
                <a href="/index.php/Home/Index">
                    <img src="/Public/upload/photos/<?php echo ($conf["logo"]); ?>" alt="">
                </a>
            </div>

    <!-- 搜索 -->
            <form method="post" action="/index.php/Home/movie/movielist">
                <div id="search" class="input-group">
                    <label class="sr-only" for="uid">serach</label>
                    <input type="search" class="form-control img-responsive" id="uid" name="cname" placeholder="电影名称">
                </div>
                <div id="inp-btn">
                    <input type="submit" value="搜索">
                </div>  
            </form> 
        </div>

    <!-- 导航 -->
        <div id="nav">      
            <ul class="list-unstyled list-inline" id="navlist">
                <li class="navlist"><a href="/index.php/Home/tickets">影讯&购票</a></li>
                <li class="navlist"><a href="/index.php/Home/movie/select">选电影<img src="/Public/home/images/header/egg.gif" alt=""width="17"height="20"></a></li>
                <li class="navlist"><a href="/index.php/Home/classes/classes">分类</a></li>
                <li class="navlist"><a href="/index.php/Home/reviews/reviews">影评</a></li>
                <li class="navlist"><a href="/index.php/Home/question/question">问答</a></li>
            </ul>
        </div>
    </div>
</header>

<!-- 各个页面的主体部分 -->
<h1></h1>
<div id="main">
    <div id="left">
        
    </div>

    <div id="right">
        
    </div>

    <div id="bottom">
        
    </div>
</div>

<!-- 页脚 -->
<footer>
    <span class="copyright"><?php echo ($conf["icp"]); ?></span>
    <div id="introduction">
        <span class="introduction"> 
            <a href="">关于豆瓣</a>·
            <a href="">在豆瓣工作</a>.
            <a href="">联系我们</a>.
            <a href="">免责声明</a>.
            <a href="">帮助中心</a>.
            <a href="">开发者</a>.
            <a href="">移动应用</a>.
            <a href="">豆瓣广告</a> 
        </span>
    </div>
</footer>
</body>
  
</html>