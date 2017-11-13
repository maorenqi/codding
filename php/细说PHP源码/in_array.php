<?php
        //in_array()函数的简单使用形式
	$os = array("Mac", "NT", "Irix", "Linux");
		
	if (in_array("Irix", $os)) {       //这个条件成立，字符串Irix在数组$os中
    		echo "Got Irix";
	}
	if (in_array("mac", $os)) {        //这个条件失败，因为 in_array()是区分大小写的
    		echo "Got mac";
	}

	//in_array() 严格类型检查例子
	$a = array('1.10', 12.4, 1.13);

	if (in_array('12.4', $a, true)) {  //第三个参数为true，所以字符串'12.4'和浮点数12.4类型不同
		echo "'12.4' found with strict check\n";
	}
	if (in_array(1.13, $a, true)) {   //这个条件成立，执行下面的语句
   		 echo "1.13 found with strict check\n";
	} 

	//in_array()中还可以用数组当作第一个参数作为查询条件
	$a = array(array('p', 'h'), array('p', 'r'), 'o');

	if (in_array(array('p', 'h'), $a)) {   //数组array('p', 'h')在数组$a中存在
  		  echo "'ph' was found\n";
	}
	if (in_array(array('h', 'p'), $a)) {   //数组array('h', 'p')不存在数组$a中
   		 echo "'hp' was found\n";
	}
?>  

