<?php
	function myFun1($v) {       //自定义一个函数作为回调函数，接收数组中每个元素做为参数
		if ($v==="MySQL") {   //如果数组中元素的值恒等于MySQL条件成功
 			return "Oracle";    //返回Oracle
		}
		return $v;             //不等于MySQL的元素都返回传入的值，即原型返回
	}

	$lamp=array("Linux","Apache","MySQL","PHP");   //声明一个有4个元素的数组$lamp
	
	print_r(array_map("myFun1",$lamp));   //使用array_map()函数传入一个函数名和一个数组参数
	/*上面程序执行后输出Array ( [0] => Linux [1] => Apache [2] => Oracle [3] => PHP ) */
	
	//使用多个参数, 回调函数接受的参数数目应该和传递给array_map()函数的数组数目一致
	function myFun2($v1,$v2) {   		  //自定义一个函数需要两个参数，两个数组中的元素依次传入
		if ($v1===$v2) {         	  //如果两个数组中的元素值相同则条件成功
			return "same";       	  //返回same, 说明两个数组中对应的元素值相同
		}
		return "different";         	  //如果两个数组中对应的元素值不同，返回different
	}
	
	$a1=array("Linux","PHP","MySQL");  	  //声明数组$a1,有三个元素
	$a2=array("Unix","PHP","Oracle");    	  //数组$a第二个元素值和$a中第二个元素的值相同
	
	print_r(array_map("myFun2",$a1,$a2)); 	  //使用array_map()函数传入多个数组
	/*上面程序执行后输出：Array ( [0] => different [1] => same [2] => different ) */
	
	//当自定义函数名设置为 null 时的情况
	$a1=array("Linux","Apache");         	 //声明一个数组$a1, 有两个元素
	$a2=array("MySQL","PHP");         	 //声明另一个数组$a2,也有两个元素

	print_r(array_map(null,$a1,$a2));     	 //通过第一个参数设置为NULL，构造一个数组的数组
	/*上面程序执行后输出：Array ( 
		[0] => Array ( [0] => Linux [1] => MySQL ) 
		[1] => Array ( [0] => Apache [1] => PHP ) ) */ 
?>

