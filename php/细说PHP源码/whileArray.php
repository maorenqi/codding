<?php
        //声明一个一维的关联数组$contact
	$contact = array("ID" => 1,
		"姓名" => "高某",
		"公司" => "A公司",
		"地址" => "北京市",
		"电话" => "(010)98765432",
		"EMAIL" => "gao@php.com" 
	);
	//以HTML列表的方式输出数组中每个元素的信息
	echo '<dl>一个联系人信息：';
	while( list($key, $value) = each($contact)){  //将foreach语句改写成while、list()和each()的组合
		echo "<dd> $key : $value </dd>";      //输出每个元素的键/值对
	}
	echo '</dl>';
?>

