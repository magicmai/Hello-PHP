<?php 

class MagicTest {
	
	public function __tostring() {
		return "This is the class MagicTest.\n";
	}
	public function __invoke($x) {
		echo '__invoke called with parameter' . $x . "\n";
	}

	// 方法的重载
	// 这个方法的第一个参数是调用的方法的名称，第二个参数是hi方法调用的参数组成的数组
	public function __call($name, $arguments) {
		echo 'Calling ' . $name . ' with parameters: ' . implode(',', $arguments) . "\n";
	}

	// 静态方法的重载，注意这个方法需要设定为 static
	public static function __callStatic($name, $arguments) {
		echo 'Static calling ' . $name . ' with parameters: ' . implode(',', $arguments) . "\n";
	}

}

$obj = new MagicTest();

$obj->runTest('para1', 'para2');

MagicTest::runTest('para1', 'para2');

 ?>