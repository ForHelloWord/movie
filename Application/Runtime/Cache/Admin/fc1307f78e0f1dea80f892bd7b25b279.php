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
        <li><a href="/index.php/Admin/Resource/showList" class="heading" id="movielist">影片资源列表</a></li>
        <li><a href="/index.php/Admin/Resource/add" >添加影片资源</a></li> 
        <!-- <li><a href="/index.php/Admin/classes/classes">电影分类管理</a></li> -->
        <li><a href="#" id="editlist">查看或修改资源信息</a></li>
    </ul>

            <div class="btn-group pull-right"></div>
        </div>
        <div style="min-height:420px;overflow:hidden;clear:both">
            
<link rel="stylesheet" href="/Public/admin/css/uploadify.css">
    <div class="dashboard-wrapper">

<!-- 左侧框架 -->
        <div class="left-sidebar"> 
            <div class="row-fluid">
                <div class="widget no-margin">
                    <div class="widget-header">
                        <div class="title">
                                查看或修改资源信息
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="container-fluid">
                            <div class="row-fluid">

<!-- 海报 -->
                                <!-- <div class="span3">
                                    <div class="thumbnail">
                                        <div id="imgs">
                                            <img  src="/Public/upload/images/<?php echo ($movie["poster"]); ?>" style='height:151px;width:132px;'>
                                        </div>
                                        <div>
                                            <input id="file_upload" name="file_upload" type="file" multiple="true" value="" />
                                        </div>
                                    </div>
                                </div>
                                 -->
<!-- 添加用户表单 -->
                                <div class="span9">
                                    <form class="form-horizontal" method="post" action="/index.php/Admin/Resource/update">
                                        <h5>填写资源信息</h5><hr>
                                        <div class="control-group">
                                            <label class="control-label">资源名称</label>
                                            <div class="controls">
                                                <span class="btn btn-info" disabled>
                                                    <input type="text" name="rname" value="<?php echo ($resource["rname"]); ?>"  required>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">资源路径</label>
                                            <div class="controls">
                                                <input type="text"name="rpath" value="<?php echo ($resource["rpath"]); ?>" required>
                                            </div>
                                        </div>
                                        <!--<div class="control-group">
                                            <label class="control-label">
                                                类型
                                            </label>
                                            <div class="controls">      
                                                <input type="text"name="type" value="<?php echo ($movie["type"]); ?>"required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">
                                                上映时间
                                            </label>
                                            <div class="controls">
                                                <input type="text"name="showtime" value="<?php echo ($movie["showtime"]); ?>" required>
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label">
                                                导演
                                            </label>
                                            <div class="controls">
                                                <input type="text" name="director" value="<?php echo ($movie["director"]); ?>" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">
                                                主演
                                            </label>
                                            <div class="controls">
                                                <input type="text" name="actor" value="<?php echo ($movie["actor"]); ?>" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">
                                                制片国家
                                            </label>
                                            <div class="controls">
                                                <input type="text" name="country" value="<?php echo ($movie["country"]); ?>"required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">
                                                片长
                                            </label>
                                            <div class="controls">
                                                <input type="text" name="time" value="<?php echo ($movie["time"]); ?>" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">
                                                语言                     
                                            </label>
                                            <div class="controls">
                                                <input type="text" name="language" value="<?php echo ($movie["language"]); ?>" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">
                                                剧情介绍                    
                                            </label>
                                            <div class="controls">
                                                <textarea name="intro" value=""><?php echo ($movie["intro"]); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="control-group"> 
                                            <label class="control-label">
                                                热映                     
                                            </label>
                                            <div class="controls"style="font-size:15px">
                                            <label class="radio inline">
                                                <input type="radio" name="hot" id="inlineRadioA" value="1" <?php if(($movie["hot"]) == "1"): ?>checked<?php endif; ?> >&nbsp是
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="hot" id="inlineRadioA" style="margin-left:30px" value="0" <?php if(($movie["hot"]) == "0"): ?>checked<?php endif; ?>> &nbsp否
                                            </label> 
                                            </div>
                                        </div>  -->                                    
                                        <input type="hidden" name="rid" value="<?php echo ($resource["rid"]); ?>">
                                        <!-- <input type="hidden" name="poster" id="hic"> -->
                                        <div class="controls" style="margin-top:50px;">
                                            <button type="submit" class="btn btn-info">
                                                    保存
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>           
</blcok>

<!-- js控制导航 -->
<block name="script">
    <script src='/Public/admin/js/jquery.js'></script>
    <script src='/Public/admin/js/jquery.uploadify.min.js'></script>
    <script type="text/javascript">
        $('#index').removeAttr("class");
        $('#movie').attr("class","selected");
        $('#movielist').removeAttr("class");
        $('#editlist').attr("class","heading");
    </script>

<!-- 电影海报修改 -->
   <!--  <script>
       var img = '';
       $('#file_upload').uploadify({
           'swf'      : '/Public/admin/css/uploadify.swf',
           'uploader' : '<?php echo U("Movie/upload");?>',
           'buttonText' : '上传电影海报',
           'onUploadSuccess' : function(file, data, response) {
           $('#hic').val(data);
               img = "<img style='height:151px;width:132px;' src='/Public/upload/images/"+data+"'id='hic'>";
           $('#imgs').html(img);
           $('#images').val(data);
           }
       });
   </script> -->

        </div>

<!--页脚  -->
    <footer >
        <p>
            &copy; baswaAdmin 2014
        </p>
    </footer>
</body>
    
</html>