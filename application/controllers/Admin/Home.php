<?php
include_once(APPPATH . 'controllers/Bin/Admin_base.php'); 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends Admin_base{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if( ! parent::is_login()) return;
		Loader::view(array('template/header' , 'Home') , array() , 1);
	}

	
}