<?php
	$lamp=array("OS"=>"Linux","WebServer"=>"Apache","Database"=>"MySQL", "Language"=>"PHP");
	print_r(array_reverse($lamp));   //使用array_reverse()函数将数组$lamp中元素的顺序翻转
	//输出结果Array ([Language]=>PHP [Database]=>MySQL [WebServer]=>Apache [OS]=>Linux) 
?>

