<?php
	class ChineseMan extends Person {     //声明一个类去继承抽象类Person
		function say() {                //将父类中的抽象方法覆盖，按自已的需求去实现
			echo $this->name."是".$this->country."人，讲汉语<br>";      //实现的内容
		}

		function eat() {                 //将父类中的抽象方法覆盖，按自已的需求去实现
			echo $this->name."使用筷子吃饭<br>";                    //实现的内容
		}
	}

	class Americans extends Person {      //声明另一个类去继承抽象类Person
		function say() {                //将父类中的抽象方法覆盖，按自已的需求去实现
			echo $this->name."是".$this->country."人，讲英语<br>";     //实现的内容
		}

		function eat() {                //将父类中的抽象方法覆盖，按自已的需求去实现
			echo $this->name."使用刀子和叉子吃饭<br>";              //实现的内容
		}
	}

	$chineseMan = new ChineseMan("高洛峰", "中国");      //将第一个Person的子类实例化对象
	$americans =new Americans("alex", "美国");             //将第二个Person的子类实例化对象

	$chineseMan->say();              //通过第一个对象调用子类中已经实例父类中抽象方法的say()方法
	$chineseMan->eat();               //通过第一个对象调用子类中已经实例父类中抽象方法的eat()方法

	$americans->say();               //通过第二个对象调用子类中已经实例父类中抽象方法的say()方法
	$americans->eat();                //通过第二个对象调用子类中已经实例父类中抽象方法的eat()方法
?>  

