<?php 

/**
 * 1. 子类中编写跟父类方法名完全一致的方法可以完成对父类方法的重写（overwrite）
 * 2. 对于不想被任何类继承的类（BaseClass）可以在 class 的前面添加 final 关键字
 * 3. 对于不想被子类重写（修改）的方法（test1），可以在方法定义的前面添加 final 关键字
 */

// final class BaseClass {
class BaseClass {

	public function test() {
		echo "BaseClass::test called\n";
	}

	// 添加 final 关键字能使该方法不能够在子类中重写
	final public function test1() {
		echo "BaseClass::test1 called\n";
	}

}

class ChildClass extends BaseClass {
	
	public function test($tmp = null) {
		echo "ChildClass::test called " . $tmp . "\n";
	}

	// 父类中 test1 方法加上了 final 关键字，所以不能在子类里面重写 test1，会报错！
	// public function test1() {
	// 	echo "ChildClass::test1 called\n";
	// }

}

$obj = new ChildClass();  

$obj->test("TMP");  // ChildClass::test called TMP

// test1方法在子类中虽然不能修改，但可以调用
$obj->test1();  // BaseClass::test1 called

 ?>