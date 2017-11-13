<?php
	$lamp=array("a"=>"Linux", "b"=>"Apache", "c"=>"MySQL", "d"=>"PHP");
	shuffle($lamp);     //将传入的数组$lamp按随机顺序重新排列
	print_r($lamp);     //每执行一次shuffle()函数则返回不同顺序的数组
?>
