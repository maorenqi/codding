<?php
	function getFileName($url) {
         	//获取URL字符串中最后一个“/”出现的位置，再加1则为文件名开始的位置
		$location=strrpos($url, "/")+1;       
		$fileName=substr($url, $location);      //获取在URL中从$location位置取到结尾的子字符串
		return $fileName;                 	//返回获取到的文件名称
	}

	echo getFileName("http://bbs.lampbrother.net/index.php");             //获取网页文件名index.php
	echo getFileName("http://bbs.lampbrother.com/images/Sharp/logo.gif"); //获取网页中图片名logo.gif
	echo getFileName("file:///C:/WINDOWS/php.ini");                       //获取本地中的文件名php.ini
?>
