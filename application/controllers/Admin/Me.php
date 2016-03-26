<?php
include_once(APPPATH . 'controllers/Bin/Admin_base.php'); 
defined('BASEPATH') OR exit('No direct script access allowed');
class Me extends Admin_base{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		Loader::view(array('template/header' , 'pages/me') , array() , 1);
	}
}