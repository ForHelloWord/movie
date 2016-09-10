<?php
namespace Admin\Controller;
use Think\Controller;
class QuestionsController extends CommonController {

    public function questions(){
        $this->select();
    }

//遍历出数据开始
    public function select(){
        $questions = M("questions");
        $users=M("users");
        $details=M("details");
        $count=$questions->count();
        $page =new \Think\Page($count,3);
        $show=$page->show();
        $data = $questions ->limit($page->firstRow.','.$page->listRows)-> select();
        foreach($data as &$k){
            $u = $users->find($k['uid']);
            $d = $details->find($k['mid']);
            $k['users']=$u['username'];
            $k['details']=$d['cname'];
        }
        $this -> assign('questions',$data);
        $this->assign('page',$show);
        $this -> display();
    }

//遍历出数据结束

//删除问题开始
    public function delquestion(){        
        $id = $_GET['id'];
        $querstions = M("questions");
        $res = $querstions -> delete($id);
        if($res){
            $this -> success("删除信息成功");
        }else{
            $this -> error("删除信息失败");
        }
    }

//删除问题结束

//修改问题开始   
    public function editquestion(){
        $id = $_GET['id'];
        $questions = M("questions");
        $data = $questions -> find($id);
        $data -> assign('questions',$data);
        $data -> display();
    }

//修改问题结束
    public function update(){
        $id = $_POST['id'];
        $questions = M("questions");
        
    }
}