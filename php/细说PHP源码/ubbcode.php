<?php
//声明带有UBB代码的文本
$text="将本行本文本[b]加粗[/b]
	将本行文本改为[i]斜体[/i]
	将本行文本加上[u]下划线[/u]
	本行文字大小为[size=7][color=red]7号字，红色[/color][/size]
	[align=center]将本行居中[/align]
	链接到[url=http://bbs.lampbrother.net/]LAMP兄弟连[/url]
	[url]这个链接很长将被截断这个链接很长将被截断这个链接很长将被截断[/url]
	给[email=skygao@lampbrother.net]高洛峰[/email]发信
	在此处差入[img]http://bbs.lampbrother.com/images/Sharp/logo.gif[/img]图片
	[b][i][u][align=center]本行为加粗、斜体并带有下划线，而且居中的文字[/align][/u][/i][/b]";

//调用自定义的将UBB代码转换为HTML代码的函数
echo UBBCode2Html($text);
 
function UBBCode2Html($text) {   //通过自定义的函数将UBB代码转换为HTML代码格式
	//声明一个正则表达式的模式数组，将传给preg_replace()函数的第一个参数
$pattern=array('/(\r\n)|(\n)/', '/\[b\]/i', '/\[\/b\]/i',               //匹配换行和UBB代码中的[b]和[/b]
		'/\[i\]/i', '/\[\/i\]/i', '/\[u\]/i', '/\[\/u\]/i',                   //匹配UBB代码中的[i]和[u]
		'/\[font=([^\[\<]+?)\]/i',                             //匹配UBB代码中的[font]
		'/\[color=([#\w]+?)\]/i',                             //匹配UBB代码中的[color]
		'/\[size=(\d+?)\]/i',                                 //匹配UBB代码中的[size]
		'/\[size=(\d+(\.\d+)?(px|pt|in|cm|mm|pc|em|ex|%)+?)\]/i',  //匹配UBB代码中的[size]其它单位
		'/\[align=(left|center|right)\]/i',                       //用来匹配UBB代码中的[align]
		'/\[url=www.([^\["\']+?)\](.+?)\[\/url\]/is',               //用来匹配UBB代码中的[url]
		'/\[url=(https?|ftp|gopher|news|telnet){1}:\/\/([^\["\']+?)\](.+?)\[\/url\]/is',
		'/\[email\]\s*([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+)\s*\[\/email\]/i',  //匹配[email]
		'/\[email=([a-z0-9\-_.+]+)@([a-z0-9\-_]+[.][a-z0-9\-_.]+)\](.+?)\[\/email\]/is', //匹配[email]		
		'/\[img\](.+?)\[\/img\]/',                             //匹配UBB代码中的[img]和[/img]
		'/\[\/color\]/i', '/\[\/size\]/i', '/\[\/font\]/i','/\[\/align\]/'       //匹配UBB代码中的一些结束标记
		);
     //声明一个替换数组，并将其传入preg_replace()函数中的第二个参数，和上面数组的内容对应
	$replace=array('<br>','<b>', '</b>',                   //替换换行标记和UBB中的[b]和[/b]标记
		'<i>', '</i>', '<u>', '</u>',                       //替换UBB代码中的[i]和[u]标记
		'<font face="\\1">',                           //替换UBB代码中的[font]标记
		'<font color="\\1">',                          //替换UBB代码中的[color]标记
		'<font size="\\1">',                           //替换UBB代码中的[size]标记
		'<font style=\"font-size: \\1\">',                 //替换UBB代码中的[size]其它单位
		'<p align="\\1">',                             //替换UBB代码中的[align]标记
		'<a href="http://www.\\1" target="_blank">\\2</a>',  //替换UBB代码中的[url]标记
		'<a href="\\1://\\2" target="_blank">\\3</a>',       //替换UBB代码中的[url]标记
		'<a href="mailto:\\1@\\2">\\1@\\2</a>',          //替换UBB代码中的[email]标记
		'<a href="mailto:\\1@\\2">\\3</a>',              //替换UBB代码中的[email]标记
		'<img src="\\1">',                            //替换UBB代码中的[img]标记
		'</font>', '</font>', '</font>', '</p>'              //替换UBB代码中的一些结束标记
	);
	return preg_replace($pattern, $replace, $text);
}
?>
