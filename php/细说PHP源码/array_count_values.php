<?php
	$array = array(1, "php", 1, "mysql", "php");     //����һ�������ظ�ֵ������
	$newArray=array_count_values ($array);           //ͳ������$array������ֵ���ֵĴ���
	print_r($newArray);                              //�����Array([1] => 2 [php] => 2 [mysql] => 1)
?>

