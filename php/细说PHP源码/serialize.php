<?php
	require "class_Person.php";                	//在本文件中包含Person类所在的脚本文件
	$person=new Person("张三", "男", 20);      	//能过Person类创建一个对象，对象的引用名为$person
	$person_string=serialize($person);         	 //通过serialize函数将对象串行化，返一个字符串
	file_put_contents("file.txt", $person_string);	 //将对象串行化后返回的字符串保存到file.txt文件中
?>
