<?php
	$a1=array("Linux", "Apache", "MySQL", "PHP");    //������һ�����飬��Ϊ�Ƚϵĵ�һ������
	$a2=array("Linux", "Tomcat", "MySQL", "JSP");    //�����ڶ������飬��Ϊ�Ƚϵĵڶ�������
	print_r(array_diff($a1,$a2));                    //���:Array ( [1] => Apache [3] => PHP ) 
?>

