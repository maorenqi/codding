<?php
	$str = "һ�� 'quote' �� <b>bold</b>";

	// ���: &Ograve;&raquo;&cedil;&ouml; 'quote' &Ecirc;&Ccedil; &lt;b&gt;bold&lt;/b&gt;
	echo htmlentities($str);

	// ���: һ�� &#039;quote&#039; �� &lt;b&gt;bold&lt;/b&gt;
	echo htmlentities($str, ENT_QUOTES,gb2312);
?>
