<?php
/**
 * 
 * [jygs-ZQ]
 * Author: Ambtin     
 * Date: 2017-12-11
 */
namespace app\admin\controller;
use think\Controller;
use think\config;
use think\Db;
use think\Request;

class Index extends Auth
{

    // 轮播图开始
    public function lun(){
        $data = Db::name('lun')->select();
        $this->assign('list',$data);
        $this->assign('count',count($data));
        return $this->fetch();
    }




    
    public function lun_add(){
        if($_POST){
            $data = [
                'title' => input('post.title'),
                'dateline'=>time()
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/lun/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/lun');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('lun')->insert($data);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            return $this->fetch('lun_post');
        }
    }
    public function lun_edit(){
         if($_POST){
            $data = [
                'title' => input('post.title'),
                'dateline'=>time()
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/lun/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/lun');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('lun')->where('id',input('post.id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            $id = input('param.id');
            $rs = Db::name('lun')->where('id',$id)->find();
            $this->assign('rs',$rs);
            return $this->fetch('lun_post');
        }
    }
    public function lun_del(){
        $id = input('post.id');
        $rs = Db::name('lun')->where('id',$id)->delete();
        if($rs){
            echo json_encode(array('success'=>1,'info'=>'删除成功！'));
            exit();
        }else{
            echo json_encode(array('success'=>0,'info'=>'删除失败！'));
            exit();
        }
    }
    // 轮播图操作结束




 public function delfile(){


   $this->delFileByDir('./Runtime');
   $this->success('删除缓存成功！','admin/Index/index');
         
         return $this->fetch();
    }
   

function delFileByDir($dir) {
   $dh = opendir($dir);
   while ($file = readdir($dh)) {
      if ($file != "." && $file != "..") {

         $fullpath = $dir . "/" . $file;
       
         if (is_dir($fullpath)) {

           $this->delFileByDir($fullpath);
         } else {
            unlink($fullpath);
         }
      }
   }
   closedir($dh);
}







    public function index()
    {
        $result = Db::name('system_setting')->select();
        $data = array();
        foreach($result as $key => $value){
            $data[$value['syskey']] = $value['sysvalue'];
        }
        $this->assign('config',$data);
        return $this->fetch('index');
    }

    public function welcome()
    {		
        //$data = Config::get();
        $result = Db::name('system_setting')->select();
        $data = array();
        foreach($result as $key => $value){
            $data[$value['syskey']] = $value['sysvalue'];
        }
        $ser = Request::instance()->server();
        $this->assign('config',$data);
        $this->assign('ser',$ser);
        return $this->fetch('welcome');
    }

	public function contact_way(){
        $list = Db::name('contact_way')->select();
        $this->assign('list',$list);
        $this->assign('count',count($list));
        return $this->fetch();
    }
	public function contact_way_add(){
		if($_POST){
            $data = [
                'QQ'=>input('post.QQ'),
                'email'=>input('post.email'),
                'phone'=>input('post.phone'),
                'mobile'=>input('post.mobile'),
                'mobile2'=>input('post.mobile2'),
                'facsimile'=>input('post.facsimile'),
                'address'=>input('post.address'),
                'dateline'=>time()
            ];
            $q = Db::name('contact_way')->insert($data);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            return $this->fetch('contact_way_post');
        }
	}
	public function contact_way_edit(){
         if($_POST){
            $data = [
                'QQ'=>input('post.QQ'),
                'email'=>input('post.email'),
                'phone'=>input('post.phone'),
                'mobile'=>input('post.mobile'),
                'mobile2'=>input('post.mobile2'),
                'facsimile'=>input('post.facsimile'),
                'address'=>input('post.address'),
                'dateline'=>time()
            ];
            $q = Db::name('contact_way')->where('id',input('post.id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            $id = input('param.id');
            $rs = Db::name('contact_way')->where('id',$id)->find();
            $this->assign('rs',$rs);
            return $this->fetch('contact_way_post');
        }
    }
    public function contact_way_del(){
        $id = input('post.id');
        $rs = Db::name('contact_way')->where('id',$id)->delete();
        if($rs){
            echo json_encode(array('success'=>1,'info'=>'删除成功！'));
            exit();
        }else{
            echo json_encode(array('success'=>0,'info'=>'删除失败！'));
            exit();
        }
    }
	
	public function roasting(){
        $data = Db::name('roasting')->select();
        $this->assign('list',$data);
        $this->assign('count',count($data));
        return $this->fetch();
    }





    public function roasting_add(){
        if($_POST){
            $data = [
				'title' => input('post.title'),
                'dateline'=>time()
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/roasting/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/roasting');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('roasting')->insert($data);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            return $this->fetch('roasting_post');
        }
    }
	public function roasting_edit(){
         if($_POST){
            $data = [
				'title' => input('post.title'),
                'dateline'=>time()
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/roasting/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/roasting');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('roasting')->where('id',input('post.id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            $id = input('param.id');
            $rs = Db::name('roasting')->where('id',$id)->find();
            $this->assign('rs',$rs);
            return $this->fetch('roasting_post');
        }
    }
    public function roasting_del(){
        $id = input('post.id');
        $rs = Db::name('roasting')->where('id',$id)->delete();
        if($rs){
            echo json_encode(array('success'=>1,'info'=>'删除成功！'));
            exit();
        }else{
            echo json_encode(array('success'=>0,'info'=>'删除失败！'));
            exit();
        }
    }
	
	public function logo(){
        $data = Db::name('logo')->select();
        $this->assign('list',$data);
        $this->assign('count',count($data));
        return $this->fetch();
    }
    public function logo_add(){
        if($_POST){
            $data = [
				'title' => input('post.title'),
                'dateline'=>time()
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/logo/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/logo');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('logo')->insert($data);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            return $this->fetch('logo_post');
        }
    }
	public function logo_edit(){
         if($_POST){
            $data = [
				'title' => input('post.title'),
                'dateline'=>time()
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/logo/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/logo');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('logo')->where('id',input('post.id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            $id = input('param.id');
            $rs = Db::name('logo')->where('id',$id)->find();
            $this->assign('rs',$rs);
            return $this->fetch('logo_post');
        }
    }
    public function logo_del(){
        $id = input('post.id');
        $rs = Db::name('logo')->where('id',$id)->delete();
        if($rs){
            echo json_encode(array('success'=>1,'info'=>'删除成功！'));
            exit();
        }else{
            echo json_encode(array('success'=>0,'info'=>'删除失败！'));
            exit();
        }
    }
	
	public function friend_link(){
        $data = Db::name('friend_link')->select();
        $this->assign('list',$data);
        $this->assign('count',count($data));
        return $this->fetch();
    }
    public function friend_link_add(){
        if($_POST){
            $data = [
				'title' => input('post.title'),
                'dateline'=>time()
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/friend_link/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/friend_link');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('friend_link')->insert($data);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            return $this->fetch('friend_link_post');
        }
    }
	public function friend_link_edit(){
         if($_POST){
            $data = [
				'title' => input('post.title'),
                'dateline'=>time()
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/friend_link/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/friend_link');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('friend_link')->where('id',input('post.id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            $id = input('param.id');
            $rs = Db::name('friend_link')->where('id',$id)->find();
            $this->assign('rs',$rs);
            return $this->fetch('friend_link_post');
        }
    }
    public function friend_link_del(){
        $id = input('post.id');
        $rs = Db::name('friend_link')->where('id',$id)->delete();
        if($rs){
            echo json_encode(array('success'=>1,'info'=>'删除成功！'));
            exit();
        }else{
            echo json_encode(array('success'=>0,'info'=>'删除失败！'));
            exit();
        }
    }	
	
}
