<?php
	class TestClass {                 //����һ�������࣬����������printHello()��__call()����
		function printHello() {        //����һ�������������ö���ɹ��ܵ���
			echo "Hello<br>";       //ִ��ʱ���һ�����
		}

		function __call($functionName, $args) {     //�����˷�������������ö����в����ڵķ���
			echo "�������õĺ�����".$functionName."(������";  //������ò����ڵķ�����
			print_r($args);                                  //������ò����ڵķ���ʱ�Ĳ����б�
			echo ")�����ڣ�<br>\n";                         //������ӵ�һЩ��ʾ��Ϣ
		}	
	}

	$obj=new TestClass();              //ͨ����TestClassʵ����һ������
	$obj->myFun("one", 2, "three");      //���ö����в����ڵķ��������Զ������˶����е�__call()����
	$obj->otherFun(8,9);               //���ö����в����ڵķ��������Զ������˶����е�__call()����
	$obj->printHello();                 //���ö����д��ڵķ��������Գɹ�����
?>
