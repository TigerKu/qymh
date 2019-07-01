<?php
/**
 * 
 * [jygs-ZQ]
 * Author: Ambtin     
 * Date: 2017-12-11
 */
namespace app\index\controller;
use think\Db;
use think\Session;  

class Index extends Globals{

    public function index(){
           
        $data = Db::name('lun')->order('id','desc')->select();
        $this->assign('data',$data);


        $cat=db('nav_category')->where('pid',74)->select();
        
        //服务项目
      
       for ($i=0; $i <count($cat) ; $i++) { 
           
            $se[]=$cat[$i]['category_id'];  
        }
            $server= db('nav')->where('category_id','in',implode(',',$se))->order('nav_id','asc')->select();
            $this->assign('server',$server);
        


        // 品牌中心
        $pin = db('nav')->where('category_id',74)->find();
        $this->assign('pin',$pin);

        // 优惠活动
        $you = db('nav')->where('category_id',75)->find();
        $this->assign('you',$you);



        //案例
        $doc = db('nav')->where('category_id',83)->order('nav_id','asc')->select();
        $this->assign('doc',$doc);
        // $cat=db('nav_category')->where('pid',74)->select();
        // print_r($cat);
        // $doc = db('nav')->where('category_id','in',array_values($cat))->order('nav_id','asc')->select();
        // $this->assign('doc',$doc);
        // print_r($doc);



        // qq联系
        $qq=db('contact_way')->order('id','desc')->select();
        $this->assign('qq',$qq);


        // 专家团队
           $peo= db('people')->order('id','desc')->select();
           $this->assign('peo',$peo);

         // 扶持项目
        $fu = db('nav')->where('category_id',22)->limit(5)->order('nav_id','desc')->paginate(5);
        $this->assign('fu',$fu);

	    // 扶持项目 19
        $products = db('nav')->where('category_id',7)->limit(4)->order('nav_id','asc')->select();
        $this->assign('products',$products);
       
        //新闻分类
        $nav_sub = Db::name('nav_category')->where('pid',3)->select();
        $this->assign('nav_sub',$nav_sub);
        
           // 公司新闻
         $category_id = input('param.category_id');
         // print_r($category_id);

        $news = db('nav')->where('category_id', 7)->limit(8)->order('nav_id','desc')->select();
        $this->assign('news',$news);

        // 案例展示 2
        $cases = db('nav')->where('category_id',14)->limit(6)->order('nav_id','desc')->select();
        $this->assign('cases',$cases);

        // 关于我们 21
        $abouts = db('nav')->where('category_id',21)->order('nav_id','desc')->find();
        $this->assign('abouts',$abouts);
       
        //优势
        $you = db('nav')->where('category_id', 18)->limit(7)->order('nav_id','desc')->select();
        $this->assign('yo',$you);

        // 关于我们 21
        $link = db('link')->order('link_id','desc')->select();
        $this->assign('link',$link);
        return $this->fetch();
    }
	



    public function demo(){
        $arr=array('a'=>123);
        $this->assign('link',json_encode($arr));

        $link = db('link')->order('link_id','desc')->select();
        $this->assign('li',json_encode($link));

        return $this->fetch();
    }







	public function lists_nav(){

        $data1 = Db::name('roasting')->where('id',15)->find();
        $this->assign('d',$data1);

        // 获取传过来的类别id
		$category_id = input('param.category_id');
        $this->assign('category_id',$category_id);
        // 获取该类别的信息
		$nav= Db::name('nav_category')->where('category_id',$category_id)->find();
        // 将该类别的pid放到视图
        $this->assign('pid',$nav['pid']);

        if($category_id==74){$id=79;}else{$id=$category_id;}
        $det=db('nav')->where('category_id',$id)->find();
        $this->assign('det',$det);

        if($nav['pid'] == 0){
            $nav_sub = Db::name('nav_category')->where('pid',$nav['category_id'])->select();
            // $nav = Db::name('nav_category')->where('category_id',$category_id)->find();
        }else {
            $nav_sub = Db::name('nav_category')->where('pid',$nav['pid'])->select();
            // $nav = Db::name('nav_category')->where('category_id',$nav['pid'])->find();
        }
        $this->assign('nav',$nav);
        $this->assign('nav_sub',$nav_sub);

        // 查找该类别是否是顶级分类
        $navs = Db::name('nav_category')->where('pid',$category_id)->select();

		if($navs){
            // 不是顶级分类
			foreach($navs as $k => $v){
			$category[] = $v['category_id'];
			}
			$nav_list = Db::name('nav')->where('category_id',$category_id)->whereOr("category_id in (".  implode(',', $category).")")->order('inputtime desc')->paginate(4);
		} else {
            // 顶级分类
			$nav_list = Db::name('nav')->where('category_id',$category_id)->order('inputtime desc')->paginate(4);
		}
        $this->assign('nav_list',$nav_list);
		
        return $this->fetch();
    }






   public function proram(){
        $data1 = Db::name('roasting')->where('id',15)->find();
        $this->assign('d',$data1);
        $id = input('param.id');
        $pro=db('program')->where('id',$id)->find();
        $this->assign('nav',$pro);
        return $this->fetch('index/detail_nav');
    }



