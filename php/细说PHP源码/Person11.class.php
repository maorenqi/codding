<?php
	class Person {           //声明一个人类，定义人所具有的一些其本的属性和功能成员，做为父类 
		var $name;         //声明一个存储人的名子的成员
		var $sex;           //声明一个存储人的性别的成员
		var $age;           //声明一个存储人的年龄的成员
		
	    	function __construct($name="", $sex="男", $age=1) {    //构造方法用来创建对象并初使化成员属性
			$this->name = $name;           //为成员属性name在创建对象时赋初值
			$this->sex = $sex;              //为成员属性sex在创建对象时赋初值
			$this->age = $age;              //为成员属性age在创建对象时赋初值
		}

		function say(){           //在人类在声明一个通用的说话方法，介绍一下自己
			echo "我的名子叫：".$this->name."， 性别：".$this->sex."， 我的年龄是：".$this->age."。<br>";
		}	
		
		function run() {          //在人类是声明一个人的通用的走路方法
			echo $this->name."正在走路。<br>";
		}
	}

	class Student extends Person {   //声明一个学生类，使用extends关键字扩展（继承）Person类
		var $school;             //在学生类中声明一个所在学校school的成员属性
		
		function study() {        //在学生类中声明一个学生可以学习的方法
			echo $this->name."正在".$this->school."学习<br>";
		}	
	}

	class Teacher extends Student {  //再声明一个教师类，使用extends关键字扩展（继承）Student类
		var $wage;              //在教师类中声明一个教师工资wage的成员属性
		
		function teaching() {      //在教师类中声明一个教师可以教学的方法
			echo $this->name."正在".$this->school."教学,每月工资为".$this->wage."。<br>";	
		}
	}
	
	$teacher1=new Teacher("张三", "男", 40);   //使用继承过来的构造方法创建一个教师对象
	
	$teacher1->school="edu";        //将一个教师对象中的所在学校的成员属性school赋值
	$teacher1->wage=3000;         //将一个教师对象中的成员属性工资赋值

	$teacher1->say();              //调用教师对象中的说话方法
	$teacher1->study();            //调用教师对象中的学习方法
	$teacher1->teaching();          //调用教师对象中的教学方法
?>

