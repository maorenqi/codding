<?php
	function getFileName($url) {
         	//��ȡURL�ַ��������һ����/�����ֵ�λ�ã��ټ�1��Ϊ�ļ�����ʼ��λ��
		$location=strrpos($url, "/")+1;       
		$fileName=substr($url, $location);      //��ȡ��URL�д�$locationλ��ȡ����β�����ַ���
		return $fileName;                 	//���ػ�ȡ�����ļ�����
	}

	echo getFileName("http://bbs.lampbrother.net/index.php");             //��ȡ��ҳ�ļ���index.php
	echo getFileName("http://bbs.lampbrother.com/images/Sharp/logo.gif"); //��ȡ��ҳ��ͼƬ��logo.gif
	echo getFileName("file:///C:/WINDOWS/php.ini");                       //��ȡ�����е��ļ���php.ini
?>
