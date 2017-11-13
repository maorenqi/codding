<html>
	<body>
		<?php
			$str = "<B>WebServer:</B> & 'Linux' & 'Apache'"; //常有HTML标记和单引号的字符串
			echo htmlspecialchars($str, ENT_COMPAT);      //转换HTML标记和转换双引号
			echo "<br>\n";
			echo htmlspecialchars($str, ENT_QUOTES);      //转换HTML标记和转换两种引号
			echo "<br>\n";
			echo htmlspecialchars($str, ENT_NOQUOTES);   //转换HTML标记和不对引号转换
		?>
	</body>
</html>

