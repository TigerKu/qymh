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

class Backend extends Auth
{

    public function admin_list()
    {
        $data = Db::name('admin')->select();
        $this->assign('list',$data);
        $this->assign('count',count($data));
        return $this->fetch('admin_list');
    }

    public function admin_add()
    {
        if($_POST){
            //$data = input('post.name');
              $q=input('post.q/a');
              $id=implode(',', array_values($q));

            $data = [
                'adminname'=>input('post.adminname'),
                'password'=>md5(input('post.password')),
                'email'=>input('post.email'),
                'mobile'=>input('post.mobile'),
                'dateline'=>time(),
                'power'=>$id            ];
            $q = Db::name('admin')->insert($data);
            echo json_encode(array("success"=>1,"info"=>'添加成功！','q'=>$q,'data'=>input('post.adminname')));
            exit();
        }else{
            $quan=Db::name('admin_access')->select();
            $this->assign('quan',$quan);
            return $this->fetch('admin_post');
        }
    }
	
	/*
     * 当前管理员个人信息
     * */
    public function admin_info(){
        $admin_id = Session::get('admin_id','admin');
        $rs = Db::name('admin')->where('admin_id',$admin_id)->find();
        $this->assign('rs',$rs);
        return $this->fetch();
    }

    public function admin_edit()
    {
           
        if($_POST){
               $q=input('post.q/a');
              $id=implode(',', array_values($q));

            $data = [
                'adminname'=>input('post.adminname'),
                'email'=>input('post.email'),
                'mobile'=>input('post.mobile'),
                'dateline'=>time(),
                'power'=>$id 
            ];
            if(input('post.password')){
                $data['password'] = md5(input('post.password'));
            }
            $q = Db::name('admin')->where('admin_id',input('post.admin_id'))->update($data);
            echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'data'=>input('post.adminname')));
            exit();
        }else{

             
            $admin_id = input('param.admin_id');
            $rs = Db::name('admin')->where('admin_id',$admin_id)->find();

            $qu=Db::name('admin_access')->where('access_id','in',$rs['power'])->select();
            $this->assign('qu',$qu);

            $quan=Db::name('admin_access')->select();
            $this->assign('quan',$quan);




            $this->assign('rs',$rs);
            $this->assign('admin_id',$admin_id);
            return $this->fetch('admin_post');
        }

    }

    public function admin_del()
    {
        if($_POST){
            $admin_id = input('post.admin_id');
            $q = Db::name('admin')->delete($admin_id);
            echo json_encode(array("success"=>1,"info"=>'删除成功！','q'=>$q));
            exit();
        }
    }
	
	public function admin_log()
    {
        $data = Db::name('admin_log')->select();
        $this->assign('list',$data);
        $this->assign('count',count($data));
        return $this->fetch('admin_log');
    }
	
	public function admin_log_del()
    {
        if($_POST){
            $admin_log_id = input('post.admin_log_id');
            $q = Db::name('admin_log')->delete($admin_log_id);
            echo json_encode(array("success"=>1,"info"=>'删除成功！','q'=>$q));
            exit();
        }
    }

    // 权限管理
    public function admin_power(){
        
        /*

        $data = Db::table('sp_role')->alias('a')

            ->join('role b','a.role_id = b.role_id')->select();

        */

        $dataAll = [];

        $data = Db::name('admin_access')->where('pid',0)->select();

        foreach($data as $key => $value){

            $value['sub'] = $data = Db::table('sp_admin_access')->where('pid',$value['access_id'])->select();

            $dataAll[] = $value;

        }

        $this->assign('list',$dataAll);

        $rs = Db::name('admin_access')->select();

        $this->assign('count',count($rs));


         return $this->fetch();
    }

//增加权限

    public function access_add(){

        if($_POST){

            $data = [

                'name'=>input('post.accessname'),

                'is_open'=>input('post.is_open'),

            ];

            $q = Db::name('admin_access')->insert($data);

            echo json_encode(array("success"=>1,"info"=>'添加成功！'));

            exit();

        }else{

            $access_list = Db::name('admin_access')->where('pid',0)->select();

            $this->assign('access_list',$access_list);

            return $this->fetch('access_post');

        }

    }


//删除权限

    public function access_del(){

        if($_POST){

            $access_id = input('post.access_id');

            $q = Db::name('admin_access')->delete($access_id);

            echo json_encode(array("success"=>1,"info"=>'删除成功！'));

            exit();

        }

    }



}
