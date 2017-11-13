<?php
	function myFun($var){      				 //自定义函数myFun，如果参数能被2整除则返回真
		if($var % 2 == 0)
			return true;
	}	

	$array = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);  //声明值为整数序列的数组
        //使用函数array_filter()将自定义的函数名以字符串的形式传给第二个参数
	print_r(array_filter($array, "myFun")); //过滤后的结果输出Array ( [b] => 2 [d] => 4 ) 
?>

