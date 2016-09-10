<?php
namespace Admin\Controller;
use Think\Controller;
class CinemasController extends CommonController {
    public function index(){
        $cinemas = M("cinemas");

//分页设置开始
        $count=$cinemas->count();
        $page =new \Think\Page($count,3);
        $show=$page->show();

//分页设置结束
    	$data = $cinemas->limit($page->firstRow.','.$page->listRows)->select();
    	$district = M('district');
    	$city = M('cities');

// 查询影院的城市地区,并循环赋值给影院数组
        foreach($data as &$k){
	        $d = $district->find($k['district_id']);
	        $c = $city->find($k['city_id']);
	        $k['city']=$c['city_name'];
	        $k['district']=$d['district_name'];
        }
       	$this->assign("cinema",$data);
        $this->assign('page',$show);
        $this->limit();
        $this->display();
    }


    public function insert(){
        $cinema = M("cinemas");
        if(empty($_POST['image'])){
            unset($_POST['image']);
        }
        $cinema->create();
        $res = $cinema->add();
        if($res){
            $this->error('添加成功！',U('index'));
        }else{

//如果失败，则跳回原来页面
            $this -> error('添加失败');
        }

    }

    public function del(){
        $id = $_GET['id'];
        $cinema = M("cinemas");
        if($cinema -> delete($id)){
            $this -> success('删除成功！');
        }else{
            $this -> error('删除失败！');
        }

    }

    public function edit(){
        $id = $_GET['id'];
        $cinema = M('cinemas');
        $data = $cinema -> find($id);
        $district = M("district");
        $district_name = $district->where("district_id={$data['district_id']}")->find();
        $data['district'] = $district_name['district_name'];
        $city = M("cities");
        $city_name = $city->where("city_id={$data['city_id']}")->find();
        $data['cityname'] = $city_name['city_name'];
        $this -> assign('cinema',$data);
        $this->limit();
        $this -> display();
    }
    
    public function update(){
        $id = $_GET['id'];
        $cinema = M('cinemas');
        if(empty($_POST['image'])){
            unset($_POST['image']);
        }
        $res = $cinema->where("id=$id")->save($_POST);


        if($res){
            $this->error('修改成功！',U('index'));
        }else{

// 如果失败，则跳回原来页面
            $this -> error('修改失败，请重新修改！');
        }
    }

    public function address(){
        if($_POST['cid']){
            $district = M("district");
            $data = $district->where("city_id={$_POST['cid']}")->select();
        }else if($_POST['pid']){
            $city = M("cities");
            $data = $city->where("province_id={$_POST['pid']}")->select();
        }else{
            $province = M("provinces");
            $data = $province -> select();  
        }

        echo json_encode($data);

    }

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