<?php
	$lamp=array("a"=>"Linux","b"=>"Apache","c"=>"MySQL","d"=>"PHP");  
	echo array_search("PHP",$lamp);  //�����d  ��������$lamp�У������ַ���"php"������±�d��

	$a=array("a"=>"8","b"=>8,"c"=>"8");
	echo array_search(8,$a,true);   //�����b ���ϸ����ͼ���������8��Ӧ���±�Ϊb��
?>

