<?php
     /* 自定义函数table()时，声明了三个参数，参数之间用逗号分隔
	第一个参数需要一个字符串类型的表名；
	第二个参数是表格的行数需要一个整型数值；
	第三个参数是输出表格的列数也需要一个整数。 */
	function table( $tableName, $rows, $cols ) {	  
		echo "<table align='center' border='1' width='600'>";
		echo "<caption><h1> $tableName </h1></caption>"; //在输出表名时使用第一个参数做为表名
	
		for($out=0; $out < $rows; $out++ ) {  		 //使用第二个参数做为外层循环的次数条件
			if($out%2==0)   
				$bgcolor="#ffffff";
			else 
				$bgcolor="#dddddd";

			echo "<tr bgcolor=".$bgcolor.">"; 

			for($in=0; $in <$cols; $in++) {  	 //使用第三个参数做为内层循环的次数条件
				echo "<td>".($out*$cols+$in)."</td>";    
			}
			echo "</tr>";    
		}
		echo "</table>";
	} //table函数结束花括号
	table("第一个3行4列的表", 3, 4);       // 第一次调用table()函数，传入三个实参。
	table("第二个2行10列的表", 2, 10);     // 第二次调用table()函数，传入三个实参。
	table("第三个5行5列的表", 5, 5);       // 第三次调用table()函数，传入三个实参。
	
?>

