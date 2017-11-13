<?php
	$url = "http://www.lampbrother.net";               //定义一个网络文件的位置
	fopen($url,"r")	or die("Unable to connect to $url");  //如果打开失败则输出一条消息并退出程序
?>
