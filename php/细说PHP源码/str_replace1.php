<?php
     	//�������������LAMP���ַ������ı���Ҳ����Сд�ġ�lamp���ַ���
	$str="LAMP��Ŀǰ�����е�WEB����ƽ̨��<br>
	      LAMPΪB/S�ܹ���������Ļƽ���ϣ�<br> 
	      LAMPÿ����Ա���ǿ�Դ�����<br> 
	      lampBrother��LAMP�ļ���������<br>";
     
     	//���ִ�Сд�Ľ���LAMP���滻Ϊ��Linux+Apache+MySQL+PHP������ͳ���滻����
	echo str_replace("LAMP", "Linux+Apache+MySQL+PHP",$str, $count);
	echo "���ִ�Сдʱ���滻".$count."��<br>";       //�滻4��
     
     	//�����ִ�Сд�Ľ���LAMP���滻Ϊ��Linux+Apache+MySQL+PHP������ͳ���滻����
	echo str_ireplace("LAMP", "Linux+Apache+MySQL+PHP", $str,$count);
	echo "�����ִ�Сдʱ���滻".$count."��<br>";     //�滻5��
?>
