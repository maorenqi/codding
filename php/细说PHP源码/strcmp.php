<?php
	$userName="Admin";                     //����һ���ַ�����Ϊ�û���
	$password="lampBrother";                 //����һ���ַ�����Ϊ����

	if(strcasecmp($userName, "admin")==0) {    //�����ִ�Сд�ıȽϣ���������ַ�����ȷ���0
		echo "�û�������";
	}
     	//�������Ƚϵ��ַ���ʹ����Ӧ�ĺ���ת��ȫ��д��ȫСд��Ҳ����ʵ�ֲ����ִ�Сд�ıȽ�
     	if(strcasecmp(strtolower($userName), strtolower("admin"))==0) {   
		echo "�û�������";
	}

	switch(strcmp($password, "lampbrother"))              //�����ַ�������ĸ�Ĵ�Сд�Ƚ�
	{
		case 0:                                      //�����ַ�������򷵻�0
			echo "�����ַ������<br>";
			break;
		case 1:                                      //��һ���ַ�����ʱ�򷵻�1
			echo "��һ���ַ������ڵڶ����ַ���<br>";
			break;
		case -1:                                      //��һ���ַ���Сʱ�򷵻�-1
			echo "��һ���ַ���С�ڵڶ����ַ���<br>";
	}
?>

