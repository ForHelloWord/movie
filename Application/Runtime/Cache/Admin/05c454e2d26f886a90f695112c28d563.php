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
        <li><a href="/index.php/Admin/Cinemas" class="heading" id="movielist">影院列表</a></li>
        <li><a href="/index.php/Admin/Cinemas/add" id="addlist">添加影院信息</a></li>
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
                        <div class="title">添加影院信息</div>
                    </div>
                    <div class="widget-body">
                        <div class="container-fluid">
                            <div class="row-fluid">

<!-- 海报 -->
                                <div class="span3">
                                    <div class="thumbnail"style="text-align:center;height:151px;width:132px;padding:30px">
                                        <div id="imgs">
                                            <img  src="/Public/admin/img/photo.jpg" style='height:151px;width:132px;'>
                                        </div>
                                        <div>
                                            <input id="file_upload" name="file_upload" type="file" multiple="true" value="" />
                                        </div>
                                    </div>
                                </div>

<!-- 添加用户表单 -->
                                <div class="span9">
                                    <form class="form-horizontal" method="post" action="/index.php/Admin/Cinemas/insert">
                                        <h5>填写影院信息</h5><hr>
                                        <div class="control-group">
                                            <label class="control-label">影院名称</label>
                                            <div class="controls">
                                                <input type="text" name="cinema"required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">影厅介绍</label>
                                            <div class="controls">
                                                <input type="text"name="hallintro"required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">联系电话</label>
                                            <div class="controls">      
                                                <input type="text"name="tel"required>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">网址</label>
                                            <div class="controls">
                                                <input type="text"name="website"required>
                                            </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label">乘车</label>
                                            <div class="controls">
                                                <input type="text" name="bycar"required>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label">营业时间</label>
                                            <div class="controls">
                                                <input type="text" name="showtime">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">地址</label>
                                            <div class="controls" id="address">
                                                <select id="province" class="span2" name="district_id">
                                                    <option class='province' value='0' selected>省份</option>
                                                    
                                                </select>
                                                <select id="city" class="span2" name="city_id">
                                                    <option class='city' value='0' selected>城市</option>
                                                </select>
                                                <select name="district_id" id="district" class="span2 input-left-top-margins">
                                                    <option class='district' value='0' selected>区县</option>
                                                </select>           
                                                <span>不能更改</span>
                                            </div>
                                            <div class="controls">
                                                <input type="text" name="address">
                                                 <input type="hidden" name="image" id="hic">
                                            </div>
                                            <div class="control-group">
                                            <label class="control-label">介绍</label>
                                            <div class="controls">
                                                <textarea type="text" name="intro" required></textarea>
                                            </div>
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
        $('#cinemas').attr("class","selected");
        $('#movielist').removeAttr("class");
        $('#addlist').attr("class","heading");
    </script>

<!-- 电影海报上传 -->
    <script>
        var img = '';
        $('#file_upload').uploadify({
                'swf'      : '/Public/admin/css/uploadify.swf',
                'uploader' : '<?php echo U("Cinemas/upload");?>',
                'buttonText' : '影院风采',
                'onUploadSuccess' : function(file, data, response) {
                $('#hic').val(data);
                 img = "<img style='height:151px;width:132px;' src='/Public/upload/images/"+data+"'id='hic'>";
                $('#imgs').html(img);
                $('#images').val(data);
            }
        });

$(function(){
    $.post("/index.php/Admin/Cinemas/address",function(data){
        var province="<option class='province' value='0' selected>省份</option>";
        $.each(data,function(i,j){
                province += "<option class='province' value='"+j.province_id+"'>"+j.province_name+"</option>";
            });
            $("#province").html(province);
            $("#district").html("<option class='district' value='0' selected>区县</option>");
            $("#city").html("<option class='city' value='0' selected>城市</option>");
    },'json');
        if($(this).val()==0){
            $("#district").html("<option class='district' value='0' selected>区县</option>");
            $("#city").html("<option class='city' value='0' selected>城市</option>");
        }
});

$("#province").click(function(){
    var pid = $(this).val();
    if(pid==0){
        $("#district").html("<option class='district' value='0' selected>区县</option>");
        $("#city").html("<option class='city' value='0' selected>城市</option>");
    }else{
        $.post("/index.php/Admin/Cinemas/address",{'pid':pid} ,function(data){     
            var city="<option class='province' value='0' selected>城市</option>";
            $.each(data,function(i,j){
                city += "<option class='city' value='"+j.city_id+"'>"+j.city_name+"</option>";
            });
            $("#city").html(city);
        },'json');
        $("#district").html("<option class='district' value='0' selected>区县</option>");
    }
});

$("#city").click(function(){
    var cid = $(this).val();
    if(cid==0){
        $("#district").html("<option class='district' value='0' selected>区县</option>");
    }else{
        $.post("/index.php/Admin/Cinemas/address",{'cid':cid},function(data){
            var district="<option class='district' value='0' selected>区县</option>";          
            $.each(data,function(i,j){
                district += "<option class='city' value='"+j.district_id+"'>"+j.district_name+"</option>";
            })
            $("#district").html(district);
        },'json');
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