<?php
	class MyClass {                 //声明一个MyClass类，用来演示如何使用静态成员
		static $count;               //在类中声明一个静态成员属性count，用来统计对象被创建的次数

		function __construct() {      //每次创建一个对象就会自动调用一次这个构造方法
			self::$count++;	       //使用self访问静态成员count，使其自增1
		}

		static function getCount() {   //声明一个静态方法，在类外面直接使用类名就可以调用
			return self::$count;     //在方法中使用self访问静态成员并返回
		}
	}
	
	MyClass::$count=0;            //在类外面使用类名访问类中的静态成员，为其初使化赋值0

	$myc1=new MyClass();         //通过MyClass类创建第一个对象，在构造方法中将count累加1
	$myc2=new MyClass();         //通过MyClass类创建第二个对象，在构造方法中又为count累加1
	$myc3=new MyClass();         //通过MyClass类创建第三个对象，在构造方法中再次为count累加1
     
	echo MyClass::getCount();      //在类外面使用类名访问类中的静态成员方法，获取静态属性的值 3
     	echo $myc3->getCount();       //通过对象也可以访问类中的静态成员方法，获取静态属性的值 3
?>

