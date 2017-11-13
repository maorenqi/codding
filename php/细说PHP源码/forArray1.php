<?php
        //使用array()语句将联系人列表中第一条记录声明成一维数组$contact 
	$contact = array( 1, "高某", "A公司", "北京市", "(010)98765432", "gao@php.com" );
    
	//以表格的形式输出一维数组中的每个元素
	echo '<table border="1" width="600" align="center">';    //输出<table>标记定义表格
	echo '<caption><h1>联系人列表</h1></caption>';           //输出表头
	echo '<tr bgcolor="#dddddd">';                           //输出表格的行开始，背景为灰色
        //以html的th标记输出表格的字段名称
	echo '<th>编号</th><th>姓名</th><th>公司</th><th>地址</th><th>电话</th><th>EMAIL</th>';
	echo '</tr><tr>';                                     
	for($i=0; $i < count($contact); $i++) {                  //使用for循环输出一维数组中的元素
		echo '<td> '.$contact[$i].' </td>';              //循环一次输出数组中的一个元素
	}
	echo '</tr></table>';                                    //输出表格的关闭标记
?>

