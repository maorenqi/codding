<?php
        //ʹ��array()�ṹ����һ�������һά����$contact
	$contact = array( 1, 14=>"��ĳ", "A��˾", "������", 14=>"(010)98765432", "gao@php.com" );
	$num=0;                                                       //����һ������$num��ʹֵΪ0����Ϊѭ���ļ���ʹ��
        //ʹ��foreach������һά����$contact����������ÿ��Ԫ�����
	foreach($contact as $value){
		echo "������\$contact�е� $num Ԫ���ǣ�$value <br>";  //ÿ��ѭ�����һ�ε�ǰԪ��
		$num++;                                               //���������ۼ�
	}
?>

