<?php
	$lamp="Linux Apache MySQL PHP";  //����һ���ַ���$lamp��ÿ������֮��ʹ�ÿո�ָ�
	$lampbrother=explode(" ", $lamp);    //���ַ���$lampʹ�ÿո�ָ��������鷵��
	echo $lampbrother[2];              //��������е�����Ԫ�أ���$lamp�еĵ������Ӵ�MySQL
	echo $lampbrother[3];              //��������е�����Ԫ�أ���$lamp�еĵ��ĸ��Ӵ�PHP

	$password = "redhat:*:500:508::/home/redhat:/bin/bash";     //��Linux�е��û��ļ���һ�����
	list($user, $pass, $uid, $gid, , $home, $shell) = explode(":", $password);   //���������ָ�7���Ӵ�
	echo $user;           //��һ���Ӵ��� ����û��������ڱ���$user�У����redhat
	echo $pass;          //�ڶ����Ӵ��� �������λ�ַ������ڱ���$pass�У����*
	echo $uid;           //�������Ӵ��� ����û���ID�����ڱ���$uid�У����500
	echo $gid;           //���ĸ��Ӵ��� ����û�����ID�����ڱ���$gid�У����508
	echo $home;         //�������Ӵ��� �����Ŀ¼�����ڱ���$home�У����/home/redhat
	echo $shell;          //���߸��Ӵ��� ����û�ʹ�õ�shell�����ڱ���$shell�У����/bin/bash
	
	$lamp="Linux+Apache+MySQL+PHP";  //�����ַ���$lamp��ÿ������֮��ʹ�üӺš�+���ָ�
	//ʹ�����������Ӵ�������������Ǹ�Ԫ�ؽ����� $lamp�� ��ʣ�ಿ��
	print_r(explode('+', $lamp, 2));  //���Array ( [0] => Linux [1] => Apache+MySQL+PHP )
	//ʹ�ø��������Ӵ����򷵻س����������Ƹ�Ԫ���������Ԫ��
	print_r(explode('+', $lamp, -1));  //���Array ( [0] => Linux [1] => Apache [2] => MySQL )
?>
