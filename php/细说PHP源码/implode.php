<?php
	$lamp=array("Linux", "Apache", "MySQL", "PHP");
	
	echo implode("+", $lamp);   //ʹ�üӺ����Ӻ����Linux+Apache+MySQL+PHP
	echo join("+++", $lamp);    //ʹ�������Ӻ����Ӻ����Linux+++Apache+++MySQL+++PHP
?>
