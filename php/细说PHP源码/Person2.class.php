<?php
	class Person           //声明一个人类Person，其中包含三个成员属性和两个成员方法
	{
		//下面是声明人的三个成员属性
		var $name;       //第一个成员属性$name定义人的名子
		var $sex;        //第二个成员性性$sex定义人的性别
		var $age;        //第三个成员性成定义人的年龄

		//下面是声明人的两个成员方法
		function say()    //这个人可以说话的方法
		{
			echo "这个人在说话<br>";   //在方法体中可以有更多内容
		}		

		function run()     //这个人可以走路的方法
		{
			echo "这个人在走路<br>";   //在方法体中可以有更多内容
		}		
	}

	//下面三行通过new关键字实例化person类的三个实例对象
	$person1=new Person();  //通过类Person创建第一个实例对象$person1
	$person2=new Person();  //通过类person创建第二个实例对象$person2
	$person3=new Person();  //通过类person创建第三个实例对象$person3

	//下面三行是给$person1对象中属性初使化赋值
	$person1->name="张三";     //将对象person1中的$name属性赋值为张三 
	$person1->sex="男";        //将对象person1中的$sex属性赋值为男
	$person1->age=20;          //将对象person1中的$age属性赋值为20

	//下面三行是给$person2对象中属性初使化赋值
	$person2->name="李四";     //将对象person2中的$name属性赋值为李四
	$person2->sex="女";        //将对象person2中的$sex属性赋值为女
	$person2->age=30;          //将对象person2中的$age属性赋值为30

	//下面三行是给$person3对象中属性初使化赋值
	$person3->name="王五";     //将对象person3中的$name属性赋值为王五
	$person3->sex="男";        //将对象person3中的$sex属性赋值为男
	$person3->age=40;          //将对象person3中的$age属性赋值为40
	
	//下面三行是访问$person1对象中的成员属性
	echo "person1对象的名子是：".$person1->name."<br>";  //输出对象$person1中的成员属性$name的值
	echo "person1对象的性别是：".$person1->sex."<br>";    //输出对象$person1中的成员属性$sex的值
	echo "person1对象的年龄是：".$person1->age."<br>";    //输出对象$person1中的成员属性$age的值

	//下面两行访问$person1对象中的方法
	$person1->say();          //访问第一个对象$person1中的成员方法say(),让第一个人说话
	$person1->run();          //访问第一个对象$person1中的成员方法run(),让第一个人走路

	//下面三行是访问$person2对象中的成员属性
	echo "person2对象的名子是：".$person2->name."<br>";  //输出对象$person2中的成员属性$name的值
	echo "person2对象的性别是：".$person2->sex."<br>";    //输出对象$person2中的成员属性$sex的值
	echo "person2对象的年龄是：".$person2->age."<br>";    //输出对象$person2中的成员属性$age的值

	//下面两行访问$person2对象中的方法
	$person2->say();          //访问第二个对象$person2中的成员方法say(),让第二个人说话
	$person2->run();          //访问第二个对象$person2中的成员方法run(),让第二个人走路

	//下面三行是访问$person3对象中的成员属性
	echo "person3对象的名子是：".$person3->name."<br>";  //输出对象$person3中的成员属性$name的值
	echo "person3对象的性别是：".$person3->sex."<br>";    //输出对象$person3中的成员属性$sex的值
	echo "person3对象的年龄是：".$person3->age."<br>";    //输出对象$person3中的成员属性$age的值

	//下面两行访问$person3对象中的方法
	$person3->say();          //访问第三个对象$person3中的成员方法say(),让第三个人说话
	$person3->run();          //访问第三个对象$person3中的成员方法run(),让第三个人走路
?>

