<?
	//带有字符串键值的关联数组
	$lamp=array("a"=>"Linux", "b"=>"Apache", "c"=>"MySQL", "d"=>"PHP");
	echo array_shift($lamp);  //删除数组第一个元素并返回，输出Linux
	print_r ($lamp);          //字符串键值保持不变：Array ( [b] => Apache [c] => MySQL [d] => PHP )

	//带有数字键的索引数组
	$lamp=array("Linux", "Apache", "MySQL", "PHP");
	echo array_shift($lamp);   //删除数组第一个元素并返回，输出Linux
	print_r ($lamp);           //数字下标重新索引Array ( [0] => Apache [1] => MySQL [2] => PHP ) 
?>

