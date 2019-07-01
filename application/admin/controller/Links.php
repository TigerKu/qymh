<?php
/**
 * 
 * [jygs-ZQ]
 * Author: Ambtin     
 * Date: 2017-12-11
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;

class Links extends Auth{

    public function link_list(){
        $data = Db::name('link')->select();
        $this->assign('list',$data);
        $this->assign('count',count($data));
        return $this->fetch();
    }

    public function link_add(){
        if($_POST){
            $data = [
                'title'=>input('post.official_title'),
                'link_url'=>input('post.official_link_url'),
                'inputtime'=>time(),

            ];
			$file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/cert/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/cert');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('link')->insert($data);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            return $this->fetch('link_post');
        }
    }

    public function link_edit(){
        if($_POST){
            $data = [
                'title'=>input('post.official_title'),
                'link_url'=>input('post.official_link_url'),
                'inputtime'=>time()
            ];
			$file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/cert/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/cert');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('link')->where('link_id',input('post.link_id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            $link_id = input('param.link_id');
            $rs = Db::name('link')->where('link_id',$link_id)->find();
            $this->assign('rs',$rs);
            return $this->fetch('link_post');
        }

    }
    public function link_del(){
        $link_id = input('post.link_id');
        $rs = Db::name('link')->where('link_id',$link_id)->delete();
        if($rs){
            echo json_encode(array('success'=>1,'info'=>'删除成功！'));
            exit();
        }else{
            echo json_encode(array('success'=>0,'info'=>'删除失败！'));
            exit();
        }
    }    
}
