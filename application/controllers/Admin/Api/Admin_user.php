<?php
include_once(APPPATH . 'controllers/Bin/Base.php');
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_user extends Base{
	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_user_model');
	}

	public function Login(){
		sleep(1);
		$params = parent::get_params(array('username' , 'password' , 'verification') , 'POST');
		extract(parent::rule_limit($params , array(
			'username' => array(6 , 16 , "用户名") , 
			'password' => array(6 , 16 , "密码") , 
			'verification' => array(4 , 4 , "验证码")
		)));
		if( ! isset($_SESSION['verification']) || $_SESSION['verification'] != $verification) parent::end(FALSE , '验证码错误，请重新输入');
		$user_data = $this->Admin_user_model->get(array('username' => $username));
		if( ! isset($user_data['username'])) parent::end(FALSE , '您视图尝试登录一个不存在的账户');
		if(md5($password . $user_data['salt'])=== $user_data['password']){
			$_SESSION['admin_user'] = $user_data;
			parent::end(TRUE);
		}
		parent::end(FALSE , '您输入的登录密码不正确，请检查后重新输入');
	}
	// [lost_time] => 1454476100
	// [lost_ip] => 127.168.0.1
	// [new_time] => 1454494483
	// [new_ip] => 127.168.0.1
}