<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if( ! Admin::is_login()){Loader::view(array('template/header' , 'Page/login') , array() , 1);return;}
		Loader::view(array('template/header' , 'Home') , array() , 1);
	}
}