<?php	
	/*
	 * 声明了一个矩形子类，根据矩形的特点实现了形状抽象类中的周长和面积方法
	 */
	class Rect extends Shape {  	
		private $width=0;           //声明矩形的成员属性宽度
		private $height=0;          //声明矩形的成员属性高度

		/*
		 * 矩形的构造方法，用表单$_POST中接收的高度和宽度初使化矩形对象
		 */
		function __construct() {    
			$this->shapeName="矩形";    //为形状命名

			//通过从shape中继承的方法validate(),对矩形的宽度和高度进行验证
			if( $this->validate($_POST["width"], "宽度") & $this->validate($_POST["height"], "高度") ) {
				$this->width=$_POST["width"];   //通过超全局数组$_POST将表单输入的宽度给成员属性width赋初值
				$this->height=$_POST["height"];  //通过超全局数组$_POST将表单输入高度给成员属性height赋初值
			} 

		
		}

		/*
		 *  按矩形面积的计算公式，实现抽象类shape中的抽象方法area()
		 */
		function area() {                     
			return $this->width*$this->height;   //访问该方法时，返回矩形的面积
		}

		/*
		 * 按矩形周长的计算公式，实现抽象类shape中的抽象方法perimeter()
		 */
		function perimeter() {         
			return 2*($this->width+$this->height);   //访问该方法时，返回矩形的周长
		}
	}
