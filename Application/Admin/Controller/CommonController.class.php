<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
    public $user;

// session分配
    public function _initialize(){
        $this->user = $this->getUser();
        $this->assign('user', $this->user);
        $this->level();
    }

// 权限设置
    public function level(){
        /*if(I('session.user') && $this->user['level']==1){
        }else{
           echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script type="text/javascript" >alert("你没有管理权限，不能进入后台");window.location="'.__MODULE__.'/login/login";</script>';
           exit;
        }*/
    }

    public function getUserId(){
        return I('session.user.uid', 0, 'intval');
    }

    public function getUserName(){
        return I('session.user.username', '');
    }

    public function getUser(){
        return I('session.user');
    }

    public function isLogin(){
        if(I('session.user') && $this->user['level']==1){
            return true;
        }else{
            return false;
        }
    }
}