<?php
	function table($tableName, $rows, $cols) {
		$str_table="";     //����һ�����ַ�����������ļ������ۼӵ�����ַ�������
		$str_table.="<table align='center' border='1' width='600'>";   //��Щ���ۼӵ�$str_table�ַ�����
		$str_table.="<caption><h1> $tableName </h1></caption>";        //��Щ���ۼӵ�$str_table�ַ�����
		for($out=0; $out < $rows; $out++ ) {
			if($out%2==0)   
				$bgcolor="#ffffff";
			else 
				$bgcolor="#dddddd";
			$str_table.="<tr bgcolor=".$bgcolor.">";               //��Щ���ۼӵ�$str_table�ַ�����
			for($in=0; $in <$cols; $in++) { 
				$str_table.="<td>".($out*$cols+$in)."</td>";   //��Щ���ۼӵ�$str_table�ַ�����
			}
			$str_table.="</tr>";                                    //��Щ���ۼӵ�$str_table�ַ�����
		}
		$str_table.="</table>";                              //��Щ���ۼӵ�$str_table�ַ�����
		return $str_table;                                   //����ͨ���������������ַ���
	}
	$str=table("��һ��3��4�еı�", 3, 4);           //����table�����������صĽ����������$str
	echo table("�ڶ���2��10�еı�", 2, 10);         //����table������ֱ�ӽ����ؽ�����
	echo $str;                                      //����ȡ����$str�ַ������
?>

