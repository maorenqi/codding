<?php
	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, 2);      	 //原数组中的第二个元素后到数组结尾都被删除
	print_r($input);                 //输出：Array ( [0] => Linux [1] => Apache )

	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, 1, -1);     //从第二个开始移除直到数组末尾倒数1个为止中间所有的元素
	print_r($input);                 //输出：Array ( [0] => Linux [1] => PHP )

	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, 1, count($input), "web");      //从第二个元素到数组结尾都被第4个参数替代
	print_r($input);                                    //输出：Array ( [0] => Linux [1] => web )

	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, -1, 1, array("web", "www"));  //最后一个元素被第4个参数数组替代
	print_r($input); //输出：Array ( [0] => Linux [1] => Apache [2] => MySQL [3] => web [4] => www )
?>

