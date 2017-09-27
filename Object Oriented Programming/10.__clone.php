<?php 

class NbaPlayer {
	public $name;
	function __clone() {
		$this->name = 'TBD';
	}
}

$james = new NbaPlayer();
$james->name = 'James';
echo $james->name . "\n";

$james2 = clone $james;

echo 'Before set up James2\'s name: ' . $james2->name . "\n";

$james2->name = 'james2';
echo 'James\'s: ' . $james->name . "\n";
echo 'James2\'s: ' . $james2->name . "\n";

/**
返回值：
James
Before set up James2's name: TBD
James's: James
James2's: james2
 */


 ?>