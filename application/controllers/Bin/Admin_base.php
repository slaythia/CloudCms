<?php
class Admin_base extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	public function is_login(){
		if( ! Admin::is_login()){
			Loader::view(array('template/header' , 'pages/login') , array() , 1);
			return false;
		}
		return true;
	}

}