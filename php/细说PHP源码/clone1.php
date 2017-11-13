<?php
	class Person {    //声明类Person，并在其中声明了三个成员属性，一个构造方法以及一个成员方法
		private $name;     //第一个私有成员属性$name用于存储人的名子
		private $sex;       //第二个私有成员属性$sex用于存储人的性别
		private $age;       //第三个私有成员属性$age用于存储人的age

		function __construct($name="", $sex="", $age=1) {  //构造方法在对象诞生时为成员属性赋初值
			$this->name=$name;
			$this->sex=$sex;
			$this->age=$age;
		}

		function say()  {       //一个成员方法用于打印出自己对象中全部的成员属性值
			echo "我的名子叫：".$this->name." 性别：".$this->sex." 我的年龄是：".$this->age."<br>";
		}
	}

	$p1=new Person("张三", "男", 20);   //创建一个对象并通过构造方法为对象中所有成员属性赋初值
	$p2=clone $p1;                   //使用clone关键字克隆（复制）对象，创建一个对象的副本
    	 // $p3=$p1                       //这不是复制对象，而是为对象多复制出一个访问该对象的引用
	$p1->say();                      //调用原对象中的说话方法，打印原对象中的全部属性值
	$p2->say();                      //调用副本对象中的说话方法，打印出克隆对象的全部属性值
?>

