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

class Nav extends Auth{

    public function nav_list(){
        $id=input('param.pid');
        $ar=db('nav_category')->where('pid',$id)->order('category_id',$id)->select();
        if(count($ar)>0){
              foreach ($ar as $key => $value) {
                $ids[]=$value['category_id'];
            }
        }else{
            $ids=array('category_id'=>$id);
        }
        $data = Db::name('nav')->where('category_id','in',implode(',',$ids))->select();
        $rs = Db::name('nav_category')->select();
        $this->assign('rs',$rs);
        $this->assign('list',$data);
        $this->assign('count',count($data));
        return $this->fetch();
    }


    public function nav_add(){
        if($_POST){
            $data = [
                'title'=>input('post.official_title'),
                'word'=>input('post.word'),
                'profile'=>input('post.profile'),
                'category_id'=>input('post.category_id'),
                'content'=>input('post.editorValue'),
                'inputtime'=>time()
            ];
			$file = request()->file('document');
            if($file){
                $path = '/data/attachment/document/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/document');
                if($info){
                    $data['document'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
     
            $q = Db::name('nav')->insert($data);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            $nav_category = Db::name('nav_category')->where('pid',0)->select();
            foreach($nav_category as $key => $value){
                $nav_category[$key]['child'] =array();//二级分类的名字
                $data = Db::name('nav_category')->where('pid',$value['category_id'])->select();
                foreach($data as $k=>$v){
                    array_push($nav_category[$key]['child'], $v);//合并一级二级分类
                    $nav_category[$key]['child'][$k]['grandson'] =array();//三级分类的名字
                    $list = Db::name('nav_category')->where('pid',$v['category_id'])->select();
                    foreach($list as $kk=>$vv){
                        array_push($nav_category[$key]['child'][$k]['grandson'],$vv);
                    }
                }
            }
            // halt($nav_category);
            $this->assign('category_list',$nav_category);
            return $this->fetch('nav_post');
        }
    }

    public function nav_edit(){
        if($_POST){
            $data = [
                'title'=>input('post.official_title'),
                'word'=>input('post.word'),
                'profile'=>input('post.profile'),
                'category_id'=>input('post.category_id'),
                'content'=>input('post.editorValue'),
                'inputtime'=>time()
            ];
			$file = request()->file('document');
            if($file){
                $path = '/data/attachment/document/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/document');
                if($info){
                    $data['document'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
    
            $q = Db::name('nav')->where('nav_id',input('post.nav_id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
            exit();
        }else{
            $nav_id = input('param.nav_id');
            $rs = Db::name('nav')->where('nav_id',$nav_id)->find();
            $this->assign('rs',$rs);

            $nav_category = Db::name('nav_category')->where('pid',0)->select();
            foreach($nav_category as $key => $value){
                $nav_category[$key]['child'] =array();//二级分类的名字
                $data = Db::name('nav_category')->where('pid',$value['category_id'])->select();
                foreach($data as $k=>$v){
                    array_push($nav_category[$key]['child'], $v);//合并一级二级分类
                    $nav_category[$key]['child'][$k]['grandson'] =array();//三级分类的名字
                    $list = Db::name('nav_category')->where('pid',$v['category_id'])->select();
                    foreach($list as $kk=>$vv){
                        array_push($nav_category[$key]['child'][$k]['grandson'],$vv);
                    }
                }
            }
            // halt($nav_category);
            $this->assign('category_list',$nav_category);
            return $this->fetch('nav_post');
        }

    }
    public function nav_del(){
        $nav_id = input('post.nav_id');
        $rs = Db::name('nav')->where('nav_id',$nav_id)->delete();
        if($rs){
            echo json_encode(array('success'=>1,'info'=>'删除成功！'));
            exit();
        }else{
            echo json_encode(array('success'=>0,'info'=>'删除失败！'));
            exit();
        }
    }
    /**
    分类列表 拼接类别名称 用逗号区分
    @蠢2018.12.5
    **/

    public function nav_category_list(){

        $id=input('param.pid');
             //查询信息
       
        $data = db('nav_category')->where('pid',$id)->order('concat(path,category_id) desc')->select();
        if($id==''){
            $data = db('nav_category')->order('concat(path,category_id) desc')->select();
        }

        //拼装类别名称
        $list = array();
        foreach($data as $k=>$v){
            $list[$k] = $v;
            $num = substr_count($v['path'],",")-1;
            $nbsp = str_repeat("★",$num*2);
            $v['name'] = $nbsp.$v['name'];
            $list[$k]['name']=$v['name'];
        }
        $this->assign('list',$list);
        $count = Db::name('nav_category')->count();
        $this->assign('count',$count);
        return $this->fetch();
    }
    /**
        分类列表编辑 添加数据
        @蠢2018.12.5
    **/

    public function nav_category_add(){
        if($_POST){
            $data = [
                'name'=>input('post.catename'),
                'ename'=>input('post.ename'),
                'pid'=>input('post.pid'),
            ];
           
            $file = request()->file('document');
            if($file){
                $path = '/data/attachment/document/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/document');
                if($info){
                    $data['document'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            // $q = Db::name('nav_category')->insert($data);
            $id = Db::name('nav_category')->insertGetId($data);
            $list = db('nav_category')->where('category_id',$id)->find();
            // halt($list['pid']);
            if($list['pid'] != 0){
                $path = db('nav_category')->where('category_id',$list['pid'])->find();
                // halt($path['path']);
                $data['path'] = $path['path'].",".$list['category_id'];
            }else{
                $path = 0;
                $data['path'] = $path.",".$list['category_id'];
            }
            $q =Db::name('nav_category')->where('category_id',$id)->update(['path'=>$data['path']]);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'data'=>input('post.catename')));
            exit();
        }else{

            $data = db('nav_category')->order('concat(path,category_id) desc')->select();

            //拼装类别名称
            $list = array();
            foreach($data as $k=>$v){
                $list[$k] = $v;
                $num = substr_count($v['path'],",")-1;
                $nbsp = str_repeat("★",$num*2);
                $v['name'] = $nbsp.$v['name'];
                $list[$k]['name']=$v['name'];
            }

            $this->assign('nav_category_list',$list);
            return $this->fetch('nav_category_post');
        }
    }

    public function nav_category_edit(){

        if($_POST){
            $data = [
                'name'=>input('post.catename'),
                'ename'=>input('post.ename'),
                'pid'=>input('post.pid'),
            ];
            $list = db('nav_category')->where('category_id',$data['pid'])->find();
            if($list){
                $path = $list['path']; 
                $data['path'] = $path.",".input('post.category_id');
            }else{
                // halt($list['path']);
                $path = 0;
                $data['path'] = $path.",".input('post.category_id');
            }

            $file = request()->file('document');
            if($file){
                $path = '/data/attachment/document/'.date('Ymd',time());
                $info = $file->move(ROOT_PATH . 'data' . DS . 'attachment/document');
                if($info){
                    $data['document'] = $path.'/'.$info->getFilename();
                }else{
                    //echo $file->getError();
                }
            }
            $q = Db::name('nav_category')->where('category_id',input('post.category_id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'data'=>input('post.catename')));
            exit();
        }else{

            $data = db('nav_category')->order('concat(path,category_id) desc')->select();
            //拼装类别名称
            $list = array();
            foreach($data as $k=>$v){
                $list[$k] = $v;
                $num = substr_count($v['path'],",")-1;
                $nbsp = str_repeat("★",$num*2);
                $v['name'] = $nbsp.$v['name'];
                $list[$k]['name']=$v['name'];
            }
            $this->assign('nav_category_list',$list);

            $category_id = input('param.category_id');
            $rs = Db::name('nav_category')->where('category_id',$category_id)->find();
            // $nav_category_list = Db::name('nav_category')->select();
            // $this->assign('nav_category_list',$nav_category_list);
            $this->assign('rs',$rs);
            return $this->fetch('nav_category_post');
        }

    }
    /**

    删除分类
    分类下面有子分类不可删除,分类下面有文章会把文章删除掉 ,根据自己需求改删除
    @蠢2018.12.5

    **/

    public function nav_category_del(){

        if($_POST){
            $category_id = input('post.category_id');
            $rs = Db::name('nav_category')->where('pid',$category_id)->select();
            if($rs){
                echo json_encode(array("success"=>0,"info"=>'删除失败,此分类下有子类！','q'=>0));
                exit();
            }else{
                $m= db('nav_category')->where('category_id',$category_id)->delete();
                if($m>0){
                    $data = db('nav')->where('category_id',$category_id)->select();
                    foreach($data as $k=>$v){
                        // halt($data);
                        db('nav')->where('category_id',$v['category_id'])->delete();

                    }
                    echo json_encode(array("success"=>1,"info"=>'删除成功！','q'=>1));
                    exit();
                }else{
                     echo json_encode(array("success"=>1,"info"=>'删除失败！','q'=>0));
                    exit();
                }
            }
        }
    }
}
