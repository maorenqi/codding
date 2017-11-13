<?php
	$array=array("Linux RedHat9.0", "Apache2.2.9", "MySQL5.0.51", "PHP5.2.6", "LAMP", "100");
	//返回数组中以字母开始和以数字结束，并且没有空格的单元，赋给变量$version
	$version=preg_grep("/^[a-zA-Z]+(\d|\.)+$/", $array);  
	print_r($version);      //输出：Array ( [1] => Apache2.2.9 [2] => MySQL5.0.51 [3] => PHP5.2.6 )
?>
