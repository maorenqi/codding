<?php
	class TestClass {                 //声明一个测试类，在类中声明printHello()和__call()方法
		function printHello() {        //声明一个方法，可以让对象成功能调用
			echo "Hello<br>";       //执行时输出一条语句
		}

		function __call($functionName, $args) {     //声明此方法用来处理调用对象中不存在的方法
			echo "你所调用的函数：".$functionName."(参数：";  //输出调用不存在的方法名
			print_r($args);                                  //输出调用不存在的方法时的参数列表
			echo ")不存在！<br>\n";                         //输出符加的一些提示信息
		}	
	}

	$obj=new TestClass();              //通过类TestClass实例化一个对象
	$obj->myFun("one", 2, "three");      //调用对象中不存在的方法，则自动调用了对象中的__call()方法
	$obj->otherFun(8,9);               //调用对象中不存在的方法，则自动调用了对象中的__call()方法
	$obj->printHello();                 //调用对象中存在的方法，可以成功调用
?>
