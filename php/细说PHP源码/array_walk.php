<?php
	function myFun1($value,$key) {                   	//����һ���ص�����������������
		echo "The key $key has the value $value<br>";   //������������һ�����
	}

	$lamp=array("a"=>"Linux","b"=>"Apache","c"=>"Mysql","d"=>"PHP");  //����һ������$lamp
	array_walk($lamp,"myFun1");       				  //ʹ��array_walk��������һ�������һ���ص�����
	/*  ִ�к�������½����
	    The key a has the value Linux
	    The key b has the value Apache
	    The key c has the value MySQL
	    The key d has the value PHP */

	function myFun2($value,$key,$p)  {        	  //�Զ���һ���ص�������Ҫ������������
		echo "$key $p $value <br>";               //�������������Ӻ����
	}
	
	array_walk($lamp,"myFun2","has the value");   	  //ʹ��array_walk����������������
	/*ִ�к�������½����	
	  a has the value Linux 
	  b has the value Apache 
	  c has the value MySQL
       d has the value PHP     */

	function myFun3(&$value,$key) {      		//�ı�����Ԫ�ص�ֵ����ע�� &$value�������ã�
		$value="Web";                 		//���ı�ԭ������ÿ��Ԫ�ص�ֵ
	}

	array_walk($lamp,"myFun3");   //ʹ��array_walk���������������������е�һ������Ϊ����
	print_r($lamp);               //�����Array ( [a] => Web [b] => Web [c] => Web [d] => Web ) 
?>
