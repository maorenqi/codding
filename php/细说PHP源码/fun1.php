<?php
	table();
	function table() {	     //��ʹ��˫��forѭ��������Ĵ�������Ϊ������������Ϊtable
		echo "<table align='center' border='1' width='600'>";
		echo "<caption><h1>ͨ������������</h1></caption>";
	
		for($out=0; $out < 10; $out++ ) {
			if($out%2==0)   
				$bgcolor="#ffffff";
			else 
				$bgcolor="#dddddd";

			echo "<tr bgcolor=".$bgcolor.">"; 

			for($in=0; $in <10; $in++) { 
				echo "<td>".($out*10+$in)."</td>";    
			}

			echo "</tr>";    
		}
		echo "</table>";
	} //table��������������
	table();
?>

