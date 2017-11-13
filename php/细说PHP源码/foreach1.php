<?php
        //使用array()结构声明一个无序的一维数组$contact
	$contact = array( 1, 14=>"高某", "A公司", "北京市", 14=>"(010)98765432", "gao@php.com" );
	$num=0;                                                       //声明一个变量$num初使值为0，做为循环的计数使用
        //使用foreach语句遍历一维数组$contact，将数组中每个元素输出
	foreach($contact as $value){
		echo "在数组\$contact中第 $num 元素是：$value <br>";  //每次循环输出一次当前元素
		$num++;                                               //计数变量累加
	}
?>

