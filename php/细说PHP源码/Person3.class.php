<?php
	class Person {             //����һ������Person�����а���������Ա���Ժ�������Ա����
		//�����������˵ĳ�Ա����
		var $name;          //��һ����Ա����$name�����˵�����
		var $sex;            //�ڶ�����Ա����$sex�����˵��Ա�
		var $age;           //��������Ա����$age�����˵�����

		//�����������˵ĳ�Ա����
		function say(){     //����������˵���ķ�����ʹ��$this�������Ѷ����ڲ��ĳ�Ա����
			echo "�ҵ����ӽУ�".$this->name."�� �Ա�".$this->sex."�� �ҵ������ǣ�".$this->age."��<br>";
		}		

		function run(){      //������������һ������ 
			echo $this->name."����·<br>";    //ʹ��$this����$name����
		}		
	}

	//��������ͨ��new�ؼ���ʵ����person�������ʵ������
	$person1=new Person();       //ͨ����Person������һ��ʵ������$person1
	$person2=new Person();       //ͨ����person�����ڶ���ʵ������$person2
	$person3=new Person();       //ͨ����person����������ʵ������$person3

	//���������Ǹ�$person1���������Գ�ʹ����ֵ
	$person1->name="����";     //������person1�е�$name���Ը�ֵΪ���� 
	$person1->sex="��";         //������person1�е�$sex���Ը�ֵΪ��
	$person1->age=20;          //������person1�е�$age���Ը�ֵΪ20

	//���������Ǹ�$person2���������Գ�ʹ����ֵ
	$person2->name="����";     //������person2�е�$name���Ը�ֵΪ����
	$person2->sex="Ů";         //������person2�е�$sex���Ը�ֵΪŮ
	$person2->age=30;          //������person2�е�$age���Ը�ֵΪ30

	//���������Ǹ�$person3���������Գ�ʹ����ֵ
	$person3->name="����";     //������person3�е�$name���Ը�ֵΪ����
	$person3->sex="��";        //������person3�е�$sex���Ը�ֵΪ��
	$person3->age=40;          //������person3�е�$age���Ը�ֵΪ40

	$person1->say();     //ʹ��$person1�������е�say()����������say()�е�$this�ʹ����������$person1
	$person2->say();     //ʹ��$person2�������е�say()����������say()�е�$this�ʹ����������$person2
	$person3->say();     //ʹ��$person3�������е�say()����������say()�е�$this�ʹ����������$person3
?>

