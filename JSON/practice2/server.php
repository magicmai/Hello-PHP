<?php 

// 1 (一维数组)
$member['username'] = 'kate';
$member['password'] = 'kkkk';
$do = @$_REQUEST['do'];

// 2 (一组会员)
$members['1']['username'] = 'jack';
$members['1']['password'] = 'jjjj';
$members['2']['username'] = 'rose';
$members['2']['password'] = 'rrrr';
$members['2']['address'] = 'guangzhou';
$members['third']['username'] = 'I am the third one';

// 3 (一组地址)
class addressClass {
	public $address = array();

	public function setAddress($array) {
		$this->address = $array;
	}

	public function getAddress() {
		return $this->address;
	}
}

$addressObj = new addressClass();

$addressObj->setAddress($members);

switch ($do) {
	case 'first':
		echo json_encode($member);
		break;
	
	case 'second':
		echo json_encode($members);
		break;

	case 'third':
		echo json_encode($addressObj);
		break;
}

























 ?>