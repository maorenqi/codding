<?php
        //ʹ��array()���ṹ����ϵ���б���������������Ϊһ����ά���飬Ĭ���±���˳����������
	$contact = array(                                                     //�����������
		   array(1, '��ĳ', 'A��˾', '������', '(010)98765432', 'gm@linux.com'),   //������1
		   array(2, '��ĳ', 'B��˾', '�Ϻ���', '(021)12345678', 'lm@apache.com'),  //������2
		   array(3, '��ĳ', 'C��˾', '�����', '(022)24680246', 'fm@mysql.com'),   //������3
		   array(4, '��ĳ', 'D��˾', '������', '(023)13579135', 'sm@phpcom')       //������4
	   );

        //��HTML������ʽ�����ά�����е�ÿ��Ԫ��
	echo '<table border="1" width="600" align="center">';
	echo '<caption><h1>��ϵ���б�</h1></caption>';
	echo '<tr bgcolor="#dddddd">';
	echo '<th>���</th><th>����</th><th>��˾</th><th>��ַ</th><th>�绰</th><th>EMAIL</th>';
	echo '</tr>';
        //ʹ��˫��for���Ƕ�ױ�����ά����$contact����HTML����������ʽ���
	for($row=0; $row < count($contact); $row++) {                //ʹ�����ѭ����������$contact�е���
		echo '<tr>';                                         //ѭ��һ�����һ��HTML�б��
         //ʹ���ڲ�ѭ����������$contact���������ÿ��Ԫ�أ�ʹ��count()��������ѭ������
		for($col=0; $col < count($contact[$row]); $col++) {  
			echo '<td> '.$contact[$row][$col].' </td>';   //ʹ����������ֵ�����ά������ÿ��Ԫ��
		}
		echo '</tr>';                                         //����н������
	}
	echo '</table>';                                              //������������
?>

