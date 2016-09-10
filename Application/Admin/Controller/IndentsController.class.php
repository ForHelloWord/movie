<?php
namespace Admin\Controller;
use Think\Controller;
class IndentsController extends CommonController {
    public function index(){
        $indent = M("indents");
        $user = M('users');
        $detail = M('details');
        $good = M("goods");

//分页设置开始
        $count=$indent->count();
        $page =new \Think\Page($count,3);
        $show=$page->show();
        $data = $indent->limit($page->firstRow.','.$page->listRows)->select();

// 查询影院的城市地区,并循环赋值给影院数组
        foreach($data as &$k){
            $u = $user->find($k['uid']);
            $g = $good->where("gid = {$k['gid']}")->find();
            $d = $detail->find($g['gid']);
            $k['username']=$u['username'];
            $k['moviename']=$d['cname'];
            $k['starttime']=date("Y-m-d H:i",$g['date']);
            $k['time']=$g['date'];
        }
        $this->assign("indents",$data);
        $this->assign('page',$show);//分页配置
        $this->display();
    }
}