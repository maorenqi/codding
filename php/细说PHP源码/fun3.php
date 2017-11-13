<?php
	function table($tableName, $rows, $cols) {
		$str_table="";     //声明一个空字符串，将下面的计算结果累加到这个字符串里面
		$str_table.="<table align='center' border='1' width='600'>";   //将些行累加到$str_table字符串中
		$str_table.="<caption><h1> $tableName </h1></caption>";        //将些行累加到$str_table字符串中
		for($out=0; $out < $rows; $out++ ) {
			if($out%2==0)   
				$bgcolor="#ffffff";
			else 
				$bgcolor="#dddddd";
			$str_table.="<tr bgcolor=".$bgcolor.">";               //将些行累加到$str_table字符串中
			for($in=0; $in <$cols; $in++) { 
				$str_table.="<td>".($out*$cols+$in)."</td>";   //将些行累加到$str_table字符串中
			}
			$str_table.="</tr>";                                    //将些行累加到$str_table字符串中
		}
		$str_table.="</table>";                              //将些行累加到$str_table字符串中
		return $str_table;                                   //返回通过本函数计算后的字符串
	}
	$str=table("第一个3行4列的表", 3, 4);           //调用table函数并将返回的结果赋给变量$str
	echo table("第二个2行10列的表", 2, 10);         //调用table函数并直接将返回结果输出
	echo $str;                                      //将获取到的$str字符串输出
?>

