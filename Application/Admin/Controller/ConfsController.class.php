<?php
namespace Admin\Controller;
use Think\Controller;
class ConfsController extends CommonController{

    public function index(){
        $confs = M('confs');
        $this->limit();
        $data = $confs -> find($id);
        $this -> assign('confs',$data);
        $this -> display();
    }

    public function limit(){
        if(I('session.user') && $this->user['level']==1){
            return true;
        }else{
            echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script type="text/javascript" >alert("你没有管理权限，不能进入后台");window.location="'.__MODULE__.'/login/login";</script>';
            exit;
        }
    }

    public function upload(){
        if (!empty($_FILES)) {

 //图片上传设置
            $config = array(   
                'maxSize'    =>    3145728, 
                'rootPath'   =>    'Public',
                'savePath'   =>    '/upload/photos/',  
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

    public function level(){

    }

// 网站配置修改
     public function update(){

        $user = M('confs');
        $id = $_POST['id'];
        if(empty($_POST['keywords'])){
            unset($_POST['keywords']);
        }
        if(empty($_POST['logo'])){
            unset($_POST['logo']);
        }
        if(empty($_POST['description'])){
            unset($_POST['description']);
        }
         if(empty($_POST['icp'])){
            unset($_POST['icp']);
        }

        $res = $user -> where(array('id' => $id)) -> save($_POST);
        if($res){
            $this -> success('修改成功！',U('Confs/index'));
        }else{
            $this -> error('修改失败，请重新修改！');

                }
    }

}