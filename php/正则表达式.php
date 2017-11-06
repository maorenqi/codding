<?php
/* p319
\d	匹配任意十进制数，等价于[0-9]
\D	匹配任意一个除十进制数字以外的字符，等价于[^0-9]
\s	匹配任意一个空白字符，等价于[\f\n\r\t\v]
\S	匹配除空白字符以外任意一个字符，等价于[^\f\n\r\t\v]
\w	匹配任意一个数字、字母和下划线，等价于[0-9a-zA-Z]
\W	匹配除数字、字母或下画线以外的任意一个字符，等价于[^0-9a-zA-Z]
*	匹配0次、1次或多次其前的原子
+	匹配1次或多次其前的原子
?	匹配0次或1次其前的原子
.	匹配除了换行符外的任意一个字符
|	匹配两个或多个分支选择
{n}	表示其前面的原子恰好出现n次
{n,}	表示其前面的原子出现不少于n次
{n,m}	表示其前面的原子至少出现n次，最多出现m次
^或^A	匹配输入字符串的开始位置
$或\z	匹配输入字符串的结束位置
\b		匹配单词的边界
\B		匹配方括号中指定的任意一个原子
[]		匹配方括号中指定的的任意一个字符
[^]		匹配除方括号中的原子以外的任意一个字符
()		匹配其整体为一个原子

/[0-9a-zA-Z_]+@[0-9a-zA-Z_]+(\.[0-9a-zA-Z]+){0,3}$/	等价于
/^\w+@\w+(\.\w+){0,3}$/ 

界定符
/a\s*b/	//匹配在a和b之间没有空白、有一个或多个空白情况
/a\d+b/	a2b	a34453b
/a\W?b/	ab	a#b a%b/
/ax{4}b/	axxxxb
/ax{2,}b/	axxb	axxxxb
/ax{2,4}b/	axxb 	axxxb	axxxxb

边界限制
/^this/	//匹配此字符串是否以字符串"this"开始的，匹配成功
/test$/		//test结束
/\bis\b/	//是否含有单词“is”
/\Bis\b/	//查找字符串"is"时，左边不能为边界而右边必须有边界，如"this"匹配成功

句号
/a.b/	//匹配在a和b之间有任意一个字符的字符串  axb ayb azb

模式选择符（|）
Linux |apache|MySQL

原子表[]
/[apj]sp/	//aps psp jsp
/[^apj]sp/	//除aps psp jsp外的字符串， xsp ysp zsp
原子表中可以使用负号"-"连接一组按ASCII码顺序排列的原子，能够简化书写。
/0[xX][0-9a-fA-F]+/		//0x2f	0X3AF


模式单元
使用元字符"()"将多个原子组成大的原子，被当做人个单元独立使用
/(very )*good/		//very good 		 very very good

后向引用
/^\d{4}\w\d{2}\w\d{2}$/	//2008-08/08	或2008/08-08
/^\d{4}(\w)\d{2}\\1\d{2}$/	//2008-08-08	或2008/08/08



*/
$subject='http://www.baidu.com/index.php';  
$pattern='/(\w+):\/\/(\w+)\.(\w+)\.(\w+)\/(\w+\.\w+)/';  

if(preg_match($pattern,$subject,$matches)){  
	echo "URL:".$matches[0]."<br>";  
	echo "协议:".$matches[1]."<br>";  
	echo "主机:".$matches[2]."<br>";  
	echo "域名:".$matches[3]."<br>";  
	echo "顶域:".$matches[4]."<br>";  
	echo "文件:".$matches[5]."<br>";  
}else{  
	echo "NOT FOUND";  
} 






$subject='百度地址http://www.baidu.com/index.php  
		谷歌地址http://www.google.com/index.php  
		搜狐地址http://www.sohou.com/index.php';  
$pattern='/(http?|ftps?):\/\/(www|bbs)\.(\w+)\.(com|net|org)(\/\w+\.\w+)?/i';  
  
$count=1;  
//这个函数不仅能获取整个URL地址，还可以通过正则表达式的模式获取每个组成部分。
if(preg_match_all($pattern,$subject,$matches,PREG_SET_ORDER)){  
	foreach($matches as $vals){  
		echo "第".$count."个的URL:".$vals[0]."<br>";  
		echo "第".$count."个的协议:".$vals[1]."<br>";  
		echo "第".$count."个的主机:".$vals[2]."<br>";  
		echo "第".$count."个的域名:".$vals[3]."<br>";  
		echo "第".$count."个的顶域:".$vals[4]."<br>";  
		echo "第".$count."个的文件:".$vals[5]."<br>";  
		  
		$count++;  
	}  
}else{  
	echo "NOT FOUND";  
} 


//这个函数与preg_match不同的一点就是它会一直匹配到字符串最后，获取所有的匹配结果。
$array=array("Linux RedHat9.0","Apache2.2.9","MySQL5.0.50","PHP5.3.1","LAMP","110");  
$version=preg_grep('/^[a-z]+\d+\.\d+\.\d+$/i',$array);  

echo "<pre>";  
print_r($version);  
echo "</pre>";


//字符串替换
$str="[b]aaaaaaa[/b][i]bbbbbb[/i][u]hehe[/u]";  
      
    $pattern=array(  
        '/
b
(.+)
\/b
/',  
        '/
i
(.+)
\/i
/',  
        '/
u
(.+)
\/u
/'  
    );  
    $array=array(  
        '<b>$1</b>',  
        '<i>$1</i>',  
        '<u>$1</u>'  
    );  
    $str2=preg_replace($pattern,$array,$str);  
      
    echo "<pre>";  
    print_r($str2);  
    echo "</pre>"; 































