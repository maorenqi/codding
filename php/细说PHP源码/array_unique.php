<?php
	$a=array("a"=>"php","b"=>"mysql","c"=>"php");  //声明一个带有重复值的数组
	print_r(array_unique($a));  		       //删除重复值后输出：Array ([a] => php [b] => mysql)
?>

