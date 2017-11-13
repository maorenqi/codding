<?php
	$data = array("l"=>"Linux", "a"=>"Apache","m"=>"MySQL","p"=>"PHP");
	
	asort($data);     //使用asort()函数将数组$data按元素的值升序排序，并保留原有的键名和值
	print_r($data);   //输出：Array ( [a] => Apache [l] => Linux [m] => MySQL [p] => PHP )

	arsort($data);    //使用arsort()函数将数组$data按元素的值降序排序，并保留原有的键名和值
	print_r($data);   //输出：Array ( [p] => PHP [m] => MySQL [l] => Linux [a] => Apache )
	
	rsort($data);     //使用asort()函数将数组$data按元素的值降序排序，但原始键名被忽略
	print_r($data);   //输出：Array ( [0] => PHP [1] => MySQL [2] => Linux [3] => Apache ) 
?>
