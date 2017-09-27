<?php 

class MagicTest {

	// __tostring 会在把对象转换为 string 的时候自动调用
	public function __tostring() {
		return "This is the class MagicTest.\n";
	}

	// __invoke 会在把对象当作一个方法调用的时候自动调用
	public function __invoke($x) {
		echo '__invoke called with parameter' . $x . "\n";
	}
	
}

$obj = new MagicTest();
echo $obj;

$obj(5);


 ?>