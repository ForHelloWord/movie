<?php
namespace Admin\Controller;
use Think\Controller;
class ReviewController extends CommonController {
    
    public function review(){
        $this->index();
    }

//遍历出数据开始
    public function index(){
        $reviews=M("reviews");
        $users=M("users");
        $details=M("details");
        $count=$reviews->count();
        $page =new \Think\Page($count,3);
        $show=$page->show();
        $data = $reviews ->limit($page->firstRow.','.$page->listRows)-> select();
        foreach($data as &$k){
            $u = $users->find($k['uid']);
            $d = $details->find($k['mid']);
            $k['users']=$u['username'];
            $k['details']=$d['cname'];
        }
        $this->assign("reviews",$data);
        $this->assign('page',$show);
        $this->display();
    }

//遍历出数据结束
    
//删除电影评论开始
    public function delreview(){
        $reviews = M("reviews");
        $id = $_GET['id'];
        $res = $reviews -> delete($id);
        if($res){
            $this -> success("删除信息成功");
        }else{
            $this -> error("删除信息失败");

        }
    }

//删除电影评论结束


//修改电影评论开始
    public function editreview(){
        $id = $_GET['id'];
        $review = M("reviews");
        $data = $review -> find($id);
        $this -> assign('review',$data);
        $this -> display();
    }

    public function update(){
        
    }

//修改电影评论结束
}