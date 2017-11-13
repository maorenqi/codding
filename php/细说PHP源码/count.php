<?php
	$lamp = array("Linux", "Apache", "MySQL", "PHP");
	echo count($lamp); //输出数组的个数为：4
    
        //声明一个二维数组，统计数组中元素的个数
	$web= array('lamp'  => array('Linux', 'Apache', 'MySQL','PHP'),   
                 'j2ee'  => array('Unix', 'Tomcat','Oracle','JSP'));

	echo count($web, 1);   //第二个参数的模式为1则计算多维数组的个数，输出10
	echo count($web);     //默认模式为0，不计算多维数组的个数，输出2
?>
