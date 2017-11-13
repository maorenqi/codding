<?php
	class MyClass {                     //声明一个类作为父类使用，将它的成员都声明为私有的
		private $var1=100;              //声明一个私有的成员属性并给初值为100

		private function printHello() {    //声明一个成员方法使用private关键字设置为私有的
			echo "hello<br>";         //在方法中只有一条输出语句作为测试使用
		}
	}

	class MyClass2 extends MyClass {     //声明一个MyClass类的子类试图访问父类中的私有成员
		function useProperty()          //在类中声明一个公有方法，访问父类中的私有成员
		{
			echo "输出从父类继承过来的成员属性值".$this->var1."<br>";    //访问父类中的私有属性
			$this->printHello();                                         //访问父类中的私有方法
		}
	}

	$subObj=new MyClass2();          //初例化出子类对象
	$subObj->useProperty();            //调用子类对象中的方法实现对父类私有成员的访问
?>

