<?php 

// abstract 关键字用于定义抽象类
abstract class ACanEat {
	// 在抽象方法前面添加 abstract 关键字可以标明这个方法是抽象方法，不需要具体的实现
	abstract public function eat($food);

	// 抽象类中可以包含普通方法，有方法的具体实现
	public function breath() {
		echo "Breath use the air.\n";
	}
}

// 继承抽象类的关键字是 extends
class Human extends ACanEat {
	// 继承抽象类的子类需要实现抽象类中定义的抽象方法
	public function eat($food) {
		echo "Human's eating " . $food . "\n";
	}
}

class Animal extends ACanEat {
	public function eat($food) {
		echo "Animal's eating " . $food . "\n";
	}
}

$man = new Human();
$man->eat('banana');
$man->breath();  // 和 Animal 类共用了抽象类中的 breath 方法
$sheep = new Animal();
$sheep->eat('grass');
$sheep->breath();


 ?>