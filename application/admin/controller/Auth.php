<?php
/**
 * 
 * [jygs-ZQ]
 * Author: Ambtin     
 * Date: 2017-12-12
 */
namespace app\admin\controller;
use think\Controller;
use think\Session;
use think\Request;
use think\Db;

class Auth extends controller
{
    var $auth_current_site_id;
    protected function _initialize(){
        //session不存在时，不允许直接访问
        if(!Session::get('admin_id','admin')){
            //未登陆跳转
            $this->error('还没有登录，正在跳转到登录页',url('Login/index'));
        }
        if(!Session::get('site_id')){
            Session::set('site_id',1);
            $this->auth_current_site_id = 1;
        }else{
            $this->auth_current_site_id = Session::get('site_id');
        }
        $admin_id = Session::get('admin_id','admin');
        $admin_role_nk = Db::name('admin')->where('admin_id',$admin_id)->find();
        $this->assign('admin_name_nk',$admin_role_nk['adminname']);

        $power_manage=Db::name('admin_access')->where('access_id','in',$admin_role_nk['power'])->select();
      
                $rr=array();
                foreach ($power_manage as $key => $value) {
                    $rr[]=$value['name'];
                  }

               $this->assign('manage',$rr);

        
    }

}
