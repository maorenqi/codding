<html>
	<head>
		<title>HTML��</title>
	</head>
	
	<body>
		<form action="" method="post">
			������һ���ַ�����
			<input type="text" size="30" name="str" value="<?php echo html2Text($_POST['str']) ?>">
			<input type="submit" name="submit" value="�ύ"><br>
		</form>
		<?php
			if(isset($_POST["submit"])) {      //����û��ύ��������뽫��ִ��
                   		//���ԭ��<b><u>this is a \"test\"</u></b>��������������
				echo "ԭ�������".$_POST['str']."<br>";
     
              			//ת��Ϊʵ�壺&lt;b&gt;&lt;u&gt;this is a \&quot;test\&quot;&lt;/u&gt;&lt;/b&gt;
				echo "ת��ʵ����".htmlspecialchars($_POST['str'])."<br>";	

                   		//ɾ������ǰ���б�ߣ�<b><u>this is a "test"</u></b><br>
				echo "ɾ��б�ߣ�".stripslashes($_POST['str'])."<br>";	
 
                   		//�����&lt;b&gt;&lt;u&gt;this is a &quot;test&quot;&lt;/u&gt;&lt;/b&gt;
				echo "ɾ��б�ߺ�ת��ʵ�壺".html2Text($_POST['str'])."<br>";
			}

			function html2Text($input) {     //�Զ�һ�����������ϵķ�ʽ������ύ������
				return htmlspecialchars(stripslashes($input));   //��������������ϴ�����ַ���
			}
		?>	
	</body>
</html>

