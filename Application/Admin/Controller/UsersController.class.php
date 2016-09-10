<?php
namespace Admin\Controller;
use Think\Controller;
class UsersController extends CommonController {  
    
    public function upload(){
        if (!empty($_FILES)) {

 //图片上传设置
            $config = array(   
                'maxSize'    =>    3145728, 
                'rootPath'   =>    'Public',
                'savePath'   =>    '/upload/images/',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,   
                'subName'    =>    array('date','Ymd'),

            );
        $upload = new \Think\Upload($config);// 实例化上传类
        $images = $upload->upload();

//判断是否有图
            if($images){
                $info=$images['Filedata']['savename'];

//返回文件地址和名给JS作回调用
                echo $info;
            }
            else{
                $this->error($upload->getError());//获取失败信息
            }
        }
    }

    public function insert(){
         $this->limit();
        $_POST['regtime']=time();
        $_POST['userpwd']=md5(md5($_POST['userpwd']));
        $user=M('users');
        $data=$user->field('email')->where("email='".$_POST[email]."'")->find();
        if($data){
            $this->error('添加失败，邮箱已经存在');
        }
        if(empty($_POST['image'])){
            unset($_POST['image']);
        }

        $user->create();
        $res=$user->add();
        if($res){
             $this -> success('添加成功！', U('Users/users'));
        }else{

//如果失败，则跳回原来页面
            $this -> error('添加失败');
        }

     }

    public function level(){
        
    }

    public function limit(){
        if(I('session.user') && $this->user['level']==1){
            return true;
        }else{
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script type="text/javascript" >alert("你没有管理权限，不能进入后台");window.location="'.__MODULE__.'/login/login";</script>';
            exit;
        }
    }

     public function users(){
        $this->select();

     }

     public function select(){
        $user=M('users');
        $count=$user->count();
        $page =new \Think\Page($count,13);
        $show=$page->show(); 
        $res=$user->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('users',$res);
        $this->assign('page',$show);
        $this->limit();
        $this->display();
     }

    public function edit(){
        $id = $_GET['id'];
        $user = M('users');
        $data = $user -> find($id);
        $this -> assign('user',$data);
        $this->limit();
        $this -> display();
    }

    public function update(){
        $this->limit();
        $user = M('users');
        $id = $_POST['id'];
        unset($_POST['email']);
        if(empty($_POST['userpwd'])){
            unset($_POST['users_pwd']);
        }else{
            $_POST['userpwd'] = md5(md5($_POST['userpwd']));
        }
        if(empty($_POST['image'])){
            unset($_POST['image']);
        }
        $res = $user -> where(array('id' => $id)) -> save($_POST);
        if($res){
            $this -> success('修改成功！',U('Users/users'));
        }else{
            $this -> error('修改失败，请重新修改！');
        }
    }

    public function del(){
        $this->limit();
        $id = $_GET['id'];
        $user = M('users');
        if($user -> delete($id)){
            $this -> success('删除成功！');
        }else{
            $this -> error('删除失败！');
        }
    }

// 搜素email
    public function search(){
        $users=M('users');    
        $res=$users->where("email like '%".$_POST['email']."%'")->select();
        if($res){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }
}

