<html>
	<head><title>添加联系人</title></head>
	<body>
		<form action="add.php" method="post"> <!--将表单以POST方法提交到add.php页面 -->
			编号：<input type="text" name="id"><br>        <!-- 表单域的名称为id -->
			姓名：<input type="text" name="name"><br>      <!-- 表单域的名称为name -->
			公司：<input type="text" name="company"><br>   <!-- 表单域的名称为company -->
			地址：<input type="text" name="address"><br>   <!-- 表单域的名称为address -->
			电话：<input type="text" name="phone"><br>     <!-- 表单域的名称为phone -->
			EMAIL:<input type="text" name="email"><br>     <!-- 表单域的名称为email -->
			<input type="submit" value="添加新联系人">
		</form>
	</body>
</html>
<?php
	echo "用户添加的联系人信息如下：<br>";
	foreach($_POST as $key => $value) { 		  //使用foreach语句遍历超全局数组$_POST
		echo $key.' : '.$value.'<br>';     	  //输出$_POST数组中的键和值，键即是表单域的名称
	}
?>

