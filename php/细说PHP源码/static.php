<?php
	class MyClass {                 //����һ��MyClass�࣬������ʾ���ʹ�þ�̬��Ա
		static $count;               //����������һ����̬��Ա����count������ͳ�ƶ��󱻴����Ĵ���

		function __construct() {      //ÿ�δ���һ������ͻ��Զ�����һ��������췽��
			self::$count++;	       //ʹ��self���ʾ�̬��Աcount��ʹ������1
		}

		static function getCount() {   //����һ����̬��������������ֱ��ʹ�������Ϳ��Ե���
			return self::$count;     //�ڷ�����ʹ��self���ʾ�̬��Ա������
		}
	}
	
	MyClass::$count=0;            //��������ʹ�������������еľ�̬��Ա��Ϊ���ʹ����ֵ0

	$myc1=new MyClass();         //ͨ��MyClass�ഴ����һ�������ڹ��췽���н�count�ۼ�1
	$myc2=new MyClass();         //ͨ��MyClass�ഴ���ڶ��������ڹ��췽������Ϊcount�ۼ�1
	$myc3=new MyClass();         //ͨ��MyClass�ഴ�������������ڹ��췽�����ٴ�Ϊcount�ۼ�1
     
	echo MyClass::getCount();      //��������ʹ�������������еľ�̬��Ա��������ȡ��̬���Ե�ֵ 3
     	echo $myc3->getCount();       //ͨ������Ҳ���Է������еľ�̬��Ա��������ȡ��̬���Ե�ֵ 3
?>

