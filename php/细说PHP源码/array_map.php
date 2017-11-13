<?php
	function myFun1($v) {       //�Զ���һ��������Ϊ�ص�����������������ÿ��Ԫ����Ϊ����
		if ($v==="MySQL") {   //���������Ԫ�ص�ֵ�����MySQL�����ɹ�
 			return "Oracle";    //����Oracle
		}
		return $v;             //������MySQL��Ԫ�ض����ش����ֵ����ԭ�ͷ���
	}

	$lamp=array("Linux","Apache","MySQL","PHP");   //����һ����4��Ԫ�ص�����$lamp
	
	print_r(array_map("myFun1",$lamp));   //ʹ��array_map()��������һ����������һ���������
	/*�������ִ�к����Array ( [0] => Linux [1] => Apache [2] => Oracle [3] => PHP ) */
	
	//ʹ�ö������, �ص��������ܵĲ�����ĿӦ�úʹ��ݸ�array_map()������������Ŀһ��
	function myFun2($v1,$v2) {   		  //�Զ���һ��������Ҫ�������������������е�Ԫ�����δ���
		if ($v1===$v2) {         	  //������������е�Ԫ��ֵ��ͬ�������ɹ�
			return "same";       	  //����same, ˵�����������ж�Ӧ��Ԫ��ֵ��ͬ
		}
		return "different";         	  //������������ж�Ӧ��Ԫ��ֵ��ͬ������different
	}
	
	$a1=array("Linux","PHP","MySQL");  	  //��������$a1,������Ԫ��
	$a2=array("Unix","PHP","Oracle");    	  //����$a�ڶ���Ԫ��ֵ��$a�еڶ���Ԫ�ص�ֵ��ͬ
	
	print_r(array_map("myFun2",$a1,$a2)); 	  //ʹ��array_map()��������������
	/*�������ִ�к������Array ( [0] => different [1] => same [2] => different ) */
	
	//���Զ��庯��������Ϊ null ʱ�����
	$a1=array("Linux","Apache");         	 //����һ������$a1, ������Ԫ��
	$a2=array("MySQL","PHP");         	 //������һ������$a2,Ҳ������Ԫ��

	print_r(array_map(null,$a1,$a2));     	 //ͨ����һ����������ΪNULL������һ�����������
	/*�������ִ�к������Array ( 
		[0] => Array ( [0] => Linux [1] => MySQL ) 
		[1] => Array ( [0] => Apache [1] => PHP ) ) */ 
?>

