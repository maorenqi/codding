<?php
     	//�����������Ŀո�Ͷ��ŷָ��ַ��������а���" ", \r, \t, \n and \f
	$keywords = preg_split ("/[\s,]+/", "hypertext language, programming");
	print_r($keywords);  //�ָ�����Array ( [0] => hypertext [1] => language [2] => programming ) 
	
     	//���ַ����ָ���ַ�
	$chars = preg_split('//', "lamp", -1, PREG_SPLIT_NO_EMPTY);
	print_r($chars);    //�ָ�����Array ( [0] => l [1] => a [2] => m [3] => p ) 
	
	//���ַ����ָ�Ϊƥ�����ƫ����
	$chars = preg_split('/ /','hypertext language programming', -1, PREG_SPLIT_OFFSET_CAPTURE);
	print_r($chars);    
	
	/* �ָ�����Array ( [0] => Array ( [0] => hypertext [1] => 0 ) 
	 *                  [1] => Array ( [0] => language [1] => 10 ) 
	 *                  [2] => Array ( [0] => programming [1] => 19 ) )  */
?>

