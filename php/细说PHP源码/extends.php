<?php
	class MyClass {                     //����һ������Ϊ����ʹ�ã������ĳ�Ա������Ϊ˽�е�
		private $var1=100;              //����һ��˽�еĳ�Ա���Բ�����ֵΪ100

		private function printHello() {    //����һ����Ա����ʹ��private�ؼ�������Ϊ˽�е�
			echo "hello<br>";         //�ڷ�����ֻ��һ����������Ϊ����ʹ��
		}
	}

	class MyClass2 extends MyClass {     //����һ��MyClass���������ͼ���ʸ����е�˽�г�Ա
		function useProperty()          //����������һ�����з��������ʸ����е�˽�г�Ա
		{
			echo "����Ӹ���̳й����ĳ�Ա����ֵ".$this->var1."<br>";    //���ʸ����е�˽������
			$this->printHello();                                         //���ʸ����е�˽�з���
		}
	}

	$subObj=new MyClass2();          //���������������
	$subObj->useProperty();            //������������еķ���ʵ�ֶԸ���˽�г�Ա�ķ���
?>

