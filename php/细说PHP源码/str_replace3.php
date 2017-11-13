<?php
	$search=array("http","www", "jsp", "com");  //搜索目标数组
	$replace=array("ftp", "bbs", "php", "net");    //替换数组
	$url="http://www.jspborther.com/index.jsp";  //被替换的字符串
	echo str_replace($search, $replace, $url);     //输出替换后的结果：ftp://bbs.phpborther.net/index.php 
?>
