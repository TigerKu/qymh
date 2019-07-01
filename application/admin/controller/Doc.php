<?php
/**
 * 
 * [jygs-ZQ]
 * Author: Ambtin     
 * Date: 2017-12-12
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;

class Doc extends Auth
{

    public function doc_list(){
        $list=db('people')->order('id','desc')->select();
        $this->assign('list',$list);
        $this->assign('count',count($list));
        return $this->fetch('doc_list');
    }

    public function doc_add(){
         if($_POST){
            $data = [
                'title'       =>input('post.official_title'),
                'name'        =>input('post.name'),
                'description' =>input('post.description'),
                'description2'=>input('post.description2'),
                'title2'      =>input('post.title2'),
                'content'     =>input('post.editorValue'),
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/document/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/document');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
    
            $q = Db::name('people')->insert($data);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'post'=>$_POST));
            exit();
        }
        return $this->fetch('doc_post');
    }
    
    public function doc_edit(){
        $id=input('param.id');
        $rs=db('people')->where('id',$id)->find();
        $this->assign('rs',$rs);
        if($_POST){
            $data = [
                'title'       =>input('post.official_title'),
                'name'        =>input('post.name'),
                'description' =>input('post.description'),
                'description2'=>input('post.description2'),
                'title2'      =>input('post.title2'),
                'content'     =>input('post.editorValue'),
            ];
            $file = request()->file('thumb');
            if($file){
                $path = '/data/attachment/document/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/document');
                if($info){
                    $data['thumb'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
    
            $q = Db::name('people')->where('id',input('post.id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
            exit();
        }
        return $this->fetch('doc_post');
    }



    public function doc_del(){
        $id=input('param.id');
        $rs=db('people')->where('id',$id)->delete();
        if($rs){
            echo json_encode(array('success'=>1,'info'=>'删除成功！'));
            exit();
        }else{
            echo json_encode(array('success'=>0,'info'=>'删除失败！'));
            exit();
        }

    }

    

}
