<?php   
	function __autoload($className) {                   		 //�ڷ������Ϸ�����һ���Զ�������ķ���
		include("class_" . ucfirst($className) . ".php");    	 //�ڷ�����ʹ��include���������ڵ��ļ�
	}
	
	$obj  = new User();  	//User�಻�������Զ�����__autoload()��������������User����Ϊ��������
	$obj2 = new Shop();	//Shop�಻�������Զ�����__autoload()��������������Shop����Ϊ��������
?>      

