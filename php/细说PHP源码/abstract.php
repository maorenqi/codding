<?php
	abstract class Person {             //声明一个抽象类，要使用abstract关键字标识
		protected $name;             //声明一个存储人的名子的成员
		protected $country;           //声明一个存储人的国家的成员
			
	    	function __construct($name="", $country="china") {  //构造方法用来创建对象并初使化成员属性
			$this->name = $name;                      //为成员属性name在创建对象时赋初值
			$this->country = $country;                  //为成员属性country在创建对象时赋初值
		}
 
		abstract function say();   //在抽象类中声明一个没有方法体的抽象方法，使用abstract关键字标识
	
		abstract function eat();   //在抽象类中声明另一个没有方法体的抽象方法，使用abstract关键字标识
		
		function run(){         //在抽象类中可以声明正常的非抽象的方法
			echo "使用两条腿走路<br>";                //有方法体，输出一条语句
		}
	}
?> 

