<?php
	$str = "一个 'quote' 是 <b>bold</b>";

	// 输出: &Ograve;&raquo;&cedil;&ouml; 'quote' &Ecirc;&Ccedil; &lt;b&gt;bold&lt;/b&gt;
	echo htmlentities($str);

	// 输出: 一个 &#039;quote&#039; 是 &lt;b&gt;bold&lt;/b&gt;
	echo htmlentities($str, ENT_QUOTES,gb2312);
?>
