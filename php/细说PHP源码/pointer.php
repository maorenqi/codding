<?php
    	//声明一个一维的关联数组$contact, 使用“=>”运算符指定了每个元素的字符串下标
	$contact = array("ID" => 1,
		"姓名" => "高某",
		"公司" => "A公司",
		"地址" => "北京市",
		"电话" => "(010)98765432",
		"EMAIL" => "gao@php.com" 
	);
	//数组刚声明时，数组指针在数组中第一个元素位置
	//使用key()和current()函数传入数组$contact，返回数组中当前元素的键和值
	echo '第一个元素：'.key($contact).' => '.current($contact).'<br>';    //输出：第一个元素：ID => 1
	echo '第一个元素：'.key($contact).' => '.current($contact).'<br>';    //数组指针没有移动，输出同上
	
	next($contact);    //将数组$contact中的指针向下一个元素移动一次，指向第二个元素的位置
	next($contact);    //将数组$contact中的指针向再下一个元素移动一次，指向第三个元素的位置
	echo '第三个元素：'.key($contact).' => '.current($contact).'<br>';   //输出第三个元素的键和值
	
	end($contact);    //再将数组$contact中的指针移动到最后，指向最后一个元素
	echo '最后一个元素：'.key($contact).' => '.current($contact).'<br>';  //输出最后一个元素的键和值
	
	prev($contact);   //将数组$contact中的指针倒回一位，指向最后第二个元素
	echo '最后第二个元素：'.key($contact).' => '.current($contact).'<br>'; //输出最后第二个元素的键和值
	
	reset($contact);  //再将数组$contact中的指针重置到第一个元素的位置，指向第一个元素
	echo '又回到了第一个元素：'.key($contact).' => '.current($contact).'<br>'; //输出第一个元素的键和值
?>

