<?php 
	$lamp = array("Linux", "Apache", "MySQL", "PHP");   //声明一个数组，其中元素值的长度不相同

	usort($lamp, "sortByLen");          		    //使用usort()函数传入用户自定义的回调函数进行数组排序
	print_r($lamp);   	             // 排序后输出：Array ( [0] => PHP [1] => MySQL [2] => Linux [3] => Apache )
	
	function sortByLen($one, $two) {     //自定义的函数做为回调用函数提供给usort()函数使用
		if (strlen($one) == strlen($two))  //如果两个参数长度相等返回0，在数组中位置不变
			return 0;
		else       		     //第一个参数大于第二个参数返回大于0的数，否则返回小于0的数
			return (strlen($one) > strlen($two)) ? 1 : -1;  
	}
?>
