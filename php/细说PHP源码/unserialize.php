<?php
	require "class_Person.php";	               //在本文件中包含Person类所在的脚本文件
	$person_string=file_get_contents("file.txt");  //将file.txt文件中的字符串读出来并赋给变量$person_string
	$person=unserialize($person_string); 	       //进行反串行化操作，形成对象$person。
	$person->say();                         	//调用对象中的say()方法，用来测试反串行化对象是否成功
?>

