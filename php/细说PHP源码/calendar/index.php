<html>
	<head>
		<title>《细说PHP》日历示例</title>
		<style>
			table { border:1px solid #050;}            /*给表格加一个外边框*/
			.fontb { color:white; background:blue;}    /*设置周列表的背景和字体颜色*/
			th { width:30px;}                          /*设置单元格子的宽度*/
			td,th { height:30px;text-align:center;}    /*设置单元高度，和字段显示位置*/
			form { margin:0px;padding:0px; }           /*清除表单原有的样式*/
		</style>
	</head>
	<body>
		<?php
			require "calendar.class.php";    //加载日历类
			echo  new Calendar;	             //直接输出日历对象，自动调用魔术方法__toString()打印日历
		?>
	</body>
</html>

