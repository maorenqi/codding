<?php
	try {
		$error = 'Always throw this error';
		throw new Exception($error);   //����һ���쳣����ͨ��throw����׳�
		echo 'Never executed';         //�����￪ʼ��try������ڵĴ��뽫�����ٱ�ִ��
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";  //���������쳣��Ϣ
	}
	echo 'Hello World';                 //����û�б�����������ִ��
?>

