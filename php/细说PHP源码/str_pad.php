<?php
	$str= "LAMP";                           
	echo str_pad($str, 10);        //指定长度为10，默认使用空格在右边填补"LAMP      "
	echo str_pad($str, 10, "-=", STR_PAD_LEFT);  //指定长度为10，指定在左边填补" -=-=-=LAMP"
	echo str_pad($str, 10, "_", STR_PAD_BOTH);  //指定长度为10，指定两端填补 " ___LAMP___"
	echo str_pad($str, 6 , "___");                //指定长度为6， 默认在右边填补" LAMP__"
?>
