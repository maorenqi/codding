<?php
	class MyClass {   //����һ��MyClass�࣬����������һ����������һ����Ա����
		 const CONSTANT = 'CONSTANT value';     //ʹ��const����һ����������ֱ�Ӹ��ϳ�ʹֵ

   		 function showConstant() {                 //����һ����Ա�����������ڲ����ʱ����еĳ���
       			 echo  self::CONSTANT."<br>";   //ʹ��self���ʳ�����ע�ⳣ��ǰ��Ҫ�ӡ�$��
   		 }
	}

	echo MyClass::CONSTANT . "<br>";             //�����ⲿʹ�������Ʒ��ʳ�����Ҳ��Ҫ�ӡ�$��
	$class = new MyClass();                        //ͨ����MyClass����һ����������$class
	$class->showConstant();                        //���ö����еķ���
	// echo $class::CONSTANT;                     //ͨ���������Ʒ��ʳ����ǲ������
?>

