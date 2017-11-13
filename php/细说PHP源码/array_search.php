<?php
	$lamp=array("a"=>"Linux","b"=>"Apache","c"=>"MySQL","d"=>"PHP");  
	echo array_search("PHP",$lamp);  //输出：d  （在数组$lamp中，存在字符串"php"则输出下标d）

	$a=array("a"=>"8","b"=>8,"c"=>"8");
	echo array_search(8,$a,true);   //输出：b （严格按类型检索，整型8对应的下标为b）
?>

