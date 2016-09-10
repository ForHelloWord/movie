    var isemail=0;
    var ispwd=0;
    var isvcode=0;

//登录 邮箱格式的验证
$('#email').blur(function(){
    var email=$('#email').val();
    var data={'email':email};
    var len=$('#email').val().length;
    var pre= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    $.post('reg',data,function(data){   
        if(data != "ok"){
            if($('#email').val().match(pre)){
                $('span').eq(0).html('>>用户不存在');
                $('span').eq(0).css({'color':'red'});
              }else{
                $('span').eq(0).html('>>请输入正确帐号');
                $('span').eq(0).css({'color':'red'});
              }
              isemail=0;
            }else{
                $('span').eq(0).html(null);
              isemail=1;
            }
    });
});

// 密码长度的验证
$('input').eq(1).blur(function(){
  var len = $('input').eq(1).val().length;
  if(len>5){
    $('span').eq(2).html(null);
    ispwd=1;
  }else{
    $('span').eq(2).html('>>密码不少于6个字符');
    $('span').eq(2).css({'color':'red'});
    ispwd=0;
  }
});

//验证验证码
$('input').eq(2).blur(function(){
    var vcode=$('input').eq(2).val();
    $.post('checkVcode',{'vcode':vcode},function(data){
        if(data=='ok'){
            $('#form span').last().html('验证码正确');
            $('#form span').last().css('color','green');
            isvcode=1;
        }else{
            $('#form span').last().html('验证码错误');
            $('#form span').last().css('color','red');
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
// 验证是否为空并其他验证是否正确 如果符合可以提交
$('button').click(function(){
    var userpwd =$('#userpwd').val();
    var email=$('#email').val();
    var data={'email':email ,'userpwd':userpwd};

    
    if(ispwd && isemail && isvcode ){
        $.post('cklogin',data,function(data){

            if(data=='no'){
                $('span').eq(1).html(">>用户名或者密码错误");
                $('span').eq(1).css({'color':'red'});
            }else{
                window.location="../Index/index";
            }
        });
    }else{
        
        if(!isemail){
            $('span').eq(0).html(">>请输入邮箱");
            $('span').eq(0).css({'color':'red'});
        } 
        if(!ispwd){
            $('span').eq(2).html(">>请输入密码");
            $('span').eq(2).css({'color':'red'});
        } 
        if(!isvcode){
            $('#form span').last().html(">>请输入验证码");
            $('#form span').last().css({'color':'red'});
        }
    }
}); 

// 刷新页面让页面初始化
$(document).ready(function(){
    ispwd =0;
    isemail=0;
    isvcode=0;
    $('span').eq(0).html(null);
    $('span').eq(1).html(null);
    $('span').eq(2).html(null);
    $('input').eq(0).val(null);
    $('input').eq(1).val(null);
    $('input').eq(2).val(null);
});

