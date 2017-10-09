<?php 

/**********************************************	
	第1步 浏览者  ->  调用控制器，对其发出指令
	第2步 控制器  ->  按照指令选取一个合适的模型
	第3步 模型    ->  按照控制器的指令取出数据
	第4步 控制器  ->  按照指令取出相对的视图
	第5步 视图    ->  把第三步取到的数据按照客户的要求的样子显示出来
**********************************************/

require_once('/libs/Controller/testController.class.php');
require_once('/libs/Model/testModel.class.php');
require_once('/libs/View/testView.class.php');

$testController = new testController();
$testController->show();




 ?>