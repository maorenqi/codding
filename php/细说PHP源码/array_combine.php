<?php
	$a1=array("OS","WebServer","DataBase","Language");    //������һ��������Ϊ����1
	$a2=array("Linux","Apache","MySQL","PHP");            //�����ڶ���������Ϊ����2
	print_r(array_combine($a1,$a2));                      //ʹ��arrray_combine()����������ϲ�
//�����Array ( [OS] => Linux [WebServer] => Apache [DataBase] => MySQL [Language] => PHP )
?>

