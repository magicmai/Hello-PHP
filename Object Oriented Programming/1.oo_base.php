<?php 

date_default_timezone_set("PRC");

// 类的定义以关键字 class 开始，后面跟着这个类的 名称。类的命名通常每个单词的第一个字幕大写。以中括号开始和结束
class NbaPlayer {
	public $name = 'Jordan';  // 定义属性
	public $height = '198cm';
	public $weight = '98kg';
	public $team = 'Bull';
	public $playerNumber = '23';

	// 构造函数，在对象被实例化的时候自动调用
	function __construct($name, $height, $weight, $team, $playerNumber) {
		echo "In NbaPlayer constrator\n";

		$this -> name = $name;  // this 是 PHP 里面的伪变量，表示对象自身。可以通过 $this -> 的方式访问对象的属性和方法
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

	// 定义方法
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
}


// 类到对象的实例化
// 类的实例化为对象时使用关键字 new，new 之后紧跟类的名称和一对括号
$jordan = new NbaPlayer('Jordan', '198cm', '98kg', 'Bull', '23');

// 对象中的成员属性可以通过 -> 符号来访问
echo $jordan -> name . "\n";
// 对象中的成员方法可以通过 -> 符号来访问
echo $jordan -> dribble();
echo $jordan -> pass();

// 每一次用 new 实例化对象的时候，都会用类名后面的参数列表调用构造函数
$james = new NbaPlayer('James', '203cm', '120kg', 'Heat', '6');
echo $james -> name . "\n";

// 通过把变量设置为 null，可以出发析构函数的调用
// 当对象不会再被使用的时候，会触发析构函数
$james1 = $james;
$james2 = &$james;
$james = null;
echo "From now on James will not be used.\n";

?>