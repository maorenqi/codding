<?php
    	//����һ��һά�Ĺ�������$contact, ʹ�á�=>�������ָ����ÿ��Ԫ�ص��ַ����±�
	$contact = array("ID" => 1,
		"����" => "��ĳ",
		"��˾" => "A��˾",
		"��ַ" => "������",
		"�绰" => "(010)98765432",
		"EMAIL" => "gao@php.com" 
	);
	//���������ʱ������ָ���������е�һ��Ԫ��λ��
	//ʹ��key()��current()������������$contact�����������е�ǰԪ�صļ���ֵ
	echo '��һ��Ԫ�أ�'.key($contact).' => '.current($contact).'<br>';    //�������һ��Ԫ�أ�ID => 1
	echo '��һ��Ԫ�أ�'.key($contact).' => '.current($contact).'<br>';    //����ָ��û���ƶ������ͬ��
	
	next($contact);    //������$contact�е�ָ������һ��Ԫ���ƶ�һ�Σ�ָ��ڶ���Ԫ�ص�λ��
	next($contact);    //������$contact�е�ָ��������һ��Ԫ���ƶ�һ�Σ�ָ�������Ԫ�ص�λ��
	echo '������Ԫ�أ�'.key($contact).' => '.current($contact).'<br>';   //���������Ԫ�صļ���ֵ
	
	end($contact);    //�ٽ�����$contact�е�ָ���ƶ������ָ�����һ��Ԫ��
	echo '���һ��Ԫ�أ�'.key($contact).' => '.current($contact).'<br>';  //������һ��Ԫ�صļ���ֵ
	
	prev($contact);   //������$contact�е�ָ�뵹��һλ��ָ�����ڶ���Ԫ��
	echo '���ڶ���Ԫ�أ�'.key($contact).' => '.current($contact).'<br>'; //������ڶ���Ԫ�صļ���ֵ
	
	reset($contact);  //�ٽ�����$contact�е�ָ�����õ���һ��Ԫ�ص�λ�ã�ָ���һ��Ԫ��
	echo '�ֻص��˵�һ��Ԫ�أ�'.key($contact).' => '.current($contact).'<br>'; //�����һ��Ԫ�صļ���ֵ
?>

