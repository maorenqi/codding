<?php
     $lamp=array("a"=>"Linux","b"=>"Apache","c"=>"MySQL","d"=>"PHP");  //只使第一个必需的参数
	print_r(array_keys($lamp));            //输出：Array ( [0] => a [1] => b [2] => c )
	print_r(array_keys($lamp,"Apache"));   //使用第二个可选参数输出：Array ( [0] => b)

	$a=array(10,20,30,"10");               //声明一个数组，其中元素的值有整数10和字符串”10”
	print_r(array_keys($a,"10",false));    //使用第三个参数 (false)输出：Array ( [0] => 0 [1] => 3 )
	
	$a=array(10,20,30,"10");               //声明一个数组，其中元素的值有整数10和字符串”10”
	print_r(array_keys($a,"10",true));     //使用第三个参数 (true)输出：Array ( [0] => 3)	
?>

