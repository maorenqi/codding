<?php
	class Person {             //����һ������Person�����а���������Ա���Ժ�������Ա����
		//�����������˵ĳ�Ա����
		var $name;          //��һ����Ա����$name�����˵�����
		var $sex;            //�ڶ�����Ա����$sex�����˵��Ա�
		var $age;            //��������Ա����$age�����˵�����

		//����һ�����췽����������������ʱ��Ϊ����ĳ�Ա���Ը����ֵ
		function __construct($name, $sex, $age) {
			$this->name = $name;   //�ڴ�������ʱ��ʹ�ô���Ĳ���$nameΪ��Ա����$this->name����ֵ
			$this->sex = $sex;      //�ڴ�������ʱ��ʹ�ô���Ĳ���$sexΪ��Ա����$this->sex����ֵ
			$this->age = $age;      //�ڴ�������ʱ��ʹ�ô���Ĳ���$ageΪ��Ա����$this->age����ֵ
		}

		//�����������˵ĳ�Ա����
		function say(){             //����������˵���ķ�����ʹ��$this�������Ѷ����ڲ��ĳ�Ա����
			echo "�ҵ����ӽУ�".$this->name."�� �Ա�".$this->sex."�� �ҵ������ǣ�".$this->age."��<br>";
		}		

		function run() {            //������������һ������ 
			echo $this->name."����·<br>";    //ʹ��$this���ʱ������е�$name����
		}
		
		function __destruct() {
			echo "�ټ�".$this->name."<br>";
		}		
	}

	//��������ͨ��new�ؼ���ʵ����person�������ʵ������
	$person1=new Person("����", "��", 20);     //��������$person1 
	$person1=null;              //����һ�����������$person1��ֵΪ������ֵ����һ������ʧȥ����
	$person2=new Person("����", "Ů", 30);     //��������$person2 
	$person3=new Person("����", "��", 40);      //��������$person3 
?>

