<?php
	$pattern='/<a.*?(?: |\\t|\\r|\\n)?href=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>(.+?)<\/a.*?>/sim';
	$content="请进单击进入<a href='http://www.brophp.com'>LAMP兄弟连</a>技术社区。";
	
	if(preg_match($pattern, $content)) {    //使用preg_match()函数进行正则表达式的模式匹配
		echo "成功匹配，在第二个参数中包含有效的HTML链接标签字符串。";
	} else {
		echo "在第二个参数的字符串中搜索不到有效的HTML链接标签。";
	} 	


