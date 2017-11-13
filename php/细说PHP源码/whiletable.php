<html>
	<head><title>使用while循环嵌套输出表格</title></head>
	<body>
		<table align="center" border="1" width=600>
			<caption><h1>使用while循环嵌套输出表格</h1></caption>
		<?php
			$out = 0;                                //外层循环需要计数的累加变量

			while( $out < 10 ) {                     //指定外层循环，并且循环次数为10次
				if($out%2==0)                    //指定两行交替的背景颜色
					$bgcolor="#ffffff";
				else 
					$bgcolor="#dddddd";

                                //执行一次则输出一个行开始标记，并指定行的背景颜色
				echo "<tr bgcolor=".$bgcolor.">"; 
				$in = 0;                         //内层循环需要计数的累加变量

				while( $in < 10 ) { //指定内层循环，并且循环次数为10次
					echo "<td>".($out*10+$in)."</td>";    //执行一次，输出一个单元格
					$in++;                    //内层的计数变量累加
				}

				echo "</tr>";                     //输出行关闭标记
				$out++;                           //外层的计数变量累加
			}
		?>
		</table>
	</body>
</html>
