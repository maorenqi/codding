<?php
	class ChineseMan extends Person {     //����һ����ȥ�̳г�����Person
		function say() {                //�������еĳ��󷽷����ǣ������ѵ�����ȥʵ��
			echo $this->name."��".$this->country."�ˣ�������<br>";      //ʵ�ֵ�����
		}

		function eat() {                 //�������еĳ��󷽷����ǣ������ѵ�����ȥʵ��
			echo $this->name."ʹ�ÿ��ӳԷ�<br>";                    //ʵ�ֵ�����
		}
	}

	class Americans extends Person {      //������һ����ȥ�̳г�����Person
		function say() {                //�������еĳ��󷽷����ǣ������ѵ�����ȥʵ��
			echo $this->name."��".$this->country."�ˣ���Ӣ��<br>";     //ʵ�ֵ�����
		}

		function eat() {                //�������еĳ��󷽷����ǣ������ѵ�����ȥʵ��
			echo $this->name."ʹ�õ��ӺͲ��ӳԷ�<br>";              //ʵ�ֵ�����
		}
	}

	$chineseMan = new ChineseMan("�����", "�й�");      //����һ��Person������ʵ��������
	$americans =new Americans("alex", "����");             //���ڶ���Person������ʵ��������

	$chineseMan->say();              //ͨ����һ����������������Ѿ�ʵ�������г��󷽷���say()����
	$chineseMan->eat();               //ͨ����һ����������������Ѿ�ʵ�������г��󷽷���eat()����

	$americans->say();               //ͨ���ڶ�����������������Ѿ�ʵ�������г��󷽷���say()����
	$americans->eat();                //ͨ���ڶ�����������������Ѿ�ʵ�������г��󷽷���eat()����
?>  

