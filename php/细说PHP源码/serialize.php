<?php
	require "class_Person.php";                	//�ڱ��ļ��а���Person�����ڵĽű��ļ�
	$person=new Person("����", "��", 20);      	//�ܹ�Person�ഴ��һ�����󣬶����������Ϊ$person
	$person_string=serialize($person);         	 //ͨ��serialize�����������л�����һ���ַ���
	file_put_contents("file.txt", $person_string);	 //�������л��󷵻ص��ַ������浽file.txt�ļ���
?>
