<?php
	$userName="Admin";                     //声明一个字符串作为用户名
	$password="lampBrother";                 //声明一个字符串作为密码

	if(strcasecmp($userName, "admin")==0) {    //不区分大小写的比较，如果两个字符串相等返回0
		echo "用户名存在";
	}
     	//将两个比较的字符串使用相应的函数转成全大写或全小写后，也可以实现不区分大小写的比较
     	if(strcasecmp(strtolower($userName), strtolower("admin"))==0) {   
		echo "用户名存在";
	}

	switch(strcmp($password, "lampbrother"))              //区分字符串中字母的大小写比较
	{
		case 0:                                      //两个字符串相等则返回0
			echo "两个字符串相等<br>";
			break;
		case 1:                                      //第一个字符串大时则返回1
			echo "第一个字符串大于第二个字符串<br>";
			break;
		case -1:                                      //第一个字符串小时则返回-1
			echo "第一个字符串小于第二个字符串<br>";
	}
?>

