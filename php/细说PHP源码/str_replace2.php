<?php
	$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");   //Ԫ���ַ�����
	//�������������е��ַ������������������е�Ԫ��ֵ�����滻Ϊ�գ����ִ�дС�滻
	echo str_replace($vowels, "", "Hello World of PHP");          //���Hll Wrld f PHP
	
	$vowels = array("a", "e", "i", "o", "u");                      //Ԫ���ַ�����
     	//�������������е��ַ������������������е�Ԫ��ֵ�����滻Ϊ�գ������ִ�дС�滻
	echo str_ireplace($vowels, "", "HELLO WORLD OF PHP");    	// HLL WRLD F PHP
?>
