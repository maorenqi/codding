<?php
     $lamp=array("a"=>"Linux","b"=>"Apache","c"=>"MySQL","d"=>"PHP");  //ֻʹ��һ������Ĳ���
	print_r(array_keys($lamp));            //�����Array ( [0] => a [1] => b [2] => c )
	print_r(array_keys($lamp,"Apache"));   //ʹ�õڶ�����ѡ���������Array ( [0] => b)

	$a=array(10,20,30,"10");               //����һ�����飬����Ԫ�ص�ֵ������10���ַ�����10��
	print_r(array_keys($a,"10",false));    //ʹ�õ��������� (false)�����Array ( [0] => 0 [1] => 3 )
	
	$a=array(10,20,30,"10");               //����һ�����飬����Ԫ�ص�ֵ������10���ַ�����10��
	print_r(array_keys($a,"10",true));     //ʹ�õ��������� (true)�����Array ( [0] => 3)	
?>

