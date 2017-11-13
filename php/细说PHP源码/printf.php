<?php
	$str = "LAMP";             //声明一个字符串数据
	$number = 789;             //声明一个整型数据
     
	//将字符串$str在第一个参数中的%处输出，按%s的字符串输出，整型$number按%u输出
	printf("%s book. page number %u <br>",$str,$number);       
	printf("%0.3f <br>",$number);  //将整型$number按浮点数输出，并在小数点后保留3位

	$format = "The %2\$s book contains %1\$d pages.
           That's a nice %2\$s full of %1\$d pages. <br>";   //定义一个格式并在其中使用占位符
	printf($format, $number, $str);  //按格式的占位符号输出多次变量，%2$s位置处是第三个参数
?>

