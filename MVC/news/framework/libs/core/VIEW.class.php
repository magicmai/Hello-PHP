<?php 

class VIEW {

	public static $view;

	public static function init($viewtype, $config) {
		
		self::$view = new $viewtype;
		
		foreach ($config as $key=>$value) {
			self::$view->$key($value);
		}
		/**
		 * $smarty = new Smarty();
		 * $smarty->setLeftDelimiter('{');  // 左定界符
		 * $smarty->setRightDelimiter('}');  // 右定界符
		 * $smarty->setTemplateDir("tpl");  // html 模板地址
		 * $smarty->setCompileDir("template_c");  // 模板编译生成的文件
		 * $smarty->setCacheDir("cache");  // 缓存地址
		 */
	}

	public static function assign($data) {
		foreach ($data as $key => $value) {
			self::$view->assign($key, $value);
		}
	}

	public static function display($template) {
		self::$view->display($template);
	}

}

 ?>