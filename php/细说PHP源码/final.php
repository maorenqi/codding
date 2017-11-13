<?php
    class MyClass {                //声明一个类MyClass作为父类，在类中只声明一个成员方法
		final function fun() {       //声明一个成员方法并使用final标识，则不能在子类中覆盖
			//方法体中的内容略
		}
	}
	
	class MyClass2 extends MyClass { //声明继承MyClass类的子类，在类中声明一个方法去覆盖父类中的方法
		function fun() {           //在子类中试图去覆盖父类中已被final标识的方法，结果出错
			//方法体中的内容略
		}
	}	
?>

