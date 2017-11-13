<?php
     	//按任意数量的空格和逗号分隔字符串，其中包含" ", \r, \t, \n and \f
	$keywords = preg_split ("/[\s,]+/", "hypertext language, programming");
	print_r($keywords);  //分割后输出Array ( [0] => hypertext [1] => language [2] => programming ) 
	
     	//将字符串分割成字符
	$chars = preg_split('//', "lamp", -1, PREG_SPLIT_NO_EMPTY);
	print_r($chars);    //分割后输出Array ( [0] => l [1] => a [2] => m [3] => p ) 
	
	//将字符串分割为匹配项及其偏移量
	$chars = preg_split('/ /','hypertext language programming', -1, PREG_SPLIT_OFFSET_CAPTURE);
	print_r($chars);    
	
	/* 分割后输出Array ( [0] => Array ( [0] => hypertext [1] => 0 ) 
	 *                  [1] => Array ( [0] => language [1] => 10 ) 
	 *                  [2] => Array ( [0] => programming [1] => 19 ) )  */
?>

