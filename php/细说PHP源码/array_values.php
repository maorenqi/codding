<?php
	$contact = array("ID" => 1,
		"姓名" => "高某",
		"公司" => "A公司",
		"地址" => "北京市",
		"电话" => "(010)98765432" );
	
	print_r(array_values($contact));   // array_values()函数传入数组$contact重新索引返回一个新数组
	print_r($contact);                 //原数组$contact内容元素不变
?>

