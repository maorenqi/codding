<?php
	$password= "lampbrother";          //����һ���ַ�����Ϊ���룬���ܺ󱣴浽���ݿ���
	echo md5($password)."<br>";       //���MD5���ܺ��ֵ��5f1ba7d4b4bf96fb8e7ae52fc6297aee

	if (md5($password) == '5f1ba7d4b4bf96fb8e7ae52fc6297aee') {  //���������������ݿⱣ���ƥ��
  		echo "����һ�£���¼�ɹ�";                         //�����ͬ������������Ϣ
  	}
?>

