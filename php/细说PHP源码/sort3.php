<?php
	$data = array("l"=>"Linux", "a"=>"Apache","m"=>"MySQL","p"=>"PHP");
	
	asort($data);     //ʹ��asort()����������$data��Ԫ�ص�ֵ�������򣬲�����ԭ�еļ�����ֵ
	print_r($data);   //�����Array ( [a] => Apache [l] => Linux [m] => MySQL [p] => PHP )

	arsort($data);    //ʹ��arsort()����������$data��Ԫ�ص�ֵ�������򣬲�����ԭ�еļ�����ֵ
	print_r($data);   //�����Array ( [p] => PHP [m] => MySQL [l] => Linux [a] => Apache )
	
	rsort($data);     //ʹ��asort()����������$data��Ԫ�ص�ֵ�������򣬵�ԭʼ����������
	print_r($data);   //�����Array ( [0] => PHP [1] => MySQL [2] => Linux [3] => Apache ) 
?>
