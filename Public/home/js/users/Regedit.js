var isusername=0;
var ispwd =0;
var isemail=0;
var isarea=0;
var isvcode =0;
var ckemail=0;

//注册 邮箱格式的验证
$('input').eq(0).keyup(function(){
  var pre= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if($('#email').val().match(pre)){
    $('span').eq(0).html('>>邮箱格式正确');
    $('span').eq(0).css({'color':'green'});
    isemail=1;

  }else{
    $('span').eq(0).html('>>请输入邮箱');
    isemail=0;
  }
});

// 密码长度的验证
$('input').eq(1).keyup(function(){
  var len = $('input').eq(1).val().length;
  if(len>5){
    $('span').eq(1).html('>>密码长度正确');
    $('span').eq(1).css({'color':'green'});
    ispwd=1;
  }else{
    $('span').eq(1).html('>>密码不少于6个字符');
    $('span').eq(1).css({'color':'red'});
    ispwd=0;
  }
});

//名号的长度的验证 
$('#username').keyup(function(){
    var len=$('#username').val().length;
    if(len<14){
    $('span').eq(2).html('>>中,英文均可，最长14个字符');
    $('span').eq(2).css({'color':'green'});
    isusername=1;
  }else{
    $('span').eq(2).html('>>名号长度不能超过14个字符');
    $('span').eq(2).css({'color':'red'});
    isusername=0;
  }
});

// 邮箱在数据库验证是否重复
$('#email').blur(function(){
  var email=$('#email').val();
  var data={'email':email};
  var len=$('#email').val().length;
  var pre= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  $.post('reg',data,function(data){   
    if(data != "ok"){
      if($('#email').val().match(pre)){
        $('span').eq(0).html('>>可以注册');
        $('span').eq(0).css({'color':'green'});
      }else{
        $('span').eq(0).html('>>邮箱格式不正确');
        $('span').eq(0).css({'color':'red'});
      }
      ckemail=1;
    }else{
      $('span').eq(0).html('邮箱已被注册');
      $('span').eq(0).css({'color':'red'});
      ckemail=0;
    }
  });
});

// 选择常居地

$(function(){
    $("#area").click(function(){
        $.openLayer({
            maxItems : 1,
            pid : "0",
            returnText : "restxts",
            returnValue : "city",
            span_width : {d1:120,d2:150,d3:150},
            index : 1
        }); 
        $('#area+span').html(null);            
    }); 
});

//验证验证码
$('input').eq(4).blur(function(){
    var vcode=$('input').eq(4).val();
    $.post('checkVcode',{'vcode':vcode},function(data){
        if(data=='ok'){
            $('form span').last().html('验证码正确');
            $('form span').last().css('color','green');
            isvcode=1;
        }else{
            $('form span').last().html('验证码错误');
            $('form span').last().css('color','red');
            isvcode=0;
        }
    });
});

// 更换验证码
    function changa(){
        var img = document.getElementById('img');
        img.src = '../users/vcode?a='+Math.random();
        return false;
    }

//使用协议
$('#readed').click(function(){
    var checked = $('#readed').attr('checked'); 
    if(!checked){
        $('#submit').attr('disabled','disabled');
    }else{
        $('#submit').removeAttr('disabled');
    }
}); 

// 验证是否为空并其他验证是否正确 如果符合可以提交
$('#form1').submit(function(){
    if($('.form-area input').val()){
        isarea=1
    }
    if(isusername && ispwd && isemail  && ckemail && isvcode && isarea
     ){
    return true;
    }else{
        if(!isemail){
        $('span').eq(0).html(">>请输入邮箱");
        $('span').eq(0).css({'color':'red'});
    }
        if(!isusername){
            $('span').eq(2).html(">>请输入名号");
            $('span').eq(2).css({'color':'red'});
        }
        if(!ispwd){
            $('span').eq(1).html(">>请输入密码");
            $('span').eq(1).css({'color':'red'});
        } 
        if(!isarea){
            $('span').eq(4).html(">>请输入常居地");
            $('span').eq(4).css({'color':'red'});
        }  
        if(!isvcode){
            $('form span').last().html(">>请输入验证码");
            $('form span').last().css({'color':'red'});
        }
        return false;
        }
  }); 

// 刷新页面让页面初始化
$(document).ready(function(){
    isusername=0;
    ispwd =0;
    isemail=0;
    isvcode=0;
    isarea=0
    ckemail=0;
    ckvcode=0;
    $('span').eq(0).html(null);
    $('span').eq(1).html(null);
    $('span').eq(2).html(null);
    $('#area+span').html(null);
    $('form span').last().html(null);
    $('input').eq(0).val(null);
    $('input').eq(1).val(null);
    $('input').eq(2).val(null);
    $('input').eq(3).val(null);
    $('input').eq(4).val(null);
 });
    



























