<html>
	<head><title>ʹ��whileѭ��Ƕ��������</title></head>
	<body>
		<table align="center" border="1" width=600>
			<caption><h1>ʹ��whileѭ��Ƕ��������</h1></caption>
		<?php
			$out = 0;                                //���ѭ����Ҫ�������ۼӱ���

			while( $out < 10 ) {                     //ָ�����ѭ��������ѭ������Ϊ10��
				if($out%2==0)                    //ָ�����н���ı�����ɫ
					$bgcolor="#ffffff";
				else 
					$bgcolor="#dddddd";

                                //ִ��һ�������һ���п�ʼ��ǣ���ָ���еı�����ɫ
				echo "<tr bgcolor=".$bgcolor.">"; 
				$in = 0;                         //�ڲ�ѭ����Ҫ�������ۼӱ���

				while( $in < 10 ) { //ָ���ڲ�ѭ��������ѭ������Ϊ10��
					echo "<td>".($out*10+$in)."</td>";    //ִ��һ�Σ����һ����Ԫ��
					$in++;                    //�ڲ�ļ��������ۼ�
				}

				echo "</tr>";                     //����йرձ��
				$out++;                           //���ļ��������ۼ�
			}
		?>
		</table>
	</body>
</html>
