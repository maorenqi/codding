<?php
header("Content-type:text/html;charset=utf-8");
$num=4;
		$num1=2;
		echo $num2=$num/$num1;
	try{
		if($num1==0)
		throw new Exception('分母不能为零');
	}catch (Exception $e){
		echo $e->getMessage();
	}
	echo "<hr />";
class MyException {
	private $name = "";
	function _constrcuct($name = ""){
		$this->name = $name;
	}
	function say(){
		echo "Hello,".$this->name."!<br>";
	}
	function _tostring(){
		return   "111Hello,".$this->name."!<br>";
	}

}
$wBlog =new MyException('maomao');
echo $wBlog ;
$wBlog->say();