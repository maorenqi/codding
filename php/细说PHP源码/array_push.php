<?php
	$lamp=array("Web");             	//声明一个数当作为栈，数为数组array_push()函数第一个参数
	echo array_push($lamp,"Linux");   	//将字符串”Linux”压入数组$lamp中，返回数组中元素个数2
	print_r($lamp);                		//输出数组中（栈）成员：Array ( [0] => Web [1] => Linux )

     	//又连续压入三个数据到数组$lamp的尾部
	echo array_push($lamp,"Apache", "MySQL", "PHP");    //输出栈中元素的长度为5
	print_r($lamp);    //输出： Array ( [0] => Web [1] => Linux [2] => Apache [3] => MySQL [4] => PHP )

	$lamp=array("a"=>"Linux","b"=>"Apache");    	    //带有字符串键的数组
	echo array_push($lamp,"MySQL","PHP");     	     //压入两个元素到数组的尾部, 输出栈长度为4
	print_r($lamp);    // Array ( [a] => Linux [b] => Apache [0] => MySQL [1] => PHP )   //也是数字键
   
    	$lamp["web"]="www";   //使用array_push()函数和使用这种直接赋值初使化数组的方式是一样的
	print_r($lamp);       //Array ( [a] => Linux [b] => Apache [0] => MySQL [1] => PHP [web] => www )
?>

