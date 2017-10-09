<?php 

// 控制器调用函数C

function C($name, $method) {
	require_once('/libs/Controller/' . $name . 'Controller.class.php');
	// $testController = new testController();
	// $testController->show();
	eval('$obj = new ' . $name . 'Controller(); $obj->' . $method . '();');
	/***************************************************************
		eval()函数调用简单但是不安全。
		eval('$obj=new '.$name.'Controller();$obj ->'.$method.'();');
		可用下面代码代替：
		$controller = $name.'controller';
		$obj = new $controller;
		$obj->$method();
	***************************************************************/
}
// C('test', 'show');


// 模型调用函数M

function M($name) {
	require_once('/libs/Model/' . $name . 'Model.class.php');
	// $testModel = new testModel();
	eval('$obj = new ' . $name . 'Model();');  // 实例化
	/***************************************************************
		eval()函数调用简单但是不安全。
		eval('$obj = new '.$name.'Model();');
		可用下面代码代替：
		$model = $name.'Model';
		$obj = new $Model();
	***************************************************************/
	return $obj;
}


// 试图调用函数V

function V($name) {
	require_once('/libs/View/' . $name . 'View.class.php');
	// $testView = new testView();
	eval('$obj = new ' . $name . 'View();');
	/***************************************************************
		eval()函数调用简单但是不安全。
		eval('$obj = new '.$name.'View();');
		可用下面代码代替：
		$view = $name.'View';
		$obj = new $view();
	***************************************************************/
	return $obj;
}


function daddslashes($str) {
	return (!get_magic_quotes_gpc())? addslashes($str) : $str;
}
// get_magic_quotes_gpc()：判断魔法函数的打开状态
// addslashes()：对特殊符号进行转译


function ORG($path, $name, $params=array()) {  
// path 是路径，$name 是第三方类名，params 是该类初始化的时候需要制定、赋值的属性，格式为 array(属性名=>属性值, 属性名2=>属性值2, ……)

	// $path = 'Smarty/'
	// $name = 'Smarty'
	
	require_once('libs/ORG/' . $path . $name . '.class.php');
	// libs/ORG/Smarty/Smarty.class.php

	// eval('$obj = new ' . '$name' . '();');
	$obj = new $name();

	if (!empty($params)) {
		foreach($params as $key=>$value) {
			// eval('$obj->' . $key . '(' . $value . ');');
			$obj->$key($value);
		}
	}
	// print_r($params);
	return $obj;
}


 ?>