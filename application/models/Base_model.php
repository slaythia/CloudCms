<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Base_model extends CI_Model {
	public function __construct() {
	    parent::__construct();
	}
	public function where($where = array()){
		$this->db->where($where);
	}

	public function edit($where = array() , $params = array()){
		$this->db->where($where)->update($this->table_name, $params);
		return $this->db->affected_rows() > 0;
	}

	public function remove($params = array()){
		return $this->db->delete($this->table_name , $params);
	}

	public function get($where = array(), $select = array()){
		return $this->db->select($select)->where($where)->get($this->table_name, 1)->row_array();
	}

	public function get_list($params = array() , $page = 1 , $count = 10 , $select = array() , $is_all  = "Not all"){
		if($is_all === "Not all"){
			$this->db->limit($count , ($page - 1) * $count);
		}
		return $this->db->select($select)->order_by('id' , 'desc')->get_where($this->table_name , $params)->result_array();
	}

	public function create($params = array()){
		$this->db->insert($this->table_name , $params);
		return $this->db->insert_id();
	}
	public function is_exist($where = array()) {
		return $this->db->select('id')->where($where)->get($this->table_name)->num_rows() > 0;
	}

	public function get_count($where = array()){
		return $this->db->where($where)->count_all_results($this->table_name);
	}
}
