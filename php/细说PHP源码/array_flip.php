<?php
	$lamp=array("OS"=>"Linux","WebServer"=>"Apache","Database"=>"MySQL", "Language"=>"PHP"); 

	//�����Array ( [Linux] => OS [Apache] => WebServer [MySQL] => Database [PHP] => Language )
	print_r(array_flip($lamp));              //ʹ��array_flip()�������������еļ���ֵ

 	//�����������Ԫ�ص�ֵ��ͬ����ʹ��array_flip()�ᷢ����ͻ
	$trans = array("a" => 1, "b" => 1, "c" => 2);
	print_r(array_flip($trans));              //���� $trans ����ˣ� Array( [1] => b [2] => c)
?>

