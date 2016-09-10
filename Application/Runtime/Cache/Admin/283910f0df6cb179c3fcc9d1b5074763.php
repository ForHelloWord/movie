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
                            电影信息管理
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
        <li><a href="/index.php/Admin/confs/confs" class="heading"id="userslist">网站配置</a></li>
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
                                网站配置
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="container-fluid">
                            <div class="row-fluid">

<!-- Logo -->
                                <div class="span3">
                                    <div class="thumbnail">
                                        <div id="imgs" style="height:35px;width:130px;">
                                            <img  src="/Public/admin/img/logo.png" style='height:27px;width:115px;'>
                                        </div>
                                        <div>
                                            <input id="file_upload" name="file_upload" type="file" multiple="true" value="" />
                                        </div>
                                    </div>
                                </div>

<!-- 网站配置信息 -->
                                <div class="span9">
                                    <form class="form-horizontal" method="post" action="/index.php/Admin/Confs/update">
                                        <h5>网站配置信息</h5><hr>
                                        <div class="control-group">
                                            <label class="control-label">网站名称</label>
                                            <div class="controls">
                                                <span class="btn btn-info" disabled>
                                                    豆瓣电影
                                                </span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">关键字</label>
                                            <div class="controls">
                                                <input type="text"name="keywords"value="<?php echo ($confs["keywords"]); ?>" >
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label">
                                                网站版权
                                            </label>
                                            <div class="controls">
                                                <input type="text" name="icp"value="<?php echo ($confs["icp"]); ?>">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">
                                                关闭网站                     
                                            </label>
                                            <div class="controls"style="font-size:15px">
                                                <label class="radio inline">
                                                    <input type="radio" name="state" id="inlineRadioA" value="1"<?php if(($confs["state"]) == "1"): ?>checked<?php endif; ?>>&nbsp是
                                                </label>
                                                <label class="radio inline">
                                                    <input type="radio" name="state" id="inlineRadioA" style="margin-left:30px" value="0" <?php if(($confs["state"]) == "0"): ?>checked<?php endif; ?>>&nbsp否
                                                </label>
                                            </div>
                                        </div> 

                                        <div class="control-group">
                                            <label class="control-label">
                                                网站描述
                                            </label>
                                            <div class="controls">
                                                <textarea name="description" id="" ><?php echo ($confs["description"]); ?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="logo" id="hic">
                                        <input type="hidden" name="id" value="1">
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
        $('#confs').attr("class","selected");
    </script>
<!-- 上传logo -->
    <script>
        var img = '';
        $('#file_upload').uploadify({
                'swf'      : '/Public/admin/css/uploadify.swf',
                'uploader' : '<?php echo U("Confs/upload");?>',
                'buttonText' : '上传LOGO',
                'onUploadSuccess' : function(file, data, response) {
                $('#hic').val(data);
                 img = "<img style='height:27px;width:115px;' src='/Public/upload/photos/"+data+"'id='hic'>";
                $('#imgs').html(img);
                $('#images').val(data);
            }
        });
    </script>

        </div>

<!--页脚  -->
    <footer >
        <p>
            &copy; baswaAdmin 2014
        </p>
    </footer>
</body>
    
</html>