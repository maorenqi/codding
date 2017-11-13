<?php
        //使用array()语句结构将联系人列表中所有数据声明为一个二维数组，默认下标是顺序数字索引
	$contact = array(                                                     //定义外层数组
		   array(1, '高某', 'A公司', '北京市', '(010)98765432', 'gm@linux.com'),   //子数组1
		   array(2, '洛某', 'B公司', '上海市', '(021)12345678', 'lm@apache.com'),  //子数组2
		   array(3, '峰某', 'C公司', '天津市', '(022)24680246', 'fm@mysql.com'),   //子数组3
		   array(4, '书某', 'D公司', '重庆市', '(023)13579135', 'sm@phpcom')       //子数组4
	   );

        //以HTML表格的形式输出二维数组中的每个元素
	echo '<table border="1" width="600" align="center">';
	echo '<caption><h1>联系人列表</h1></caption>';
	echo '<tr bgcolor="#dddddd">';
	echo '<th>编号</th><th>姓名</th><th>公司</th><th>地址</th><th>电话</th><th>EMAIL</th>';
	echo '</tr>';
        //使用双层for语句嵌套遍历二维数组$contact，以HTML表格的行列形式输出
	for($row=0; $row < count($contact); $row++) {                //使用外层循环遍历数组$contact中的行
		echo '<tr>';                                         //循环一次输出一个HTML行标记
         //使用内层循环遍历数组$contact中子数组的每个元素，使用count()函数控制循环次数
		for($col=0; $col < count($contact[$row]); $col++) {  
			echo '<td> '.$contact[$row][$col].' </td>';   //使用两个索引值输出二维数组中每个元素
		}
		echo '</tr>';                                         //输出行结束标记
	}
	echo '</table>';                                              //输出表格结束标记
?>

