<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function rule_limit($params , $rule){
		foreach ($params as $key => $value) {
			if(isset($rule[$key])){
				$name = isset($rule[$key][2]) ? $rule[$key][2] : $key;
				$rule_data = $rule[$key];
				if(is_numeric($rule_data[0])){
					if(strlen($value) < $rule_data[0]){
						$this->end(false , "您输入的{$name}长度不能少于{$rule_data[0]}个");
					}
					if(strlen($value) > $rule_data[1]){
						$this->end(false , "您输入的{$name}长度不能超过{$rule_data[1]}个");
					}
				}else{
					if($rule_data[0] == true && $rule == ""){
						$this->end(false , "您输入的{$name}不能为空");
					}
				}
			}
		}
		return $params;
	}


	/**
	 * @method get_params
	 * @description 获取参数
	 * @param {String} method 获取参数的方法 GET | POST, default = 'GET'
	 * @param {Array} keys 要获取的参数名字，true 表示不能为空，false 则可以为空，默认为 true
	 */
	public function get_params($keys , $method = 'GET') {
	    if (strtoupper($method) === 'GET') {
	        $params = $this->input->get(NULL, true);
	    } else {
	        $params = $this->input->post(NULL, true);
	    }
	    foreach ($keys as $key => $val) {
	        if (is_numeric($key)) {
	            if (!isset($params[$val])) $this->end(false, '请检查您输入的数据是否正确');
	            $result[$val] = $params[$val];
	        } else {
	            if (!isset($params[$key]) || empty($params[$key])) $this->end(false, '请检查您输入的数据是否正确');
	            $result[$key] = $params[$key];
	        }
	    }
	    return $result;
	}

	public function end($state = TRUE , $errorOrData = ""){
		$result = array("STATE" =>  $state);
		$state ? $result['DATA'] = $errorOrData : $result['ERROR'] = $errorOrData;
		exit(json_encode($result));
	}

}