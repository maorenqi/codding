<?php
    //���������ŵĹ��ʱ��洢����ά����$wage��
	$wage=array(
		"�г���" => array(
			array(1, "��ĳ", "�г�������", 5000.00),
			array(2, "��ĳ", "ְԱ", 3000.00),
			array(3, "��ĳ", "ְԱ", 2400.00),
		),
		"��Ʒ��" => array(
			array(1, "��ĳ", "��Ʒ������", 6000.00),
			array(2, "��ĳ", "ְԱ", 4000.00),
			array(3, "��ĳ", "ְԱ", 3200.00)
		),
		"����" => array(
			array(1, "֣ĳ", "���񲿾���", 4500.00),
			array(2, "��ĳ", "ְԱ", 2000.00),
			array(3, "��ĳ", "ְԱ", 1500.00)
		)
	);
        //ʹ������foreach���Ƕ�ױ�����ά����
	foreach($wage as $sector => $table) {                 //�����foreach��������������񣬱���������ֵ
		echo '<table border="1" width="600" align="center">';
		echo '<caption><h2> '.$sector.'10�·ݹ��ʱ� </h2></caption>';  //����±�ֵ����ı������
		echo '<tr bgcolor="#dddddd">';
		echo '<th>���</th><th>����</th><th>ְ��</th><th>����</th>';
		echo '</tr>';
		foreach($table as $row) {                     //�в�foreach��������ÿ������е���
			echo '<tr>';
			foreach($row as $col) {               //�ڲ�foreach��������ÿ����¼�е���ֵ
				echo '<td> '.$col.' </td>';   //���ÿ������
			}
			echo '</tr>';
		}
		echo '</table><br>';
	}
?>

