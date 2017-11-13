<?php 
	$data = array(                   	 //声明一个$data数组，模拟了一个行和列数组
	  		array("id" => 1, "soft" => "Linux", "rating" => 3),
			array("id" => 2, "soft" => "Apache", "rating" => 1),
			array("id" => 3, "soft" => "MySQL", "rating" => 4),
			array("id" => 4, "soft" => "PHP", "rating" => 2),
		); 
	//使用foreach遍历创建两个数组作为array_multisort的参数
	foreach ($data as $key => $value) {
		$soft[$key] = $value["soft"];     //将$data中的每个数组元素中键值为soft的值形成数组$soft
		$rating[$key] = $value["rating"];  //将每个数组元素中键值为rating的值形成数组$rating
	}

	array_multisort($rating, $soft, $data);   //使用array_multisort()函数传入三个数组进行排序
	print_r($data);                      	  //输出排序后的二维数组
?>
