<?php
	$data = array("file1.txt", "file11.txt", "File2.txt", "FILE12.txt", "file.txt");
	
	natsort($data);      //普通的“自然排序”
	print_r($data);      //输出排序后的结果，数组中包括大小写，输出不是正确的排序结果

	natcasesort($data);  //忽略大小写的“自然排序”
	print_r($data);      //输出“自然排序”后的结果，正常结果
?>

