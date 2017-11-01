<?php
/* $str = "lamp";
$number = 789;
$format = "The %2\$s book contains %1\$d pages.That is a nice %2\$s full of %1\$d pages.<br>";
 
printf($format,$number,$str);*/
header("Content-type:text/html;charset=utf-8");

interface One{
	const CONSTANT = 'CONSTANT value';
	function fun1();
	function fun2();
}

interface Two extends One{
	function fun3();
	function fun4();
}

interface Three{
	function fun5();
}
class Five{
	function fun6(){
		
	}
	
}

//Four继承Five ,实现接口 One,Two,Three
class Four extends Five implements One,Two,Three{
	function fun1(){
		echo 'func1';
	}
	function fun2(){
		echo 'func2';
	}
	function fun3(){
		echo 'func1';
	}
	function fun4(){
		echo 'func2';
	}
	function fun5(){
		
	}
}

$obj = new Four();
$obj->fun1();