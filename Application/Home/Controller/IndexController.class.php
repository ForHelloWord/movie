<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	//展示前台首页
    public function index(){
    	//最近更新资源
    	$n1 = array(1,2,3,4,5,6,7,8);
    	$this->assign('n1', $n1);

    	//精品推荐（日榜）
    	$n2 = array(1,2,3,4,5,6,7,8,9,10,11,12,13);
    	$this->assign('n2', $n2);
    	//精品推荐（周榜）
    	$n3 = array(1,2,3,4,5,6,7,8,9,10,11,12,13);
    	$this->assign('n3', $n3);
    	//精品推荐（月榜）
    	$n4 = array(1,2,3,4,5,6,7,8,9,10,11,12,13);
    	$this->assign('n4', $n4);
    	//精品推荐（最新）
    	$n5 = array(1,2,3,4,5,6,7,8,9,10,11,12,13);
    	$this->assign('n5', $n5);

    	//迅雷电影资源
    	$n6 = array(1,2,3,4,5,6,7,8,9,10);
    	$this->assign('n6', $n6);
    	//迅雷电视资源
    	$n7 = array(1,2,3,4,5,6,7,8,9,10);
    	$this->assign('n7', $n7);
    	//迅雷综艺资源
    	$n8 = array(1,2,3,4,5,6,7,8,9,10);
    	$this->assign('n8', $n8);
    	//迅雷动画资源
    	$n9 = array(1,2,3,4,5,6,7,8,9,10);
    	$this->assign('n9', $n9);
        $this->display('index');
    }
    //展示影视列表页
    public function movieList()
    {
    	$this->display();
    }
}