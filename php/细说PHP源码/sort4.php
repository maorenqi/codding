<?php
	$data = array("file1.txt", "file11.txt", "File2.txt", "FILE12.txt", "file.txt");
	
	natsort($data);      //��ͨ�ġ���Ȼ����
	print_r($data);      //��������Ľ���������а�����Сд�����������ȷ��������

	natcasesort($data);  //���Դ�Сд�ġ���Ȼ����
	print_r($data);      //�������Ȼ���򡱺�Ľ�����������
?>

