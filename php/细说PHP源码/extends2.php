<?php
	class MyClass {                      //声明一个类作为父类使用，将它的成员都声明为保护的
		protected $var1=100;             //声明一个保护的成员属性并给初值为100

		protected function printHello() {    //声明一个成员方法使用protected关键字设置为保护的
			echo "hello<br>";           //在方法中只有一条输出语句作为测试使用
		}
	}

	class MyClass2 extends MyClass {     //声明一个MyClass类的子类试图访问父类中的保护成员
		function useProperty()          //在类中声明一个公有方法，访问父类中的保护成员
		{
			echo "输出从父类继承过来的成员属性值".$this->var1."<br>";   //访问父类中受保护的属性
			$this->printHello();                                        //访问父类中受保护的方法
		}
	}

	$subObj=new MyClass2();          //初例化出子类对象
	$subObj->useProperty();            //调用子类对象中的方法实现对父类保护的成员访问
     	echo $subObj->var1;               //试图访问类中受保护的成员，结果出错
?>

