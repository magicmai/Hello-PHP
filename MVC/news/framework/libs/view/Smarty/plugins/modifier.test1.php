<?php 

function smarty_modifier_test1($utime, $format) {
	return date($format, $utime);
}

 ?>