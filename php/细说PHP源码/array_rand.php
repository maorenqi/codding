<?php
	$lamp=array("a"=>"Linux", "b"=>"Apache", "c"=>"MySQL", "d"=>"PHP");
	echo array_rand($lamp,1);           	     //���������$lamp��ȡ1��Ԫ�صļ�ֵ������b
	echo $lamp[array_rand($lamp)]."<br>"; 	     //ͨ�������һ��Ԫ�صļ�ֵ��ȡ������һ��Ԫ�ص�ֵ
	$key=array_rand($lamp,2);           	     //���������$lamp��ȡ2��Ԫ�صļ�ֵ��������$key
	echo $lamp[$key[0]]."<br>";         	     //ͨ������$key�е�һ��ֵ��ȡ����$lamp��һ��Ԫ�ص�ֵ
	echo $lamp[$key[1]]."<br>";          	     //ͨ������$key�еڶ���ֵ��ȡ����$lamp�����Ԫ�ص�ֵ
?>

