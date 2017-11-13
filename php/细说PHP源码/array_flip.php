<?php
	$lamp=array("OS"=>"Linux","WebServer"=>"Apache","Database"=>"MySQL", "Language"=>"PHP"); 

	//输出：Array ( [Linux] => OS [Apache] => WebServer [MySQL] => Database [PHP] => Language )
	print_r(array_flip($lamp));              //使用array_flip()函数交换数组中的键和值

 	//在数组中如果元素的值相同，则使用array_flip()会发生冲突
	$trans = array("a" => 1, "b" => 1, "c" => 2);
	print_r(array_flip($trans));              //现在 $trans 变成了： Array( [1] => b [2] => c)
?>

