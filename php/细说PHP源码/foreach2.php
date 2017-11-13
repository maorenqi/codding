<?php
        //声明一个一维的关联数组$contact, 使用“=>”运算符指定了每个元素的字符串下标
	$contact = array("ID" => 1,
		"姓名" => "高某",
		"公司" => "A公司",
		"地址" => "北京市",
		"电话" => "(010)98765432",
		"EMAIL" => "gao@php.com" 
	);
	//以HTML列表的方式输出数组中每个元素的信息
	echo '<dl>一个联系人信息：';
	foreach($contact as $key => $value){       //使用foreach的第二种格式，可以获取数组元素的键/值
		echo "<dd> $key : $value </dd>";   //输出每个元素的键/值对
	}
	echo '</dl>';
?>

