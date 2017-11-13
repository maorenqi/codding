<html>
	<head>
		<title>图形计算(使用面向对象技术开发)</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	</head>

	<body>
			<center>
				<h1>图形（周长&面积）计算器</h1>
				<a href="index.php?action=rect">矩形</a>  ||
				<a href="index.php?action=triangle">三角形</a> ||
				<a href="index.php?action=circle">圆形</a> 
				<hr>
			</center>
			
	<?php
		//设置错误报告的级别，除了无关紧要的"注意",其它的所有报告都输出
		error_reporting(E_ALL & ~E_NOTICE);

		//通过魔术方法__autoload()去自动加载所需要的类文件，将需要的类包含进来
		function __autoload($className){
			include strtolower($className).".class.php";   //包含类所在的文件		
		}

		echo new Form("index.php");	   //输出用户需要的表单
	
		//如果用户提交表单则去计算
		if(isset($_POST["sub"])) {
			echo new Result();         //输出形状的计算结果	
		}
	?>
			
	</body>
</html>
