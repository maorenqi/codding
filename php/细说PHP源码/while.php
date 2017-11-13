<?php
	$count = 1;             //循环次数累加所需的初使条件，必须在while循环之前对变量进行初使化
	
	while( $count <= 10 )   //这是while语句，其中包含了循环条件
	{
		echo "这是第<b> $count </b>次循环执行输出的结果<br>";	
		$count++;        //将$count的值递增，作为循环次数的计数使用 
	}
?>

