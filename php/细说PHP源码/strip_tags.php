<?php
	$str="<font color='red' size=7>Linux</font> <i>Apache</i> <u>Mysql<u> <b>PHP</b>";
	
	echo strip_tags($str);              	   //ɾ����ȫ��HTML��ǩ�������Linux Apache Mysql PHP
	echo strip_tags($str, "<font>");	   //���<font color='red' size=7>Linux</font> Apache Mysql PHP
	echo strip_tags($str, "<b><u><i>");  	   // ���Linux <i>Apache</i> <u>Mysql<u> <b>PHP</b>
?>

