<?php 
	$lamp = array("Linux", "Apache", "MySQL", "PHP");   //����һ�����飬����Ԫ��ֵ�ĳ��Ȳ���ͬ

	usort($lamp, "sortByLen");          		    //ʹ��usort()���������û��Զ���Ļص�����������������
	print_r($lamp);   	             // ����������Array ( [0] => PHP [1] => MySQL [2] => Linux [3] => Apache )
	
	function sortByLen($one, $two) {     //�Զ���ĺ�����Ϊ�ص��ú����ṩ��usort()����ʹ��
		if (strlen($one) == strlen($two))  //�����������������ȷ���0����������λ�ò���
			return 0;
		else       		     //��һ���������ڵڶ����������ش���0���������򷵻�С��0����
			return (strlen($one) > strlen($two)) ? 1 : -1;  
	}
?>
