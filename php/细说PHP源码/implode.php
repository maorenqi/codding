<?php
	$lamp=array("Linux", "Apache", "MySQL", "PHP");
	
	echo implode("+", $lamp);   //使用加号连接后输出Linux+Apache+MySQL+PHP
	echo join("+++", $lamp);    //使用三个加号连接后输出Linux+++Apache+++MySQL+++PHP
?>
