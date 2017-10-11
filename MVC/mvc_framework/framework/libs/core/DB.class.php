<?php 

// 工厂模式，管理类

class DB {  
// 类名在 PHP 里面是一个全局变量。实例化以后，静态属性可以通过 DB::$db 调用，静态方法通过 DB::方法() 调用。DB::query  DB::findAll($sql)

	public static $db;

	public static function init($dbtype, $config) {  // 静态方法，$dbtype：数据库类型，$config：配置信息，类型为数组
		self::$db = new $dbtype;      // 实例化数据库操作类：new mysql，保存在 $db
		self::$db->connect($config);  // 使用 $db 的 connect() 方法
	}

	public static query($sql) {
		return self::$db->query($sql);
	}

	public static function findAll($sql) {
		$query = self::$db->query($sql);
		return self::$db->findAll($query);
	}

	public static function findOne($sql) {
		$query = self::$db->query($sql);
		return self::$db->findOne($query);
	}

	public static function findResult($sql, $row = 0, $filed = 0) {
		$query = self::$db->query($sql);
		return self::$db->findResult($query, $row, $filed);
	}

	public static function insert($table, $arr) {
		return self::$db->insert($table, $arr);
	}

	public static function update($table, $arr, $where) {
		return self::$db->update($table, $arr, $where);
	}

	public static function del($table, $where) {
		return self::$db->del($table, $where);
	}

}

 ?>