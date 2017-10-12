<?php 

class authModel {

	private $auth = '';  // 当前管理员的信息

	public function __construct () {
		if (isset($_SESSION['auth']) && (!empty($_SESSION['auth']))) {
			$this -> auth = $_SESSION['auth'];
		}
	}

	public function loginsubmit () {  // 进行登录验证的一系列业务逻辑
		if (empty($_POST['username']) || empty($_POST['password'])) {
			return false;
		}
		$username = addslashes($_POST['username']);
		$password = addslashes($_POST['password']);
		// 用户的验证操作 ——> 拆分到另外一个方法 checkuser 里面去写，减少这个方法的代码量

		if ($this->auth = $this->checkuser($username, $password)) {
			$_SESSION['auth'] = $this->auth;  // 用 session 保存auth信息
			return true;
		} else {
			return false;
		}
	}

	public function getauth () {
		return $this->auth;
	}

	public function logout () {
		unset($_SESSION['auth']);
		$this->auth = '';
	}

	private function checkuser ($username, $password) {
		$adminobj = M('admin');
		$auth = $adminobj -> findOne_by_username($username);
		if ((!empty($auth)) && $auth['password'] == $password) {
			return $auth;
		} else {
			return false;
		}
	}







}

 ?>