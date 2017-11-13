<?php
	$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");   //元音字符数组
	//将第三个参数中的字符串，搜索到的数组中的元素值都被替换为空，区分大写小替换
	echo str_replace($vowels, "", "Hello World of PHP");          //输出Hll Wrld f PHP
	
	$vowels = array("a", "e", "i", "o", "u");                      //元音字符数组
     	//将第三个参数中的字符串，搜索到的数组中的元素值都被替换为空，不区分大写小替换
	echo str_ireplace($vowels, "", "HELLO WORLD OF PHP");    	// HLL WRLD F PHP
?>
