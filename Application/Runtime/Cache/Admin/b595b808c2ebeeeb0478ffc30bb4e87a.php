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
                            <div class="fs1" aria-hidden="true" data-icon="&#xe14a;"></div>
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
                            <div class="fs1" aria-hidden="true" data-icon=""></div>
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
         <li><a href="" class="heading">工作日历</a></li>
    </ul>

            <div class="btn-group pull-right"></div>
        </div>
        <div style="min-height:420px;overflow:hidden;clear:both">
            

<!-- 引入CSS文件 -->
    <link href="/Public/admin/css/fullcalendar.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='/Public/admin/css/theme.css' />

<!-- 主体框架 -->
    <div class="dashboard-wrapper">

<!-- 左侧框架 -->
        <div class="left-sidebar">

<!--左侧日历  -->
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget no-margin">
                        <div class="widget-header">
                            <div class="title">工作日历</div>
                        </div>
                        <div class="widget-body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
<!--右侧暂时空  -->
        <div class="right-sidebar">
        
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
    
    <script src="/Public/admin/js/fullcalendar.js"></script>
    <script src="/Public/admin/js/jquery.scrollUp.js"></script>
    <script src="/Public/admin/js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            calendar = $('#calendar').fullCalendar({
            theme: true,
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
            var title = prompt('Event Title:');
            
            if (title) {
                calendar.fullCalendar('renderEvent', {
                title: title,
                start: start,
                end: end,
                allDay: allDay
                },true // make the event "stick"
                );}calendar.fullCalendar('unselect');
        }, header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },editable: true,
          
            events: [{
            title: 'All Day Event',
            start: new Date(y, m, 1)
            }, {
            title: 'Long',
            start: new Date(y, m, d - 5),
            end: new Date(y, m, d - 2)
            }, {
            id: 999,
            title: 'Repeating Event',
            start: new Date(y, m, d - 3, 16, 0),
            allDay: false
            }, {
            id: 999,
            title: 'Repeating Event',
            start: new Date(y, m, d + 4, 16, 0),
            allDay: false
            }, {
            title: 'Meeting',
            start: new Date(y, m, d, 10, 30),
            allDay: false
            }, {
            title: 'Lunch',
            start: new Date(y, m, d, 12, 0),
            end: new Date(y, m, d, 14, 0),
            allDay: false
            }, {
            title: 'Birthday Party',
            start: new Date(y, m, d + 1, 19, 0),
            end: new Date(y, m, d + 1, 22, 30),
            allDay: false
            }]
        });
      });
      //ScrollUp
      $(function () {
            $.scrollUp({
                scrollName: 'scrollUp', // Element ID
                topDistance: '300', // Distance from top before showing element (px)
                topSpeed: 300, // Speed back to top (ms)
                animation: 'fade', // Fade, slide, none
                animationInSpeed: 400, // Animation in speed (ms)
                animationOutSpeed: 400, // Animation out speed (ms)
                scrollText: 'Scroll to top', // Text for element
                activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            });
        });

      $('a').tooltip('hide');
    </script>

</html>