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
        <li><a href="/index.php/Admin/Resource/showList" class="heading">影片资源列表</a></li>
        <li><a href="/index.php/Admin/Resource/add">添加影片资源</a></li>
        <!-- <li><a href="/index.php/Admin/classes/classes">电影分类管理</a></li> -->
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
                        <div class="title">影片资源列表</div>
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
                                    <th style="width:17%" class="hidden-phone">
                                        影片资源名称
                                    </th>
                                    <!-- <th style="width:10%" class="hidden-phone">
                                                               类型
                                                           </th>
                                                            <th style="width:7%" class="hidden-phone">
                                                               国家
                                                           </th>            -->                       
                                    <th style="width:8%" class="hidden-phone">
                                        上传用户
                                    </th>
                                    <!-- <th style="width:7%" class="hidden-phone">
                                        评分
                                    </th> -->
                                    <th style="width:30%" class="hidden-phone">
                                        资源路径
                                    </th>
                                    <th style="width:10%" class="hidden-phone">
                                        添加时间
                                    </th>
                                    <th style="width:5%" class="hidden-phone">
                                        操作
                                    </th>
                                </tr>
                            </thead>

<!-- 表格主体内容 -->
                            <form action="/index.php/Admin/Resource/allDel" method="post">
                            <tbody>
                                <?php if(is_array($resource)): foreach($resource as $key=>$vo): ?><tr>
                                    <td>
                                        <input type="checkbox" name="rids[]" value="<?php echo ($vo["rid"]); ?>"class="no-margin" />    
                                    </td>
                                    <td class="hidden-phone">
                                         <?php echo ($vo["rid"]); ?>
                                    </td>  
                                    <td class="hidden-phone">
                                         <span class="label label label-info">
                                            <?php echo ($vo["rname"]); ?>
                                        </span>
                                    </td>
                                   <!--  <td class="hidden-phone">
                                           <?php echo ($vo["type"]); ?>
                                   </td>
                                   <td class="hidden-phone" id="td">
                                           <?php echo ($vo["country"]); ?>                      
                                   </td> -->
                                    <td class="hidden-phone">
                                            <?php echo ($vo["uname"]); ?>
                                    </td>
                                    <!-- <td class="hidden-phone">
                                            <?php echo ($vo["score"]); ?>
                                    </td> -->
                                    <td class="hidden-phone">
                                            <?php echo ($vo["rpath"]); ?>
                                    </td>   
                                    <td class="hidden-phone">
                                        <?php echo (date("Y-m-d",$vo["addtime"])); ?>
                                    </td>
                                    <td class="hidden-phone">
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                                                操作
                                            <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="/index.php/Admin/Resource/edit/rid/<?php echo ($vo["rid"]); ?>">查看或修改资源信息</a>
                                                </li>
                                                <li>
                                                    <a href="/index.php/Admin/Resource/del/rid/<?php echo ($vo["rid"]); ?>">删除至回收站</a>
                                                </li>
                                                <li>
                                                    <!-- <a href="http://www.manbo.com<?php echo ($vo["rpath"]); echo ($vo["rname"]); ?>">下载</a> -->
                                                    <a href="/index.php/Admin/Resource/download/rid/<?php echo ($vo["rid"]); ?>">下载</a>
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
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="#" class="btn btn-info">
                        <i class=" icon-white icon-headphones"></i>
                    </a>
                  <a href="javascript:void(0)" onclick="allSelect()"  class="btn btn-default">
                        <i class="icon-thumb" aria-hidden="true" data-icon="&#xe1d;"></i>
                        全选
                  </a>
                  <a href="javascript:void(0)" onclick="noSelect()"  class="btn btn-default">
                   <i class=" icon-share-alt"></i>
                    反选
                       
                  </a>
                </div>
                <div class="btn-group">
                  <button type="submit" class="btn btn-inverse">
                        <i class="icon-white icon-trash"></i>
                  </button>
                </div>
                </form>

            </div> 
            <hr class="hr-stylish-1">
             <div class="wrapper">         
                <input type="text" placeholder="资源名称" class="search-query"style="width:150px;margin-left:25px;">
            </div> 
            <hr class="hr-stylish-1">
            <div class="wrapper">  
                <div class="btn-group"style="margin-left:70px">
                    <a href="/index.php/Admin/Resource/trash" class="btn btn-info">
                        <i class="icon-white icon-trash"></i>回收站
                    </a>
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
        $('#index').eq(0).removeAttr("class");  
        $('#movie').attr("class","selected");
        var CONTROLLER="/index.php/Admin/Resource";

        $('.search-query').keyup(function(){
            var val=$('.search-query').val();
            var rname={'rname':val};
            function getLocalTime(nS) {     
            return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g,"-").replace(/日/g, " ").replace("上午"," ").replace("下午"," ").substr(0,10);  
                            ;   
                }    
            $.post(CONTROLLER+'/search',rname,function(rname){
                $('.pagination').remove();
                if(!rname){
                    $("tbody tr").remove();    
                }else{
                var str="";
                
                $.each(rname,function(i,j){
                    str+="<tr><td><input type=";
                    str+="'checkbox'"; 
                    str+="class=";
                    str+="'no-margin'";
                    str+="></td><td class=";
                    str+="'hidden-phone'";
                    str+=">"+j.rid+"</td><td class=";
                    str+="'hidden-phone'";
                    str+="><span class=";
                    str+="'label label label-info'";
                    str+=">"+j.rname+"</span>";
                    str+="</td><td class=";
                    str+="'hidden-phone'";
                    str+=">"+j.uname+"</td>";
                    str+="<td class=";
                    str+="'hidden-phone'";
                    str+=">"+j.rpath+"</td><td class=";
                    str+="'hidden-phone'";
                    str+=">"+getLocalTime(j.addtime);
                    str+="</td><td><div class=";
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
                    str+="'/index.php/Admin/Resource/edit/id/"+j.rid+"'";
                    str+=">查看或修改影片详情</a></li><li><a href=";
                    str+="'/index.php/Admin/Resource/del/id/"+j.rid+"'";
                    str+=">删除至回收站</a></li><li><a href=";
                    str+="'/index.php/Admin/Resource/download/id/"+j.rid+"'";
                    str+=">下载</a></li></ul></div></td></tr>";
                }) 
                              
                             $("tbody").html(str);}
                        },"json");
        })

// 全选
        function allSelect(){
            if($('td input').attr("checked")){
                $('td input').attr("checked",false);
            }else{
                $('td input').attr("checked",true);
            }
        }

// 反选
        function noSelect(){
            $("td input").each(function () {  
                    $(this).attr("checked", !$(this).attr("checked"));  
                });              
        }
    </script>

</html>