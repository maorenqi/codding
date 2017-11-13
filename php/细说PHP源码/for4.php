<?php
	for($i = 9; $i >= 1; $i-- ){
		if( $i < 5 )                      //如果$i小于5时退出
			break;                    //条件成立时使用break退出，也可以使用break 1退出
		for($j = $i; $j >=1; $j--) {
			if( $j < 5 )              //如果$j小于5时退出
				break 1;          //条件成立时使用break 1退出，也可以直接使用break退出
			echo "$j x $i = ".$j*$i."&nbsp;&nbsp;";
		}
		echo "<br>";
	}	
?>

