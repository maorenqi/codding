<?php   
	function __autoload($className) {                   		 //在方件的上方声明一个自动加载类的方法
		include("class_" . ucfirst($className) . ".php");    	 //在方法中使用include包含类所在的文件
	}
	
	$obj  = new User();  	//User类不存在则自动调用__autoload()函数，将类名“User”做为参数传入
	$obj2 = new Shop();	//Shop类不存在则自动调用__autoload()函数，将类名“Shop”做为参数传入
?>      

