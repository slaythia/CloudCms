<?php
class Admin{
	static function is_login(){
		return isset($_SESSION['admin_user']);
	}
}