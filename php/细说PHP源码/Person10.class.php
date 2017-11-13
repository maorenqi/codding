<?php
	class Person  {           	 //声明一个人类Person，其中包含的三个成员属性被封装起来
		//下面是声明人的成员属性，全都使用了private关键字封装
		private $name;      	 //第一个成员属性$name定义人的名子，此属性被封装
		private $sex;        	 //第二个成员属性$sex定义人的性别，此属性被封装
		private $age;         	//第三个成员属性$age定义人的年龄，此属性被封装

		//声明一个构造方法，将来创建对象时，为对象的成员属性赋予初值
	    	function __construct($name="", $sex="男", $age=1) {
			$this->name = $name;  	  	//使用传入的参数$name为成员属性$this->name赋初值
			$this->sex = $sex;      	 //使用传入的参数$sex为成员属性$this->sex赋初值
			$this->age = $age;      	 //使用传入的参数$age为成员属性$this->age赋初值
		}
	     	//当在对象外面使用isset()测定私用成员属性时，自动调用，并在内部测定扣传给外部的isset()结果
		private function __isset($propertyName) {   //需要一个参数，是测定的私有属性的名称
			if($propertyName=="name")         	//如果参数中传入的属性名等于”name’时条件成立
				return false;                  //返回假，不充许在对象外部测定这个属性
			return isset($this->$propertyName);   //其它的属性都可以被测定，并返回测定的结果
   		}
         	//当在对象外面使用unset()方法删除私用属性时，自动被调用，并在内部把私用的成员属性删除
   		private function __unset($propertyName) {   //需要一个参数，是要删除的私有属性名称
			if($propertyName=="name")          //如果参数中传入的属性名等于”name”时条件成立
				return;                       //退出方法，不充许删除对象中的name属性
			unset($this->$propertyName);         //在对象的内部删除在对象外指定的私有属性
		}

		public function say()  //在类中声明说话的方法，将所有的私有属性说出
		{
			echo "我的名子叫：".$this->name."， 性别：".$this->sex."， 我的年龄是：".$this->age."。<br>";
		}		
	}

	$person1=new Person("张三", "男", 40);   //创建一个对象$person1，将成员属性分别赋上初值
	
	var_dump(isset($person1->name));        //输出bool(false)，不充许测定对象是否存在name属性
	var_dump(isset($person1->sex));          //输出bool(true)，使用isset()测定对象中存在sex私有属性
	var_dump(isset($person1->age));          //输出bool(true)，使用isset()测定对象中存在age私有属性
	var_dump(isset($person1->id));           //输出bool(false)，使用isset()测定对象中不存在id属性
	
	unset($person1->name);                //删除对象中的私有属性name，但在__unset()中不充许删除
	unset($person1->sex);                  //删除对象中的私有属性sex，删除成功
	unset($person1->age);                  //删除对象中的私有属性age，删除成功
	
	$person1->say();  //对象中的sex和age属性被删除，输出：我的名子叫：张三， 性别：， 我的年龄是：。
?>

