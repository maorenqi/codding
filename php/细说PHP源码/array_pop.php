<?php
	$lamp=array("Linux","Apache","MySQL", "PHP"); //声明一个数组作为栈

	echo array_pop($lamp);  //弹出数组中最后的元素并返回被删除的值，输出PHP
	print_r($lamp);         //被弹出后的结果:Array ( [0] => Linux [1] => Apache [2] => MySQL ) 

	echo array_pop($lamp);  //再弹出数组中最后的元素并返回被删除的值，输出MySQL
	print_r($lamp);         //被弹出后的结果:Array ( [0] => Linux [1] => Apache ) 
?>

