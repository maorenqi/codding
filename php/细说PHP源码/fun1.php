<?php
	table();
	function table() {	     //将使用双层for循环输出表格的代码声明为函数，函数名为table
		echo "<table align='center' border='1' width='600'>";
		echo "<caption><h1>通过函数输出表格</h1></caption>";
	
		for($out=0; $out < 10; $out++ ) {
			if($out%2==0)   
				$bgcolor="#ffffff";
			else 
				$bgcolor="#dddddd";

			echo "<tr bgcolor=".$bgcolor.">"; 

			for($in=0; $in <10; $in++) { 
				echo "<td>".($out*10+$in)."</td>";    
			}

			echo "</tr>";    
		}
		echo "</table>";
	} //table函数结束花括号
	table();
?>

