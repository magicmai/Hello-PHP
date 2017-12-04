# PHP与MySQL关系大揭秘

目标：

1. 详解 PHP 的 MYSQL 常用函数
2. 制作一个文章发布系统
    1. 按照增、删、改、查的顺序，按部就班地开发文章系统的后台程序。
    2. 通过文章系统前台展示实例，详解查询操作

___PHP 支持哪些数据库？___
PHP通过安装相应的扩展来实现数据库操作，现代应用程序的设计离不开数据库的应用，当前主流的数据库有MsSQL，MySQL，Sybase，Db2，Oracle，PostgreSQL，Access等，这些数据库PHP都能够安装扩展来支持，一般情况下常说的 __LAMP架构__ 指的是：Linux、Apache、Mysql、PHP。

___数据库扩展___
```php
mysql扩展进行数据库连接的方法：
$link = mysql_connect('mysql_host', 'mysql_user', 'mysql_password');

mysqli扩展：
$link = mysqli_connect('mysql_host', 'mysql_user', 'mysql_password');

PDO扩展：
$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
$user = 'dbuser';
$password = 'dbpass';
$dbh = new PDO($dsn, $user, $password);
```

## PHP 内置的 MYSQL 函数

连接数据库：`$con = mysqli_connect('数据库主机名或ip', '用户名', '密码');`

关闭数据库：`mysqli_close($con);`

打开数据库：`mysqli_select_db($con, '数据库名');`

选择一张表：`mysqli_query($con, "SELECT * FROM test");`

查询数据库：`mysqli_query();`

4fetch函数：

* `mysqli_fetch_row()`
* `mysqli_fetch_array()`
* `mysqli_fetch_assoc()`
* `mysqli_fetch_object()`

其他：

* `mysqli_num_rows()`
* `mysqli_affected_rows()`

## 注意：
防止乱码：
```php
mysqli_query($con, 'set names utf8');
```


## 实例：文章发布系统

* 学习目标：理解 php 操作 mysql 的具体方法，熟悉常用的 php 内置 mysql 函数，通过反复练习，提升 php 运用能力，锻炼变成思想。

* 需求分析：
    - 后台管理系统：
        + 文章管理列表
        + 文章发布程序
        + 文章修改程序
        + 文章删除程序
    - 前台展示系统：
        + 文章列表
        + 文章内容页

* 数据库设计

* 目录规划、程序文件规划及命名
