<?php
	class Person {             //声明一个人类Person，其中包含三个成员属性和两个成员方法
		//下面是声明人的成员属性
		var $name;          //第一个成员属性$name定义人的名子
		var $sex;            //第二个成员属性$sex定义人的性别
		var $age;           //第三个成员属性$age定义人的年龄

		//下面是声明人的成员方法
		function say(){     //在类中声明说话的方法，使用$this访问自已对象内部的成员属性
			echo "我的名子叫：".$this->name."， 性别：".$this->sex."， 我的年龄是：".$this->age."。<br>";
		}		

		function run(){      //在类中声明另一个方法 
			echo $this->name."在走路<br>";    //使用$this访问$name属性
		}		
	}

	//下面三行通过new关键字实例化person类的三个实例对象
	$person1=new Person();       //通过类Person创建第一个实例对象$person1
	$person2=new Person();       //通过类person创建第二个实例对象$person2
	$person3=new Person();       //通过类person创建第三个实例对象$person3

	//下面三行是给$person1对象中属性初使化赋值
	$person1->name="张三";     //将对象person1中的$name属性赋值为张三 
	$person1->sex="男";         //将对象person1中的$sex属性赋值为男
	$person1->age=20;          //将对象person1中的$age属性赋值为20

	//下面三行是给$person2对象中属性初使化赋值
	$person2->name="李四";     //将对象person2中的$name属性赋值为李四
	$person2->sex="女";         //将对象person2中的$sex属性赋值为女
	$person2->age=30;          //将对象person2中的$age属性赋值为30

	//下面三行是给$person3对象中属性初使化赋值
	$person3->name="王五";     //将对象person3中的$name属性赋值为王五
	$person3->sex="男";        //将对象person3中的$sex属性赋值为男
	$person3->age=40;          //将对象person3中的$age属性赋值为40

	$person1->say();     //使用$person1访问它中的say()方法，方法say()中的$this就代表这个对象$person1
	$person2->say();     //使用$person2访问它中的say()方法，方法say()中的$this就代表这个对象$person2
	$person3->say();     //使用$person3访问它中的say()方法，方法say()中的$this就代表这个对象$person3
?>

