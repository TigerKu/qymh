<?php
/**
 * 
 * [jygs-ZQ]
 * Author: Ambtin     
 * Date: 2017-12-11
 */
namespace app\index\controller;
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

        $logo2 = Db::name('logo')->where('id',2)->find(); 
        $this->assign('logo2',$logo2);



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
        $re = Db::name('contact_way')->where('id',1)->order('id desc')->find();
        $this->assign('re',$re);


        // 友情链接
        $links =db('link')->limit(4)->select();
        $this->assign('links',$links);

        //栏目图
        $data1 = Db::name('roasting')->select();
        $this->assign('data1',$data1);

        $id=input('param.category_id');

        if($id=='null'){$id==7;}
        $this->assign('id',$id);

        //微信公众号
        $gong = Db::name('roasting')->where('id',23)->find();
        $this->assign('g',$gong);
        
        //微信订阅号
        $ding = Db::name('roasting')->where('id',24)->find();
        $this->assign('di',$ding);


    }

}
