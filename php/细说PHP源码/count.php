<?php
	$lamp = array("Linux", "Apache", "MySQL", "PHP");
	echo count($lamp); //�������ĸ���Ϊ��4
    
        //����һ����ά���飬ͳ��������Ԫ�صĸ���
	$web= array('lamp'  => array('Linux', 'Apache', 'MySQL','PHP'),   
                 'j2ee'  => array('Unix', 'Tomcat','Oracle','JSP'));

	echo count($web, 1);   //�ڶ���������ģʽΪ1������ά����ĸ��������10
	echo count($web);     //Ĭ��ģʽΪ0���������ά����ĸ��������2
?>
