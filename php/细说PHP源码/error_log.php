<?php   
	if(!Ora_Logon($username, $password)){   
		error_log("Oracle���ݿⲻ����!", 0);        	  //��������Ϣд�뵽����ϵͳ��־��
	}
	if(!($foo=allocate_new_foo()){
		error_log("���ִ��鷳��!", 1, "webmaster@www.mydomain.com");   //���͵�����Ա������
	}
	error_log("������!",   2,   "localhost:5000");       	//���͵�������Ӧ5000�˿ڵķ�������
	error_log("������!",   3,   "/usr/local/errors.log");   //���͵�ָ�����ļ���
?>  

