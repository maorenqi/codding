<?php 
	$data = array(                   	 //����һ��$data���飬ģ����һ���к�������
	  		array("id" => 1, "soft" => "Linux", "rating" => 3),
			array("id" => 2, "soft" => "Apache", "rating" => 1),
			array("id" => 3, "soft" => "MySQL", "rating" => 4),
			array("id" => 4, "soft" => "PHP", "rating" => 2),
		); 
	//ʹ��foreach������������������Ϊarray_multisort�Ĳ���
	foreach ($data as $key => $value) {
		$soft[$key] = $value["soft"];     //��$data�е�ÿ������Ԫ���м�ֵΪsoft��ֵ�γ�����$soft
		$rating[$key] = $value["rating"];  //��ÿ������Ԫ���м�ֵΪrating��ֵ�γ�����$rating
	}

	array_multisort($rating, $soft, $data);   //ʹ��array_multisort()�����������������������
	print_r($data);                      	  //��������Ķ�ά����
?>
