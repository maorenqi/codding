<?php
	$lamp=array("Linux", "Apache", "MySQL", "PHP");     //声明一个索引数组$lamp包含4个元素
	//使用array_slice()从第二个开始取(0是第一个，1为第二个)，取两个元素从数组$lamp中返回
	print_r(array_slice($lamp,1,2));                    //输出：Array ( [0] => Apache [1] => MySQL )
	//第二个参数使用负数参数为-2，从后面第二个开始取，返回一个元素
	print_r(array_slice($lamp,-2,1));                   //输出： Array ( [0] => MySQL ) 
	//最后一个参数设置为 true，保留原有的键值返回
	print_r(array_slice($lamp,1,2,true));               //输出：Array ( [1] => Apache [2] => MySQL ) 

	$lamp=array("a"=>"Linux","b"=>"Apache","c"=>"MySQL","d"=>"PHP");     //声明一个关联数组
   	//如果数组有字符串键，默认所返回的数组将保留键名
	print_r(array_slice($lamp,1,2));                    //输出：Array ( [b] => Apache [c] => MySQL ) 
?>

