<?php
	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, 2);      	 //ԭ�����еĵڶ���Ԫ�غ������β����ɾ��
	print_r($input);                 //�����Array ( [0] => Linux [1] => Apache )

	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, 1, -1);     //�ӵڶ�����ʼ�Ƴ�ֱ������ĩβ����1��Ϊֹ�м����е�Ԫ��
	print_r($input);                 //�����Array ( [0] => Linux [1] => PHP )

	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, 1, count($input), "web");      //�ӵڶ���Ԫ�ص������β������4���������
	print_r($input);                                    //�����Array ( [0] => Linux [1] => web )

	$input = array("Linux", "Apache", "MySQL", "PHP");
	array_splice($input, -1, 1, array("web", "www"));  //���һ��Ԫ�ر���4�������������
	print_r($input); //�����Array ( [0] => Linux [1] => Apache [2] => MySQL [3] => web [4] => www )
?>

