<?php
	function myFun($var){      				 //�Զ��庯��myFun����������ܱ�2�����򷵻���
		if($var % 2 == 0)
			return true;
	}	

	$array = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);  //����ֵΪ�������е�����
        //ʹ�ú���array_filter()���Զ���ĺ��������ַ�������ʽ�����ڶ�������
	print_r(array_filter($array, "myFun")); //���˺�Ľ�����Array ( [b] => 2 [d] => 4 ) 
?>

