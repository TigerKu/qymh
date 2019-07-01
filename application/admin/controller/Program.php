<?php
namespace app\admin\controller;
use think\Db;
use think\session;

class Program extends Auth
{

	public function Program_list()
	{

		$Program=Db::name('Program')->order('id','asd')->select();
		$this->assign('list',$Program);
		$this->assign('count',count($Program));
		return $this->fetch();

	}


	public function Program_edit()
	{
		


		if($_POST){

			$data=['title'=>input('post.title'),
					'content'=>input('post.editorValue')];

			$q = Db::name('Program')->where('id',input('post.id'))->update($data);
			if($q){
				  echo json_encode(array("success"=>1,"info"=>'修改成功！','q'=>$q,'post'=>$_POST));
           			 exit();
			}

		}else{

			$id=input('param.id');
			$pro=Db::name('Program')->where('id',$id)->find();
			$this->assign('rs',$pro);
			return $this->fetch('program_post');
		}






	}


}


