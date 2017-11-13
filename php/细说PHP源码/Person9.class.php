<?php
	class Person  {            //声明一个人类Person，其中包含的三个成员属性被封装起来
		//下面是声明人的成员属性，全都使用了private关键字封装
		private $name;       //第一个成员属性$name定义人的名子，此属性被封装
		private $sex;         //第二个成员属性$sex定义人的性别，此属性被封装
		private $age;         //第三个成员属性$age定义人的年龄，此属性被封装

		//声明一个构造方法，将来创建对象时，为对象的成员属性赋予初值
	    	function __construct($name="", $sex="男", $age=1) {     //使用了默认参数
			$this->name = $name;    //使用传入的参数$name为成员属性$this->name赋初值
			$this->sex = $sex;       //使用传入的参数$sex为成员属性$this->sex赋初值
			$this->age = $age;       //使用传入的参数$age为成员属性$this->age赋初值
		}
		//在类中添加__get()方法，在直接获取属性值时自动调用一次，以属性名作为参数传入并处理
		private function __get($propertyName)  {    //在方法前使用private修饰，防止对象外部调用 
			 if($propertyName=="sex") {          //如果参数传入的是”sex”则条件成立
				return "保密";                  //不让别人获取到性别，以“保密”替代
			 } else  if($propertyName=="age") {    //如果参数传入的是“age”则条件成立
				if($this->age > 30)               //如果对象中的年龄大于30时条件成立
					return $this->age-10;	       //返回对象中虚假的年龄，比真实年龄小10岁
				else                           //如果对象中的年龄不大于30时则执行下面代码
					return $this->$propertyName;  //让访问都可以获取到对象中真实的年龄
			 } else {                            //如果参数传入的是其它属性名则条件成立
			 	return $this->$propertyName;      //对其它属性都没有限制，可以直接返回属性的值
			 } 
		}
	}

	$person1=new Person("张三", "男", 40);   //通过Person类实例化的对象，并通过构造方法为属性赋初值
	
	echo "姓名：".$person1->name."<br>";   //直接访问私有属性name，自动调用了__get()方法可以间接获取
	echo "性别：".$person1->sex."<br>";    //自动调用了__get()方法，但在方法中没有返回真实属性值
	echo "年龄：".$person1->age."<br>";    //自动调用了__get()方法，根据对象本身的情况会返回不同的值
?>

