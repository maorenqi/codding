<?php
	class MyClass {   //声明一个MyClass类，在类中声明一个常量，和一个成员方法
		 const CONSTANT = 'CONSTANT value';     //使用const声明一个常量，并直接赋上初使值

   		 function showConstant() {                 //声明一个成员方法并在其内部访问本类中的常量
       			 echo  self::CONSTANT."<br>";   //使用self访问常量，注意常量前不要加“$”
   		 }
	}

	echo MyClass::CONSTANT . "<br>";             //在类外部使用类名称访问常量，也不要加”$”
	$class = new MyClass();                        //通过类MyClass创建一个对象引用$class
	$class->showConstant();                        //调用对象中的方法
	// echo $class::CONSTANT;                     //通过对象名称访问常量是不允许的
?>

