<?php
	class Person {         //声明一个人类Person，其中声明一个构造方法
		//下面是声明人的成员属性，都是没有初值的，在创建对象时，使用构造方法赋初值
		var $name;       //第一个成员属性$name定义人的名子
		var $sex;        //第二个成员属性$sex定义人的性别
		var $age;        //第三个成员属性$age定义人的年龄

		//声明一个构造方法，将来创建对象时，为对象的成员属性赋予初值，参数中都使用了默认参数
		function __construct($name="", $sex="男", $age=1) {
			$this->name = $name;  //在创建对象时，使用传入的参数$name为成员属性$this->name赋初值
			$this->sex = $sex;     //在创建对象时，使用传入的参数$sex为成员属性$this->sex赋初值
			$this->age = $age;     //在创建对象时，使用传入的参数$age为成员属性$this->age赋初值
		}

		//下面是声明人的成员方法
		function say(){ //在类中声明说话的方法，使用$this访问自已对象内部的成员属性
			echo "我的名子叫：".$this->name."， 性别：".$this->sex."， 我的年龄是：".$this->age."。<br>";
		}		

		function run(){ //在类中声明另一个方法 
			echo $this->name."在走路<br>";    //使用$this访问本对象中的$name属性
		}		
	}

	//下面三行中实例化person类的三个实例对象，并使用构造方法分别为新创建的对象成员属性赋予初值
	$person1=new Person("张三", "男", 20); //创建对象$person1时会自动执行构造方法，将全部参数传给它
	$person2=new Person("李四", "女");    //创建对象$person2时会自动执行构造方法，传入前两个参数
	$person3=new Person("王五");         //创建对象$person3时会自动执行构造方法，只传入一个参数

	$person1->say();     //使用$person1访问它中的say()方法
	$person2->say();     //使用$person2访问它中的say()方法
	$person3->say();     //使用$person3访问它中的say()方法
?>

