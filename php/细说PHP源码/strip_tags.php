<?php
	$str="<font color='red' size=7>Linux</font> <i>Apache</i> <u>Mysql<u> <b>PHP</b>";
	
	echo strip_tags($str);              	   //删除了全部HTML标签，输出：Linux Apache Mysql PHP
	echo strip_tags($str, "<font>");	   //输出<font color='red' size=7>Linux</font> Apache Mysql PHP
	echo strip_tags($str, "<b><u><i>");  	   // 输出Linux <i>Apache</i> <u>Mysql<u> <b>PHP</b>
?>

