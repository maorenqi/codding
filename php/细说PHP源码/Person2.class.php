<?php
	class Person           //����һ������Person�����а���������Ա���Ժ�������Ա����
	{
		//�����������˵�������Ա����
		var $name;       //��һ����Ա����$name�����˵�����
		var $sex;        //�ڶ�����Ա����$sex�����˵��Ա�
		var $age;        //��������Ա�Գɶ����˵�����

		//�����������˵�������Ա����
		function say()    //����˿���˵���ķ���
		{
			echo "�������˵��<br>";   //�ڷ������п����и�������
		}		

		function run()     //����˿�����·�ķ���
		{
			echo "���������·<br>";   //�ڷ������п����и�������
		}		
	}

	//��������ͨ��new�ؼ���ʵ����person�������ʵ������
	$person1=new Person();  //ͨ����Person������һ��ʵ������$person1
	$person2=new Person();  //ͨ����person�����ڶ���ʵ������$person2
	$person3=new Person();  //ͨ����person����������ʵ������$person3

	//���������Ǹ�$person1���������Գ�ʹ����ֵ
	$person1->name="����";     //������person1�е�$name���Ը�ֵΪ���� 
	$person1->sex="��";        //������person1�е�$sex���Ը�ֵΪ��
	$person1->age=20;          //������person1�е�$age���Ը�ֵΪ20

	//���������Ǹ�$person2���������Գ�ʹ����ֵ
	$person2->name="����";     //������person2�е�$name���Ը�ֵΪ����
	$person2->sex="Ů";        //������person2�е�$sex���Ը�ֵΪŮ
	$person2->age=30;          //������person2�е�$age���Ը�ֵΪ30

	//���������Ǹ�$person3���������Գ�ʹ����ֵ
	$person3->name="����";     //������person3�е�$name���Ը�ֵΪ����
	$person3->sex="��";        //������person3�е�$sex���Ը�ֵΪ��
	$person3->age=40;          //������person3�е�$age���Ը�ֵΪ40
	
	//���������Ƿ���$person1�����еĳ�Ա����
	echo "person1����������ǣ�".$person1->name."<br>";  //�������$person1�еĳ�Ա����$name��ֵ
	echo "person1������Ա��ǣ�".$person1->sex."<br>";    //�������$person1�еĳ�Ա����$sex��ֵ
	echo "person1����������ǣ�".$person1->age."<br>";    //�������$person1�еĳ�Ա����$age��ֵ

	//�������з���$person1�����еķ���
	$person1->say();          //���ʵ�һ������$person1�еĳ�Ա����say(),�õ�һ����˵��
	$person1->run();          //���ʵ�һ������$person1�еĳ�Ա����run(),�õ�һ������·

	//���������Ƿ���$person2�����еĳ�Ա����
	echo "person2����������ǣ�".$person2->name."<br>";  //�������$person2�еĳ�Ա����$name��ֵ
	echo "person2������Ա��ǣ�".$person2->sex."<br>";    //�������$person2�еĳ�Ա����$sex��ֵ
	echo "person2����������ǣ�".$person2->age."<br>";    //�������$person2�еĳ�Ա����$age��ֵ

	//�������з���$person2�����еķ���
	$person2->say();          //���ʵڶ�������$person2�еĳ�Ա����say(),�õڶ�����˵��
	$person2->run();          //���ʵڶ�������$person2�еĳ�Ա����run(),�õڶ�������·

	//���������Ƿ���$person3�����еĳ�Ա����
	echo "person3����������ǣ�".$person3->name."<br>";  //�������$person3�еĳ�Ա����$name��ֵ
	echo "person3������Ա��ǣ�".$person3->sex."<br>";    //�������$person3�еĳ�Ա����$sex��ֵ
	echo "person3����������ǣ�".$person3->age."<br>";    //�������$person3�еĳ�Ա����$age��ֵ

	//�������з���$person3�����еķ���
	$person3->say();          //���ʵ���������$person3�еĳ�Ա����say(),�õ�������˵��
	$person3->run();          //���ʵ���������$person3�еĳ�Ա����run(),�õ���������·
?>

