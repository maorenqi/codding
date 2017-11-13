<?php
	class Person {           //声明一个人类，定义人所具有的一些其本的属性和功能成员，做为父类 
		protected $name;         //声明一个存储人的名子的成员
		protected $sex;           //声明一个存储人的性别的成员
		protected $age;           //声明一个存储人的年龄的成员
		
	    	function __construct($name="", $sex="男", $age=1) {  //构造方法用来创建对象并初使化成员属性
			$this->name = $name;           //为成员属性name在创建对象时赋初值
			$this->sex = $sex;              //为成员属性sex在创建对象时赋初值
			$this->age = $age;              //为成员属性age在创建对象时赋初值
		}

		function say(){           //在人类在声明一个通用的说话方法，介绍一下自己
			echo "我的名子叫：".$this->name."， 性别：".$this->sex."， 我的年龄是：".$this->age."。<br>";
		}	
	}

	class Student extends Person {   //声明一个学生类，使用extends关键字扩展（继承）Person类
		private $school;          //在学生类中声明一个所在学校school的成员属性
	
         	//覆盖父类中的构造方法，在参数列表中多添加一个学校属性，用来创建对象并初使化成员属性
	    	function __construct($name="", $sex="男", $age=1, $school="") {   
			//调用父类中被本方法覆盖的构造方法，为从父类中继承过来的属性赋初值
			parent::__construct($name,$sex,$age);  
			$this->school=$school;      //新添一条为子类中新声明的成员属性赋初值
		}

		function study() {        //在学生类中声明一个学生可以学习的方法
			echo $this->name."正在".$this->school."学习<br>";
		}
		//定义一个和父类中同名的方法，将父类中的说话方法覆盖并重写，多说出所在的学校名称
		function say() { 
			parent::say();                         //调用父类中被本方法覆盖掉的方法
			echo "在".$this->school."学校上学<br>";   //再原有的功能基础上多加一点功能
		}	
	}

	$student=new Student("张三","男",20, "edu");    //创建一个学生对象，并多传一个学校名称参数
	$student->say();                            //调用学生类中覆盖父类的说话方法
?>

