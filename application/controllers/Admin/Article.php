<?php
include_once(APPPATH . 'controllers/Bin/Admin_base.php'); 
defined('BASEPATH') OR exit('No direct script access allowed');
class Article extends Admin_base{
	public function __construct(){
		parent::__construct();
		$this->load->model('Article_model');
	}

	public function index(){
		$Article = $this->Article_model->get_list(array() , 1 , 10 , array());

		Loader::view(array('template/header' , 'pages/article') , array(
			"article_list" => $Article
		) , 1);
	}
}