<?php
	require "class_Person.php";	               //�ڱ��ļ��а���Person�����ڵĽű��ļ�
	$person_string=file_get_contents("file.txt");  //��file.txt�ļ��е��ַ�������������������$person_string
	$person=unserialize($person_string); 	       //���з����л��������γɶ���$person��
	$person->say();                         	//���ö����е�say()�������������Է����л������Ƿ�ɹ�
?>

