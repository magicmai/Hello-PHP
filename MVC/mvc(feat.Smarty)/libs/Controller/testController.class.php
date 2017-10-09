<?php 

/* 控制器的作用是调用模型，并调用视图。将模型产生的数据传递给视图，并让相关视图去显示 */

class testController {
	
	public function show() {

		global $view;

		// $testModel = new testModel();
		$testModel = M('test');           // 调用模型
		$data = $testModel->get();        // 获取数据
		// $testView = new testView();
		// $testView = V('test');
		// $testView->display($data);
		$view->assign('str', $data);      // 数据传给视图层
		$view->display('test.tpl');       // 展示数据
	}
}

 ?>