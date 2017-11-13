<?
	class Person  {            //声明一个人类Person，其中包含的三个成员属性被封装起来
		//下面是声明人的成员属性，全都使用了private关键字封装
		private $name;       //第一个成员属性$name定义人的名子，此属性被封装
		private $sex;         //第二个成员属性$sex定义人的性别，此属性被封装
		private $age;         //第三个成员属性$age定义人的年龄，此属性被封装

		//声明一个构造方法，将来创建对象时，为对象的成员私有属性赋予初值
	    	function __construct($name="", $sex="男", $age=1) {
			$this->name = $name;    //使用传入的参数$name为成员属性$this->name赋初值
			$this->sex = $sex;       //使用传入的参数$sex为成员属性$this->sex赋初值
			$this->age = $age;       //使用传入的参数$age为成员属性$this->age赋初值
		}
		
		public  function getName() {   //通过这个公有方法可以在对象外部获取私有属性$name的值
			return $this->name;      //返回对象的私有属性的值
		}
		
		public function setSex($sex) {  //通过这个公有方法在对象外部为私有属性$sex设置值，但限制条件
			if($sex=="男" || $sex=="女")   //如果传入合法的值才为私有的属性赋值
				$this->sex=$sex;        //条成立则将参数传入的值赋给私有属性
		}

		public function setAge($age) { //通过这个公有方法在对象外部为私有属性$age设置值，但限制条件
			if($age > 150 || $age <0)      //如果设置不合理的年龄则函数不往下执行
				return;                //返回空值，退出函数
			$this->age=$age;            //执行此语句则重新为私有属性赋值
		}

		public function getAge(){    //通过这个公有方法可以在对象外部获取私有属性$name的值
			if($this->age > 30)           //如果年龄的成员属性大于30则返回虚假的年龄
				return $this->age-10;     //返回当前的年龄减去10岁
			else                       //如果年龄在30岁以下则返回真实年龄
				return $this->age;       //返回当前的私有年龄属
		}

		//下面是声明人的成员公有方法，说出自己所有的私有属性
		function say(){   //在类中声明说话的方法，使用$this访问自已对象内部的成员属性
			echo "我的名子叫：".$this->name."， 性别：".$this->sex."， 我的年龄是：".$this->age."。<br>";
		}		
	}
	
	$person1=new Person("王五", "男", 40);  //创建对象$person1
	echo $person1->getName()."<br>";      //访问对象中的公有方法，获取对象中私有属性$name输出
	$person1->setSex("女");               //通过公有的方法为私有属性$sex设置合法的值
	$person1->setAge(200);               //通过公有的方法为私有属性$age设置非法的值，赋值失败
	echo $person1->getAge()."<br>";       //访问对象中的公有方法，获取对象中私有属性$age输出
	$person1->say();                    //访问对象中的公有方法，获取对象中所有的私有属性并输出
?>

