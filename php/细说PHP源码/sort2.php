<?php
	$data = array(5=>"five",8=>"eight",1=>"one",7=>"seven",2=>"two");  //����һ����ֵ���ҵ�����
	
	ksort($data);      //ʹ��ksort()�������ռ���������$data������С���������
	print_r($data);    //�����Array ( [1] => one [2] => two [5] => five [7] => seven [8] => eight )

	krsort($data);     //ʹ��krsort()�������ռ���������$data�����ɴ�С������
	print_r($data);    //�����Array ( [8] => eight [7] => seven [5] => five [2] => two [1] => one )
?>
