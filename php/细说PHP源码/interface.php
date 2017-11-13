<?php
	interface One {                              //声明一个接口使用interface关键字，One为接口名称
		const CONSTANT = 'CONSTANT value';    //在接口中声明一个常量成员属性，和在类中声明一样
		function fun1();                         //在接口中声明一个抽象方法“fun1()”
		function fun2();                         //在接口中声明另一个抽象方法“fun2()”
	}

	abstract class Three implements One {          //声明一个抽象类去实现接口One中的第二个方法
		function fun2() {                       //只实现接口中的一个抽象方法
			//具体的实现内容由子类自决定
		}
	}

	class Four implements One {                 //声明一个类实现接口One中的全部抽象方法
		function fun1() {                      //实现接口中第一个方法
			//具体的实现内容由子类自决定
		}	

		function fun2() {                     //实现接口中的第二个方法
			//具体的实现内容由子类自决定
		}
	}
?>
