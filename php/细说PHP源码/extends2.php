<?php
	class MyClass {                      //����һ������Ϊ����ʹ�ã������ĳ�Ա������Ϊ������
		protected $var1=100;             //����һ�������ĳ�Ա���Բ�����ֵΪ100

		protected function printHello() {    //����һ����Ա����ʹ��protected�ؼ�������Ϊ������
			echo "hello<br>";           //�ڷ�����ֻ��һ����������Ϊ����ʹ��
		}
	}

	class MyClass2 extends MyClass {     //����һ��MyClass���������ͼ���ʸ����еı�����Ա
		function useProperty()          //����������һ�����з��������ʸ����еı�����Ա
		{
			echo "����Ӹ���̳й����ĳ�Ա����ֵ".$this->var1."<br>";   //���ʸ������ܱ���������
			$this->printHello();                                        //���ʸ������ܱ����ķ���
		}
	}

	$subObj=new MyClass2();          //���������������
	$subObj->useProperty();            //������������еķ���ʵ�ֶԸ��ౣ���ĳ�Ա����
     	echo $subObj->var1;               //��ͼ���������ܱ����ĳ�Ա���������
?>

