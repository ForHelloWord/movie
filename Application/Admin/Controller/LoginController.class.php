<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {  
     
     function login(){
        $this->display();
     }

     function select(){
        $email = $_POST['email'];
        $userpwd = md5(md5($_POST['userpwd']));
        $user = M('users');
        $data=$user->where("email='{$email}' and userpwd='{$userpwd}' and level=1")->find();
        if($data){
             $_SESSION['user']=$data;
              $this -> success('登录成功',U('Index/index'));
         }else{
            $this -> error('权限不够或用户名密码错误！');
         }
     }

// 退出登录
    public function logout(){

// 清除$SESSION
        session('user',null);
        $this -> success('退出成功！', U('Login/login'));
    }
}