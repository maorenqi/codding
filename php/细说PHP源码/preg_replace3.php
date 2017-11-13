<?php
	$pattern="/(<\/?)(\w+)([^>]*>)/e";        //可以匹配所有HTML标记的开始和结束的正则表达式
	$text="这个文本中有<b>粗体</b>和<u>带有下划线</u>以及<i>斜体</i>还有<font color='red' size='7'>带有颜色和字体大小</font>的标记";                //声明一个带有多个HTML标记的文本
	echo preg_replace($pattern, "'\\1'.strtoupper('\\2').'\\3'", $text); //将所有HTML的小写标记替换为大写
?>
