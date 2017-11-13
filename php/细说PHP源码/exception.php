<?php
	try {
		$error = 'Always throw this error';
		throw new Exception($error);   //创建一个异常对象，通过throw语句抛出
		echo 'Never executed';         //从这里开始，try代码块内的代码将不会再被执行
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";  //输出捕获的异常消息
	}
	echo 'Hello World';                 //程序没有崩溃继续向下执行
?>

