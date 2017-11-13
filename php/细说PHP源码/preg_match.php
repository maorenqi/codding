<?php
	$pattern='/(https?|ftps?):\/\/(www)\.([^\.\/]+)\.(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/i';    //正则表达式
	$subject="网址为http://www.lampbrother.net/index.php的位置是LAMP兄弟连";  //被搜索字符串
	
	if(preg_match($pattern, $subject, $matches)) {       //使用preg_match()函数进行匹配
		echo "搜索到的URL为：".$matches[0]."<br>";   //数组中第一个元素保存全部匹配结果
		echo "URL中的协议为：".$matches[1]."<br>";   //数组中第二个元素保存第一个子表达式
		echo "URL中的主机为：".$matches[2]."<br>";   //数组中第三个元素保存第二个子表达式
		echo "URL中的域名为：".$matches[3]."<br>";   //数组中第四个元素保存第三个子表达式
		echo "URL中的顶域为：".$matches[4]."<br>";   //数组中第五个元素保存第四个子表达式
		echo "URL中的文件为：".$matches[5]."<br>";   //数组中第六个元素保存第五 个子表达式
	} else {
		echo "搜索失败！";            //如果和正则表达式没有匹配成功则输出此条语句
	} 	
?>
