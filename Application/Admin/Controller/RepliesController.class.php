<?php
namespace Admin\Controller;
use Think\Controller;
class RepliesController extends CommonController {
    public function replies(){
        $this ->index();
    }

//遍历出数据开始
    public function index(){
        $replies = M("replies");
        $users=M("users");
        $reviews=M("reviews");
        $count=$replies->count();
        $page =new \Think\Page($count,3);
        $show=$page->show();
        $data = $replies ->limit($page->firstRow.','.$page->listRows)-> select();
        foreach($data as &$k){
            $u = $users->find($k['uid']);
            $r = $reviews->find($k['rid']);
            $k['users']=$u['username'];
            $k['title']=$r['title'];
        }
        $this -> assign("replies",$data);
        $this->assign('page',$show);
        $this -> display();
    }

//遍历出数据结束

//删除影评回复开始
    public function delreplie(){
        $replies = M("replies");
        $id = $_GET['id'];
        $res = $replies -> delete($id);
        if($res){
            $this -> success("删除成功");
        }else{
            $this -> error("删除失败");
        }
    }

//删除影评回复结束
}