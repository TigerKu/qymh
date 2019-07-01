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

class System extends Auth
{

    public function _initialize()
    {
        //echo 'init<br/>';
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

    public function config_save()
    {
        if($_POST){
            $data = [];
            foreach($_POST as $key => $value){
                if($value){
                    $data[] = [$key=>$value];
                    $q = Db::name('system_setting')->where('syskey',$key)->update(['sysvalue'=>$value]);
                }
            }
            //Config::set($_POST);
            //echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'data'=>input('post.adminname')));
            $this->success('修改成功',url('System/index'));
            exit();
        }
    }

}
