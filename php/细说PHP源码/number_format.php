<?php
	$number=123456789;                   //����һ������
	echo number_format($number);           //���123,456,789ǧλ�ָ����ַ���
	echo number_format($number, 2);         //���123,456,789.00С�����������С�� 
	echo number_format($number, 2, ",", ".");   //���123.456.789,00 ǧλʹ��(,)�ָ���������λС��
?>
