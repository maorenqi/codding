<?php
	$pattern='/(https?|ftps?):\/\/(www|bbs)\.([^\.\/]+)\.(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/i';  
     	//����һ���������URL���ӵ�ַ�Ķ�������
	$subject="��ַΪhttp://bbs.lampbrother.net/index.php��λ����LAMP�ֵ�����
		    ��ַΪhttp://www.baidu.com/index.php��λ���ǰٶȣ�
		    ��ַΪhttp://www.google.com/index.php��λ���ǹȸ衣";

	$i=1;	                             //����һ��������������ͳ���������Ľ����
	if(preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER)) {  //����ȫ���Ľ��
		foreach($matches as $urls)       //ѭ��������ά����$matches
		{
			echo "��������".$i."��URLΪ��".$urls[0]."<br>";   
			echo "��".$i."��URL�е�Э��Ϊ��".$urls[1]."<br>";   
			echo "��".$i."��URL�е�����Ϊ��".$urls[2]."<br>";   
			echo "��".$i."��URL�е�����Ϊ��".$urls[3]."<br>";  
			echo "��".$i."��URL�еĶ���Ϊ��".$urls[4]."<br>";   
			echo "��".$i."��URL�е��ļ�Ϊ��".$urls[5]."<br>";  
			$i++;                 //�������ۼ�
		}	
	} else {
		echo "����ʧ�ܣ�";
	} 
?>
