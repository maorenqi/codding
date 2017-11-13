<?php
	$pattern="/<[\/\!]*?[^<>]*?>/is";      	     //可以匹配所有HTML标记的开始和结束的正则表达式
	$text="这个文本中有<b>粗体</b>和<u>带有下划线</u>以及<i>斜体</i>还有<font color='red' size='7'>带有颜色和字体大小</font>的标记";  //声明一个带有多个HTML标记的文本
	echo preg_replace($pattern, "", $text);	     //将所有HTML标记替换为空，即删除所有HTML标记
	echo "<br>";                          	     //输出换行
	echo preg_replace($pattern, "", $text, 2);   //通过第四个参数传入数字2，替换前两个HTML标记
?>
