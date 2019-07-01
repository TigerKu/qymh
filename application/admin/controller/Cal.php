<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;

class Cal extends Auth
{
	public function cal_list()
	{

		$cal_list=Db::name('contact')->order('id','asd')->select();
		$this->assign('list',$cal_list);
		$this->assign('count',count($cal_list));
		return $this->fetch();
	}

	public function cal_edit()
	{
		

		if($_POST)
		{
			$data=[
					'address'=>input('post.address'),
					'mobile'=>input('post.mobile'),
					'name'=>input('post.name'),
					'number'=>input('post.number'),
					'fax'=>input('post.fax'),
					'email'=>input('post.email'),
					'id'=>input('post.id'),
					'people'=>input('post.people')


				];



			$q=Db::name('contact')->update($data);
 			echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
            exit();
		}else
			{

				$rs = Db::name('msg')->where('id',input('param.id'))->find();
				$this->assign('rs',$rs);



		}


		

		return $this->fetch('cal/cal_post');
	}



	public function msg()
	{

		$msg = Db::name('msg')->order('add_time','desc')->select();
		$this->assign('list',$msg);
		$this->assign('count',count($msg));





		return $this->fetch();
	}

	public function del_msg()
	{

		if($_POST){
            $art_id = input('post.id');
           
            
                $q = Db::name('msg')->where('id',$art_id)->delete();
             
                echo json_encode(array("success"=>1,"info"=>'删除成功！','q'=>$q));
                exit();
          
              
        }


	return $this->fetch();
	
	}


	public function show(){

		  if($_POST)
        {
           $id=input('post.id');
           $is=Db::name('msg')->where('id',$id)->find();
           if($is['is_show']==0){
             $data=['is_show'=>1];
           }else{
                 $data=['is_show'=>0];
           }


           $q=Db::name('msg')->where('id',$id)->update($data);

     if($q){ 
                echo json_encode(array("success"=>1,"info"=>'操作成功！'));
                exit();
            }else{
                echo json_encode(array("success"=>0,"info"=>'操作失败！'));
                exit;
            }
        }

        

	}




}
