<?php 

class adminModel {

	public $_table = 'admin';  // 定义表名

	// 取用户信息，通过用户名
	function findOne_by_username($username) {
		$sql = 'SELECT * FROM ' . $this->_table . ' WHERE username="' . $username . '"';
		return DB::findOne($sql);
	}

	// 用户密码核对 ——> auth 模型：authModel

}



 ?>