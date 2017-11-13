<?php
	$a1=array("OS","WebServer","DataBase","Language");    //声明第一个数组作为参数1
	$a2=array("Linux","Apache","MySQL","PHP");            //声明第二个数组作为参数2
	print_r(array_combine($a1,$a2));                      //使用arrray_combine()将两个数组合并
//输出：Array ( [OS] => Linux [WebServer] => Apache [DataBase] => MySQL [Language] => PHP )
?>

