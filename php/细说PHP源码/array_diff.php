<?php
	$a1=array("Linux", "Apache", "MySQL", "PHP");    //声明第一个数组，作为比较的第一个参数
	$a2=array("Linux", "Tomcat", "MySQL", "JSP");    //声明第二个数组，作为比较的第二个参数
	print_r(array_diff($a1,$a2));                    //输出:Array ( [1] => Apache [3] => PHP ) 
?>

