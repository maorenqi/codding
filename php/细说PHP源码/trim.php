<?php
	$str="   lamp  ";  //����һ���ַ��������������3���ո��Ҳ�2���ո��ܳ���Ϊ9���ַ�
	echo strlen($str);            //����ַ������ܳ��� 9
	echo strlen(ltrim($str));       //ȥ�����ո��ĳ������Ϊ 6
	echo strlen(rtrim($str));       //ȥ���Ҳ�ո��ĳ������Ϊ 7
	echo strlen(trim($str));        //ȥ������ո��ĳ������Ϊ 4

	$str="123 This is a test ...";    //����һ�������ַ��������Ϊ���ֿ�ͷ���Ҳ�Ϊʡ�Ժš�����
	echo ltrim($str, "0..9");       //���˵��ַ����������֣������This is a test ...
	echo rtrim($str, ".");         //���˵��ַ����Ҳ�����С�.���������123 This is a test
	echo trim($str, "0..9 A..Z .");  //���˵��ַ������˵����ֺʹ�д��ĸ���С�.���������his is a test
?>
