<?php
	$lamp=array("Linux", "Apache", "MySQL", "PHP");     //����һ����������$lamp����4��Ԫ��
	//ʹ��array_slice()�ӵڶ�����ʼȡ(0�ǵ�һ����1Ϊ�ڶ���)��ȡ����Ԫ�ش�����$lamp�з���
	print_r(array_slice($lamp,1,2));                    //�����Array ( [0] => Apache [1] => MySQL )
	//�ڶ�������ʹ�ø�������Ϊ-2���Ӻ���ڶ�����ʼȡ������һ��Ԫ��
	print_r(array_slice($lamp,-2,1));                   //����� Array ( [0] => MySQL ) 
	//���һ����������Ϊ true������ԭ�еļ�ֵ����
	print_r(array_slice($lamp,1,2,true));               //�����Array ( [1] => Apache [2] => MySQL ) 

	$lamp=array("a"=>"Linux","b"=>"Apache","c"=>"MySQL","d"=>"PHP");     //����һ����������
   	//����������ַ�������Ĭ�������ص����齫��������
	print_r(array_slice($lamp,1,2));                    //�����Array ( [b] => Apache [c] => MySQL ) 
?>

