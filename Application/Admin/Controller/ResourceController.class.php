<?php
namespace Admin\Controller;
use Think\Controller;

class ResourceController extends CommonController
{
	//添加页面显示
	public function add(){
		
		$this -> display();
	}
	//添加成功方法
	public function addOk(){
		//接收数据
		$post = I('post.');
		//$post['mid'] = $_GET['id'];
		$post['mid'] = 1;
		$post['uid'] = $_SESSION['user']['id']*1;
		//添加addtime字段
		$post['addtime'] = time();
		//添加rpath字段,必须默认路径，覆盖单选按钮
		$post['rpath'] = UPLOAD_ROOT_PATH.date('Y-m-d',$post['addtime']).'/';
		//实例化模型
		//dump($post['rpath']);die();
		$model = M('resource');
		$rst = $model -> add($post);
		//判断
		if($rst){
			$this -> success('添加资源成功', U('showList'),3);
		}else{
			$this -> error('添加资源失败', U('add'), 3);
		}

	}
	//列表页下载方法
	public function download(){
		//接收id
		$rid = I('get.rid');
		//实例化
		$model = M('resource');
		//设置响应时间不过时
		set_time_limit(0);
		//查询
		$data = $model -> find($rid);
		//ob_end_clean();
		$file = WORKING_PATH.$data['rpath'].$data['rname'];
		//防止中文无法解析，转为gbk
		$file1 = iconv("utf-8", "gbk", $file);
		$rname = iconv("utf-8", "gbk", $data['rname']);
		//判断文件是否存在file_exists,不支持中文路径
		if(!file_exists($file1)){
			 $this -> error('文件不存在！',U('Resource/showlist'));
		}
		header("Content-type: application/octet-stream");
		header("Content-Ranges:bytes");
		header("Content-Length: ". filesize($file1));
		header('Content-Disposition: attachment; filename="' .$rname. '"');
		readfile($file1);
	}
	//列表页面显示
	public function showList(){
		$model = M('resource');
		$count=$model->where('trash=0')->count();
		//dump($model);die();
        $page =new \Think\Page($count,8);    
        $show=$page->show(); 
        $resource = $model -> field('resource.*,user.uname') -> join('left join user on resource.uid = user.uid') -> where("resource.trash=0")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('resource',$resource);
        $this->display();
	}
	//修改资源页面回显信息方法
	public function edit(){
		$rid = $_GET['rid'];
		$model = M('resource');
		$resource = $model -> find($rid);
		$this -> assign('resource', $resource);
		$this -> display();
	}
	//修改资源方法
	public function update(){
		$model = M('resource');
		$rid = $_POST['rid'];
		$res = $model -> where('rid = '.$rid) -> save($_POST);
		if($res){
            $this -> success('修改成功！',U('Resource/showlist'));
        }else{
            $this -> error('修改失败，请重新修改！');
        }
	}
	//删除资源到回收站方法
	public function del(){
		$rid = $_GET['rid'];
        $model= M('resource');
        $data['trash']=1;
        $res = $model -> where('rid = '.$rid) -> save($data);
        if($res){
            $this -> success('加入回收站成功',U('Resource/showlist'));
        }else{
            $this -> error('删除失败！');
        }
	}
	//批量删除资源到回收站
	public function allDel(){    
	    if(empty($_POST['rids'])){
	        $this->error("请选择资源");
	    }
		//将获得的rid拼接
	    $rid = join(',',$_POST['rids']);
	    //dump($rid);die;
	    $model= M('resource');
	    $data['trash']=1;
	    //$sql ="update resource set trash=1 where id in($rid)";
	    //$res=$model->execute($sql);
	    $res = $model -> where("rid in(".$rid.")") -> save($data);
	    if($res){
	            $this -> success('加入回收站成功',U('Resource/showlist'));
	        }else{
	         $this -> error('删除失败！');
	        }
	}
	//回收站显示列表
	public function trash(){
		$model = M('resource');
		$count=$model->where('trash=1')->count();
		//dump($model);die();
        $page =new \Think\Page($count,8);    
        $show=$page->show(); 
        $resource = $model -> field('resource.*,user.uname') -> join('left join user on resource.uid = user.uid') -> where("resource.trash=1")->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('resource',$resource);
        $this->display();
	}

	// 单个彻底删除
    public function delete(){
        $rid = $_GET['rid'];
        $model = M('resource');
        if($model -> delete($rid)){
            $this -> success('删除成功！',U('Resource/showlist'));
        }else{
            $this -> error('删除失败！');
        }
    }

	// 单个恢复还原
    public function recover(){
        $rid = $_GET['rid'];
        $model= M('resource');
        $data['trash']=0;
        $res = $model -> where('rid = '.$rid) -> save($data);
        if($res){
            $this -> success('恢复成功',U('Resource/showlist'));
        }else{
            $this -> error('恢复失败！');
        }
    } 
    // 批量恢复还原和删除
    public function allTrash(){
       
        if(empty($_POST['rids'])){
            $this->error("请选择资源！");
        }
        $rid = join(',',$_POST['rids']);
        $model= M('resource');
        //判断按钮name，进行操作
        switch($_POST['method']){
            case "allRecover":
                $data['trash']=0;
        		$res = $model -> where("rid in(".$rid.")") -> save($data);
                if($res){
                    $this -> success('恢复成功',U('Resource/showlist'));
                }else{
                    $this -> error('恢复失败！');
                }
            break;
            case "allDel":
                //$sql ="delete from db_details where 'trash'=1 and id in($id)";
                //$res=$movie->execute($sql);
                //$data['trash']=1;
                $res = $model -> where("trash=1 and rid in(".$rid.")") -> delete();
                if($res){
                    $this -> success('删除成功');
                }else{
                    $this -> error('删除失败！');
                }
            break;
        }
    }
	// 搜素
    public function search(){
        $model=M('resource');    
        $res=$model->where("rname like '%".$_POST['rname']."%' and trash=0")->select();
        //dump($res);
        if($res){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }
}