<?php
	$str = "LAMP";             //����һ���ַ�������
	$number = 789;             //����һ����������
     
	//���ַ���$str�ڵ�һ�������е�%���������%s���ַ������������$number��%u���
	printf("%s book. page number %u <br>",$str,$number);       
	printf("%0.3f <br>",$number);  //������$number�����������������С�������3λ

	$format = "The %2\$s book contains %1\$d pages.
           That's a nice %2\$s full of %1\$d pages. <br>";   //����һ����ʽ��������ʹ��ռλ��
	printf($format, $number, $str);  //����ʽ��ռλ���������α�����%2$sλ�ô��ǵ���������
?>

