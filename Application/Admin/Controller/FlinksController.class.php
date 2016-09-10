<?php
namespace Admin\Controller;
use Think\Controller;
class FlinksController extends CommonController {

//上传LOGO开始
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

//上传LOGO结束

//遍历开始
    public function index(){
        $link=M("flinks");
        $count=$link->count();
        $page =new \Think\Page($count,3);
        $show=$page->show();
        $result=$link->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('link',$result);
        $this->assign('page',$show);//分页配置
        $this->limit();
        $this -> display();
    }

//遍历结束

//添加链接开始
    public function insert(){
        $id=$_GET['id'];
        $link=M("flinks");
        $flinks['linkname']=$_POST['linkname'];
        $flink['url']=$_POST['url'];
        $flinks['logo']=$_POST['logo'];
        $flinks['orderno']=$_POST['orderno'];
        $flink['type']=$_POST['type'];
        if(empty($_POST['logo'])){
            unset($_POST['logo']);
        }
        if($flink['type']==1){
            echo '显示';
        }else{
            echo '不显示';
        }
        $link->create();
        $data=$link->add($_POST);

        if($data){
            $this->success("添加成功",U("Flinks/index"));
        }else{
            $this->error("添加失败");
        }
    }

//添加链接结束

//添加链接显示页面
    public function add(){
        $this->limit();
        $this->display();
    }

//添加链接显示页面

//修改链接方法开始
    public function update(){
        $id = $_POST['id'];

        if(empty($_POST['orderno'])){
            unset($_POST['orderno']);
        }
        if(empty($_POST['logo'])){
               unset($_POST['logo']);
        }

        $link = M('flinks');//数据模型实例化
        $res = $link -> where("id=$id") -> save($_POST);
        if($res){
            $this -> success("修改成功",U("Flinks/index"));
        }else{
            $this -> error("修改失败");
        }
    }

//修改链接方法结束

//修改链接跳转页面开始
    public function edit(){
        $id=$_GET['id'];
        $link=M('flinks');
        $data=$link->where('id='.$id)->find();
        $this->assign('editlink',$data);
        $this->display();
    }

//修改链接条钻页面结束

//删除链接开始
    public function deleteLink(){
        $id = $_GET['id'];
        $link = M('flinks');
        if($link -> delete($id)){
            $this -> success('删除成功！');
        }else{
            $this -> error('删除失败！');
        }
    }

//删除链接结束
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
}