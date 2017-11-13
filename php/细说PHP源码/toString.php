<?php
	class TestClass {                 //声明一个测试类，在类中声明一个成员属性和一个__toString()方法
   		private $foo;                //在类中声明的一个成员方法

    		function __construct($foo) {  //通过构造方法传值为成员属性赋初值
        		$this->foo = $foo;      //为成员属性赋值
   		}
  
		public function __toString() {  //在类中定义一个__toString方法 
        		return $this->foo;       //返回一个成员属性$foo的值
		}
	}

	$obj = new TestClass('Hello');     //创建一个对象并赋值给对象引用$obj
	echo $obj;                     //直接输出对象引用则自动调用了对象中的__toString()方法输出Hello
?>

