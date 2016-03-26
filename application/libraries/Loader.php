<?php
class Loader{
	
	static function view($view_path = array() , $push_data = array() , $view_type = 'home'){
		$CI = & get_instance();
		$config = $CI->config->item('template');
		$view_type = $view_type == 1 ? $config['admin_template_name']  : ['home_template_name'];
		foreach ($view_path as $path) {
			$CI->parser->parse($view_type . '/' . $path , array_merge($config , $push_data));
		}
	}
}