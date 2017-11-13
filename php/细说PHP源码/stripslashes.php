<html>
	<head>
		<title>HTML表单</title>
	</head>
	
	<body>
		<form action="" method="post">
			请输入一个字符串：
			<input type="text" size="30" name="str" value="<?php echo html2Text($_POST['str']) ?>">
			<input type="submit" name="submit" value="提交"><br>
		</form>
		<?php
			if(isset($_POST["submit"])) {      //如果用户提交表单下面代码将被执行
                   		//输出原型<b><u>this is a \"test\"</u></b>，浏览器对其解析
				echo "原型输出：".$_POST['str']."<br>";
     
              			//转换为实体：&lt;b&gt;&lt;u&gt;this is a \&quot;test\&quot;&lt;/u&gt;&lt;/b&gt;
				echo "转换实例：".htmlspecialchars($_POST['str'])."<br>";	

                   		//删除引号前面的斜线：<b><u>this is a "test"</u></b><br>
				echo "删除斜线：".stripslashes($_POST['str'])."<br>";	
 
                   		//输出：&lt;b&gt;&lt;u&gt;this is a &quot;test&quot;&lt;/u&gt;&lt;/b&gt;
				echo "删除斜线和转换实体：".html2Text($_POST['str'])."<br>";
			}

			function html2Text($input) {     //自定一个函数，复合的方式处理表单提交的数据
				return htmlspecialchars(stripslashes($input));   //返回两个函数结合处理的字符串
			}
		?>	
	</body>
</html>

