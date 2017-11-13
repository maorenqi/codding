<?php
	$number=123456789;                   //声明一个数字
	echo number_format($number);           //输出123,456,789千位分隔的字符串
	echo number_format($number, 2);         //输出123,456,789.00小数点后保留两数小数 
	echo number_format($number, 2, ",", ".");   //输出123.456.789,00 千位使用(,)分隔并保留两位小数
?>
