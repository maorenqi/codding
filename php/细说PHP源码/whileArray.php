<?php
        //����һ��һά�Ĺ�������$contact
	$contact = array("ID" => 1,
		"����" => "��ĳ",
		"��˾" => "A��˾",
		"��ַ" => "������",
		"�绰" => "(010)98765432",
		"EMAIL" => "gao@php.com" 
	);
	//��HTML�б�ķ�ʽ���������ÿ��Ԫ�ص���Ϣ
	echo '<dl>һ����ϵ����Ϣ��';
	while( list($key, $value) = each($contact)){  //��foreach����д��while��list()��each()�����
		echo "<dd> $key : $value </dd>";      //���ÿ��Ԫ�صļ�/ֵ��
	}
	echo '</dl>';
?>

