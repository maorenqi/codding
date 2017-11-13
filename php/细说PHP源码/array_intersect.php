<?php
	$a1=array("Linux", "Apache", "MySQL", "PHP");  	  //声明第一个数组，作为比较的第一个参数
	$a2=array("Linux", "Tomcat", "MySQL", "JSP");     //声明第二个数组，作为比较的第二个参数
	print_r(array_intersect($a1,$a2));                //输出Array ( [0] => Linux [2] => MySQL ) 
?>

