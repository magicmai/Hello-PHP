<?php 

$array_1 = array();  // 一维数组
$array_2 = array();  // 多维数组

$array_1['username'] = 'Kate';
$array_1['age'] = 20;

$array_2['member']['Jack']['name'] = 'Jack';
$array_2['member']['Jack']['age'] = 32;

$array_2['member']['Adam']['name'] = 'Adam';
$array_2['member']['Adam']['age'] = 40;

// print_r($array_1);
// print_r($array_2);

$jsonObj_1 = json_encode($array_1);
// echo $jsonObj_1;

$jsonObj_2 = json_encode($array_2);
// echo $jsonObj_2;

class  Food {
	public $name = 'Food\'s name';
	protected $ptName = 'Food\'s ptName';
	private $pName = 'Food\'s pName';

	public function getName() {
		return $this->name;
	}
}
 $cake = new Food();
 $cake_json = json_encode($cake);
 // print_r($cake);
 
 print_r($cake_json);  // {"name":"Food's name"}：对象转换为 json 格式时，只转换公有变量，私有变量不转换！
echo "\n";

/**
 * 问题1：JSON 数据的基本原则？
 * 问题2：对象类型怎么更好地转换到 JSON 数据格式，以便于交互？
 */

$jsonStr = '{"key": "value", "key1": "value1"}';
print_r($jsonStr);
echo "\n";

$json2Obj = json_decode($jsonStr);

print_r($json2Obj);  // 结果为对象
echo "\n";

$json2Array = json_decode($jsonStr, true);  // 结果为数组，必须加上第二个参数 true

print_r($json2Array);  


 ?>