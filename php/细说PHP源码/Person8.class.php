<?php
	class Person  {            //声明一个人类Person，其中包含的三个成员属性被封装起来
		//下面是声明人的成员属性，全都使用了private关键字封装
		private $name;       //第一个成员属性$name定义人的名子，此属性被封装
		private $sex;         //第二个成员属性$sex定义人的性别，此属性被封装
		private $age;         //第三个成员属性$age定义人的年龄，此属性被封装

		//声明一个构造方法，将来创建对象时，为对象的成员属性赋予初值
	    	function __construct($name="", $sex="男", $age=1) {
			$this->name = $name;    //使用传入的参数$name为成员属性$this->name赋初值
			$this->sex = $sex;       //使用传入的参数$sex为成员属性$this->sex赋初值
			$this->age = $age;       //使用传入的参数$age为成员属性$this->age赋初值
		}
		//声明魔术方法需要两个参数，真接为私有属性赋值时自动调用，并可以屏蔽一些非法赋值
		private function __set($propertyName, $propertyValue) { 
			if($propertyName=="sex"){        //如果第一个参数是属性名sex则条件成立
				if(!($propertyValue == "男" || $propertyValue == "女"))  //第二个参数只能是男或女
					return;                //如果是非法参数返回空，则结束方法执行
			}	

			if($propertyName=="age"){        //如果第一个参数是属性名age则条件成立
				if($propertyValue > 150 || $propertyValue <0)  //第二个参数只能在0到150之间的整数
					return;                //如果是非法参数返回空，则结束方法执行
			}
              //根据参数决定为那个属性被赋值，传入不同的成员属性名，赋上传入的相应的值
			$this->$propertyName = $propertyValue; 
		} 
		
		//下面是声明人类的成员方法,设置为公有的可以在任何地方访问
		public function say(){ //在类中声明说话的方法，将所有的私有属性说出
			echo "我的名子叫：".$this->name."， 性别：".$this->sex."， 我的年龄是：".$this->age."。<br>";
		}		
	}

	$person1=new Person("张三", "男", 20); 
	//自动调用了__set()函数，将属性名name传给第一个参数，将属性值”李四”传给第二个参数
	$person1->name="李四";     //赋值成功
	//自动调用了__set()函数，将属性名sex传给第一个参数，将属性值”女”传给第二个参数
	$person1->sex="女";         //赋值成功
   	//自动调用了__set()函数，将属性名age传给第一个参数，将属性值80传给第二个参数
	$person1->age=80;          //赋值成功
	
	$person1->sex="保密";       //“保密”是一个非法值，这条语句给私有属性sex赋值失败
	$person1->age=800;         //800是一个非法值，这条语句私有属生age赋值失败

	$person1->say();	           //调用$person1对象中的say()方法，查看一下所有被重新设置的新值
?>

