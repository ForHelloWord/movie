<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/admin/css/base.css" />
<link rel="stylesheet" href="/Public/admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/admin/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	table tr .id{ width:63px; text-align: center;}
	table tr .name{ width:118px; padding-left:17px;}
	table tr .nickname{ width:63px; padding-left:17px;}
	table tr .dept_id{ width:63px; padding-left:13px;}
	table tr .sex{ width:63px; padding-left:13px;}
	table tr .birthday{ width:80px; padding-left:13px;}
	table tr .tel{ width:113px; padding-left:13px;}
	table tr .email{ width:160px; padding-left:13px;}
	table tr .addtime{ width:160px; padding-left:13px;}
	table tr .operate{ padding-left:13px;}
</style>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="javascript:;" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
    <a href="javascript:;" class="edit">编辑</a>
    <a href="javascript:;" class="count">统计</a>
    <a href="javascript:;" class="check">审核</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
            	<th class="id">序号</th>
                <th class="name">用户名</th>
				<th class="nickname">密码</th>
                <th class="dept_id">角色</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            	<td class="id"><?php echo ($vo["uid"]); ?></td>
                <td class="username"><?php echo ($vo["uname"]); ?></td>
				<td class="nickname"><?php echo ($vo["upwd"]); ?></td>
                <td class="dept_id"><?php echo ($vo["role"]); ?></td>
                 <td><a href="/index.php/Admin/User/del/id/<?php echo ($vo["uid"]); ?>">删除</a> </td>
                <!-- <td class="sex"><?php echo ($vo["sex"]); ?></td>
                				<td class="birthday"><?php echo ($vo["birthday"]); ?></td>
                				<td class="tel"><?php echo ($vo["tel"]); ?></td>
                				<td class="email"><?php echo ($vo["email"]); ?></td>
                <td class="addtime"><?php echo (date('Y-m-d H:i:s', $vo["addtime"])); ?></td>
                <td class="operate"><input type="checkbox" value="<?php echo ($vo["id"]); ?>" /></td> -->
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear">
	<div class="pagin-list">
		<?php echo ($show); ?>
	</div>
	<div class="pxofy">显示第 <?php echo ($first); ?> 条到 <?php echo ($last); ?> 条记录，总共<?php echo ($count); ?>条记录</div>
</div>
</body>
<script type="text/javascript" src="/Public/admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/admin/js/common.js"></script>
<script type="text/javascript" src="/Public/admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/admin/js/layer/layer.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");
$(function() {
	$('.add').on('click', function() {
		window.location.href="/index.php/Admin/User/add";
	});
	$('.edit').on('click', function() {
		var id = $(':checkbox:checked').val();
		 if (id) {
            window.location.href='/index.php/Admin/User/edit/id/' + id;
        }        
	})
	 $('.del').on('click', function() {
        var id = $(':checkbox:checked');  //jquery对象，类数组的对象   
        var ids = '';
        for(var i = 0; i < id.length; i++) {
            ids += id[i].value + ',';
        }
        //去掉末尾多余的逗号
        ids = ids.substring(0, ids.length-1);
        if(ids) {
            window.location.href='/index.php/Admin/User/del/ids/' + ids;
        }
    });
	 $('.count').on('click', function() {
	 	layer.open({
			type: 2,
			title: '各部门人数统计图',
			shadeClose: true,
			shade: 0,
			area: ['560px', '90%'],
			content: '/index.php/Admin/User/charts' //iframe的url
		}); 
	 	// window.location.href='/index.php/Admin/User/charts';
	 });
});
showRemind('input[type=text], textarea','placeholder');
</script>
</html>