<?php	
	/*
	 * 声明一个形状的抽象类，作为所有形状的父类，里面有两个抽象方法,根据子类的形状去实现
	 */
	abstract class Shape {  		   
		public $shapeName;
		abstract function area();         //声明的抽象方法在子类中实现它，用来计算不同图型的面积
		abstract function  perimeter();   //声明的抽象方法在子类中实现它，用来计算不同图型的周长

		/*
		 * 该方法是一个普通方法用来对所有形状表单输入的值进行验证
		 * 参数$value: 接收表单输入的值，对该值进行验证
		 * 参数$message:消息提示的前缀
		 * 返回值：验正通过返回true, 失败则返回false
		 */
		protected function validate($value, $message = '形状输入的值' ){
			if( $value=="" || !is_numeric($value) || $value < 0 ) {
				$message=$this->shapeName.$message;
				echo '<font color="red">'.$message.'必须为非负值的数字，并且不能为空</font><br>';
				return false;
			}else{
				return true;
			}
		}
	}
