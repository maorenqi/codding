<?php
	$pattern="/<[\/\!]*?[^<>]*?>/is";      	     //����ƥ������HTML��ǵĿ�ʼ�ͽ�����������ʽ
	$text="����ı�����<b>����</b>��<u>�����»���</u>�Լ�<i>б��</i>����<font color='red' size='7'>������ɫ�������С</font>�ı��";  //����һ�����ж��HTML��ǵ��ı�
	echo preg_replace($pattern, "", $text);	     //������HTML����滻Ϊ�գ���ɾ������HTML���
	echo "<br>";                          	     //�������
	echo preg_replace($pattern, "", $text, 2);   //ͨ�����ĸ�������������2���滻ǰ����HTML���
?>
