<?php
	for($i = 9; $i >= 1; $i-- ){
		if( $i < 5 )                      //���$iС��5ʱ�˳�
			break;                    //��������ʱʹ��break�˳���Ҳ����ʹ��break 1�˳�
		for($j = $i; $j >=1; $j--) {
			if( $j < 5 )              //���$jС��5ʱ�˳�
				break 1;          //��������ʱʹ��break 1�˳���Ҳ����ֱ��ʹ��break�˳�
			echo "$j x $i = ".$j*$i."&nbsp;&nbsp;";
		}
		echo "<br>";
	}	
?>

