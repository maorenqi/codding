<?
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

		function run(){              //在类中声明一个走路方法，调用两个内部的私有方法完成
			echo $this->name."在走路时".$this->leftLeg()."再".$this->rightLeg()."<br>";	
		}
         
		private function leftLeg() {    //声明一个迈左腿的方法，被封装所以只能在内部使用
			return "迈左腿";
		}
         
		private function rightLeg() {   //声明一个迈右腿的方法，被封装所以只能在内部使用
			return "迈右腿";
		}
	}
	$person1=new Person();         //创建对象$person1 
	$person1->run();               //run()的方法没有被封装，所以可以在对象外部使用
	$person1->name="李四";        //name属性被封装，不能在对象外部给私有属性赋值
	echo $person1->age;            //age属性被封装，不能在对象的外部获取私有属性的值
	$person1->leftLeg();            //leftLeg()方法被封装，不能在对象外面调用对象中私有的方法
?>

