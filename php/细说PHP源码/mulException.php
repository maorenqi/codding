<?php
	/* 自定义的一个异常处理类，但必须是扩展内异常处理类的子类 */
	class MyException extends Exception{
		//重定义构造器使第一个参数 message 变为必须被指定的属性
		public function __construct($message, $code=0){
			//可以在这里定义一些自己的代码
			//建议同时调用 parent::construct()来检查所有的变量是否已被赋值
			parent::__construct($message, $code);
		}
		//重写父类中继承过来的方法，自定义字符串输出的样式
		public function __toString() {
			return __CLASS__.":[".$this->code."]:".$this->message."<br>";
		}

		//为这个异常自定义一个处理方法
		public function customFunction() {
			echo "按自定义的方法处理出现的这个类型的异常";
		}
	}
	
	/* 创建一个用于测试自定义扩展的异常类MyException */
	class TestException {
		public $var;                      //一个成员属性，用来判断对象是否创建成功被初使化

		function __construct($value=0) {     //通过构造方法的传值决定抛出的异常
			switch($value){              //对传入的值进行选择性的判断
				case 1:                 //如果传入的参数值为1，则抛出自定义的异常对象
					throw new MyException("传入的值“1” 是一个无效的参数", 5);
					break;
				case 2:                //如果传入的参数值为2，则抛出PHP内置的异常对象
					throw new Exception("传入的值“2”不允许作为一个参数", 6);
					break;
				default:                //如果传入的参数值合法，则不抛出异常创建对象成功 
					$this->var=$value;  //为对象中的成员属性赋值
					break;
			}
		}
	}
     	//示例1，在没有异常时，程序正常执行，try中的代码全部执行并不会执行任何catch区块
	try{
		$testObj=new TestException();           //使用默认参数创建异常的测试类对象
		echo "***********<br>";               //没有抛出异常这条语句就会正常执行
	}catch(MyException $e){                    //捕获用户自定义的异常区块
		echo "捕获自定义的异常：$e <br>";     //按自定义的方式输出异常消息
		$e->customFunction();                 //可以调用自定义的异常处理方法
	}catch(Exception $e) {                      //捕获PHP内置的异常处理类的对象
		echo "捕获默认的异常：".$e->getMessage()."<br>";   //输出异常消息
	} 	
	var_dump($testObj);          //判断对象是否创建成功，如果没有任何异常，则创建成功

    	//示例2，抛出自定义的异常，并通过自定义的异常处理类捕获这个异常并处理
	try{
		$testObj1=new TestException(1);         //传入参数1时，创建测试类对象抛出自定义异常
		echo "***********<br>";               //这个语句不会被执行
	}catch(MyException $e){                    //这个catch区块中的代码将被执行
		echo "捕获自定义的异常：$e <br>";
		$e->customFunction();
	}catch(Exception $e) {                      //这个catch区块不会执行
		echo "捕获默认的异常：".$e->getMessage()."<br>";
	} 	
	var_dump($testObj1);                      //有异常产生，这个对象没有创建成功

    	//示例2，抛出内置的异常，并通过自定义的异常处理类捕获这个异常并处理
	try{
		$testObj2=new TestException(2);        //传入参数2时，创建测试类对象抛出内置异常
		echo "***********<br>";             //这个语句不会被执行
	}catch(MyException $e){                  //这个catch区块不会执行
		echo "捕获自定义的异常：$e <br>";
		$e->customFunction();
	}catch(Exception $e) {                    //这个catch区块中的代码将被执行
		echo "捕获默认的异常：".$e->getMessage()."<br>";
	} 	
	var_dump($testObj2);                    //有异常产生，这个对象没有创建成功
?>
