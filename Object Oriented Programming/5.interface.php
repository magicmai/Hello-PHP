<?php 

/**
 * interface 关键字用于定义接口
 */
interface ICanEat {
	// 接口里面的方法不需要有方法的实现
	public function eat($food);
}

// implements 关键字用于表示类实现某个接口
class Human implements ICanEat {
	// 实现了某个接口之后，必须提供接口中定义的方法的具体实现
	public function eat($food) {
		echo "Human's eating " . $food . "\n";
	}
}

class Animal implements ICanEat {
	// 实现了某个接口之后，必须提供接口中定义的方法的具体实现
	public function eat($food) {
		echo "Animal's eating " . $food . "\n";
	}
}

$Joe = new Human();
$Joe->eat('banana');

$sheep = new Animal();
$sheep->eat('grass');

// 不能实例化接口
// $eatObj = new ICanEat();

// 可以用 instanceof 关键字来判断某个对象是否实现了某个接口
// var_dump($Joe instanceof ICanEat);

function checkEat($obj) {
	if ($obj instanceof ICanEat) {
		$obj->eat('food');
	} else {
		echo "The obj can't eat.\n";
	}
}

// 相同的一行代码，对于传入不同的借口的对象的时候，表现是不同的，这就是多态
checkEat($Joe);
checkEat($sheep);

// 可以用 extends 让接口继承接口
interface ICanDrink extends ICanEat {
	public function drink();
}

// 当类实现子接口时，父接口定义的方法也需要在这个类里面具体实现
class Human1 implements ICanDrink {
	public function drink() {}
	public function eat($food) {}
}



 ?>