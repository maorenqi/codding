<?php
     	//声明包含多个“LAMP”字符串的文本，也包含小写的“lamp”字符串
	$str="LAMP是目前最流行的WEB开发平台；<br>
	      LAMP为B/S架构软件开发的黄金组合；<br> 
	      LAMP每个成员都是开源软件；<br> 
	      lampBrother是LAMP的技术社区。<br>";
     
     	//区分大小写的将“LAMP”替换为“Linux+Apache+MySQL+PHP”，并统计替换次数
	echo str_replace("LAMP", "Linux+Apache+MySQL+PHP",$str, $count);
	echo "区分大小写时共替换".$count."次<br>";       //替换4次
     
     	//不区分大小写的将“LAMP”替换为“Linux+Apache+MySQL+PHP”，并统计替换次数
	echo str_ireplace("LAMP", "Linux+Apache+MySQL+PHP", $str,$count);
	echo "不区分大小写时共替换".$count."次<br>";     //替换5次
?>
