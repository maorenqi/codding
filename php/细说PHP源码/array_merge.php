<?php
	$a1=array("a"=>"Linux","b"=>"Apache");
	$a2=array("c"=>"MySQL","b"=>"PHP");
	print_r(array_merge($a1,$a2)); 	//����� Array ( [a] => Linux [b] => PHP [c] => MySQL ) 
	
	//��ʹ��һ����������������0��ʼ������������
	$a=array(3=>"PHP",4=>"MySQL");
	print_r(array_merge($a));	 //�����Array ( [0] => PHP [1] => MySQL ) 
?>

