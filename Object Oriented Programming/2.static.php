<?php 

date_default_timezone_set("PRC");

// 【内容包括：继承、访问控制、static 关键字】

/**
 * 注意的地方：
 * 1. 静态属性用于保存类的公有数据
 * 2. 静态方法里面只能访问静态属性
 * 3. 静态成员不需要实例化对象就可以访问
 * 4. 类的内部可以通过 self 或者 static 关键字访问自身静态成员
 * 5. 可以通过 parent 关键字访问父类的静态成员
 * 6. 可以通过类的名称在类定义外部访问静态成员
 */

// 父类
class Human {
	public $name;
	protected $height;  // 只有自身和子类可以访问
	public $weight;
	private $isHungry = true;  // 不能被子类访问

	public static $sValue = 'Static value in Human class.';

	public function eat($food) {
		echo $this -> name . "'s eating " . $food . "\n";
	}

	public function info() {
		echo "HUMAN: " . $this->name . ";" . $this->height . ";" . $this->isHungry . "\n";
	}
}

// 子类
// 在 PHP 中可以用 extends 关键字来表示类的继承，后面跟父类的类名。
// PHP 中 extends 后面只能跟一个类的类名，这就是 PHP 的单继承原则
class NbaPlayer extends Human {
	public $team = 'Bull';
	public $playerNumber = '23';

	private $age = '40'; // Private 的类成员只能在类的内部被访问

	// 静态属性定义时在访问控制关键字后面添加 static 关键字即可
	public static $president = "David Stern";

	// 静态方法定义
	public static function changePresident($newPrsdt) {
		// 在类定义中使用静态成员的时候，用 self 或者 static 关键字后面跟着 :: 操作符即可。注意：在访问静态成员的时候，:: 后面需要跟 $ 符号
		// self::$president = $newPrsdt;
		static::$president = $newPrsdt;
		// 使用 parent 关键字就能够访问父类的静态成员
		echo parent::$sValue . "\n";
	}

	// 构造函数，在对象被实例化的时候自动调用
	function __construct($name, $height, $weight, $team, $playerNumber) {
		echo "In NbaPlayer constrator\n";

		$this -> name = $name;  // 父类中的属性，可以通过 $this 访问
		$this -> height = $height;
		$this -> weight = $weight;
		$this -> team = $team;
		$this -> playerNumber = $playerNumber;
	}

	// 析构函数，在程序执行结束的时候会自动调用
	// 析构函数通常被用于清理程序使用的资源。比如程序使用了打印机，那么可以子啊析构函数里释放打印机资源。
	function __destruct() {
		echo 'Destroying' . $this -> name . "\n";
	}

	public function run() {
		echo "Running\n";
	}

	public function jump() {
		echo "Jumping\n";
	}

	public function dribble() {
		echo "Dribbling\n";
	}

	public function shoot() {
		echo "Shooting\n";
	}

	public function dunk() {
		echo "Dunking\n";
	}

	public function pass() {
		echo "Passing\n";
	}

	public function getAge() {
		echo $this -> name . "'s age is " . ($this -> age -2) ."\n";
	}
}



// $jordan = new NbaPlayer('Jordan', '198cm', '98kg', 'Bull', '23');
// $jordan -> getAge();
// $jordan -> info();

// $james = new NbaPlayer('James', '203cm', '120kg', 'Heat', '6');

// $jordan->changePresident('Adam Silver');
// echo "Jordan: " . $jordan->president . "\n";
// echo "James: " . $james->president . "\n";

// 在类定义外部访问静态属性，我们可以用类名加上 :: 操作符的方法来访问类的静态成员
echo NbaPlayer::$president . " —— before change \n";
NbaPlayer::changePresident('Adam Silver');
echo NbaPlayer::$president . "\n";

// 外部访问 Human 的静态成员
echo Human::$sValue . "\n";

?>