<?php
        //in_array()�����ļ�ʹ����ʽ
	$os = array("Mac", "NT", "Irix", "Linux");
		
	if (in_array("Irix", $os)) {       //��������������ַ���Irix������$os��
    		echo "Got Irix";
	}
	if (in_array("mac", $os)) {        //�������ʧ�ܣ���Ϊ in_array()�����ִ�Сд��
    		echo "Got mac";
	}

	//in_array() �ϸ����ͼ������
	$a = array('1.10', 12.4, 1.13);

	if (in_array('12.4', $a, true)) {  //����������Ϊtrue�������ַ���'12.4'�͸�����12.4���Ͳ�ͬ
		echo "'12.4' found with strict check\n";
	}
	if (in_array(1.13, $a, true)) {   //�������������ִ����������
   		 echo "1.13 found with strict check\n";
	} 

	//in_array()�л����������鵱����һ��������Ϊ��ѯ����
	$a = array(array('p', 'h'), array('p', 'r'), 'o');

	if (in_array(array('p', 'h'), $a)) {   //����array('p', 'h')������$a�д���
  		  echo "'ph' was found\n";
	}
	if (in_array(array('h', 'p'), $a)) {   //����array('h', 'p')����������$a��
   		 echo "'hp' was found\n";
	}
?>  

