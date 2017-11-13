<?php
	/* 自定义的一个异常处理类，但必须是扩展内异常处理类的子类 */
	class MyException extends Exception{
		//重定义构造器使第一个参数 message 变为必须被指定的属性
		public function __construct($message, $code=0){
			//可以在这里定义一些自己的代码
			//建议同时调用 parent::construct()来检查所有的变量是否已被赋值
			parent::__construct($message, $code);
		}
		
		public function __toString() {        //重写父类方法，自定义字符串输出的样式
			return __CLASS__.":[".$this->code."]:".$this->message."<br>";
		}
		
		public function customFunction() {    //为这个异常自定义一个处理方法
			echo "按自定义的方法处理出现的这个类型的异常<br>";
		}
	}
	
	try {                                //使用自定义的异常类捕获一个异常，并处理异常
		$error = '允许抛出这个错误';       
		throw new MyException($error);    //创建一个自定义的异常类对象，通过throw语句抛出
		echo 'Never executed';             //从这里开始，try代码块内的代码将不会再被执行
	} catch (MyException $e) {             //捕获自定义的异常对象
		echo '捕获异常: '.$e;              //输出捕获的异常消息
		$e->customFunction();            //通过自定义的异常对象中的方法处理异常
	}
	echo '你好呀';                        //程序没有崩溃继续向下执行
?>
