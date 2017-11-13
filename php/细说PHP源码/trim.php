<?php
	$str="   lamp  ";  //声明一个字符串，其中左侧有3个空格，右侧2个空格，总长度为9个字符
	echo strlen($str);            //输出字符串的总长度 9
	echo strlen(ltrim($str));       //去掉左侧空格后的长度输出为 6
	echo strlen(rtrim($str));       //去掉右侧空格后的长度输出为 7
	echo strlen(trim($str));        //去掉两侧空格后的长度输出为 4

	$str="123 This is a test ...";    //声明一个测试字符串，左侧为数字开头，右侧为省略号“…”
	echo ltrim($str, "0..9");       //过滤掉字符串左侧的数字，输出：This is a test ...
	echo rtrim($str, ".");         //过滤掉字符串右侧的所有“.”，输出：123 This is a test
	echo trim($str, "0..9 A..Z .");  //过滤掉字符串两端的数字和大写字母还有“.”，输出：his is a test
?>
