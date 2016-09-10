<?php
namespace Admin\Controller;
use Think\Controller;
class ClassesController extends CommonController {

// 查询
    public function classes(){
        $class=M('classes');        
        $pclass=$class->where(array('pid'=>0))->select();
        $map['pid']=array('neq',0);

        $sclass=$class->where($map)->select();

        $this->assign('sclass',$sclass);
        $this->assign('pclass',$pclass);
        $this->display();

    }

// 查询
    public function sclass(){
        $class=M('classes');   
        $sclass=$class->where($_POST)->select();
        echo json_encode($sclass);

    }

// 添加父类
    public function addClass(){
        $class=M('classes');
        $class->create();
        $pclass=$class->add();
        
        if($pclass){
             $this -> success('添加成功!');
        }else{
            
//如果失败，则跳回原来页面
            $this -> error('添加失败');
        }
    }

// 添加子类
    public function addSunClass(){
        $class=M('classes');
        $class->create();
        $sclass=$class->where(array('pid'=>$pid))->add();
        if($sclass){
             $this -> success('添加成功!');
        }else{

//如果失败，则跳回原来页面
            $this -> error('添加失败');
        }
    }

//删除 
    public function delClass(){
        $id=$_POST;
        $class= M('classes');
        if($class ->where(array('id'=>$id['id']))->delete()){
            $this -> success('删除成功！');
        }else{
            $this -> error('删除失败！');  
        }
    }
}  