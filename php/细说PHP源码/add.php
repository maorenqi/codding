<html>
	<head><title>�����ϵ��</title></head>
	<body>
		<form action="add.php" method="post"> <!--������POST�����ύ��add.phpҳ�� -->
			��ţ�<input type="text" name="id"><br>        <!-- ���������Ϊid -->
			������<input type="text" name="name"><br>      <!-- ���������Ϊname -->
			��˾��<input type="text" name="company"><br>   <!-- ���������Ϊcompany -->
			��ַ��<input type="text" name="address"><br>   <!-- ���������Ϊaddress -->
			�绰��<input type="text" name="phone"><br>     <!-- ���������Ϊphone -->
			EMAIL:<input type="text" name="email"><br>     <!-- ���������Ϊemail -->
			<input type="submit" value="�������ϵ��">
		</form>
	</body>
</html>
<?php
	echo "�û���ӵ���ϵ����Ϣ���£�<br>";
	foreach($_POST as $key => $value) { 		  //ʹ��foreach��������ȫ������$_POST
		echo $key.' : '.$value.'<br>';     	  //���$_POST�����еļ���ֵ�������Ǳ��������
	}
?>

