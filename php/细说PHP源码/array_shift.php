<?
	//�����ַ�����ֵ�Ĺ�������
	$lamp=array("a"=>"Linux", "b"=>"Apache", "c"=>"MySQL", "d"=>"PHP");
	echo array_shift($lamp);  //ɾ�������һ��Ԫ�ز����أ����Linux
	print_r ($lamp);          //�ַ�����ֵ���ֲ��䣺Array ( [b] => Apache [c] => MySQL [d] => PHP )

	//�������ּ�����������
	$lamp=array("Linux", "Apache", "MySQL", "PHP");
	echo array_shift($lamp);   //ɾ�������һ��Ԫ�ز����أ����Linux
	print_r ($lamp);           //�����±���������Array ( [0] => Apache [1] => MySQL [2] => PHP ) 
?>

