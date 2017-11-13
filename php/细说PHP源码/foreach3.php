<?php
    //将三个部门的工资表格存储在三维数组$wage中
	$wage=array(
		"市场部" => array(
			array(1, "高某", "市场部经理", 5000.00),
			array(2, "洛某", "职员", 3000.00),
			array(3, "峰某", "职员", 2400.00),
		),
		"产品部" => array(
			array(1, "李某", "产品部经理", 6000.00),
			array(2, "周某", "职员", 4000.00),
			array(3, "吴某", "职员", 3200.00)
		),
		"财务部" => array(
			array(1, "郑某", "财务部经理", 4500.00),
			array(2, "王某", "职员", 2000.00),
			array(3, "冯某", "职员", 1500.00)
		)
	);
        //使用三层foreach语句嵌套遍历三维数组
	foreach($wage as $sector => $table) {                 //最外层foreach语句遍历出三个表格，遍历出键和值
		echo '<table border="1" width="600" align="center">';
		echo '<caption><h2> '.$sector.'10月份工资表 </h2></caption>';  //输出下标值代表的表格名称
		echo '<tr bgcolor="#dddddd">';
		echo '<th>编号</th><th>姓名</th><th>职务</th><th>工资</th>';
		echo '</tr>';
		foreach($table as $row) {                     //中层foreach语句遍历出每个表格中的行
			echo '<tr>';
			foreach($row as $col) {               //内层foreach语句遍历出每条记录中的列值
				echo '<td> '.$col.' </td>';   //输出每列数据
			}
			echo '</tr>';
		}
		echo '</table><br>';
	}
?>

