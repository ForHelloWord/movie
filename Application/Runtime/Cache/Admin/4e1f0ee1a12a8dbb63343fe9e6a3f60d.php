<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	select {
		background: rgba(0, 0, 0, 0) url("/Public/Admin/images/inputbg.png") repeat-x scroll 0 0;
	    border: 1px solid #c5d6e0;
	    height: 28px;
	    outline: medium none;
	    padding: 0 8px;
	    width: 240px;
	}
	.main p input {
		float:none;
	}
</style>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
<form action="/index.php/Admin/User/addOk" method="post">
<div class="main">
	<p class="short-input ue-clear">
    	<label>用户名：</label>
        <input name="uname" id="username" type="text" placeholder="用户名" />
    </p>
	<p class="short-input ue-clear">
    	<label>密码：</label>
        <input name="upwd" id="password" type="password" placeholder="密码" />
    </p>
    <!-- <p class="short-input ue-clear">
        <label>姓名：</label>
        <input name="truename" type="text" placeholder="姓名" />
    </p>
        <p class="short-input ue-clear">
        <label>昵称：</label>
        <input name="nickname" type="text" placeholder="昵称" />
    </p>
    <div class="short-input select ue-clear">
        <label>所属部门：</label>
        <select name="dept_id">
            <option value="-1">请选择</option>
            <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div> -->
    <div class="short-input select ue-clear">
        <label>角色：</label>
        <select name="role" id="role_id">
            <option value="-1">请选择</option>
            <option value="0">前台</option>
            <option value="1">后台</option>
        </select>
    </div>
	<!-- <p class="short-input ue-clear">
            <label>性别：</label>
            <input name="sex" type="radio" value="男" checked='checked' />男
        <input name="sex" type="radio" value="女" />女
        </p>
    <p class="short-input ue-clear">
            <label>生日：</label>
            <input name="birthday" id="birthday" type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
        </p>
    <p class="short-input ue-clear">
            <label>联系电话：</label>
            <input type="text" name="tel" id="tel" placeholder="联系电话" />
        </p>
    <p class="short-input ue-clear">
            <label>邮箱：</label>
            <input type="text" name="email" id="email" placeholder="电子邮箱" />
        </p>
        <p class="short-input ue-clear">
            <label>备注：</label>
            <textarea name="remark" style="font-family:Microsoft YaHei !important; font-size:14px;" placeholder="请输入内容" name="remark"></textarea>
        </p> -->
</div>
<div class="btn ue-clear">
	<a href="javascript:;" class="confirm" id='btnSubmit'>确定</a>
    <a href="javascript:;" class="clear" id='btnReset'>清空内容</a>
</div>
</form>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});
$(function() {
    $('#btnSubmit').on('click', function() {

        // alert($('#role_id').val());
        if($('#username').val() == '') {
            alert('用户名不能为空');
            return false;
        } 
        if($('#password').val() == '') {
            alert('密码不能为空');
            return false;
        } 
        if($('#role_id').val() < 0) {
            alert('请选择一个角色');
            return false;
        } 
        if($('#birthday').val() == '') {
            alert('生日不能为空');
            return false;
        } 
       
        if($('#tel').val() == '') {
            alert('联系电话不能为空');
            return false;
        } 
        if($('#email').val() == '') {
            alert('邮箱不能为空');
            return false;
        } 
        $('form').submit();        
    });
    $('#btnReset').on('click', function() {
        $('form')[0].reset();
    });
});
showRemind('input[type=text], textarea','placeholder');
</script>
</html>