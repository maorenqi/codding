<?php
	$data = array(5=>"five",8=>"eight",1=>"one",7=>"seven",2=>"two");  //声明一个键值混乱的数组
	
	ksort($data);      //使用ksort()函数按照键名对数组$data进行由小到大的排序
	print_r($data);    //输出：Array ( [1] => one [2] => two [5] => five [7] => seven [8] => eight )

	krsort($data);     //使用krsort()函数按照键名对数组$data进行由大到小的排序
	print_r($data);    //输出：Array ( [8] => eight [7] => seven [5] => five [2] => two [1] => one )
?>
