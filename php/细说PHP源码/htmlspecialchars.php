<html>
	<body>
		<?php
			$str = "<B>WebServer:</B> & 'Linux' & 'Apache'"; //����HTML��Ǻ͵����ŵ��ַ���
			echo htmlspecialchars($str, ENT_COMPAT);      //ת��HTML��Ǻ�ת��˫����
			echo "<br>\n";
			echo htmlspecialchars($str, ENT_QUOTES);      //ת��HTML��Ǻ�ת����������
			echo "<br>\n";
			echo htmlspecialchars($str, ENT_NOQUOTES);   //ת��HTML��ǺͲ�������ת��
		?>
	</body>
</html>

