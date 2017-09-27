<?php 

class MagicTest {

	public function __tostring() {
		return "This is the class MagicTest.\n";
	}
	public function __invoke($x) {
		echo '__invoke called with parameter' . $x . "\n";
	}
	public function __call($name, $arguments) {
		echo 'Calling ' . $name . ' with parameters: ' . implode(',', $arguments) . "\n";
	}
	public static function __callStatic($name, $arguments) {
		echo 'Static calling ' . $name . ' with parameters: ' . implode(',', $arguments) . "\n";
	}

	public function __get($name) {
		return 'Getting the property. ' . $name;
	}

	public function __set($name, $value) {
		echo 'Setting the property ' . $name . ' to value ' . $value . "\n";
	}

	public function __isset($name) {
		echo "__isset invoked\n";  // __isset 已被调用
		return false;
	}

	public function __unset($name) {
		echo "unsetting property " . $name . "\n";
		return false;
	}



}

$obj = new MagicTest();

echo $obj->ClassName . "\n";

$obj->ClassName = 'MagicClassX';

echo 'is $obj->ClassName set? ' . isset($obj->className) . "\n";
echo 'is $obj->ClassName empty? ' . empty($obj->className) . "\n";

unset($obj->className);

/**
返回值：
Getting the property. ClassName
Setting the property ClassName to value MagicClassX
__isset invoked
is $obj->ClassName set? 
__isset invoked
is $obj->ClassName empty? 1
unsetting property className
 */

 ?>