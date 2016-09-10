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
                        <a href="/index.php/Admin/Resource/showList" id="movie">
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
        <li><a href="/index.php/Admin/users/users" class="heading">用户列表</a></li>
        <li><a href="/index.php/Admin/users/add">添加用户</a></li>
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
                        <div class="title">用户列表</div>
                    </div>
                    <div class="widget-body">

<!-- 用户列表表格 -->

                        <table class="table table-condensed table-striped table-bordered table-hover no-margin" id="table">

<!-- 表头 -->
                            <thead>
                                <tr>
                                    <th style="width:5%">
                                        
                                    </th>
                                    <th style="width:5%">
                                        ID
                                    </th>
                                    <th style="width:20%" class="hidden-phone">
                                        Email
                                    </th>
                                    <th style="width:10%" class="hidden-phone">
                                        用户组
                                    </th>
                                     <th style="width:10%" class="hidden-phone">
                                        名号
                                    </th>                                  
                                    <th style="width:10%" class="hidden-phone">
                                        常住地
                                    </th>
                                    <th style="width:10%" class="hidden-phone">
                                        注册时间
                                    </th>
                                    <th style="width:10%" class="hidden-phone">
                                        操作
                                    </th>
                                </tr>
                            </thead>

<!-- 表格主体内容 -->
                            <tbody id="tbody">
                            <?php if(is_array($users)): foreach($users as $key=>$vo): ?><tr>
                                    <td>
                                        <input type="checkbox" class="no-margin" />
                                    </td>
                                    <td class="hidden-phone">
                                         <?php echo ($vo["id"]); ?>
                                    </td>  
                                    <td class="hidden-phone">
                                         <span class="label label label-info">
                                        <?php echo ($vo["email"]); ?>
                                        </span>
                                    </td>
                                    <td class="hidden-phone">
                                    <?php switch($vo["level"]): case "1": ?>管理员<?php break;?>
                                        <?php case "2": ?>商家<?php break;?>
                                        <?php case "3": ?>普通会员<?php break;?>
                                        <?php default: ?>普通会员<?php endswitch;?>
                                    </td>
                                    <td class="hidden-phone" id="td">
                                        <?php echo ($vo["username"]); ?>                                    
                                    </td>
                                    <td class="hidden-phone">
                                        <?php echo ($vo["area"]); ?>
                                    </td> 
                                    <td class="hidden-phone">
                                        <?php echo (date("Y-m-d",$vo["regtime"])); ?>
                                    </td>
                                
                                    <td class="hidden-phone">
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                                操作
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="/index.php/Admin/Users/edit/id/<?php echo ($vo["id"]); ?>"> 修改</a>
                                                </li>
                                                <li>
                                                    <a href="/index.php/Admin/Users/del/id/<?php echo ($vo["id"]); ?>">删除</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="manu pagination widget-body"><?php echo ($page); ?></div>
                        <link rel="stylesheet" href="/Public/admin/css/admin.css">
                        <link rel="stylesheet" href="/Public/admin/css/page.css">
                    </div>

                </div>
            </div>

<!-- 右侧搜索部分 -->
                <div class="right-sidebar" id="form">  
                    <input type="text" placeholder="Email" class="search-query"style="width:150px">
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
        $('#users').attr("class","selected");
        var CONTROLLER="/index.php/Admin/Users";
        function getLocalTime(nS) {     
        return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g,"-").replace(/日/g, " ").replace("上午"," ").replace("下午"," ").substr(0,10);  
                        
            }     
        $('.search-query').keyup(function(){
            var val=$('.search-query').val();
            var email={'email':val};
            
            $.post(CONTROLLER+'/search',email,function(email){
            
                $('.pagination').remove();
                if(!email){
                    $("tbody tr").remove();    
                }else{
                var str="";
                
                $.each(email,function(i,j){
                    var level=j.level;
                    str+="<tr><td><input type=";
                    str+="'checkbox'"; 
                    str+="class=";
                    str+="'no-margin'";
                    str+="></td><td class=";
                    str+="'hidden-phone'";
                    str+=">"+j.id+"</td><td class=";
                    str+="'hidden-phone'";
                    str+="><span class=";
                    str+="'label label label-info'";
                    str+=">"+j.email+"</span>";
                    str+="</td><td class=";
                    str+="'hidden-phone'";
                    str+=">";
                    switch (level)
                    {  
                        case "1":
                            str +="管理员";
                        break;
                        case "3":
                            str+="普通会员";
                        break;
                    }

                    str+="</td><td class=";
                    str+= "'hidden-phone'";
                    str+= "id=";
                    str+="'td'";
                    str+=">"+j.username+"</td><td class=";
                    str+="'hidden-phone'";
                    str+=">"+j.area+"</td><td class=";
                    str+="'hidden-phone'";
                    str+=">"+getLocalTime(j.regtime);
                    str+="</td><td class=";
                    str+="'hidden-phone'";
                    str+="><div class=";
                    str+="'btn-group'";
                    str+="><button data-toggle=";
                    str+="'dropdown'";
                    str+= "class=";
                    str+="'btn btn-mini dropdown-toggle'";
                    str+=">操作<span class=";
                    str+="'caret'";
                    str+="></span></button><ul class=";
                    str+="'dropdown-menu'";
                    str+="><li><a href=";
                    str+="'/index.php/Admin/Users/edit/id/"+j.id+"'";
                    str+="> 修改</a></li><li><a href=";
                    str+="'/index.php/Admin/Users/del/id/"+j.id+"'";
                    str+=">删除</a></li></ul></div></td></tr>";
                }) 
                                
                             $("tbody").html(str);}
                        },"json");


        }) 
    </script>

</html>