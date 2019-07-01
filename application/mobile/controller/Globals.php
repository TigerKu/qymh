<?php
/**
 * 
 * [jygs-ZQ]
 * Author: Ambtin     
 * Date: 2017-12-11
 */
namespace app\mobile\controller;
use think\Controller;
use think\Db;
use think\Url;
use think\Session;
use think\Request;

class Globals extends Controller
{
    var $config;
    var $menu_about;
    var $SessionUser;
    var $SessionStoreUser;
    public function _initialize()
    {
        //统一设置root路径
        url::root('/index.php');
        $data = get_sys_config();
        $this->config = $data;
        $this->assign('config',$this->config); 

        $this->assign('ext_css','');
        $this->assign('ext_js','');
        $logo = Db::name('logo')->where('id',1)->find(); 
        $this->assign('logo',$logo);
        // $dataAll = [];
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
        $this->assign('nav_category',$nav_category);
        $re = Db::name('contact_way')->order('id desc')->find();
        $this->assign('re',$re);
    }

    // public function get_cate_tree_general($pid = 0,&$result=array()){
    //     $data = Db::name('general_category')->where('pid',$pid)->select();
    //     foreach ($data as $k => $value){
    //         $result[] = $value;
    //         $this->get_cate_tree_general($value['general_cat_id'],$result);
    //     }
    //     return $result;
    // }

    // public function general_category_list()
    // {
    //     $redata = $this->get_cate_tree_general(0);
    //     $this->assign('list',$redata);
    //     $this->assign('count',count($redata));
    //     return $this->fetch('general_category_list');
    // }
}
