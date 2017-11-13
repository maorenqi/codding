<?php
	$search_array = array('first' => 1, 'second' => 4);     //声明一个关联数组，其中包含两个元素
	
	if (array_key_exists('first', $search_array)) {         //检查下标为first对应的元素是否在数组中
   		echo "键名为'first'的元素在数组中";
	}
	
	$search_array = array('first' => null, 'second' => 4);  //声明一个关联数组，第一个元素的值为NULL

	isset($search_array['first']);                          //使用isset()函数检索下标为first的元素，返回false  
	array_key_exists('first', $search_array);               //使用array_key_exists()检索下标为first的元素，返回true
?>  

