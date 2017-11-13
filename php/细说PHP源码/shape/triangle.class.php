<?php	
	/**
		Project: 面向对象版图形计算器 
		file: triangle.class.php
		声明了一个三角形子类，根据三角形的特点实现了形状抽象类中的周长和面积方法
		package:shape
	 */
	class Triangle extends Shape {  	
		private $side1 = 0;                           //声明三角形第一个边的成员属性
		private $side2 = 0;                           //声明三角形第二个边的成员属性
		private $side3 = 0;                           //声明三角形第三个边的成员属性

		/*
		 * 三角形的构造方法，用表单$_POST中接收的三边值初使化三角形对象
		 */
		function __construct() { 
			$this->shapeName="三角形";          //为形状命名
			
			//通过从shape中继承的方法validate(),对三角形的第一边进行验证
			if($this->validate($_POST["side1"], "第一个边") & $this->validate($_POST["side2"], "第二个边") & $this->validate($_POST["side3"], "第三个边")) {
				//通过本类内部的私有方法validateSum(),验证三角形的两边之和是否大于第三边
				if($this->validateSum($_POST["side1"],$_POST["side2"],$_POST["side3"])) {
					$this->side1 = $_POST["side1"]; 		
					$this->side2 = $_POST["side2"]; 		
					$this->side3 = $_POST["side3"]; 		
				}else {
					echo '<font color="red" >三角形的两边之和要大于第三边</font><br>';
				}
			}

		}

		/*
		 * 按三角形面积的计算公式(海伦公式)，实现抽象类shape中的抽象方法area()
		 */
		function area() {
			$s=($this->side1+$this->side2+$this->side3)/2;
			return sqrt( $s*($s - $this->side1)*($s - $this->side2)*($s - $this->side3) );  //返回三角形的面积
		}

		/*
		 * 按三角形周长的计算公式，实现抽象类shape中的抽象方法perimeter()
		 */
		function perimeter() {   
			return  $this->side1+$this->side2+$this->side3;                       //返回三角形的周长
		}

		/*
		 * 本类内部声明一个私有方法validateSum(),用于验证三角形的两边之和是否大于第三边
		 */
		private function validateSum($s1, $s2, $s3){

			//如果三角形任意两个边的和大于第三个边返回true, 否则返回false
			if( (($s1 + $s2) > $s3) && (($s1 + $s3) > $s2) && (($s2 + $s3) > $s1) ) {
				return true;
			}else{
				return false;
			}	
		}
	}

	
	
	

