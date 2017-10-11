<?php 

class mysql {
	
	/**
	 * 报错函数
	 *
	 * @param string $error
	 */
	function err ($error) {
		die('对不起，您的操作有误，错误原因为：' . $error);  //die 有两种作用：输出和终止，相当于 echo 和 exit 的组合
	}


	/**
	 * 连接数据库
	 *
	 * @param string $config 配置数组 array($dbhost, $dbuser, $dbpsw, $dbname, $dbcharset)
	 * @return bool 连接成功或不成功
	 */
	function connect ($config) {
		extract($config);  // 将数组还原成变量
		if (!($con = mysqli_connect($dbhost, $dbuser, $dbpsw))) {  // mysqli_connect 连接数据库函数
			$this->err(mysqli_error($con));
		}
		if (!mysqli_select_db($con, $dbname)) {  // mysqli_select_db 选择库的函数
			$this->err(mysqli_error($con));
		}

		mysqli_query($con, 'set names ' . $dbcharset);  // 使用 mysqli_query 设置编码格式：mysqli_query("set names utf8")
	}


	/**
	 * 执行 sql 语句
	 *
	 * @param string $sql
	 * @return bool 返回执行成功，或资源，或执行失败
	 */
	function query($sql) {
		if (!($query = mysqli_query($con, $sql))) {  // 使用 mysqli_query 函数执行 sql 语句
			$this->err($sql."<br />" . mysqli_error($con));  // mysqli_error 报错
		} else {
			return $query;
		}
	}


	/**
	 * 列表（获取所有资源）
	 *
	 * @param source $query sql 语句通过 mysqli_query 执行出来的资源
	 * @return array 返回列表数组
	 */
	function findAll ($query) {
		while ($rs = mysqli_fetch_array($query, MYSQL_ASSOC)) {  // mysqli_fetch_array 函数把资源转换为数组，一次转换出一行出来
			$list[] = $rs;
		}
		return isset($list)? $list : '';
	}


	/**
	 * 单条
	 *
	 * @param source $query sql 语句通过 mysqli_query 执行出来的资源
	 * @return array 返回单条信息数组
	 */

	function findOne ($query) {
		$rs = mysqli_fetch_array($query, MYSQL_ASSOC);
		return $rs;
	}


	/**********************************************************************
	 * 指定行的指定字段的值（Q：mysqli 怎么实现？）
	 *
	 * @param source $query sql 语句通过 mysqli_query 执行出来的资源
	 * @return array 返回指定行的指定字段的值
	 
	function findResult($query, $row = 0, $field = 0) {
		$rs = mysqli_result($query, $row, $field);
		return $rs;
	}
	**********************************************************************/


	/**
	 * 添加函数
	 *
	 * @param string $table 表名
	 * @return array $arr 添加数组（包含字段和值的一维数组）
	 */
	function insert ($table, $arr) {
		// $sql = "INSERT INTO 表名(多个字段) VALUES(多个值)"
		// 插入语句：mysqli_query($con, $sql);  
		// 例如：
		// $sql = "INSERT INTO test(a, b, c) VALUES (1, 3, 5)";
		// $arr = array('a'=>1, 'b'=>3, 'c'=>5)
		 
		foreach ($arr as $key=>$value) {  // foreach 循环数组
			$value = mysqli_real_escape_string($con, $value);  // 对输入的字符串进行转义
			$keyArr[] = "`" . $key . "`";  // 把 $arr 数组当中的键名保存到 $keyArr 数组当中，标志字符
			$valueArr[] = "'" . $value . "'";  // 把 $arr 数组当中的键值保存到 $valueArr 当中，因为值多为字符串，而 sql 语句里面 insert 当中如果值是字符串的话要加单引号，所以这个地方要加上单引号
		}
		$keys = implode(",", $keyArr);  // implode 函数是把数组组合成字符串，用逗号分隔：implode(分隔符, 数组)
		$values = implode(",", $valueArr);
		$sql = "INSERT INTO " . $table . "(" . $keys . ") VALUES(" . $values . ")";  // sql的插入语句，格式：INSERT INTO 表名(多个字段) VALUES(多个值)
		$this->query($sql);  // 调用类自身的 query（执行）方法执行这条 sql 语句。注：$this 指代自身
		return mysqli_insert_id($con);  // 返回上一步 INSERT 操作产生的 ID
 	}


 	/**
	 * 修改函数
	 *
	 * @param string $table 表名
	 * @param array $arr 修改数组（包含字段和值的一维数组）
	 * @param string $where 条件
	 * @return array $arr 添加数组（包含字段和值的一维数组）
	 */
	function update ($table, $arr, $where) {
		// UPDATE 表名 SET 字段 = 字段值 WHERE ……
		// UPDATE 表名 SET 字段 = 字段值, 字段2 = 字段值2, 字段3 = 字段值3 WHERE ……
		foreach ($arr as $key=>$value) {
			$value = mysqli_real_escape_string($value);
			$keyAndvalueArr[] = "`" . $key . "`='" . $value . "'";
		}
		$keyAndvalues = implode(',', $keyAndvalueArr);
		$sql = "UPDATE " . $table . "SET " . $keyAndvalues . "WHERE " . $where;  // 修改操作，格式：UPDATE 表名 SET 字段 = 字段值 WHERE 条件
		$this->query($sql);
	}


	/**
	 * 删除函数
	 *
	 * @param string $table 表名
	 * @param string $where 条件
	 */
	function del ($table, $where) {
		$sql = "DELETE FROM" . $table . "WHERE " . $where; // 删除 sql 语句，格式：DELETE FROM 表名 WHERE 条件
		$this->query($sql);
	}

}

 ?>