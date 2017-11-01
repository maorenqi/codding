<?php 
//一个简单的目录递归函数 
tree('E:/www/bugfree');
function tree($directory) 
		{ 
		$mydir=dir($directory); 
		echo "<ul>\n"; 
		while($file=$mydir->read()){ 
		if((is_dir("$directory/$file")) AND ($file!=".") AND ($file!="..")) 
		{echo "<li><font color=\"#ff00cc\"><b>$file</b></font></li>\n"; 
		tree("$directory/$file"); 
		} 
		else 
		echo "<li>$file</li>\n"; 
		} 
		echo "</ul>\n"; 
		$mydir->close(); 
		} 