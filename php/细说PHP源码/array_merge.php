<?php
	$a1=array("a"=>"Linux","b"=>"Apache");
	$a2=array("c"=>"MySQL","b"=>"PHP");
	print_r(array_merge($a1,$a2)); 	//输出： Array ( [a] => Linux [b] => PHP [c] => MySQL ) 
	
	//仅使用一个数组参数则键名以0开始进行重新索引
	$a=array(3=>"PHP",4=>"MySQL");
	print_r(array_merge($a));	 //输出：Array ( [0] => PHP [1] => MySQL ) 
?>

