<?php
	$lamp=array("Linux","Apache","MySQL", "PHP"); //����һ��������Ϊջ

	echo array_pop($lamp);  //��������������Ԫ�ز����ر�ɾ����ֵ�����PHP
	print_r($lamp);         //��������Ľ��:Array ( [0] => Linux [1] => Apache [2] => MySQL ) 

	echo array_pop($lamp);  //�ٵ�������������Ԫ�ز����ر�ɾ����ֵ�����MySQL
	print_r($lamp);         //��������Ľ��:Array ( [0] => Linux [1] => Apache ) 
?>

