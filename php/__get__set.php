<?php
/* $str = "lamp";
$number = 789;
$format = "The %2\$s book contains %1\$d pages.That is a nice %2\$s full of %1\$d pages.<br>";
 
printf($format,$number,$str);*/
//4个魔术方法的测试用例  __set() __get() __isset() __unset()
header("Content-type:text/html;charset=utf-8");
class Person{
	private $name;
	private $age;
	private $sex;
	
	function  __construct($name="", $age = 10, $sex = "男"){
		$this->name = $name;
		$this->age = $age;
		$this->sex = $sex;
	}
	
	public function __set($propertyName,$propertyValue){
		if($propertyName=="sex"){
			if(!($propertyValue=="男"||$propertyValue=='女')){
				return;
			}
		}
		if($propertyName=='age'){
			if($propertyValue<0||$propertyValue>150){
				return;
			}
		} 
		$this->$propertyName = $propertyValue; //此处要注意
	}
	
	public function __get($propertyName){
		if($propertyName == 'sex'){
			return "保密";
		}else if($propertyName=='age'){
			if($this->age>30)
				return $this->age-10;
			else
				return $this->$propertyName;
		}else{
			return $this->$propertyName;
		}
	}
	
	public function __isset($propertyName){
		if($propertyName=='name'){
			return false;
		}
		return isset($this->$propertyName);
	}
	
	public function __unset($propertyName){
		if($propertyName=="name"){
			return;	
		}
		unset($this->$propertyName);
	}
	
	public function say(){
		echo "my name is :".$this->name.", sex:".$this->sex.", age is :".$this->age.".<br>";
	}
}
$p = new Person();
$p->name="张三"; 
$p->age=80;
$p->sex='女';
$p->say();


//直接获取私有属性的值，会自动调用__get()方法，返回成员属性的值 
echo "姓名：".$p->name."<br>"; 
echo "性别：".$p->sex."<br>"; 
echo "年龄：".$p->age."<br>"; 