	public function detail_nav(){
             //栏目图
        $data1 = Db::name('roasting')->where('id',14)->find();
        $this->assign('d',$data1);

		$category_id = input('param.category_id');
		$nav_id = input('param.nav_id');
        $nav = Db::name('nav')->where('nav_id',$nav_id)->find();
        $logo = Db::name('logo')->order('id desc')->find();
        $this->assign('logo',$logo);
        $this->assign('nav',$nav);
		$dataAll = [];
        $nav_category = Db::name('nav_category')->where('pid',0)->select();
        foreach($nav_category as $key => $value){
            $value['sub'] = Db::name('nav_category')->where('pid',$value['category_id'])->select();
            $dataAll[] = $value;
        }
        $this->assign('dataAll',$dataAll);
        $navs = Db::name('nav_category')->where('category_id',$category_id)->find();
        $this->assign('navs',$navs);
        $this->assign('category_id',$category_id);
		
             $cli =$nav['click']+1;

            $clic =array('click'=>$cli);

           Db::name('nav')->where('nav_id',$nav_id)->update($clic);

        return $this->fetch();
    }



    // 关于我们
    public function about()
    {
        $category_id = input('param.category_id');

             //栏目图
        $data1 = Db::name('roasting')->where('id',16)->find();
        $this->assign('d',$data1);

        // 公司简介
        $nav_about=db('nav')->where('category_id',21)->find();
        // 发展历程
        $nav_develop=db('nav')->where('nav_id',2)->find();
        // 技术团队
        $nav_technical=db('nav')->where('category_id',17)->select();
        // 招聘信息
        $nav_information=db('nav')->where('nav_id',56)->find();
        $nav_information2=db('nav')->where('nav_id',57)->find();

        $this->assign('nav_about',$nav_about);
        $this->assign('nav_develop',$nav_develop);
        $this->assign('nav_technical',$nav_technical);
        $this->assign('nav_information',$nav_information);
        $this->assign('nav_information2',$nav_information2);
        return $this->fetch();

    }


    // 增值服务
    public function charity()
    {
        $more = db('nav')->where('category_id',1)->find();
        $this->assign('more',$more);
        return $this->fetch();

    }



    // 客户案例
    public function cases()
    {
        $cases = Db::name('nav_category')->where('pid',2)->select();
        foreach($cases as $key => $value){
            $cases[$key]['child'] =array();
            $row = Db::name('nav_category')->where('pid',$value['category_id'])->select();
            foreach($row as $k=>$v){
                array_push($cases[$key]['child'], $v);
               
            }
        }
        $this->assign('cases',$cases);
        // 行业分类放到模板上
        foreach ($cases as $k => $v) {
        }
        $this->assign('names',$v['child']);
   
        
        return $this->fetch();
    }


    // 加入
    public function joinus(){
        $data1 = Db::name('roasting')->where('id',20)->find();
        $this->assign('d',$data1);

        // $id = input('param.id');
        $id=6;
        $pro=db('program')->where('id',$id)->find();
        $this->assign('nav',$pro);

        $news = db('nav')->where('category_id', 91)->order('nav_id','desc')->limit(4)->paginate(4);
        $this->assign('news',$news);



        return $this->fetch();
    }








    // 产品展示
    public function product()
    {
         //栏目图
        $data1 = Db::name('roasting')->where('id',20)->find();
        $this->assign('d',$data1);
      
        // 扶持项目
        $fu = db('nav')->where('category_id',18)->limit(7)->order('nav_id','desc')->paginate(6);
        $this->assign('fu',$fu);
       
        return $this->fetch();
    }


 // 产品展示
    public function  superiority()
    {

         //栏目图
        $data1 = Db::name('roasting')->where('id',15)->find();
        $this->assign('d',$data1);

        // 扶持项目
        $fu = db('nav')->where('category_id',22)->limit(5)->order('nav_id','desc')->paginate(5);
        $this->assign('fu',$fu);
       
        return $this->fetch();
    }







    // 新闻
    public function news()
    {
        $category_id = input('param.category_id');
          //栏目图
        if($category_id==7){$id=19;}else{$id=22;}

        $data1 = Db::name('roasting')->where('id',$id)->find();

        $this->assign('d',$data1);
         //新闻分类
        $nav_sub = Db::name('nav_category')->where('pid',3)->select();
        $this->assign('nav_sub',$nav_sub);
        // 公司新闻
        if($category_id==''){ $category_id=7;}
        $news = db('nav')->where('category_id', $category_id)->order('nav_id','desc')->limit(4)->paginate(4);
        $this->assign('news',$news);

        return $this->fetch();
    }


    
    // 详情
    public function details()
    {
        $category_id = input('param.category_id');
        $nav_id = input('param.nav_id');
        $nav = Db::name('nav')->where('nav_id',$nav_id)->find();
        $img = Db::name('nav_category')->where('category_id',$category_id)->find();
        $this->assign('nav',$nav);
        $this->assign('img',$img['document']);

        return $this->fetch();
    }

    // 联系我们
    public function contact(){

            //栏目图
        $data1 = Db::name('roasting')->where('id',17)->find();
        $this->assign('d',$data1);

         $nav = Db::name('nav')->where('category_id',2)->find();
        $this->assign('nav',$nav);
         return $this->fetch();

    }

    public function insert()
    {
       $data['phone'] = input('phone');
       $data['email'] = input('email');
       $data['name'] = input('name');
       $data['content'] = input('other');
       $data['add_time'] = time();
        $data['firm'] = input('firm');
        
    
      $search = '/^[1][3,4,5,7,8][0-9]{9}$/';
        $mobile=input('post.phone');
          if (preg_match( $search, $mobile) ){            
              $m = db('msg')->insert($data);
               $this->success('申请成功','index/index');
          } else {
              $this->error('请填写正确的手机号','index/index');
          }
       
    }
    public function staff(){
          //栏目图
        $data1 = Db::name('roasting')->where('id',25)->find();
        $this->assign('d',$data1);

        $nav = Db::name('nav')->where('category_id',92)->paginate(9);
        $this->assign('nav',$nav);
        return $this->fetch();
    }

}
