<?php
	$search_array = array('first' => 1, 'second' => 4);     //����һ���������飬���а�������Ԫ��
	
	if (array_key_exists('first', $search_array)) {         //����±�Ϊfirst��Ӧ��Ԫ���Ƿ���������
   		echo "����Ϊ'first'��Ԫ����������";
	}
	
	$search_array = array('first' => null, 'second' => 4);  //����һ���������飬��һ��Ԫ�ص�ֵΪNULL

	isset($search_array['first']);                          //ʹ��isset()���������±�Ϊfirst��Ԫ�أ�����false  
	array_key_exists('first', $search_array);               //ʹ��array_key_exists()�����±�Ϊfirst��Ԫ�أ�����true
?>  

