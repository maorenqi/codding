<?php
	$lamp=array("Web");             	//����һ��������Ϊջ����Ϊ����array_push()������һ������
	echo array_push($lamp,"Linux");   	//���ַ�����Linux��ѹ������$lamp�У�����������Ԫ�ظ���2
	print_r($lamp);                		//��������У�ջ����Ա��Array ( [0] => Web [1] => Linux )

     	//������ѹ���������ݵ�����$lamp��β��
	echo array_push($lamp,"Apache", "MySQL", "PHP");    //���ջ��Ԫ�صĳ���Ϊ5
	print_r($lamp);    //����� Array ( [0] => Web [1] => Linux [2] => Apache [3] => MySQL [4] => PHP )

	$lamp=array("a"=>"Linux","b"=>"Apache");    	    //�����ַ�����������
	echo array_push($lamp,"MySQL","PHP");     	     //ѹ������Ԫ�ص������β��, ���ջ����Ϊ4
	print_r($lamp);    // Array ( [a] => Linux [b] => Apache [0] => MySQL [1] => PHP )   //Ҳ�����ּ�
   
    	$lamp["web"]="www";   //ʹ��array_push()������ʹ������ֱ�Ӹ�ֵ��ʹ������ķ�ʽ��һ����
	print_r($lamp);       //Array ( [a] => Linux [b] => Apache [0] => MySQL [1] => PHP [web] => www )
?>

