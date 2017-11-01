<?php
/* $str = "lamp";
$number = 789;
$format = "The %2\$s book contains %1\$d pages.That is a nice %2\$s full of %1\$d pages.<br>";
 
printf($format,$number,$str);*/
header("Content-type:text/html;charset=utf-8");
class TestCall{
	
	function printHello(){
		echo "Hello<br>";
	}
	function __call($functionName,$args){
		echo "你所调用的函数：".$functionName."(参数：";
		print_r($args);
		echo")不存在！<br>\n";
	}
	
}
$obj = new TestCall();
$obj->myFun("one",2,"three");
$obj->otherFun(8,9);
$obj->printHello();