<?php
        //ʹ��array()��佫��ϵ���б��е�һ����¼������һά����$contact 
	$contact = array( 1, "��ĳ", "A��˾", "������", "(010)98765432", "gao@php.com" );
    
	//�Ա�����ʽ���һά�����е�ÿ��Ԫ��
	echo '<table border="1" width="600" align="center">';    //���<table>��Ƕ�����
	echo '<caption><h1>��ϵ���б�</h1></caption>';           //�����ͷ
	echo '<tr bgcolor="#dddddd">';                           //��������п�ʼ������Ϊ��ɫ
        //��html��th�����������ֶ�����
	echo '<th>���</th><th>����</th><th>��˾</th><th>��ַ</th><th>�绰</th><th>EMAIL</th>';
	echo '</tr><tr>';                                     
	for($i=0; $i < count($contact); $i++) {                  //ʹ��forѭ�����һά�����е�Ԫ��
		echo '<td> '.$contact[$i].' </td>';              //ѭ��һ����������е�һ��Ԫ��
	}
	echo '</tr></table>';                                    //������Ĺرձ��
?>

