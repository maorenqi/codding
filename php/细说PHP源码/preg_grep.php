<?php
	$array=array("Linux RedHat9.0", "Apache2.2.9", "MySQL5.0.51", "PHP5.2.6", "LAMP", "100");
	//��������������ĸ��ʼ�������ֽ���������û�пո�ĵ�Ԫ����������$version
	$version=preg_grep("/^[a-zA-Z]+(\d|\.)+$/", $array);  
	print_r($version);      //�����Array ( [1] => Apache2.2.9 [2] => MySQL5.0.51 [3] => PHP5.2.6 )
?>
