<?php
     /* �Զ��庯��table()ʱ����������������������֮���ö��ŷָ�
	��һ��������Ҫһ���ַ������͵ı�����
	�ڶ��������Ǳ���������Ҫһ��������ֵ��
	�����������������������Ҳ��Ҫһ�������� */
	function table( $tableName, $rows, $cols ) {	  
		echo "<table align='center' border='1' width='600'>";
		echo "<caption><h1> $tableName </h1></caption>"; //���������ʱʹ�õ�һ��������Ϊ����
	
		for($out=0; $out < $rows; $out++ ) {  		 //ʹ�õڶ���������Ϊ���ѭ���Ĵ�������
			if($out%2==0)   
				$bgcolor="#ffffff";
			else 
				$bgcolor="#dddddd";

			echo "<tr bgcolor=".$bgcolor.">"; 

			for($in=0; $in <$cols; $in++) {  	 //ʹ�õ�����������Ϊ�ڲ�ѭ���Ĵ�������
				echo "<td>".($out*$cols+$in)."</td>";    
			}
			echo "</tr>";    
		}
		echo "</table>";
	} //table��������������
	table("��һ��3��4�еı�", 3, 4);       // ��һ�ε���table()��������������ʵ�Ρ�
	table("�ڶ���2��10�еı�", 2, 10);     // �ڶ��ε���table()��������������ʵ�Ρ�
	table("������5��5�еı�", 5, 5);       // �����ε���table()��������������ʵ�Ρ�
	
?>

