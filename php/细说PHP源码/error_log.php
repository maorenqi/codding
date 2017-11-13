<?php   
	if(!Ora_Logon($username, $password)){   
		error_log("Oracle数据库不可用!", 0);        	  //将错误消息写入到操作系统日志中
	}
	if(!($foo=allocate_new_foo()){
		error_log("出现大麻烦了!", 1, "webmaster@www.mydomain.com");   //发送到管理员邮箱中
	}
	error_log("搞砸了!",   2,   "localhost:5000");       	//发送到本机对应5000端口的服务器中
	error_log("搞砸了!",   3,   "/usr/local/errors.log");   //发送到指定的文件中
?>  

