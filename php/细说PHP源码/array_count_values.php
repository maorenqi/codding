<?php
	$array = array(1, "php", 1, "mysql", "php");     //声明一个带有重复值的数组
	$newArray=array_count_values ($array);           //统计数组$array中所有值出现的次数
	print_r($newArray);                              //输出：Array([1] => 2 [php] => 2 [mysql] => 1)
?>

