<?php
	$pattern='/(https?|ftps?):\/\/(www)\.([^\.\/]+)\.(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/i';    //������ʽ
	$subject="��ַΪhttp://www.lampbrother.net/index.php��λ����LAMP�ֵ���";  //�������ַ���
	
	if(preg_match($pattern, $subject, $matches)) {       //ʹ��preg_match()��������ƥ��
		echo "��������URLΪ��".$matches[0]."<br>";   //�����е�һ��Ԫ�ر���ȫ��ƥ����
		echo "URL�е�Э��Ϊ��".$matches[1]."<br>";   //�����еڶ���Ԫ�ر����һ���ӱ��ʽ
		echo "URL�е�����Ϊ��".$matches[2]."<br>";   //�����е�����Ԫ�ر���ڶ����ӱ��ʽ
		echo "URL�е�����Ϊ��".$matches[3]."<br>";   //�����е��ĸ�Ԫ�ر���������ӱ��ʽ
		echo "URL�еĶ���Ϊ��".$matches[4]."<br>";   //�����е����Ԫ�ر�����ĸ��ӱ��ʽ
		echo "URL�е��ļ�Ϊ��".$matches[5]."<br>";   //�����е�����Ԫ�ر������ ���ӱ��ʽ
	} else {
		echo "����ʧ�ܣ�";            //�����������ʽû��ƥ��ɹ�������������
	} 	
?>
