<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController {
    public function index(){
        $good = M("goods");
        $detail = M('details');
        $cinema = M('cinemas');
        $indent = M('indents');

//分页设置开始
        $count=$good->count();
        $page =new \Think\Page($count,3);
        $show=$page->show();
        $data = $good->limit($page->firstRow.','.$page->listRows)->select();
        
//分页设置结束
        foreach($data as &$k){

// 根据#detail进行分页数据查询limit($page->firstRow.','.$page->listRows)
            $d = $detail->find($k['mid']);
            $c = $cinema->find($k['cid']);
            $k['sumtickets'] = $k['tickets'] - $indent->where("gid={$k['gid']}")->sum('tickets');
            $k['date']=date("Y年m月d日 H时i分",$k['date']);
            $k['cname']=$d['cname'];
            $k['cinema']=$c['cinema'];
        }
        $this->assign("goods",$data);
        $this->assign('page',$show);//分页配置
        $this->display();

    }

    public function add(){
        $detail = M("details");
        $cinema = M("cinemas");
        $ddata = $detail->where("hot=1")->order("id desc")->select();
        $cdata = $cinema->select();
        $this->assign("cdata",$cdata);
        $this->assign("ddata",$ddata);
        $this->display();
    }
    
    public function insert(){
        $_POST['date']=strtotime($_POST['date']);
        $good = M("goods");
        $good->create();
        $res = $good->add();
        if($res){
            $this->error('添加成功！',U('index'));
        }else{

//如果失败，则跳回原来页面
            $this -> error('添加失败');
        }
    }

    public function del(){
        $gid = $_GET['gid'];
        $good = M("goods");
        if($good ->where("gid=$gid")-> delete()){
            $this -> success('删除成功！');
        }else{
            $this -> error('删除失败！');
        }

    }

    public function edit(){
        $id = $_GET['gid'];
        $good = M('goods');
        $data = $good -> find($id);
        $detail = M('details');
        //dump($data);die();
        $cname = $detail->find($data['mid']);
        $data['movie'] = $cname['cname'];
        $cinema = M('cinemas');
        $forcinema = $cinema->find($data['cid']);
        $data['cinema']= $forcinema['cinema'];
        $data['date']=date("Y-m-d h:i:s",$data['date']);
        $this -> assign("data",$data);
        $this -> display();
    }
    
    public function update(){
        $gid = $_GET['gid'];
        $_POST['date']=strtotime($_POST['date']);
        $good = M('goods');
        $res = $good->where("gid=$gid")->save($_POST);
        if($res){
            $this->error('修改成功！',U('index'));
        }else{

// 如果失败，则跳回原来页面
            $this -> error('修改失败，请重新修改！');
        }

    }
}