<?php
	$str= "LAMP";                           
	echo str_pad($str, 10);        //ָ������Ϊ10��Ĭ��ʹ�ÿո����ұ��"LAMP      "
	echo str_pad($str, 10, "-=", STR_PAD_LEFT);  //ָ������Ϊ10��ָ��������" -=-=-=LAMP"
	echo str_pad($str, 10, "_", STR_PAD_BOTH);  //ָ������Ϊ10��ָ������� " ___LAMP___"
	echo str_pad($str, 6 , "___");                //ָ������Ϊ6�� Ĭ�����ұ��" LAMP__"
?>
