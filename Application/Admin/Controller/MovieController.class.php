<?php
namespace Admin\Controller;
use Think\Controller;

class MovieController extends CommonController{

    public function movie(){
        $this->select();
    }

    public function upload(){
            if (!empty($_FILES)) {

 //资源上传设置
            $config = array(   
               
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

// 添加电影信息
    public function insert(){
        $_POST['addtime']=time();
        $user=M('details');
        if(empty($_POST['image'])){
            unset($_POST['image']);
        }
        $user->create();
        $res=$user->add();
        if($res){
             $this -> success('添加成功！', U('Movie/movie'));
        }else{

//如果失败，则跳回原来页面
            $this -> error('添加失败');
        }
    }  

// 查出电影信息
    public function select(){
        $movie=M('details');
        $count=$movie->where("trash=0")->count();
        $page =new \Think\Page($count,8);    
        $show=$page->show(); 
        $res=$movie->where("trash=0")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('movie',$res);
        $this->limit();
        $this->display();
    }

    public function edit(){
        $id = $_GET['id'];
        $movie = M('details');
        $data = $movie -> find($id);
        $this -> assign('movie',$data);
        $this -> display();
    }

    public function update(){
        $movie = M('details');
        $id = $_POST['id'];
        unset($_POST['cname']);
        if(empty($_POST['poster'])){
            unset($_POST['poster']);
        }
        $res = $movie -> where(array('id' => $id)) -> save($_POST);
        if($res){
            $this -> success('修改成功！',U('movie/movie'));
        }else{
            $this -> error('修改失败，请重新修改！');
        }
    }

    public function del(){
        $id = $_GET['id'];
        $movie= M('details');
        $data['trash']=1;
        $res = $movie -> where(array('id' => $id)) -> save($data);
        if($res){
            $this -> success('加入回收站成功');
        }else{
            $this -> error('删除失败！');
        }
    }

// 搜素
    public function search(){
        $movie=M('details');    
        $res=$movie->where("cname like '%".$_POST['cname']."%' and trash=0")->select();
        // dump($res);
        if($res){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

// 回收站
    public function trash() {
        $movie=M('details');
        $count=$movie->where("trash=1")->count();
        $page =new \Think\Page($count,8);    
        $show=$page->show(); 
        $res=$movie->where("trash=1")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('movie',$res);
        $this->display();
    
    }

// 彻底删除
    public function delete(){
        $id = $_GET['id'];
        $user = M('details');
        if($user -> delete($id)){
            $this -> success('删除成功！');
        }else{
            $this -> error('删除失败！');
        }
    }

// 恢复还原
     public function recover(){
        $id = $_GET['id'];
        $movie= M('details');
        $data['trash']=0;
        $res = $movie -> where(array('id' => $id)) -> save($data);
        if($res){
            $this -> success('恢复成功');
        }else{
            $this -> error('恢复失败！');
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

// 批量恢复还原和删除
     public function allTrash(){
       
        if(empty($_POST['ids'])){
            $this->error("选择要删除的电影");
        }
            $id = join(',',$_POST['ids']);
            $movie= M('details');

        switch($_POST['method']){
            case "allRecover":
                $sql ="update db_details set trash=0 where id in($id)";
                $res=$movie->execute($sql);

                if($res){
                    $this -> success('恢复成功');
                }else{
                    $this -> error('恢复失败！');
                }
            break;
            case "allDel":

                 $sql ="delete from db_details where 'trash'=0 and id in($id)";
                 
                 $res=$movie->execute($sql);
                
                if($res){
                    $this -> success('删除成功');
                }else{
                    $this -> error('删除失败！');
                }
            break;
        }

    }

//批量放入回收站
public function allDel(){    
    if(empty($_POST['ids'])){
        $this->error("选择要删除的电影");
    }

//将获得的id拼接
    $id = join(',',$_POST['ids']);
    $movie= M('details');
    $sql ="update db_details set trash=1 where id in($id)";
    $res=$movie->execute($sql);
    if($res){
            $this -> success('加入回收站成功');
        }else{
         $this -> error('删除失败！');
        }
    }
}