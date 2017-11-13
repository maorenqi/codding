<?php
	require "acticle_class.php";    //包含脚本文件acticle_class.php，将文章类导入该文件
	//创建一个文章对象，在构造方法中传入文章的标题，文章的主体内容以及用户的操作选项
	$article=new Acticle($_POST["subject"], $_POST["message"],$_POST["parse"]);
	echo $article->getSubject();   //调用文章对象中的获取标题方法，输出文件的标题
	echo "<hr>";               //输出一个分隔线，用来分隔文章的标题和主体内容
	echo $article->getMessage();  //调用文章对象中的获取文章内容的方法，输出文章的主体内容
?>
