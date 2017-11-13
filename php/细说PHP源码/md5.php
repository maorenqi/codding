<?php
	$password= "lampbrother";          //定义一个字符串作为密码，加密后保存到数据库中
	echo md5($password)."<br>";       //输出MD5加密后的值：5f1ba7d4b4bf96fb8e7ae52fc6297aee

	if (md5($password) == '5f1ba7d4b4bf96fb8e7ae52fc6297aee') {  //将输入的密码和数据库保存的匹配
  		echo "密码一致，登录成功";                         //如果相同则会输出这条信息
  	}
?>

