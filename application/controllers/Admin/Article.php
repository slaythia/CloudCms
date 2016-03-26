<?php
include_once(APPPATH . 'controllers/Bin/Admin_base.php'); 
defined('BASEPATH') OR exit('No direct script access allowed');
class Article extends Admin_base{
	public function __construct(){
		parent::__construct();
		$this->load->model('Article_model');
	}

	public function index(){
		if( ! parent::is_login()) return;
		$Article = $this->Article_model->get_list(array() , 1 , 10 , array());

		Loader::view(array('template/header' , 'pages/article/home') , array(
			"article_list" => $Article
		) , 1);
	}

	public function edit(){
		if( ! parent::is_login()) return;
		Loader::view(array('template/header' , 'pages/article/edit') , array(
		) , 1);
	}
}