<?php
	$search=array("http","www", "jsp", "com");  //����Ŀ������
	$replace=array("ftp", "bbs", "php", "net");    //�滻����
	$url="http://www.jspborther.com/index.jsp";  //���滻���ַ���
	echo str_replace($search, $replace, $url);     //����滻��Ľ����ftp://bbs.phpborther.net/index.php 
?>
