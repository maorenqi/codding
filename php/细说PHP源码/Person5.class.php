<?php
	class Person {             //声明一个人类Person，其中包含三个成员属性和两个成员方法
		//下面是声明人的成员属性
		var $name;          //第一个成员属性$name定义人的名子
		var $sex;            //第二个成员属性$sex定义人的性别
		var $age;            //第三个成员属性$age定义人的年龄

		//声明一个构造方法，将来创建对象时，为对象的成员属性赋予初值
		function __construct($name, $sex, $age) {
			$this->name = $name;   //在创建对象时，使用传入的参数$name为成员属性$this->name赋初值
			$this->sex = $sex;      //在创建对象时，使用传入的参数$sex为成员属性$this->sex赋初值
			$this->age = $age;      //在创建对象时，使用传入的参数$age为成员属性$this->age赋初值
		}

		//下面是声明人的成员方法
		function say(){             //在类中声明说话的方法，使用$this访问自已对象内部的成员属性
			echo "我的名子叫：".$this->name."， 性别：".$this->sex."， 我的年龄是：".$this->age."。<br>";
		}		

		function run() {            //在类中声明另一个方法 
			echo $this->name."在走路<br>";    //使用$this访问本对象中的$name属性
		}
		
		function __destruct() {
			echo "再见".$this->name."<br>";
		}		
	}

	//下面三行通过new关键字实例化person类的三个实例对象
	$person1=new Person("张三", "男", 20);     //创建对象$person1 
	$person1=null;              //将第一个对象的引用$person1赋值为其它的值，第一个对象将失去引用
	$person2=new Person("李四", "女", 30);     //创建对象$person2 
	$person3=new Person("王五", "男", 40);      //创建对象$person3 
?>

