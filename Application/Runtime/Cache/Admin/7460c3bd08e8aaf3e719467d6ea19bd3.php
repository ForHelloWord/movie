<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            豆瓣后台
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
                            电影信息管理
                        </a>
                    </li>
                    <li>
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
                    </li>
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
        <li><a href="/index.php/Admin/Goods" class="heading">商品列表</a></li>
        <li><a href="/index.php/Admin/Goods/add">添加商品</a></li>
    </ul>

            <div class="btn-group pull-right"></div>
        </div>
        <div style="min-height:420px;overflow:hidden;clear:both">
            

<!-- 内容主体 -->
    <div class="dashboard-wrapper">

<!-- 左边框 -->
        <div class="left-sidebar" >  

<!-- 左边内容 -->
            <div class="row-fluid">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">商品列表</div>
                    </div>
                    <div class="widget-body">

<!-- 用户列表表格 -->
                        <table class="table table-condensed table-striped table-bordered table-hover no-margin" id="table" align="center">

<!-- 表头 -->
                            <thead>
                                <tr>
                                    <th style="width:5%"></th>
                                    <th style="width:5%">ID</th>
                                    <th style="width:15%" class="hidden-phone">电影名称</th>
                                    <th style="width:15%" class="hidden-phone">影院</th>
                                    <th style="width:18%" class="hidden-phone">上映日期</th>
                                    <th style="width:5%" class="hidden-phone">类型</th>
                                    <th style="width:5%" class="hidden-phone">价格</th>
                                    <th style="width:5%" class="hidden-phone">语言</th>
                                    <th style="width:5%" class="hidden-phone">影厅</th>
                                    <th style="width:10%" class="hidden-phone">票数/剩余票数</th>
                                    <th style="width:5%" class="hidden-phone">操作</th>
                                </tr>
                            </thead>

<!-- 表格主体内容 -->
                            <tbody>
                                <?php if(is_array($goods)): foreach($goods as $key=>$goods): ?><tr>
                                    <td><input type="checkbox" class="no-margin" /></td>
                                    <td class="hidden-phone"><?php echo ($goods["gid"]); ?></td>

                                    <td class="hidden-phone" id="td">
                                        <span class="label label label-info"><?php echo ($goods["cname"]); ?></span>
                                    </td>
                                    <td class="hidden-phone"><?php echo ($goods["cinema"]); ?></td>  
                                    <td class="hidden-phone"><?php echo ($goods["date"]); ?></td>
                                    <td class="hidden-phone"><?php echo ($goods["type"]); ?></td>
                                    <td class="hidden-phone"><?php echo ($goods["price"]); ?></td>
                                    <td class="hidden-phone"><?php echo ($goods["language"]); ?></td>
                                    <td class="hidden-phone"><?php echo ($goods["hall"]); ?></td>
                                    <td class="hidden-phone"><?php echo ($goods["tickets"]); ?>/<?php echo ($goods["sumtickets"]); ?></td>
                                    <td class="hidden-phone">
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">操作
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="/index.php/Admin/Goods/edit/gid/<?php echo ($goods["gid"]); ?>"> 修改</a>
                                                </li>
                                                <li>
                                                    <a href="/index.php/Admin/Goods/del/gid/<?php echo ($goods["gid"]); ?>">删除</a>
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
        $('#goods').attr("class","selected");
    </script>

</html>