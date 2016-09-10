<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
                慢播影院后台
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="">

<!-- JS引入 -->
        <script src="/Public/admin/js/jquery.min.js"></script>
        <script src="/Public/admin/js/bootstrap.js"></script>

<!-- CSS引入 -->
        <link href="/Public/admin/icomoon/style.css" rel="stylesheet">
        <link href="/Public/admin/css/main.css" rel="stylesheet"> 
        <link href="/Public/admin/css/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet">
        <link href="/Public/admin/css/wysiwyg/wysiwyg-color.css" rel="stylesheet">
    </head>
<body>

<!-- header头部分开始 -->
    <header>

<!-- logo图片 -->
        <a href="#" class="logo">
            <img src="/Public/admin/img/logo.png" alt="logo" />
        </a>

<!-- 登录状态 -->
        <div class="btn-group">
            <button class="btn btn-primary">
                <?php echo ($user["username"]); ?>
            </button>
            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                <span class="caret">
                </span>
            </button>
            <ul class="dropdown-menu pull-right">
                <li>
                    <a href="/index.php/Home">前台页面</a>
                </li>
                <li>
                    <a href="/index.php/Admin/Login/logout">退出</a>
                </li>
            </ul>
        </div>
    </header>

<!-- header头结束 -->

<!-- 主导航 -->
    <div class="container-fluid">
        <div class="dashboard-container">
            <div class="top-nav">
                <ul>
                    <li>
                        <a href="/index.php/Admin" class="selected" id="index">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe0a0;"></div>
                            后台管理
                        </a>
                    </li>
                    <li>
                        <a href="/index.php/Admin/users/users" id="users">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe0b8;"></div>
                            用户管理
                        </a>
                    </li>
                    <li>
                        <a href="/index.php/Admin/movie/movie" id="movie">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe096;"></div>
                            影片资源管理
                        </a>
                    </li>
                    <!-- <li>
                        <a href="/index.php/Admin/indents/index" id="indents">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe0d2;"></div>
                            订单管理
                        </a>
                    </li>
                    <li>
                        <a href="/index.php/Admin/goods/index" id="goods">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe0a9;"></div>
                            商品管理
                        </a>
                    </li>
                    <li>
                        <a href="/index.php/Admin/cinemas/index" id="cinemas">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe14a;"></div>
                            商家管理
                        </a>
                    </li> -->
                    <li>
                        <a href="/index.php/Admin/review/review" id="review">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe00d;"></div>
                            影评管理
                        </a>
                    </li>
                    <li>
                        <a href="/index.php/Admin/Flinks/index"id="flinks">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe052;"></div>
                            友情链接管理
                        </a>
                    </li>
                    <li>
                        <a href="/index.php/Admin/confs/"id="confs">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe100;"></div>
                            网站配置管理
                        </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>

<!--副导航  -->
        <div class="sub-nav">
            
    <ul>
        <li><a href="/index.php/Admin/Flinks/index/id/<?php echo ($blink["id"]); ?>" class="heading" id="reviewlist" >友情链接列表</a></li>
        <li><a href="/index.php/Admin/Flinks/add/id/<?php echo ($blink["id"]); ?>" class="heading" id="reviewlist" >添加友情链接</a></li>
    </ul>

            <div class="btn-group pull-right"></div>
        </div>
        <div style="min-height:420px;overflow:hidden;clear:both">
            
<link rel="stylesheet" href="/Public/admin/css/review/add.css">

<!-- 内容主体 -->
    <div class="dashboard-wrapper">

<!-- 左边框 -->
        <div class="left-sidebar" >  

<!-- 左边内容 -->
            <div class="row-fluid">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">友情链接管理</div>
                    </div>
                    <div class="widget-body">

<!-- 用户列表表格 -->
                        <table class="table table-condensed table-striped table-bordered table-hover no-margin" id="table">

<!-- 表头 -->
                            <thead>
                                <tr>
                                    <th style="width:5%">
                                        选择
                                    </th>
                                    <th style="width:5%">
                                        ID
                                    </th>
                                    <th style="width:15%" class="hidden-phone">
                                        友链名称
                                    </th>
                                    <th style="width:30%" class="hidden-phone">
                                        友链地址
                                    </th>
                                    <th style="width:15%" class="hidden-phone">
                                        logo
                                    </th>
                                    <th style="width:10%" class="hidden-phone">
                                        排序
                                    </th>
                                    <th style="whdth:10%" class="hidden-phone">
                                        类型
                                    </th>
                                    <th style="width:10%" class="hidden-phone">
                                        操作
                                    </th>
                                </tr>
                            </thead>

<!-- 表格主体内容 -->
                            <tbody>
                                <?php if(is_array($link)): foreach($link as $key=>$blink): ?><tr>
                                        <td>
                                            <input type="checkbox" class="no-margin" />
                                        </td>
                                        <td class="hidden-phone">
                                            <?php echo ($blink["id"]); ?>
                                        </td>
                                        <td class="hidden-phone">
                                            <?php echo ($blink["linkname"]); ?>
                                        </td>
                                        <td class="hidden-phone" id="td">
                                            <?php echo ($blink["url"]); ?>
                                        </td>
                                        <td class="hidden-phone" id="td">
                                            <?php echo ($blink["logo"]); ?>
                                        </td>
                                        <td class="hidden-phone">
                                            <?php echo ($blink["orderno"]); ?>
                                        </td>
                                        <td class="hidden-phone">
                                            <?php echo ($blink["type"]); ?>
                                        </td>
                                        <td class="hidden-phone">
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                                    操作
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="/index.php/Admin/Flinks/edit/id/<?php echo ($blink["id"]); ?>">修改</a>
                                                    </li>
                                                    <li>
                                                        <a href="/index.php/Admin/Flinks/deleteLink/id/<?php echo ($blink["id"]); ?>">删除</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
                            </tbody>                               
                         </table>
                    </div>

<!--分页设置开始-->
                    <div class="manu pagination widget-body"><?php echo ($page); ?></div>
                    <link rel="stylesheet" href="/Public/admin/css/admin.css" />
                    <link rel="stylesheet" href="/Public/admin/css/page.css" />
                    
<!--分页设置结束-->
                  </div>
             </div>
        </div>

<!-- 右侧搜索部分 -->
                <div class="right-sidebar" id="form">  
                    <input type="text" placeholder="电影名称" class="search-query" style="width:150px">
                </div>
            </div>

        </div>

<!--页脚  -->
    <footer >
        <p>
            &copy; baswaAdmin 2014
        </p>
    </footer>
</body>
    
    <script type="text/javascript">
        $('#index').removeAttr("class");
        $('#flinks').attr("class","selected");
    </script>

</html>