<?php
	require "acticle_class.php";    //�����ű��ļ�acticle_class.php���������ർ����ļ�
	//����һ�����¶����ڹ��췽���д������µı��⣬���µ����������Լ��û��Ĳ���ѡ��
	$article=new Acticle($_POST["subject"], $_POST["message"],$_POST["parse"]);
	echo $article->getSubject();   //�������¶����еĻ�ȡ���ⷽ��������ļ��ı���
	echo "<hr>";               //���һ���ָ��ߣ������ָ����µı������������
	echo $article->getMessage();  //�������¶����еĻ�ȡ�������ݵķ�����������µ���������
?>
