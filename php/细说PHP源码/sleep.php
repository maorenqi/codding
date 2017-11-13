<?php
	class Person {        //声明一个Person类，包含三个成员属性和一个成员方法
		private $name;   //人的名子
		private $sex;     //人的性别
		private $age;     //人的年龄
	
		function __construct($name="", $sex="", $age="") {   //构造方法为成员属性赋初值
			$this->name=$name;
			$this->sex=$sex;
			$this->age=$age;
		}

		function say()  {              //这个人可以说话的方法, 说出自己的成员属性
			echo "我的名子叫：".$this->name." 性别：".$this->sex." 我的年龄是：".$this->age."<br>";
		}

		function __sleep() {            //在类中添加此方法，在串行化时自动调用并返回数组
			$arr=array("name", "age");  //数组中的成员$name和$age将被串行化，成员$sex则被忽略
			return($arr);              //返回一个数组
		} 
		
		function __wakeup() {          //在反串行化对象时自动调用该方法，没有参数也没有返回值
			 $this->age = 40;         //在重新组织对象时，为新对象中的$age属性重新赋值
		}
	}

	$person1=new Person("张三", "男", 20);        //通过Person类实例化对象，对象引用名为$person1
	//把一个对象串行化，返一个字符串，调用了__sleep()方法,忽略没在数组中的属性$sex
	$person_string=serialize($person1); 
	echo $person_string."<br>";                  //输出对象串行化的字符串
 
   	 //反串行化对象，并自动调用了__wakup()方法重新为新对象中的$age属性赋值
	$person2=unserialize($person_string);          //反串行化对象形成对象$p2重新赋值$age为40
	$person2->say();                           //调用新对象中say()方法输出的成员中已没有$sex属性了
?>

