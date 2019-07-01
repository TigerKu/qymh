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
use think\Session;

class Login extends controller
{

    public function index()
    {
        if($_POST){
            $data = [
                'adminname'=>input('post.username'),
                'password'=>md5(input('post.password')),
            ];
            $q = Db::name('admin')->where($data)->find();

            if($q){
                Session::set('admin_id',$q['admin_id'],'admin');
                Session::set('adminname',$q['adminname'],'admin');
				$last_login_time = Db::name('admin_log')->where("admin_id = ".$q['admin_id']." and content = '后台登录'")->order('dateline desc')->limit(1)->field('dateline')->find();                    
                Session::set('last_login_time',$last_login_time);
				$add['admin_id'] = $q['admin_id'];
				$add['adminname'] = $q['adminname'];
				$add['content'] = '后台登录';
				$add['ip'] = $this->getIP();
				$add['dateline'] = time();
				Db::name('admin_log')->insert($add);
                return $this->success('登录成功', url('Index/index'));
            }else{
                return $this->error('登录失败', url('Login/index'));
            }
            exit();
        }else{
            $result = Db::name('system_setting')->select();
            $data = array();
            foreach($result as $key => $value){
                $data[$value['syskey']] = $value['sysvalue'];
            }
            $this->assign('config',$data);
            return $this->fetch('login');
        }
    }

    public function logout()
    {
        Session::clear('admin');
        return $this->success('退出成功', url('Login/index'));
    }
	
	 // 定义一个函数getIP() 客户端IP，
	function getIP(){            
		if (getenv("HTTP_CLIENT_IP"))
			 $ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
				$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
			 $ip = getenv("REMOTE_ADDR");
		else $ip = "Unknow";
		
		if(preg_match('/^((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1 -9]?\d))))$/', $ip))          
			return $ip;
		else
			return '';
	}
	// 服务器端IP
	 function serverIP(){   
	  return gethostbyname($_SERVER["SERVER_NAME"]);   
	 } 


}
