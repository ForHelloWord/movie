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
        <li><a href="/index.php/Admin/Goods" class="heading" id="movielist">商品列表</a></li>
        <li><a href="/index.php/Admin/Goods/add" id="addlist">添加商品信息</a></li>
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
                        <div class="title">添加商品信息</div>
                    </div>
                    <div class="widget-body">
                        <div class="container-fluid">
                            <div class="row-fluid">

                                <div class="span3">
                                </div>

<!-- 添加用户表单 -->
                                <div class="span9">
                                    <form class="form-horizontal" method="post"  id="add" action="/index.php/Admin/Goods/insert">
                                        <h5>填写商品信息</h5><hr>

                                        <div class="control-group">
                                            <label class="control-label">电影名称</label>
                                            <div class="controls" id="address">
                                                <select class="span5" name="mid">
                                                    <?php if(is_array($ddata)): $i = 0; $__LIST__ = $ddata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;?><option class='province' value='<?php echo ($detail["id"]); ?>' selected><?php echo ($detail["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">影院名称</label>
                                            <div class="controls" id="address">

                                                <select class="span5" name="cid">
                                                    <?php if(is_array($cdata)): $i = 0; $__LIST__ = $cdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cinema): $mod = ($i % 2 );++$i;?><option class='city' value='<?php echo ($cinema["id"]); ?>' selected><?php echo ($cinema["cinema"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">上映时间</label>
                                            <div class="controls">
                                                <input type="type" name="date" required id="time"><span></span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">类型</label>
                                            <div class="controls">      
                                                <input type="text" name="type" required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">价格</label>
                                            <div class="controls">
                                                <input type="text" name="price" required>
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label">语言</label>
                                            <div class="controls">
                                                <input type="text" name="language"required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">影厅</label>
                                            <div class="controls">
                                                <input type="text" name="hall"required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">票数</label>
                                            <div class="controls">
                                                <input type="text" name="tickets">
                                            </div>
                                        </div>
                                        <div class="controls" style="margin-top:50px;">
                                            <button type="submit" class="btn btn-info">保存</button>
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
        $('#goods').attr("class","selected");
        $('#movielist').removeAttr("class");
        $('#addlist').attr("class","heading");
    </script>

<!-- 电影海报上传 -->
    <script>
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

/**
 * 检测时间是否符合格式
 * @param {Object} timeTextBox
 */

var istime=0;

$(function(){
    var DATE_FORMAT = /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-)) (20|21|22|23|[0-1]?\d):[0-5]?\d:[0-5]?\d$/;
    checkDate();

    function checkDate(){
        var time = $("#time").val();
        if(DATE_FORMAT.test(time)){
            $("#time").next().html("日期格式正确");
            istime=1;
        } else {
            $("#time").next().html("日期格式错误，正确格式应为\"2014-01-01 00:00:00\".");
            istime=0
        }
    }
})




$("#time").blur(function(){
var DATE_FORMAT = /^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-)) (20|21|22|23|[0-1]?\d):[0-5]?\d:[0-5]?\d$/;
checkDate();

    function checkDate(){
        var time = $("#time").val();
        if(DATE_FORMAT.test(time)){
            $("#time").next().html("日期格式正确");
            istime=1;
        } else {
            $("#time").next().html("日期格式错误，正确格式应为\"2014-01-01 00:00:00\".");
            istime=0
        }
    }         

})

$('#add').submit(function(){

    if(istime){
        return true;
    }else{
        $("#time").next().html("日期格式错误，正确格式应为\"2014-01-01 00:00:00\".");

        return false;
    }

})
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